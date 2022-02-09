<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ProgramDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateProgramRequest;
use App\Http\Requests\Admin\UpdateProgramRequest;
use App\Repositories\Admin\ProgramRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProgramController extends AppBaseController
{
    /** @var ProgramRepository $programRepository*/
    private $programRepository;

    public function __construct(ProgramRepository $programRepo)
    {
        $this->programRepository = $programRepo;
    }

    /**
     * Display a listing of the Program.
     *
     * @param ProgramDataTable $programDataTable
     *
     * @return Response
     */
    public function index(ProgramDataTable $programDataTable)
    {
        return $programDataTable->render('admin.pages.programs.index');
    }

    /**
     * Show the form for creating a new Program.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.programs.create');
    }

    /**
     * Store a newly created Program in storage.
     *
     * @param CreateProgramRequest $request
     *
     * @return Response
     */
    public function store(CreateProgramRequest $request)
    {
        $input = $request->all();

        $program = $this->programRepository->create($input);

        Flash::success('Program saved successfully.');

        return redirect(route('admin.programs.index'));
    }

    /**
     * Display the specified Program.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $program = $this->programRepository->find($id);

        if (empty($program)) {
            Flash::error('Program not found');

            return redirect(route('admin.programs.index'));
        }

        return view('admin.pages.programs.show')->with('program', $program);
    }

    /**
     * Show the form for editing the specified Program.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $program = $this->programRepository->find($id);

        if (empty($program)) {
            Flash::error('Program not found');

            return redirect(route('admin.programs.index'));
        }

        return view('admin.pages.programs.edit')->with('program', $program);
    }

    /**
     * Update the specified Program in storage.
     *
     * @param int $id
     * @param UpdateProgramRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProgramRequest $request)
    {
        $program = $this->programRepository->find($id);

        if (empty($program)) {
            Flash::error('Program not found');

            return redirect(route('admin.programs.index'));
        }

        $program = $this->programRepository->update($request->all(), $id);

        Flash::success('Program updated successfully.');

        return redirect(route('admin.programs.index'));
    }

    /**
     * Remove the specified Program from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $program = $this->programRepository->find($id);

        if (empty($program)) {
            Flash::error('Program not found');

            return redirect(route('admin.programs.index'));
        }

        $this->programRepository->delete($id);

        Flash::success('Program deleted successfully.');

        return redirect(route('admin.programs.index'));
    }
}
