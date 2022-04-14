<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SupportServiceCategoryDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateSupportServiceCategoryRequest;
use App\Http\Requests\Admin\UpdateSupportServiceCategoryRequest;
use App\Repositories\Admin\SupportServiceCategoryRepository;
use Flash;
use Str;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Response;

class SupportServiceCategoryController extends AppBaseController
{
    /** @var SupportServiceCategoryRepository $supportServiceCategoryRepository*/
    private $supportServiceCategoryRepository;

    public function __construct(SupportServiceCategoryRepository $supportServiceCategoryRepo)
    {
        $this->supportServiceCategoryRepository = $supportServiceCategoryRepo;
    }

    /**
     * Display a listing of the SupportServiceCategory.
     *
     * @param SupportServiceCategoryDataTable $supportServiceCategoryDataTable
     *
     * @return Response
     */
    public function index(SupportServiceCategoryDataTable $supportServiceCategoryDataTable)
    {
        return $supportServiceCategoryDataTable->render('admin.pages.support_service_categories.index');
    }

    /**
     * Show the form for creating a new SupportServiceCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.support_service_categories.create');
    }

    /**
     * Store a newly created SupportServiceCategory in storage.
     *
     * @param CreateSupportServiceCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateSupportServiceCategoryRequest $request)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        $supportServiceCategory = $this->supportServiceCategoryRepository->create($input);

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.category.bantuan.index'));
    }

    /**
     * Display the specified SupportServiceCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $supportServiceCategory = $this->supportServiceCategoryRepository->find($id);

        if (empty($supportServiceCategory)) {
            Flash::error('Support Service Category not found');

            return redirect(route('admin.category.bantuan.index'));
        }

        return view('admin.pages.support_service_categories.show')->with('supportServiceCategory', $supportServiceCategory);
    }

    /**
     * Show the form for editing the specified SupportServiceCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $supportServiceCategory = $this->supportServiceCategoryRepository->find($id);

        if (empty($supportServiceCategory)) {
            Flash::error('Support Service Category not found');

            return redirect(route('admin.category.bantuan.index'));
        }

        return view('admin.pages.support_service_categories.edit')->with('supportServiceCategory', $supportServiceCategory);
    }

    /**
     * Update the specified SupportServiceCategory in storage.
     *
     * @param int $id
     * @param UpdateSupportServiceCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSupportServiceCategoryRequest $request)
    {
        $supportServiceCategory = $this->supportServiceCategoryRepository->find($id);

        if (empty($supportServiceCategory)) {
            Flash::error('Support Service Category not found');

            return redirect(route('admin.category.bantuan.index'));
        }

        $input = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        $supportServiceCategory = $this->supportServiceCategoryRepository->update($input, $id);

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.category.bantuan.index'));
    }

    /**
     * Remove the specified SupportServiceCategory from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $supportServiceCategory = $this->supportServiceCategoryRepository->find($id);

        if (empty($supportServiceCategory)) {
            Flash::error('Support Service Category not found');

            return redirect(route('admin.category.bantuan.index'));
        }

        $this->supportServiceCategoryRepository->delete($id);

        Flash::success('Support Service Category deleted successfully.');

        return redirect(route('admin.category.bantuan.index'));
    }
}
