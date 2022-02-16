<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateDonateRequest;
use App\Http\Requests\Admin\UpdateDonateRequest;
use App\Repositories\Admin\DonateRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Donate;
use App\Models\Admin\Program;
use Illuminate\Http\Request;
use Response;
use Yajra\DataTables\DataTables;

class ProgramDonateController extends AppBaseController
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
    public function index(Request $request)
    {
        if($request->ajax()) {
            $programs = Program::select('id', 'title', 'category_id', 'target_dana', 'created_at')->get();
            return $result = DataTables::of($programs)
                ->addColumn('action', 'admin.pages.program_donates.datatables_actions')
                ->editColumn('target_dana', '{{ "Rp " . number_format($target_dana,0,",",".") }}')
                ->editColumn('created_at', '{{ date("d/M/Y", strtotime($created_at)) }}')
                ->make(true);
        }
        
        return view('admin.pages.program_donates.index');
    }

    /**
     * Show the form for creating a new Donate.
     *
     * @return Response
     */
    public function create($id)
    {
        return view('admin.pages.program_donates.create');
    }

    /**
     * Store a newly created Donate in storage.
     *
     * @param CreateDonateRequest $request
     *
     * @return Response
     */
    public function store(CreateDonateRequest $request, $id)
    {
        $input = $request->all();

        $donate = $this->donateRepository->create($input);

        Flash::success('Donate saved successfully.');

        return redirect(route('admin.program_donates.index'));
    }

    /**
     * Display the specified Donate.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Request $request, $id)
    {

        if($request->ajax()) {
            $donatur = Donate::select('id', 'name', 'email', 'phone', 'total_donate', 'created_at')->get();

            return DataTables::of($donatur)
                ->addColumn('action', 'admin.pages.program_donates.donatur.datatables_actions')
                ->editColumn('total_donate', '{{ "Rp " . number_format($total_donate,0,",",".") }}')
                ->editColumn('created_at', '{{ date("d/M/Y", strtotime($created_at)) }}')
                ->make(true);
        }

        return view('admin.pages.program_donates.donatur.index');
    }

    /**
     * Show the form for editing the specified Donate.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $donate = $this->donateRepository->find($id);

        if (empty($donate)) {
            Flash::error('Donate not found');

            return redirect(route('admin.program_donates.index'));
        }

        return view('admin.pages.program_donates.edit')->with('donate', $donate);
    }

    /**
     * Update the specified Donate in storage.
     *
     * @param int $id
     * @param UpdateDonateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDonateRequest $request)
    {
        $donate = $this->donateRepository->find($id);

        if (empty($donate)) {
            Flash::error('Donate not found');

            return redirect(route('admin.program_donates.index'));
        }

        $donate = $this->donateRepository->update($request->all(), $id);

        Flash::success('Donate updated successfully.');

        return redirect(route('admin.program_donates.index'));
    }

    /**
     * Remove the specified Donate from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $donate = $this->donateRepository->find($id);

        if (empty($donate)) {
            Flash::error('Donate not found');

            return redirect(route('admin.program_donates.index'));
        }

        $this->donateRepository->delete($id);

        Flash::success('Donate deleted successfully.');

        return redirect(route('admin.program_donates.index'));
    }
}
