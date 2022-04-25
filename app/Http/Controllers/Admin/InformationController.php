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

        // dd($informations->toArray());

        return view('admin.pages.informations.index')
            ->with('informations', $informations);
    }

    public function store(Request $request)
    {
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
