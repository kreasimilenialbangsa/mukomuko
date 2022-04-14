<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SupportServiceDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateSupportServiceRequest;
use App\Http\Requests\Admin\UpdateSupportServiceRequest;
use App\Repositories\Admin\SupportServiceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\SupportServiceCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        $input = $request->all();

        $supportService = $this->supportServiceRepository->create($input);

        Flash::success('Support Service saved successfully.');

        return redirect(route('admin.supportServices.index'));
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

            return redirect(route('admin.supportServices.index'));
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

            return redirect(route('admin.supportServices.index'));
        }

        $categories = SupportServiceCategory::pluck('name', 'id');

        return view('admin.pages.support_services.edit')
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
        $supportService = $this->supportServiceRepository->find($id);

        if (empty($supportService)) {
            Flash::error('Support Service not found');

            return redirect(route('admin.supportServices.index'));
        }

        $supportService = $this->supportServiceRepository->update($request->all(), $id);

        Flash::success('Support Service updated successfully.');

        return redirect(route('admin.supportServices.index'));
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

            return redirect(route('admin.supportServices.index'));
        }

        $this->supportServiceRepository->delete($id);

        Flash::success('Support Service deleted successfully.');

        return redirect(route('admin.supportServices.index'));
    }
}
