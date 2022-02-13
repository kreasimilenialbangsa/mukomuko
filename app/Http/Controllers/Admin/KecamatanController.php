<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\KecamatanDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateKecamatanRequest;
use App\Http\Requests\Admin\UpdateKecamatanRequest;
use App\Repositories\Admin\KecamatanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Response;

class KecamatanController extends AppBaseController
{
    /** @var KecamatanRepository $kecamatanRepository*/
    private $kecamatanRepository;

    public function __construct(KecamatanRepository $kecamatanRepo)
    {
        $this->kecamatanRepository = $kecamatanRepo;
    }

    /**
     * Display a listing of the Kecamatan.
     *
     * @param KecamatanDataTable $kecamatanDataTable
     *
     * @return Response
     */
    public function index(KecamatanDataTable $kecamatanDataTable)
    {
        return $kecamatanDataTable->render('admin.pages.kecamatans.index');
    }

    /**
     * Show the form for creating a new Kecamatan.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.kecamatans.create');
    }

    /**
     * Store a newly created Kecamatan in storage.
     *
     * @param CreateKecamatanRequest $request
     *
     * @return Response
     */
    public function store(CreateKecamatanRequest $request)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'parent_id' => 0,
            'name' => $request->name,
            'is_active' => isset($request->is_active) ? $request->is_active : 0
        ];

        $kecamatan = $this->kecamatanRepository->create($input);

        Flash::success('Kecamatan saved successfully.');

        return redirect(route('admin.location.kecamatan.index'));
    }

    /**
     * Display the specified Kecamatan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kecamatan = $this->kecamatanRepository->find($id);

        if (empty($kecamatan)) {
            Flash::error('Kecamatan not found');

            return redirect(route('admin.location.kecamatan.index'));
        }

        return view('admin.pages.kecamatans.show')->with('kecamatan', $kecamatan);
    }

    /**
     * Show the form for editing the specified Kecamatan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kecamatan = $this->kecamatanRepository->find($id);

        if (empty($kecamatan)) {
            Flash::error('Kecamatan not found');

            return redirect(route('admin.location.kecamatan.index'));
        }

        return view('admin.pages.kecamatans.edit')->with('kecamatan', $kecamatan);
    }

    /**
     * Update the specified Kecamatan in storage.
     *
     * @param int $id
     * @param UpdateKecamatanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKecamatanRequest $request)
    {
        $kecamatan = $this->kecamatanRepository->find($id);

        if (empty($kecamatan)) {
            Flash::error('Kecamatan not found');

            return redirect(route('admin.location.kecamatan.index'));
        }

        $input = [
            'user_id' => Auth::user()->id,
            'parent_id' => 0,
            'name' => $request->name,
            'is_active' => isset($request->is_active) ? $request->is_active : 0
        ];

        $kecamatan = $this->kecamatanRepository->update($input, $id);

        Flash::success('Kecamatan updated successfully.');

        return redirect(route('admin.location.kecamatan.index'));
    }

    /**
     * Remove the specified Kecamatan from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kecamatan = $this->kecamatanRepository->find($id);

        if (empty($kecamatan)) {
            Flash::error('Kecamatan not found');

            return redirect(route('admin.location.kecamatan.index'));
        }

        $this->kecamatanRepository->delete($id);

        Flash::success('Kecamatan deleted successfully.');

        return redirect(route('admin.location.kecamatan.index'));
    }
}
