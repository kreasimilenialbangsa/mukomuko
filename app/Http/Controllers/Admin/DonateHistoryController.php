<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\DonateHistoryDataTable;
use App\Http\Requests\Admin\UpdateDonateRequest;
use App\Repositories\Admin\DonateRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Session;
use Response;
use Illuminate\Http\Request;

class DonateHistoryController extends AppBaseController
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
     * @param DonateHistoryDataTable $donateHistoryDataTable
     *
     * @return Response
     */
    public function index(DonateHistoryDataTable $donateHistoryDataTable)
    {
        return $donateHistoryDataTable->render('admin.pages.donate_histories.index');
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
            Session::flash('error', 'Data tidak ditemukan');

            return redirect(route('admin.donate_histories.index'));
        }

        $param = [
            'is_confirm' => 0
        ];

        $donate = $this->donateRepository->update($param, $id);

        Session::flash('success', 'Donasi berhasil ditolak');

        return redirect(route('admin.donate_histories.index'));
    }
}
