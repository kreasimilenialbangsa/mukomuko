<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Information;
use Illuminate\Support\Facades\Session;

class InformationController extends Controller
{
    public function index()
    {
        $informations = Information::latest('id')->first();

        return view('admin.pages.informations.index')
            ->with('informations', $informations);
    }

    public function store(Request $request)
    {
        $request->validate([
            'penerima_manfaat' => 'required|:1',
            'penghimpunan' => 'required|min:5',
            'penyaluran' => 'required|min:5 ',
        ],[
            'penerima_manfaat.min' => 'Penerima Manfaat minimal adalah 1',
            'penghimpunan.min' => 'Penghimpunan minimal adalah Rp 1.000',
            'penyaluran.min' => 'Penyaluran minimal adalah Rp 1.000',
        ]);

        $informations = [
            'penerima_manfaat' => str_replace('.', '', $request->penerima_manfaat),
            'penghimpunan' => str_replace('.', '', $request->penghimpunan),
            'penyaluran' => str_replace('.', '', $request->penyaluran),
        ];

        Information::create($informations);

        Session::flash('success', 'Data berhasil diperbarui');

        return redirect(route('admin.informations.index'));
    }
}
