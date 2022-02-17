<?php

namespace App\Http\Controllers;

use App\Models\Admin\Donate;
use App\Models\Admin\Kecamatan;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::select('name', 'id')
            ->whereParentId(0)
            ->get();

        $donates = Donate::select('id', 'name', 'total_donate', 'created_at', 'is_anonim')
            // ->whereIsConfirm(1)
            ->orderBy('id', 'desc')
            ->paginate(12);
        
        return view('pages.donatur.index')
            ->with('kecamatan', $kecamatan)
            ->with('donates', $donates);
    }
}
