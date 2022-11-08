<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\DonateHistoryJpzisnuDataTable;
use App\DataTables\Admin\DonateHistoryMidtransDataTable;
use App\Http\Requests\Admin\UpdateDonateRequest;
use App\Repositories\Admin\DonateRepository;
use Laracasts\Flash\Flash;
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
     * @param DonateHistoryJpzisnuDataTable $donateHistoryJpzisnuDataTable
     *
     * @return Response
     */
    public function jpzisnu(DonateHistoryJpzisnuDataTable $donateHistoryJpzisnuDataTable)
    {
        return $donateHistoryJpzisnuDataTable->render('admin.pages.donate_histories.jpzisnu.index');
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

            return redirect(route('admin.donate_histories_jpzisnu.index'));
        }

        $param = [
            'is_confirm' => 0
        ];

        $donate = $this->donateRepository->update($param, $id);

        Session::flash('success', 'Donasi berhasil ditolak');

        return redirect(route('admin.donate_histories_jpzisnu.index'));
    }

    /**
     * Display a listing of the Donate.
     *
     * @param DonateHistoryMidtransDataTable $donateHistoryMidtransDataTable
     *
     * @return Response
     */
    public function midtrans(DonateHistoryMidtransDataTable $donateHistoryMidtransDataTable)
    {
        return $donateHistoryMidtransDataTable->render('admin.pages.donate_histories.midtrans.index');
    }
}
