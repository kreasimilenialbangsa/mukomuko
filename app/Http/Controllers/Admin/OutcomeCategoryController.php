<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\OutcomeCategoryDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateOutcomeCategoryRequest;
use App\Http\Requests\Admin\UpdateOutcomeCategoryRequest;
use App\Repositories\Admin\OutcomeCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Response;
use Str;

class OutcomeCategoryController extends AppBaseController
{
    /** @var OutcomeCategoryRepository $outcomeCategoryRepository*/
    private $outcomeCategoryRepository;

    public function __construct(OutcomeCategoryRepository $outcomeCategoryRepo)
    {
        $this->outcomeCategoryRepository = $outcomeCategoryRepo;
    }

    /**
     * Display a listing of the OutcomeCategory.
     *
     * @param OutcomeCategoryDataTable $outcomeCategoryDataTable
     *
     * @return Response
     */
    public function index(OutcomeCategoryDataTable $outcomeCategoryDataTable)
    {
        return $outcomeCategoryDataTable->render('admin.pages.outcome_categories.index');
    }

    /**
     * Show the form for creating a new OutcomeCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.outcome_categories.create');
    }

    /**
     * Store a newly created OutcomeCategory in storage.
     *
     * @param CreateOutcomeCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateOutcomeCategoryRequest $request)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        $outcomeCategory = $this->outcomeCategoryRepository->create($input);

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.category.outcome.index'));
    }

    /**
     * Display the specified OutcomeCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $outcomeCategory = $this->outcomeCategoryRepository->find($id);

        if (empty($outcomeCategory)) {
            Flash::error('Outcome Category not found');

            return redirect(route('admin.category.outcome.index'));
        }

        return view('admin.pages.outcome_categories.show')->with('outcomeCategory', $outcomeCategory);
    }

    /**
     * Show the form for editing the specified OutcomeCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $outcomeCategory = $this->outcomeCategoryRepository->find($id);

        if (empty($outcomeCategory)) {
            Flash::error('Outcome Category not found');

            return redirect(route('admin.category.outcome.index'));
        }

        return view('admin.pages.outcome_categories.edit')->with('outcomeCategory', $outcomeCategory);
    }

    /**
     * Update the specified OutcomeCategory in storage.
     *
     * @param int $id
     * @param UpdateOutcomeCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOutcomeCategoryRequest $request)
    {
        $outcomeCategory = $this->outcomeCategoryRepository->find($id);

        if (empty($outcomeCategory)) {
            Flash::error('Outcome Category not found');

            return redirect(route('admin.category.outcome.index'));
        }

        $input = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        $outcomeCategory = $this->outcomeCategoryRepository->update($input, $id);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.category.outcome.index'));
    }

    /**
     * Remove the specified OutcomeCategory from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $outcomeCategory = $this->outcomeCategoryRepository->find($id);

        if (empty($outcomeCategory)) {
            Flash::error('Outcome Category not found');

            return redirect(route('admin.category.outcome.index'));
        }

        $this->outcomeCategoryRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.category.outcome.index'));
    }
}
