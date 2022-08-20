<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Excel\LaporanKalengNuExport;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Donate;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Admin\Kecamatan;
use App\Models\Admin\Income;
use App\Models\Admin\Outcome;
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

                if($row['month'] == !empty($income->month) ? $income->month : null) {
                    $months[$key]['income'] = $income->total;
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

        if($request->ajax()) {

            if($request->type == 'income') {
                $detail = Donate::select('type_id', DB::raw("SUM(total_donate) as total_donate"))
                    ->with('ziswaf')
                    ->where(DB::raw("DATE_FORMAT(date_donate, '%m-%Y')"), $date)
                    ->whereType('\App\Models\Admin\Ziswaf')
                    ->whereIsConfirm(1)
                    ->groupBy('type_id')
                    ->get();
                } else {   
                $detail = Outcome::select('category_id', DB::raw("SUM(nominal) as total_donate"))
                    ->with('category')
                    ->where(DB::raw("DATE_FORMAT(date_outcome, '%m-%Y')"), $date)
                    ->groupBy('category_id')
                    ->get();
            }

            return DataTables::of($detail)
                ->addIndexColumn()
                ->editColumn('total_donate', '{{ "Rp " . number_format($total_donate,0,",",".") }}')
                ->make(true);
        }

        return view('admin.pages.reports.annual.show');
    }

    public function exportKalengNu(Request $request)
    {
        $month = str_pad($request->month, 2, '0', STR_PAD_LEFT);
        $from_date = Carbon::parse($request->year.'-'.$month.'-01')->startOfMonth()->format('Y-m-d');
        $to_date = Carbon::parse($request->year.'-'.$month.'-01')->endOfMonth()->format('Y-m-d');        

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
                ->withCount(['donate' => function($q) use($from_date, $to_date) {
                    $q->whereBetween('date_donate', [$from_date . ' 00:59:00', $to_date . ' 23:59:00']);
                }])
                ->withSum(['donate' => function($q) use($from_date, $to_date) {
                    $q->whereBetween('date_donate', [$from_date . ' 00:59:00', $to_date . ' 23:59:00']);
                }], 'total_donate')
                ->whereRelation('role_user', 'role_id', 4)
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
            "date" => [
                "month" => Carbon::parse('01-'.$month.'-'.$request->year)->isoFormat('MMMM'),
                "year" => $request->year
            ]
        ];

        $filename = 'REKAPITULASI HASIL PEROLEHAN KALENG NU '. strtoupper($data['date']['month']) . ' ' . $data['date']['year'] .'.xlsx';

        return Excel::download(new LaporanKalengNuExport($data), $filename);
    }
}
