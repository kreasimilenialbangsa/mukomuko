<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateDonateRequest;
use App\Http\Requests\Admin\UpdateDonateRequest;
use App\Repositories\Admin\DonateRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Donate;
use App\Models\Admin\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Response;
use Yajra\DataTables\DataTables;

class ApprovalController extends AppBaseController
{
    /** @var DonateRepository $donateRepository*/
    private $donateRepository;

    public function __construct(DonateRepository $donateRepo)
    {
        $this->donateRepository = $donateRepo;
    }

    /**
     * Display a listing of the Donate.
     *
     *
     * @return Response
     */
    public function program_index(Request $request)
    {
        if($request->ajax()) {
            $donatur = Donate::select('id', 'user_id', 'type_id', 'location_id', 'name', 'email', 'phone', 'total_donate', 'is_confirm', 'created_at')
                ->with(['user', 'program', 'location'])
                ->whereRelation('location', 'parent_id', Auth::user()->location_id)
                ->whereType('\App\Models\Admin\Program')
                ->whereIsConfirm(0)
                ->get();

            return DataTables::of($donatur)
                ->addColumn('action', 'admin.pages.approvals.program.datatables_actions')
                ->editColumn('total_donate', '{{ "Rp " . number_format($total_donate,0,",",".") }}')
                ->editColumn('created_at', '{{ date("d/M/Y H:i", strtotime($created_at)) }}')
                ->make(true);
        }
        
        return view('admin.pages.approvals.program.index');
    }

    /**
     * Display a listing of the Donate.
     *
     *
     * @return Response
     */
    public function ziswaf_index(Request $request)
    {
        if($request->ajax()) {
            $donatur = Donate::select('id', 'user_id', 'type_id', 'location_id', 'name', 'email', 'phone', 'total_donate', 'is_confirm', 'created_at')
                ->with(['user', 'ziswaf', 'location'])
                ->whereRelation('location', 'parent_id', Auth::user()->location_id)
                ->whereType('\App\Models\Admin\Ziswaf')
                ->whereIsConfirm(0)
                ->get();

            return DataTables::of($donatur)
                ->addColumn('action', 'admin.pages.approvals.ziswaf.datatables_actions')
                ->editColumn('total_donate', '{{ "Rp " . number_format($total_donate,0,",",".") }}')
                ->editColumn('created_at', '{{ date("d/M/Y H:i", strtotime($created_at)) }}')
                ->make(true);
        }
        
        return view('admin.pages.approvals.ziswaf.index');
    }
    
    /**
     * Update the specified Donate in storage.
     *
     * @param int $id
     * @param UpdateDonateRequest $request
     *
     * @return Response
     */
    public function approve($id)
    {
        $donate = $this->donateRepository->find($id);

        if (empty($donate)) {
            Flash::error('Donate not found');

            return redirect(route('admin.approval.program.index'));
        }

        $input = [
            'is_confirm' => 1
        ];

        $donate = $this->donateRepository->update($input, $id);

        Session::flash('success', 'Donasi berhasil diapprove');

        if($donate->type == '\App\Models\Admin\Program') {
            return redirect(route('admin.approval.program.index'));
        } else {
            return redirect(route('admin.approval.ziswaf.index'));
        }

    }
}
