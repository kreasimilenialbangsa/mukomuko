<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Excel\LaporanKalengNuExport;
use App\Exports\Excel\LaporanTahunanDetail;
use App\Exports\Excel\LaporanTahunanExport;
use App\Exports\Excel\LaporanTahunanMultiWorksheet;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Desa;
use App\Models\Admin\Donate;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin\Kecamatan;
use App\Models\Admin\Income;
use App\Models\Admin\Outcome;
use App\Models\Admin\OutcomeCategory;
use App\Models\Admin\Ziswaf;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Response;

class ReportController extends AppBaseController
{
    /**
     * Display a listing of the Report.
     *
     *
     * @return Response
     */
    public function financialReport(Request $request)
    {
        $kecamatan = Kecamatan::select('id', 'name')
            ->whereParentId(0)
            ->whereIsActive(1)
            ->orderBy('name', 'asc')
            ->get();
        
        $desa = Kecamatan::select('id', 'name')
            ->where('parent_id', '<>', 0)
            ->whereIsActive(1)
            ->orderBy('name', 'asc')
            ->get();

        $incomes = Income::select('id', 'name', 'precent')->get();

        $months = [];
        for ($i=1; $i <= 12; $i++) { 
            $months[] = [
                "text" => Carbon::parse('01-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-2022')->isoFormat('MMMM'),
                "number" => $i
            ];
        }

        $years = range(date("Y"), 2022);

        if($request->ajax()) {
            $donatur = User::select('users.id', 'users.location_id', 'users.name', 'users.created_at')
                ->join('locations', 'locations.id', 'users.location_id')
                ->when(!empty($request->kecamatan), function($q) use($request) {
                    $q->where('locations.parent_id', $request->kecamatan);
                })
                ->when(!empty($request->desa), function($q) use($request) {
                    $q->where('locations.id', $request->desa);
                })
                ->with(['role_user', 'desa'])
                ->withCount(['donate' => function($q) use($request) {
                    if(isset($request->from_date) && isset($request->to_date)) {
                        $q->whereBetween('date_donate', [$request->from_date . ' 00:59:00', $request->to_date . ' 23:59:00']);
                    } else {
                        $q->whereBetween('date_donate', [Carbon::now()->startOfMonth()->format('Y-m-d') . ' 00:59:00', Carbon::now()->endOfMonth()->format('Y-m-d') . ' 23:59:00']);
                    }
                }])
                ->withSum(['donate' => function($q) use($request) {
                    if(isset($request->from_date) && isset($request->to_date)) {
                        $q->whereBetween('date_donate', [$request->from_date . ' 00:59:00', $request->to_date . ' 23:59:00']);
                    } else {
                        $q->whereBetween('date_donate', [Carbon::now()->startOfMonth()->format('Y-m-d') . ' 00:59:00', Carbon::now()->endOfMonth()->format('Y-m-d') . ' 23:59:00']);
                    }
                }], 'total_donate')
                ->whereRelation('role_user', 'role_id', 4)
                ->orderBy('locations.parent_id', 'asc')
                ->get();

            foreach($donatur as $key => $row) {
                foreach($incomes as $no => $income) {
                    $row->{'col'. strval($no+1)} = ($row['donate_sum_total_donate'] * $income->precent)/100;
                }
            }

            return DataTables::of($donatur)
                ->addIndexColumn()
                ->editColumn('donate_sum_total_donate', '{{ "Rp " . number_format($donate_sum_total_donate,0,",",".") }}')
                ->editColumn('col1', '{{ "Rp " . number_format($col1,0,",",".") }}')
                ->editColumn('col2', '{{ "Rp " . number_format($col2,0,",",".") }}')
                ->editColumn('col3', '{{ "Rp " . number_format($col3,0,",",".") }}')
                ->editColumn('col4', '{{ "Rp " . number_format($col4,0,",",".") }}')
                ->editColumn('col5', '{{ "Rp " . number_format($col5,0,",",".") }}')
                ->editColumn('created_at', '{{ date("d/m/Y H:i", strtotime($created_at)) }}')
                ->make(true);
        }
        
        return view('admin.pages.reports.financial.index')
            ->with('months', $months)
            ->with('years', $years)
            ->with('kecamatan', $kecamatan)
            ->with('desa', $desa)
            ->with('incomes', $incomes);
    }

    /**
     * Display a listing of the Report.
     *
     *
     * @return Response
     */
    public function annualReport(Request $request)
    {   
        if($request->ajax()) {
            $months = [];

            for ($i=1; $i <= 12; $i++) { 
                $months[] = [
                    'month' => str_pad($i, 2, '0', STR_PAD_LEFT).'-'.(isset($request->year) ? $request->year : date('Y')),
                    'month_text' => str_pad($i, 2, '0', STR_PAD_LEFT).'-'.(isset($request->year) ? $request->year : date('Y')),
                    'income' => 0,
                    'outcome' => 0
                ];
            }

            foreach($months as $key => $row) {
                $income = DB::table('donates')
                    ->select(DB::raw("DATE_FORMAT(date_donate, '%m-%Y') as month"), DB::raw("SUM(total_donate) as total"))
                    ->where(DB::raw("DATE_FORMAT(date_donate, '%m-%Y')"), $row['month'])
                    ->whereNull('deleted_at')
                    ->whereType('\App\Models\Admin\Ziswaf')
                    ->whereIsConfirm(1)
                    ->groupBy('month')
                    ->first();

                $program = DB::table('donates')
                    ->select(DB::raw("DATE_FORMAT(date_donate, '%m-%Y') as month"), DB::raw("SUM(total_donate) as total"))
                    ->where(DB::raw("DATE_FORMAT(date_donate, '%m-%Y')"), $row['month'])
                    ->whereNull('deleted_at')
                    ->whereType('\App\Models\Admin\Program')
                    ->whereIsConfirm(1)
                    ->groupBy('month')
                    ->first();

                if($row['month'] == !empty($income->month) ? $income->month : null) {
                    $program_total = !empty($program->total) ? $program->total : 0;
                    $months[$key]['income'] = ($income->total + $program_total);
                }

                $outcome = DB::table('outcomes')
                    ->select(DB::raw("DATE_FORMAT(date_outcome, '%m-%Y') as month"), DB::raw("SUM(nominal) as total"))
                    ->where(DB::raw("DATE_FORMAT(date_outcome, '%m-%Y')"), $row['month'])
                    ->whereNull('deleted_at')
                    ->groupBy('month')
                    ->first();

                if($row['month'] == !empty($outcome->month) ? $outcome->month : null) {
                    $months[$key]['outcome'] = $outcome->total;
                }

                $months[$key]['month_text'] = Carbon::parse('01-'.$row['month'])->isoFormat('MMMM');
                $months[$key]['status'] = date('m-Y') == $row['month'] ? 'Sedang Berjalan' : (date('m-Y') < $row['month'] ? 'Belum' : 'Selesai');
            }

            $lastYearIncome = DB::table('donates')
                ->select(DB::raw("DATE_FORMAT(date_donate, '%Y') as year"), DB::raw("SUM(total_donate) as total"))
                ->whereBetween(DB::raw("DATE_FORMAT(date_donate, '%Y')"), [intval('2021'), intval(date('Y')-1)])
                ->whereNull('deleted_at')
                ->whereType('\App\Models\Admin\Ziswaf')
                ->whereIsConfirm(1)
                ->groupBy('year')
                ->first();

            $lastYearOutcome = DB::table('outcomes')
                ->select(DB::raw("DATE_FORMAT(date_outcome, '%Y') as year"), DB::raw("SUM(nominal) as total"))
                ->whereBetween(DB::raw("DATE_FORMAT(date_outcome, '%Y')"), [intval('2021'), intval(date('Y')-1)])
                ->whereNull('deleted_at')
                ->groupBy('year')
                ->first();

            array_unshift($months, [
                'month' => intval(date('Y')-1),
                'month_text' => 'Saldo Akhir Tahun '.intval(date('Y')-1),
                'income' => isset($lastYearIncome) ? $lastYearIncome->total : 0,
                'outcome' => isset($lastYearOutcome) ? $lastYearOutcome->total : 0,
                'status' => 'Selesai'
            ]);

            return DataTables::of($months)
                ->addColumn('action', 'admin.pages.reports.annual.datatables_actions')
                ->addIndexColumn()
                ->editColumn('income', '{{ "Rp " . number_format($income,0,",",".") }}')
                ->editColumn('outcome', '{{ "Rp " . number_format($outcome,0,",",".") }}')
                ->make(true);
        }

        $year = DB::table('donates')
            ->select(DB::raw("DATE_FORMAT(date_donate, '%Y') as year"))
            ->groupBy('year')
            ->get();
        
        return view('admin.pages.reports.annual.index')
            ->with('year', $year);
    }

    /**
     * Display the specified Report.
     *
     * @param string $date
     *
     * @return Response
     */
    public function annualReportShow(Request $request, $date)
    {
        if(date('m-Y') < $date) {
            Session::flash('error', 'Belum memasuki bulan tersebut');
            return redirect()->route('admin.report.annual.index');
        }

        $kecamatan = Kecamatan::select('id', 'name')
            ->whereParentId(0)
            ->whereIsActive(1)
            ->orderBy('name', 'asc')
            ->get();
        
        $desa = Kecamatan::select('id', 'name')
            ->where('parent_id', '<>', 0)
            ->whereIsActive(1)
            ->orderBy('name', 'asc')
            ->get();
            

        $ziswafCat = Ziswaf::select('id', 'title', 'created_at')->orderBy('title', 'asc')->get();
        $outcomeCat = OutcomeCategory::select('id', 'name', 'created_at')->orderBy('name', 'asc')->get();
        
        if($request->ajax()) {
            $detail = [];

            if($request->type == 'income') {
                foreach($ziswafCat as $item) {
                    $totalIncome = Donate::select('type_id', DB::raw("SUM(total_donate) as total_donate"))
                        ->where(DB::raw("DATE_FORMAT(date_donate, '%m-%Y')"), $date)
                        ->whereType('\App\Models\Admin\Ziswaf')
                        ->whereTypeId($item->id)
                        ->whereIsConfirm(1)
                        ->groupBy('type_id')
                        ->first();

                    $total_income = !empty($totalIncome->total_donate) ? $totalIncome->total_donate : 0;

                    if($item->id == 7) {
                        $program = DB::table('donates')
                            ->select(DB::raw("DATE_FORMAT(date_donate, '%m-%Y') as month"), DB::raw("SUM(total_donate) as total"))
                            ->where(DB::raw("DATE_FORMAT(date_donate, '%m-%Y')"), $date)
                            ->whereNull('deleted_at')
                            ->whereType('\App\Models\Admin\Program')
                            ->whereIsConfirm(1)
                            ->groupBy('month')
                            ->first();

                            
                        $program_total = !empty($program->total) ? $program->total : 0;
                        $total_donate = ($total_income + $program_total);
                    } else {
                        $total_donate = $total_income;
                    }
        
                    array_push($detail, [
                        'title' => $item->title,
                        'total_donate' => $total_donate
                    ]);
        
                }
            } else {
                foreach($outcomeCat as $item) {
                    $totalOutcome = Outcome::select('category_id', DB::raw("SUM(nominal) as total_donate"))
                        ->where(DB::raw("DATE_FORMAT(date_outcome, '%m-%Y')"), $date)
                        ->whereCategoryId($item->id)
                        ->groupBy('category_id')
                        ->first();
                    array_push($detail, [
                        'title' => $item->name,
                        'total_donate' => !empty($totalOutcome->total_donate) ? $totalOutcome->total_donate : 0
                    ]);
                }
            }

            return DataTables::of($detail)
                ->addIndexColumn()
                ->editColumn('total_donate', '{{ "Rp " . number_format($total_donate,0,",",".") }}')
                ->make(true);
        }

        return view('admin.pages.reports.annual.show')
            ->with('desa', $desa)
            ->with('kecamatan', $kecamatan);
    }

    public function exportKalengNu(Request $request)
    {
        // $month = str_pad($request->month, 2, '0', STR_PAD_LEFT);
        // $from_date = Carbon::parse($request->year.'-'.$month.'-01')->startOfMonth()->format('Y-m-d');
        // $to_date = Carbon::parse($request->year.'-'.$month.'-01')->endOfMonth()->format('Y-m-d');        

        $incomes = Income::select('id', 'name', 'precent')->get();

        $donatur = User::select('users.id', 'users.location_id', 'users.name', 'users.created_at')
            ->join('locations', 'locations.id', 'users.location_id')
            ->when(!empty($request->kecamatan), function($q) use($request) {
                $q->where('locations.parent_id', $request->kecamatan);
            })
            ->when(!empty($request->desa), function($q) use($request) {
                $q->where('locations.id', $request->desa);
            })
            ->with(['role_user', 'desa'])
            // ->withCount(['donate' => function($q) use($from_date, $to_date) {
            //     $q->whereBetween('date_donate', [$from_date . ' 00:59:00', $to_date . ' 23:59:00']);
            // }])
            // ->withSum(['donate' => function($q) use($from_date, $to_date) {
            //     $q->whereBetween('date_donate', [$from_date . ' 00:59:00', $to_date . ' 23:59:00']);
            // }], 'total_donate')
            ->withCount(['donate' => function($q) use($request) {
                if(isset($request->from_date) && isset($request->to_date)) {
                    $q->whereBetween('date_donate', [$request->from_date . ' 00:59:00', $request->to_date . ' 23:59:00']);
                } else {
                    $q->whereBetween('date_donate', [Carbon::now()->startOfMonth()->format('Y-m-d') . ' 00:59:00', Carbon::now()->endOfMonth()->format('Y-m-d') . ' 23:59:00']);
                }
            }])
            ->withSum(['donate' => function($q) use($request) {
                if(isset($request->from_date) && isset($request->to_date)) {
                    $q->whereBetween('date_donate', [$request->from_date . ' 00:59:00', $request->to_date . ' 23:59:00']);
                } else {
                    $q->whereBetween('date_donate', [Carbon::now()->startOfMonth()->format('Y-m-d') . ' 00:59:00', Carbon::now()->endOfMonth()->format('Y-m-d') . ' 23:59:00']);
                }
            }], 'total_donate')
            ->whereRelation('role_user', 'role_id', 4)
            ->orderBy('locations.parent_id', 'asc')
            ->get();
        
        $total = [
            "donatur" => 0,
            "donate1" => 0,
            "col1" => 0,
            "col2" => 0,
            "col3" => 0,
            "col4" => 0,
            "col5" => 0,
            "donate2" => 0,
        ];
        foreach($donatur as $key => $row) {
            foreach($incomes as $no => $income) {
                $row->{'col'. strval($no+1)} = ($row['donate_sum_total_donate'] * $income->precent)/100;
            }

            $total['donatur'] += intval($row->donate_count);
            $total['donate1'] += intval($row->donate_sum_total_donate);
            $total['col1'] += intval($row->col1);
            $total['col2'] += intval($row->col2);
            $total['col3'] += intval($row->col3);
            $total['col4'] += intval($row->col4);
            $total['col5'] += intval($row->col5);
            $total['donate2'] += intval($row->donate_sum_total_donate);
        }

        $data = [
            "result" => $donatur->toArray(),
            "incomes" => $incomes->toArray(),
            "total" => $total,
            // "date" => [
            //     "month" => Carbon::parse('01-'.$month.'-'.$request->year)->isoFormat('MMMM'),
            //     "year" => $request->year
            // ]
            "date" => [
                "from_date" => date('Y-m-d', strtotime($request->from_date)),
                "to_date" => date('Y-m-d', strtotime($request->to_date))
            ]
        ];

        $filename = 'REKAPITULASI HASIL PEROLEHAN KALENG NU_'. date('d-m-Y', strtotime($request->from_date)) . '_' . date('d-m-Y', strtotime($request->to_date)) .'.xlsx';

        return Excel::download(new LaporanKalengNuExport($data), $filename);
    }

    public function exportLaporanTahunan(Request $request)
    {
        
        $ziswafCat = Ziswaf::select('id', 'title', 'created_at')->orderBy('title', 'asc')->get();
        $outcomeCat = OutcomeCategory::select('id', 'name', 'created_at')->orderBy('name', 'asc')->get();
        
        if($request->period == 1) {
            $startMonth = 1;
            $endMonth = 6;
            $textPeriod = "SEMESTER 1 TAHUN ";
        } elseif($request->period == 2) {
            $startMonth = 7;
            $endMonth = 12;
            $textPeriod = "SEMESTER 2 TAHUN ";
        } else {
            $startMonth = 1;
            $endMonth = 12;
            $textPeriod = "AKHIR TAHUN ";
        }
        
        $months = [];

        for ($i=$startMonth; $i <= $endMonth; $i++) { 
            $months[] = [
                'month' => str_pad($i, 2, '0', STR_PAD_LEFT).'-'.(isset($request->year) ? $request->year : date('Y')),
                'month_text' => str_pad($i, 2, '0', STR_PAD_LEFT).'-'.(isset($request->year) ? $request->year : date('Y')),
                'income' => 0,
                'outcome' => 0
            ];
        }

        foreach($months as $key => $row) {
            // Income
            $income = DB::table('donates')
                ->select(DB::raw("DATE_FORMAT(date_donate, '%m-%Y') as month"), DB::raw("SUM(total_donate) as total"))
                ->where(DB::raw("DATE_FORMAT(date_donate, '%m-%Y')"), $row['month'])
                ->whereNull('deleted_at')
                ->whereType('\App\Models\Admin\Ziswaf')
                ->whereIsConfirm(1)
                ->groupBy('month')
                ->first();

            $program = DB::table('donates')
                ->select(DB::raw("DATE_FORMAT(date_donate, '%m-%Y') as month"), DB::raw("SUM(total_donate) as total"))
                ->where(DB::raw("DATE_FORMAT(date_donate, '%m-%Y')"), $row['month'])
                ->whereNull('deleted_at')
                ->whereType('\App\Models\Admin\Program')
                ->whereIsConfirm(1)
                ->groupBy('month')
                ->first();
            
            if($row['month'] == !empty($income->month) ? $income->month : null) {
                $program_total = !empty($program->total) ? $program->total : 0;
                $months[$key]['income'] = ($income->total + $program_total);
            }

            // Detail Income
            $detailIncome = [];
            foreach($ziswafCat as $item) {
                $totalIncome = Donate::select('type_id', DB::raw("SUM(total_donate) as total_donate"))
                    ->where(DB::raw("DATE_FORMAT(date_donate, '%m-%Y')"), $row['month'])
                    ->whereType('\App\Models\Admin\Ziswaf')
                    ->whereTypeId($item->id)
                    ->whereIsConfirm(1)
                    ->groupBy('type_id')
                    ->first();

                $total_income = !empty($totalIncome->total_donate) ? $totalIncome->total_donate : 0;

                if($item->id == 7) {
                    $program = DB::table('donates')
                        ->select(DB::raw("DATE_FORMAT(date_donate, '%m-%Y') as month"), DB::raw("SUM(total_donate) as total"))
                        ->where(DB::raw("DATE_FORMAT(date_donate, '%m-%Y')"), $row['month'])
                        ->whereNull('deleted_at')
                        ->whereType('\App\Models\Admin\Program')
                        ->whereIsConfirm(1)
                        ->groupBy('month')
                        ->first();  
                        
                    $program_total = !empty($program->total) ? $program->total : 0;
                    $total_donate = ($total_income + $program_total);
                } else {
                    $total_donate = $total_income;
                }

                array_push($detailIncome, [
                    'title' => $item->title,
                    'total_donate' => $total_donate
                ]);
            }
            $months[$key]['income_detail'] = $detailIncome;

            // Outcome
            $outcome = DB::table('outcomes')
                ->select(DB::raw("DATE_FORMAT(date_outcome, '%m-%Y') as month"), DB::raw("SUM(nominal) as total"))
                ->where(DB::raw("DATE_FORMAT(date_outcome, '%m-%Y')"), $row['month'])
                ->whereNull('deleted_at')
                ->groupBy('month')
                ->first();

            if($row['month'] == !empty($outcome->month) ? $outcome->month : null) {
                $months[$key]['outcome'] = $outcome->total;
            }

            // Detail Outcome
            $detailOutcome = [];
            foreach($outcomeCat as $item) {
                $totalOutcome = Outcome::select('category_id', DB::raw("SUM(nominal) as total_donate"))
                    ->where(DB::raw("DATE_FORMAT(date_outcome, '%m-%Y')"), $row['month'])
                    ->whereCategoryId($item->id)
                    ->groupBy('category_id')
                    ->first();

                array_push($detailOutcome, [
                    'title' => $item->name,
                    'total_donate' => !empty($totalOutcome->total_donate) ? $totalOutcome->total_donate : 0
                ]);
            }
            $months[$key]['outcome_detail'] = $detailOutcome;

            // Other
            $months[$key]['month_text'] = Carbon::parse('01-'.$row['month'])->isoFormat('MMMM');
            $months[$key]['status'] = date('m-Y') == $row['month'] ? 'Sedang Berjalan' : (date('m-Y') < $row['month'] ? 'Belum' : 'Selesai');
        }

        // Last Year Income
        $lastYearIncome = DB::table('donates')
            ->select(DB::raw("DATE_FORMAT(date_donate, '%Y') as year"), DB::raw("SUM(total_donate) as total"))
            ->whereBetween(DB::raw("DATE_FORMAT(date_donate, '%Y')"), [intval('2021'), intval(date('Y')-1)])
            ->whereNull('deleted_at')
            ->whereType('\App\Models\Admin\Ziswaf')
            ->whereIsConfirm(1)
            ->groupBy('year')
            ->first();

        // Last Year Outcome
        $lastYearOutcome = DB::table('outcomes')
            ->select(DB::raw("DATE_FORMAT(date_outcome, '%Y') as year"), DB::raw("SUM(nominal) as total"))
            ->whereBetween(DB::raw("DATE_FORMAT(date_outcome, '%Y')"), [intval('2021'), intval(date('Y')-1)])
            ->whereNull('deleted_at')
            ->groupBy('year')
            ->first();

        array_unshift($months, [
            'month' => intval(date('Y')-1),
            'month_text' => 'Saldo Akhir Tahun '.intval(date('Y')-1),
            'income' => isset($lastYearIncome) ? $lastYearIncome->total : 0,
            'outcome' => isset($lastYearOutcome) ? $lastYearOutcome->total : 0,
            'status' => 'Selesai'
        ]);

        $total = [
            'total_income' => 0,
            'total_outcome' => 0
        ];

        foreach($months as $item) {
            $total['total_income'] += intval($item['income']);
            $total['total_outcome'] += intval($item['outcome']);
        }

        $data = [
            "result" => $months,
            "total" => $total,
            "text_period" => $textPeriod,
            "year" => isset($request->year) ? $request->year : date('Y')
        ];

        $filename = 'LAPORAN ' . $textPeriod . $data['year'].'.xlsx';

        return Excel::download(new LaporanTahunanMultiWorksheet($data), $filename);
    }

    public function exportLaporanTahunanDetail($month, Request $request)
    {
        $ziswafCat = Ziswaf::select('id', 'title', 'created_at')->orderBy('title', 'asc')->get();
        $outcomeCat = OutcomeCategory::select('id', 'name', 'created_at')->orderBy('name', 'asc')->get();

        $result = [];
        // Detail Income
        $detailIncome = [];
        foreach($ziswafCat as $item) {
            $totalIncome = Donate::select('donates.type_id', DB::raw("SUM(donates.total_donate) as total_donate"))
                ->leftJoin('locations', 'locations.id', 'donates.location_id')
                ->when(!empty($request->kecamatan), function($q) use($request) {
                    $q->where('locations.parent_id', $request->kecamatan);
                })
                ->when(!empty($request->desa), function($q) use($request) {
                    $q->where('locations.id', $request->desa);
                })
                ->where(DB::raw("DATE_FORMAT(date_donate, '%m-%Y')"), $month)
                ->where('donates.type', '\App\Models\Admin\Ziswaf')
                ->where('donates.type_id', $item->id)
                ->where('donates.is_confirm', 1)
                ->groupBy('donates.type_id')
                ->first();

            $total_income = !empty($totalIncome->total_donate) ? $totalIncome->total_donate : 0;

            if($item->id == 7) {
                $program = DB::table('donates')
                    ->leftJoin('locations', 'locations.id', 'donates.location_id')
                    ->when(!empty($request->kecamatan), function($q) use($request) {
                        $q->where('locations.parent_id', $request->kecamatan);
                    })
                    ->when(!empty($request->desa), function($q) use($request) {
                        $q->where('locations.id', $request->desa);
                    })
                    ->select(DB::raw("DATE_FORMAT(donates.date_donate, '%m-%Y') as month"), DB::raw("SUM(donates.total_donate) as total"))
                    ->where(DB::raw("DATE_FORMAT(donates.date_donate, '%m-%Y')"), $month)
                    ->where('donates.deleted_at', NULL)
                    ->where('donates.type', '\App\Models\Admin\Program')
                    ->where('donates.is_confirm', 1)
                    ->groupBy('month')
                    ->first();  
                    
                $program_total = !empty($program->total) ? $program->total : 0;
                $total_donate = ($total_income + $program_total);
            } else {
                $total_donate = $total_income;
            }

            array_push($detailIncome, [
                'title' => $item->title,
                'total_donate' => $total_donate
            ]);
        }
        $result['income_detail'] = $detailIncome;

        // Detail Outcome
        $detailOutcome = [];
        foreach($outcomeCat as $item) {
            $totalOutcome = Outcome::select('outcomes.category_id', DB::raw("SUM(outcomes.nominal) as total_donate"))
                ->leftJoin('locations', 'locations.id', 'outcomes.desa_id')
                ->when(!empty($request->kecamatan), function($q) use($request) {
                    $q->where('locations.parent_id', $request->kecamatan);
                })
                ->when(!empty($request->desa), function($q) use($request) {
                    $q->where('locations.id', $request->desa);
                })
                ->where(DB::raw("DATE_FORMAT(outcomes.date_outcome, '%m-%Y')"), $month)
                ->where('outcomes.category_id', $item->id)
                ->groupBy('outcomes.category_id')
                ->first();

            array_push($detailOutcome, [
                'title' => $item->name,
                'total_donate' => !empty($totalOutcome->total_donate) ? $totalOutcome->total_donate : 0
            ]);
        }
        $result['outcome_detail'] = $detailOutcome;

        $total = [
            'total_income' => 0,
            'total_outcome' => 0
        ];

        foreach($result['income_detail'] as $item) {
            $total['total_income'] += intval($item['total_donate']);
        }

        foreach($result['outcome_detail'] as $item) {
            $total['total_outcome'] += intval($item['total_donate']);
        }

        $location = [];
        if(isset($request->kecamatan) && isset($request->desa)) {
            $location = Desa::with('kecamatan', 'desa')->whereId($request->kecamatan)->first();
        } elseif(isset($request->kecamatan)) {
            $location = Desa::with('kecamatan', 'desa')->whereId($request->kecamatan)->first();
        } elseif(isset($request->desa)) {
            $location = Desa::with('kecamatan', 'desa')->whereId($request->desa)->first();
        }

        $data = [
            "result" => $result,
            "total" => $total,
            "location" => !empty($location) ? $location->toArray() : 'Tidak Diketahui',
            "month" => date('Y-m-d', strtotime('01-'.$month)),
            "year" => isset($request->year) ? $request->year : date('Y')
        ];

        
        $filename = 'LAPORAN DANA PENERIMAAN & PENGELUARAN BULAN ' . strtoupper(Carbon::parse($data['month'])->isoFormat('MMMM')) . ' TAHUN ' . $data['year'] . '.xlsx';
        
        // dd($data);

        return Excel::download(new LaporanTahunanDetail($data), $filename);
    }
}
