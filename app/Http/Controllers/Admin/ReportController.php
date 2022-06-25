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
            ->get();
        
        $desa = Kecamatan::select('id', 'name')
            ->where('parent_id', '<>', 0)
            ->whereIsActive(1)
            ->get();

        $incomes = Income::select('id', 'name', 'precent')->get();

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
                        $q->whereBetween('created_at', [$request->from_date . ' 00:59:00', $request->to_date . ' 23:59:00']);
                    } else {
                        $q->whereBetween('created_at', [Carbon::now()->startOfMonth()->format('Y-m-d') . ' 00:59:00', Carbon::now()->endOfMonth()->format('Y-m-d') . ' 23:59:00']);
                    }
                }])
                ->withSum(['donate' => function($q) use($request) {
                    if(isset($request->from_date) && isset($request->to_date)) {
                        $q->whereBetween('created_at', [$request->from_date . ' 00:59:00', $request->to_date . ' 23:59:00']);
                    } else {
                        $q->whereBetween('created_at', [Carbon::now()->startOfMonth()->format('Y-m-d') . ' 00:59:00', Carbon::now()->endOfMonth()->format('Y-m-d') . ' 23:59:00']);
                    }
                }], 'total_donate')
                ->whereRelation('role_user', 'role_id', 4)
                ->get();

            foreach($donatur as $key => $row) {
                $row->col1 = ($row['donate_sum_total_donate'] * $incomes[0]->precent)/100;
                $row->col2 = ($row['donate_sum_total_donate'] * $incomes[1]->precent)/100;
                $row->col3 = ($row['donate_sum_total_donate'] * $incomes[2]->precent)/100;
                $row->col4 = ($row['donate_sum_total_donate'] * $incomes[3]->precent)/100;
            }

            return DataTables::of($donatur)
                ->addIndexColumn()
                ->editColumn('donate_sum_total_donate', '{{ "Rp " . number_format($donate_sum_total_donate,0,",",".") }}')
                ->editColumn('col1', '{{ "Rp " . number_format($col1,0,",",".") }}')
                ->editColumn('col2', '{{ "Rp " . number_format($col2,0,",",".") }}')
                ->editColumn('col3', '{{ "Rp " . number_format($col3,0,",",".") }}')
                ->editColumn('col4', '{{ "Rp " . number_format($col4,0,",",".") }}')
                ->editColumn('created_at', '{{ date("d/m/Y H:i", strtotime($created_at)) }}')
                ->make(true);
        }
        
        return view('admin.pages.reports.financial.index')
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
                    ->select(DB::raw("DATE_FORMAT(created_at, '%m-%Y') as month"), DB::raw("SUM(total_donate) as total"))
                    ->where(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"), $row['month'])
                    ->whereNull('deleted_at')
                    ->whereType('\App\Models\Admin\Ziswaf')
                    ->whereIsConfirm(1)
                    ->groupBy('month')
                    ->first();

                if($row['month'] == !empty($income->month) ? $income->month : null) {
                    $months[$key]['income'] = $income->total;
                }

                $outcome = DB::table('outcomes')
                    ->select(DB::raw("DATE_FORMAT(created_at, '%m-%Y') as month"), DB::raw("SUM(nominal) as total"))
                    ->where(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"), $row['month'])
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
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y') as year"))
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
                    ->where(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"), $date)
                    ->whereType('\App\Models\Admin\Ziswaf')
                    ->whereIsConfirm(1)
                    ->groupBy('type_id')
                    ->get();
                } else {   
                $detail = Outcome::select('category_id', DB::raw("SUM(nominal) as total_donate"))
                    ->with('category')
                    ->where(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"), $date)
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
        $data = Donate::get();
        
        return Excel::download(new LaporanKalengNuExport($data), 'test.xlsx');
    }
}
