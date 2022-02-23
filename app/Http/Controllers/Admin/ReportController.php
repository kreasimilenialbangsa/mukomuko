<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateDonateRequest;
use App\Http\Requests\Admin\UpdateDonateRequest;
use App\Repositories\Admin\DonateRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Desa;
use App\Models\Admin\Donate;
use App\Models\Admin\Program;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;
use Yajra\DataTables\DataTables;

class ReportController extends AppBaseController
{
    /**
     * Display a listing of the Report.
     *
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $donatur = User::select('users.id', 'users.location_id', 'users.name', 'users.created_at')
                ->join('locations', 'locations.id', 'users.location_id')
                // ->whereParentId(3)
                ->with(['role_user', 'desa'])
                ->withCount(['donate' => function($q) use($request) {
                    if(isset($request->from_date) && isset($request->to_date)) {
                        $q->whereBetween('created_at', [$request->from_date . ' 23:59:00', $request->to_date . ' 23:59:00']);
                    } else {
                        $q->whereBetween('created_at', [Carbon::now()->startOfMonth()->format('Y-m-d') . ' 23:59:00', Carbon::now()->endOfMonth()->format('Y-m-d') . ' 23:59:00']);
                    }
                }])
                ->withSum(['donate' => function($q) use($request) {
                    if(isset($request->from_date) && isset($request->to_date)) {
                        $q->whereBetween('created_at', [$request->from_date . ' 23:59:00', $request->to_date . ' 23:59:00']);
                    } else {
                        $q->whereBetween('created_at', [Carbon::now()->startOfMonth()->format('Y-m-d') . ' 23:59:00', Carbon::now()->endOfMonth()->format('Y-m-d') . ' 23:59:00']);
                    }
                }], 'total_donate')
                ->whereRelation('role_user', 'role_id', 4)
                ->get();
            
            foreach($donatur as $key => $row) {
                $row->col1 = ($row['donate_sum_total_donate'] * 10)/100;
                $row->col2 = ($row['donate_sum_total_donate'] * 45)/100;
                $row->col3 = ($row['donate_sum_total_donate'] * 20)/100;
                $row->col4 = ($row['donate_sum_total_donate'] * 10)/100;
            }

            return DataTables::of($donatur)
                ->addIndexColumn()
                ->editColumn('donate_sum_total_donate', '{{ "Rp " . number_format($donate_sum_total_donate,0,",",".") }}')
                ->editColumn('col1', '{{ "Rp " . number_format($col1,0,",",".") }}')
                ->editColumn('col2', '{{ "Rp " . number_format($col2,0,",",".") }}')
                ->editColumn('col3', '{{ "Rp " . number_format($col3,0,",",".") }}')
                ->editColumn('col4', '{{ "Rp " . number_format($col4,0,",",".") }}')
                ->editColumn('created_at', '{{ date("d/M/Y H:i", strtotime($created_at)) }}')
                ->make(true);
        }
        
        return view('admin.pages.reports.index');
    }
}
