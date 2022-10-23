<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\DesaDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateDesaRequest;
use App\Http\Requests\Admin\UpdateDesaRequest;
use App\Repositories\Admin\DesaRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Response;

class DesaController extends AppBaseController
{
    /** @var DesaRepository $desaRepository*/
    private $desaRepository;

    public function __construct(DesaRepository $desaRepo)
    {
        $this->desaRepository = $desaRepo;
    }

    /**
     * Display a listing of the Desa.
     *
     * @param DesaDataTable $desaDataTable
     *
     * @return Response
     */
    public function index(DesaDataTable $desaDataTable)
    {
        return $desaDataTable->render('admin.pages.desas.index');
    }

    /**
     * Show the form for creating a new Desa.
     *
     * @return Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::where('parent_id', 0)->pluck('name', 'id');
        return view('admin.pages.desas.create')
            ->with('kecamatan', $kecamatan);
    }

    /**
     * Store a newly created Desa in storage.
     *
     * @param CreateDesaRequest $request
     *
     * @return Response
     */
    public function store(CreateDesaRequest $request)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'is_active' => isset($request->is_active) ? $request->is_active : 0
        ];

        $desa = $this->desaRepository->create($input);

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.location.desa.index'));
    }

    /**
     * Display the specified Desa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $desa = $this->desaRepository->find($id);

        if (empty($desa)) {
            Flash::error('Desa not found');

            return redirect(route('admin.location.desa.index'));
        }

        return view('admin.pages.desas.show')->with('desa', $desa);
    }

    /**
     * Show the form for editing the specified Desa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $desa = $this->desaRepository->find($id);

        if (empty($desa)) {
            Flash::error('Desa not found');

            return redirect(route('admin.location.desa.index'));
        }

        $kecamatan = Kecamatan::where('parent_id', 0)->pluck('name', 'id');

        return view('admin.pages.desas.edit')->with('desa', $desa)
            ->with('kecamatan', $kecamatan);
    }

    /**
     * Update the specified Desa in storage.
     *
     * @param int $id
     * @param UpdateDesaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDesaRequest $request)
    {
        $desa = $this->desaRepository->find($id);

        if (empty($desa)) {
            Flash::error('Desa not found');

            return redirect(route('admin.location.desa.index'));
        }

        $input = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'is_active' => isset($request->is_active) ? $request->is_active : 0
        ];

        $desa = $this->desaRepository->update($input, $id);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.location.desa.index'));
    }

    /**
     * Remove the specified Desa from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $desa = $this->desaRepository->find($id);

        if (empty($desa)) {
            Flash::error('Desa not found');

            return redirect(route('admin.location.desa.index'));
        }

        $this->desaRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.location.desa.index'));
    }

    public function toggleActive(Request $request)
    {
        $input = [
            'is_active' => $request->val
        ];

        $program = $this->desaRepository->update($input, $request->id);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah'
        ], 200);
    }
}
