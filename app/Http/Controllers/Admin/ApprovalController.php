<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateDonateRequest;
use App\Repositories\Admin\DonateRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Donate;
use App\Models\Admin\SupportAmbulance;
use App\Models\Admin\SupportService;
use App\Models\Admin\SupportServiceCategory;
use App\Models\User;
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
                ->when(Auth::user()->id > 1, function($q) {
                    $q->whereRelation('location', 'parent_id', Auth::user()->location_id);
                })
                ->whereHas('user', function($que) {
                    $que->whereNull('deleted_at');
                })
                ->whereType('\App\Models\Admin\Program')
                ->whereIsConfirm(0)
                ->whereIsPayment(0)
                ->get();

            return DataTables::of($donatur)
                ->addColumn('action', 'admin.pages.approvals.program.datatables_actions')
                ->editColumn('total_donate', '{{ "Rp " . number_format($total_donate,0,",",".") }}')
                ->editColumn('created_at', '{{ date("d/m/Y H:i", strtotime($created_at)) }}')
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
                ->when(Auth::user()->id > 1, function($q) {
                    $q->whereRelation('location', 'parent_id', Auth::user()->location_id);
                })
                ->whereHas('user', function($que) {
                    $que->whereNull('deleted_at');
                })
                ->whereType('\App\Models\Admin\Ziswaf')
                ->whereIsConfirm(0)
                ->whereIsPayment(0)
                ->get();

            return DataTables::of($donatur)
                ->addColumn('action', 'admin.pages.approvals.ziswaf.datatables_actions')
                ->editColumn('total_donate', '{{ "Rp " . number_format($total_donate,0,",",".") }}')
                ->editColumn('created_at', '{{ date("d/m/Y H:i", strtotime($created_at)) }}')
                ->make(true);
        }
        
        return view('admin.pages.approvals.ziswaf.index');
    }

    /**
     * Display a listing of the Donate.
     *
     *
     * @return Response
     */
    public function ambulan_index(Request $request)
    {
        if($request->ajax()) {
            $services = SupportAmbulance::select('id', 'user_id', 'book_date', 'reason', 'is_confirm', 'created_at')
                ->with('user.desa')
                ->whereHas('user', function($que) {
                    $que->whereNull('deleted_at');
                })
                ->whereIsConfirm(0)
                ->get();

            foreach($services as $service) {
                if(isset($service->user->desa)) {
                    $service->location = $service->user->desa->parent_id == 0 ? 'Kecamatan ' . $service->user->desa->name : 'Desa ' . $service->user->desa->name;
                } else {
                    $service->location = 'Not set';
                }
            }

            return DataTables::of($services)
                ->addColumn('action', 'admin.pages.approvals.ambulan.datatables_actions')
                ->editColumn('created_at', '{{ date("d/m/Y H:i", strtotime($created_at)) }}')
                ->editColumn('book_date', '{{ date("d/m/Y", strtotime($book_date)) }}')
                ->make(true);
        }
        
        return view('admin.pages.approvals.ambulan.index');
    }

    /**
     * Display a listing of the Donate.
     *
     *
     * @return Response
     */
    public function dana_index(Request $request)
    {
        if($request->ajax()) {
            $services = SupportService::select('id', 'user_id', 'category_id', 'reason', 'is_confirm', 'created_at')
                ->with(['user.desa', 'category'])
                ->whereHas('user', function($que) {
                    $que->whereNull('deleted_at');
                })
                ->whereIsConfirm(0)
                ->get();

            foreach($services as $service) {
                if(isset($service->user->desa)) {
                    $service->location = $service->user->desa->parent_id == 0 ? 'Kecamatan ' . $service->user->desa->name : 'Desa ' . $service->user->desa->name;
                } else {
                    $service->location = 'Not set';
                }
            }

            return DataTables::of($services)
                ->addColumn('action', 'admin.pages.approvals.dana.datatables_actions')
                ->editColumn('created_at', '{{ date("d/m/Y H:i", strtotime($created_at)) }}')
                ->make(true);
        }
        
        return view('admin.pages.approvals.dana.index');
    }

    public function dana_edit(Request $request, $id)
    {
        $supportService = SupportService::select('id', 'user_id', 'category_id', 'reason', 'nominal', 'is_confirm', 'created_at')
            ->with(['user', 'category'])
            ->whereId($id)
            ->whereIsConfirm(0)
            ->firstOrFail();

        $user = User::with('profile')->find($supportService->user_id);
        
        return view('admin.pages.approvals.dana.edit')
            ->with('user', $user)
            ->with('supportService', $supportService);
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

    public function approve_ambulan($id)
    {
        $service = SupportAmbulance::find($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('admin.approval.ambulan.index'));
        }

        $input = [
            'is_confirm' => 1
        ];

        $startDate = date('Y').'-01-01';
        $endDate = date('Y').'-12-01';

        $checkQuota = SupportAmbulance::select('user_id')
            ->whereUserId($service->user_id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->whereIsConfirm(1)
            ->count();

        if($checkQuota > 3) {
            Session::flash('error', 'Pengajuan ambulan melebih kuota');
        } else {
            Session::flash('success', 'Pengajuan berhasil diapprove');
            $service = SupportAmbulance::whereId($id)->update($input);
        }

        return redirect(route('admin.approval.ambulan.index'));

    }

    public function approve_dana(Request $request, $id)
    {
        $request->validate([
            'nominal' => 'required|min:5',
        ]);
        
        $service = SupportService::find($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('admin.approval.dana.index'));
        }

        $input = [
            'nominal' => str_replace('.', '', $request->nominal),
            'is_confirm' => 1
        ];

        $service = SupportService::whereId($id)->update($input);

        Session::flash('success', 'Pengajuan berhasil diapprove');

            return redirect(route('admin.approval.dana.index'));

    }
}
