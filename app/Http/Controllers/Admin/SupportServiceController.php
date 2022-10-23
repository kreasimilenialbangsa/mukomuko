<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SupportServiceDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateSupportServiceRequest;
use App\Http\Requests\Admin\UpdateSupportServiceRequest;
use App\Repositories\Admin\SupportServiceRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\SupportServiceCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Response;

class SupportServiceController extends AppBaseController
{
    /** @var SupportServiceRepository $supportServiceRepository*/
    private $supportServiceRepository;

    public function __construct(SupportServiceRepository $supportServiceRepo)
    {
        $this->supportServiceRepository = $supportServiceRepo;
    }

    /**
     * Display a listing of the SupportService.
     *
     * @param SupportServiceDataTable $supportServiceDataTable
     *
     * @return Response
     */
    public function index(SupportServiceDataTable $supportServiceDataTable)
    {
        return $supportServiceDataTable->render('admin.pages.support_services.index');
    }

    /**
     * Show the form for creating a new SupportService.
     *
     * @return Response
     */
    public function create()
    {
        $categories = SupportServiceCategory::pluck('name', 'id');

        $user = User::with('profile')->whereId(Auth::user()->id)->first();

        return view('admin.pages.support_services.create')
            ->with('user', $user)
            ->with('categories', $categories);
    }

    /**
     * Store a newly created SupportService in storage.
     *
     * @param CreateSupportServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateSupportServiceRequest $request)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'reason' => $request->reason,
            'nominal' => 0,
            'is_confirm' => 0,
        ];

        $supportService = $this->supportServiceRepository->create($input);

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.service.dana.index'));
    }

    /**
     * Display the specified SupportService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $supportService = $this->supportServiceRepository->find($id);

        if (empty($supportService)) {
            Flash::error('Support Service not found');

            return redirect(route('admin.service.dana.index'));
        }

        return view('admin.pages.support_services.show')->with('supportService', $supportService);
    }

    /**
     * Show the form for editing the specified SupportService.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $supportService = $this->supportServiceRepository->find($id);

        if (empty($supportService)) {
            Flash::error('Support Service not found');

            return redirect(route('admin.service.dana.index'));
        }

        $user = User::with('profile')->whereId(Auth::user()->id)->first();

        $categories = SupportServiceCategory::pluck('name', 'id');

        return view('admin.pages.support_services.edit')
            ->with('user', $user)
            ->with('categories', $categories)
            ->with('supportService', $supportService);
    }

    /**
     * Update the specified SupportService in storage.
     *
     * @param int $id
     * @param UpdateSupportServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSupportServiceRequest $request)
    {
        $request->validate([
            'nominal' => 'required|digits:5',
        ]);

        $supportService = $this->supportServiceRepository->find($id);

        if (empty($supportService)) {
            Flash::error('Support Service not found');

            return redirect(route('admin.service.dana.index'));
        }

        $input = [
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'reason' => $request->reason,
            'nominal' => $request->nominal,
            'is_confirm' => 1,
        ];

        $supportService = $this->supportServiceRepository->update($input, $id);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.service.dana.index'));
    }

    /**
     * Remove the specified SupportService from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $supportService = $this->supportServiceRepository->find($id);

        if (empty($supportService)) {
            Flash::error('Support Service not found');

            return redirect(route('admin.service.dana.index'));
        }

        $this->supportServiceRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.service.dana.index'));
    }
}
