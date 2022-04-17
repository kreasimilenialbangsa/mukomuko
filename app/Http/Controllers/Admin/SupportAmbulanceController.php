<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SupportAmbulanceDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateSupportAmbulanceRequest;
use App\Http\Requests\Admin\UpdateSupportAmbulanceRequest;
use App\Repositories\Admin\SupportAmbulanceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\SupportAmbulance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Response;

class SupportAmbulanceController extends AppBaseController
{
    /** @var SupportAmbulanceRepository $supportAmbulanceRepository*/
    private $supportAmbulanceRepository;

    public function __construct(SupportAmbulanceRepository $supportAmbulanceRepo)
    {
        $this->supportAmbulanceRepository = $supportAmbulanceRepo;
    }

    /**
     * Display a listing of the SupportAmbulance.
     *
     * @param SupportAmbulanceDataTable $supportAmbulanceDataTable
     *
     * @return Response
     */
    public function index(SupportAmbulanceDataTable $supportAmbulanceDataTable)
    {
        return $supportAmbulanceDataTable->render('admin.pages.support_ambulances.index');
    }

    /**
     * Show the form for creating a new SupportAmbulance.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.support_ambulances.create');
    }

    /**
     * Store a newly created SupportAmbulance in storage.
     *
     * @param CreateSupportAmbulanceRequest $request
     *
     * @return Response
     */
    public function store(CreateSupportAmbulanceRequest $request)
    {
        $input  = [
            'user_id' => Auth::user()->id,
            'book_date' => $request->book_date,
            'reason' => $request->reason,
            'is_confirm' => 0,
        ];

        $startDate = date('Y').'-01-01';
        $endDate = date('Y').'-12-01';

        $checkQuota = SupportAmbulance::select('user_id')
            ->whereUserId(Auth::user()->id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->whereIsConfirm(1)
            ->count();
        
        if($checkQuota > 3) {
            Session::flash('error', 'Pengajuan ambulan melebih kuota');
        } else {
            Session::flash('success', 'Data berhasil ditambah');
            $supportAmbulance = $this->supportAmbulanceRepository->create($input);
        }

        return redirect(route('admin.service.ambulan.index'));
    }

    /**
     * Display the specified SupportAmbulance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $supportAmbulance = $this->supportAmbulanceRepository->find($id);

        if (empty($supportAmbulance)) {
            Flash::error('Support Ambulance not found');

            return redirect(route('admin.service.ambulan.index'));
        }

        return view('admin.pages.support_ambulances.show')->with('supportAmbulance', $supportAmbulance);
    }

    /**
     * Show the form for editing the specified SupportAmbulance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $supportAmbulance = $this->supportAmbulanceRepository->find($id);

        if (empty($supportAmbulance)) {
            Flash::error('Support Ambulance not found');

            return redirect(route('admin.service.ambulan.index'));
        }

        return view('admin.pages.support_ambulances.edit')->with('supportAmbulance', $supportAmbulance);
    }

    /**
     * Update the specified SupportAmbulance in storage.
     *
     * @param int $id
     * @param UpdateSupportAmbulanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSupportAmbulanceRequest $request)
    {
        $supportAmbulance = $this->supportAmbulanceRepository->find($id);

        if (empty($supportAmbulance)) {
            Flash::error('Support Ambulance not found');

            return redirect(route('admin.service.ambulan.index'));
        }

        $input  = [
            'user_id' => Auth::user()->id,
            'book_date' => $request->book_date,
            'reason' => $request->reason,
            'is_confirm' => 0,
        ];
        
        $supportAmbulance = $this->supportAmbulanceRepository->update($input, $id);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.service.ambulan.index'));
    }

    /**
     * Remove the specified SupportAmbulance from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $supportAmbulance = $this->supportAmbulanceRepository->find($id);

        if (empty($supportAmbulance)) {
            Flash::error('Support Ambulance not found');

            return redirect(route('admin.service.ambulan.index'));
        }

        $this->supportAmbulanceRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.service.ambulan.index'));
    }
}
