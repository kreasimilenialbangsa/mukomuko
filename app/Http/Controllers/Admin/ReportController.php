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
                ->withCount('donate')
                ->withSum('donate', 'total_donate')
                ->whereRelation('role_user', 'role_id', 4)
                ->get();
            
            // dd($donatur->toArray());

            return DataTables::of($donatur)
                ->addIndexColumn()
                ->editColumn('donate_sum_total_donate', '{{ "Rp " . number_format($donate_sum_total_donate,0,",",".") }}')
                ->editColumn('created_at', '{{ date("d/M/Y H:i", strtotime($created_at)) }}')
                ->make(true);
        }
        
        return view('admin.pages.reports.index');
    }
}
