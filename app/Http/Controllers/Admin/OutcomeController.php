<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\OutcomeDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateOutcomeRequest;
use App\Http\Requests\Admin\UpdateOutcomeRequest;
use App\Repositories\Admin\OutcomeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Desa;
use App\Models\Admin\OutcomeCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Response;

class OutcomeController extends AppBaseController
{
    /** @var OutcomeRepository $outcomeRepository*/
    private $outcomeRepository;

    public function __construct(OutcomeRepository $outcomeRepo)
    {
        $this->outcomeRepository = $outcomeRepo;
    }

    /**
     * Display a listing of the Outcome.
     *
     * @param OutcomeDataTable $outcomeDataTable
     *
     * @return Response
     */
    public function index(OutcomeDataTable $outcomeDataTable)
    {
        return $outcomeDataTable->render('admin.pages.outcomes.index');
    }

    /**
     * Show the form for creating a new Outcome.
     *
     * @return Response
     */
    public function create()
    {
        $desa = Desa::where('parent_id', '>', 0)->pluck('name', 'id');
        $categories = OutcomeCategory::pluck('name', 'id');

        return view('admin.pages.outcomes.create')
            ->with('desa', $desa)
            ->with('categories', $categories);
    }

    /**
     * Store a newly created Outcome in storage.
     *
     * @param CreateOutcomeRequest $request
     *
     * @return Response
     */
    public function store(CreateOutcomeRequest $request)
    {
        $request->validate([
            'nominal' => 'min:4',
        ],[
            'nominal.min' => 'Minimal nominal adalah Rp 10.000',
        ]);

        $input = [
            'user_id' => Auth::user()->id,
            'desa_id' => $request->desa_id,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'nominal' => str_replace('.', '', $request->nominal),
            'date_outcome' => $request->date_outcome . ' ' . date('H:i:s')
        ];

        $outcome = $this->outcomeRepository->create($input);

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.outcomes.index'));
    }

    /**
     * Display the specified Outcome.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $outcome = $this->outcomeRepository->find($id);

        if (empty($outcome)) {
            Flash::error('Outcome not found');

            return redirect(route('admin.outcomes.index'));
        }

        return view('admin.pages.outcomes.show')->with('outcome', $outcome);
    }

    /**
     * Show the form for editing the specified Outcome.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $outcome = $this->outcomeRepository->find($id);

        if (empty($outcome)) {
            Flash::error('Outcome not found');

            return redirect(route('admin.outcomes.index'));
        }

        $desa = Desa::where('parent_id', '>', 0)->pluck('name', 'id');
        $categories = OutcomeCategory::pluck('name', 'id');

        return view('admin.pages.outcomes.edit')
            ->with('desa', $desa)
            ->with('categories', $categories)
            ->with('outcome', $outcome);
    }

    /**
     * Update the specified Outcome in storage.
     *
     * @param int $id
     * @param UpdateOutcomeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOutcomeRequest $request)
    {
        $outcome = $this->outcomeRepository->find($id);

        if (empty($outcome)) {
            Flash::error('Outcome not found');

            return redirect(route('admin.outcomes.index'));
        }

        $input = [
            'user_id' => Auth::user()->id,
            'desa_id' => $request->desa_id,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'nominal' => str_replace('.', '', $request->nominal),
            'date_outcome' => $request->date_outcome . ' ' . date('H:i:s')
        ];

        $outcome = $this->outcomeRepository->update($input, $id);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.outcomes.index'));
    }

    /**
     * Remove the specified Outcome from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $outcome = $this->outcomeRepository->find($id);

        if (empty($outcome)) {
            Flash::error('Outcome not found');

            return redirect(route('admin.outcomes.index'));
        }

        $this->outcomeRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.outcomes.index'));
    }
}
