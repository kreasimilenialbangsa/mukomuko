<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\DonateDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateDonateRequest;
use App\Http\Requests\Admin\UpdateDonateRequest;
use App\Repositories\Admin\DonateRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Session;
use Response;

class DonateController extends AppBaseController
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
     * @param DonateDataTable $donateDataTable
     *
     * @return Response
     */
    public function index(DonateDataTable $donateDataTable)
    {
        return $donateDataTable->render('admin.pages.donates.index');
    }

    /**
     * Show the form for creating a new Donate.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.donates.create');
    }

    /**
     * Store a newly created Donate in storage.
     *
     * @param CreateDonateRequest $request
     *
     * @return Response
     */
    public function store(CreateDonateRequest $request)
    {
        $input = $request->all();

        $donate = $this->donateRepository->create($input);

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.donates.index'));
    }

    /**
     * Display the specified Donate.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $donate = $this->donateRepository->find($id);

        if (empty($donate)) {
            Flash::error('Donate not found');

            return redirect(route('admin.donates.index'));
        }

        return view('admin.pages.donates.show')->with('donate', $donate);
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

            return redirect(route('admin.donates.index'));
        }

        return view('admin.pages.donates.edit')->with('donate', $donate);
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

            return redirect(route('admin.donates.index'));
        }

        $donate = $this->donateRepository->update($request->all(), $id);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.donates.index'));
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

            return redirect(route('admin.donates.index'));
        }

        $this->donateRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.donates.index'));
    }
}
