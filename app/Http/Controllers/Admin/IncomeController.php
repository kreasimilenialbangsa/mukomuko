<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\IncomeDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateIncomeRequest;
use App\Http\Requests\Admin\UpdateIncomeRequest;
use App\Repositories\Admin\IncomeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Response;

class IncomeController extends AppBaseController
{
    /** @var IncomeRepository $incomeRepository*/
    private $incomeRepository;

    public function __construct(IncomeRepository $incomeRepo)
    {
        $this->incomeRepository = $incomeRepo;
    }

    /**
     * Display a listing of the Income.
     *
     * @param IncomeDataTable $incomeDataTable
     *
     * @return Response
     */
    public function index(IncomeDataTable $incomeDataTable)
    {
        return $incomeDataTable->render('admin.pages.incomes.index');
    }

    /**
     * Show the form for creating a new Income.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.incomes.create');
    }

    /**
     * Store a newly created Income in storage.
     *
     * @param CreateIncomeRequest $request
     *
     * @return Response
     */
    public function store(CreateIncomeRequest $request)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'precent' => $request->precent,
        ];

        $income = $this->incomeRepository->create($input);

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.report.incomes.index'));
    }

    /**
     * Display the specified Income.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $income = $this->incomeRepository->find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('admin.report.incomes.index'));
        }

        return view('admin.pages.incomes.show')->with('income', $income);
    }

    /**
     * Show the form for editing the specified Income.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $income = $this->incomeRepository->find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('admin.report.incomes.index'));
        }

        return view('admin.pages.incomes.edit')->with('income', $income);
    }

    /**
     * Update the specified Income in storage.
     *
     * @param int $id
     * @param UpdateIncomeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIncomeRequest $request)
    {
        $income = $this->incomeRepository->find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('admin.report.incomes.index'));
        }

        $input = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'precent' => $request->precent,
        ];

        $income = $this->incomeRepository->update($input, $id);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.report.incomes.index'));
    }

    /**
     * Remove the specified Income from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $income = $this->incomeRepository->find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('admin.report.incomes.index'));
        }

        $this->incomeRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.report.incomes.index'));
    }
}
