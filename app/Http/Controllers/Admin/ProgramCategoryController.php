<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ProgramCategoryDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateProgramCategoryRequest;
use App\Http\Requests\Admin\UpdateProgramCategoryRequest;
use App\Repositories\Admin\ProgramCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProgramCategoryController extends AppBaseController
{
    /** @var ProgramCategoryRepository $programCategoryRepository*/
    private $programCategoryRepository;

    public function __construct(ProgramCategoryRepository $programCategoryRepo)
    {
        $this->programCategoryRepository = $programCategoryRepo;
    }

    /**
     * Display a listing of the ProgramCategory.
     *
     * @param ProgramCategoryDataTable $programCategoryDataTable
     *
     * @return Response
     */
    public function index(ProgramCategoryDataTable $programCategoryDataTable)
    {
        return $programCategoryDataTable->render('admin.pages.program_categories.index');
    }

    /**
     * Show the form for creating a new ProgramCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.program_categories.create');
    }

    /**
     * Store a newly created ProgramCategory in storage.
     *
     * @param CreateProgramCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateProgramCategoryRequest $request)
    {
        $input = $request->all();

        $programCategory = $this->programCategoryRepository->create($input);

        Flash::success('Program Category saved successfully.');

        return redirect(route('admin.programCategories.index'));
    }

    /**
     * Display the specified ProgramCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $programCategory = $this->programCategoryRepository->find($id);

        if (empty($programCategory)) {
            Flash::error('Program Category not found');

            return redirect(route('admin.programCategories.index'));
        }

        return view('admin.pages.program_categories.show')->with('programCategory', $programCategory);
    }

    /**
     * Show the form for editing the specified ProgramCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $programCategory = $this->programCategoryRepository->find($id);

        if (empty($programCategory)) {
            Flash::error('Program Category not found');

            return redirect(route('admin.programCategories.index'));
        }

        return view('admin.pages.program_categories.edit')->with('programCategory', $programCategory);
    }

    /**
     * Update the specified ProgramCategory in storage.
     *
     * @param int $id
     * @param UpdateProgramCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProgramCategoryRequest $request)
    {
        $programCategory = $this->programCategoryRepository->find($id);

        if (empty($programCategory)) {
            Flash::error('Program Category not found');

            return redirect(route('admin.programCategories.index'));
        }

        $programCategory = $this->programCategoryRepository->update($request->all(), $id);

        Flash::success('Program Category updated successfully.');

        return redirect(route('admin.programCategories.index'));
    }

    /**
     * Remove the specified ProgramCategory from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $programCategory = $this->programCategoryRepository->find($id);

        if (empty($programCategory)) {
            Flash::error('Program Category not found');

            return redirect(route('admin.programCategories.index'));
        }

        $this->programCategoryRepository->delete($id);

        Flash::success('Program Category deleted successfully.');

        return redirect(route('admin.programCategories.index'));
    }
}
