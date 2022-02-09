<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ZiswafCategoryDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateZiswafCategoryRequest;
use App\Http\Requests\Admin\UpdateZiswafCategoryRequest;
use App\Repositories\Admin\ZiswafCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ZiswafCategoryController extends AppBaseController
{
    /** @var ZiswafCategoryRepository $ziswafCategoryRepository*/
    private $ziswafCategoryRepository;

    public function __construct(ZiswafCategoryRepository $ziswafCategoryRepo)
    {
        $this->ziswafCategoryRepository = $ziswafCategoryRepo;
    }

    /**
     * Display a listing of the ZiswafCategory.
     *
     * @param ZiswafCategoryDataTable $ziswafCategoryDataTable
     *
     * @return Response
     */
    public function index(ZiswafCategoryDataTable $ziswafCategoryDataTable)
    {
        return $ziswafCategoryDataTable->render('admin.pages.ziswaf_categories.index');
    }

    /**
     * Show the form for creating a new ZiswafCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.ziswaf_categories.create');
    }

    /**
     * Store a newly created ZiswafCategory in storage.
     *
     * @param CreateZiswafCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateZiswafCategoryRequest $request)
    {
        $input = $request->all();

        $ziswafCategory = $this->ziswafCategoryRepository->create($input);

        Flash::success('Ziswaf Category saved successfully.');

        return redirect(route('admin.ziswafCategories.index'));
    }

    /**
     * Display the specified ZiswafCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ziswafCategory = $this->ziswafCategoryRepository->find($id);

        if (empty($ziswafCategory)) {
            Flash::error('Ziswaf Category not found');

            return redirect(route('admin.ziswafCategories.index'));
        }

        return view('admin.pages.ziswaf_categories.show')->with('ziswafCategory', $ziswafCategory);
    }

    /**
     * Show the form for editing the specified ZiswafCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ziswafCategory = $this->ziswafCategoryRepository->find($id);

        if (empty($ziswafCategory)) {
            Flash::error('Ziswaf Category not found');

            return redirect(route('admin.ziswafCategories.index'));
        }

        return view('admin.pages.ziswaf_categories.edit')->with('ziswafCategory', $ziswafCategory);
    }

    /**
     * Update the specified ZiswafCategory in storage.
     *
     * @param int $id
     * @param UpdateZiswafCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateZiswafCategoryRequest $request)
    {
        $ziswafCategory = $this->ziswafCategoryRepository->find($id);

        if (empty($ziswafCategory)) {
            Flash::error('Ziswaf Category not found');

            return redirect(route('admin.ziswafCategories.index'));
        }

        $ziswafCategory = $this->ziswafCategoryRepository->update($request->all(), $id);

        Flash::success('Ziswaf Category updated successfully.');

        return redirect(route('admin.ziswafCategories.index'));
    }

    /**
     * Remove the specified ZiswafCategory from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ziswafCategory = $this->ziswafCategoryRepository->find($id);

        if (empty($ziswafCategory)) {
            Flash::error('Ziswaf Category not found');

            return redirect(route('admin.ziswafCategories.index'));
        }

        $this->ziswafCategoryRepository->delete($id);

        Flash::success('Ziswaf Category deleted successfully.');

        return redirect(route('admin.ziswafCategories.index'));
    }
}
