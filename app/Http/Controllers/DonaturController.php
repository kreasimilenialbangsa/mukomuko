<?php

namespace App\Http\Controllers;

use App\Models\Admin\Donate;
use App\Models\Admin\Kecamatan;
use App\Models\Admin\Program;
use App\Models\Admin\Ziswaf;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function index(Request $request)
    {
        $kecamatan = Kecamatan::select('name', 'id')
            ->whereParentId(0)
            ->get();
        
        $programs = Program::select('title', 'id')
        ->whereIsActive(1)
        ->get();

        $ziswaf = Ziswaf::select('title', 'id')
        ->whereIsActive(1)
        ->get();

        $donates = Donate::select('id', 'name', 'total_donate', 'created_at', 'is_anonim')
            ->whereIsConfirm(1)
            // ->when(isset($request->order), function($q) use($request) {
            //     return $q->orderBy('id', $request->order);
            // })
            ->orderBy('id', isset($request->order) ? $request->order : 'desc')
            ->paginate(12);
        
        return view('pages.donatur.index')
            ->with('kecamatan', $kecamatan)
            ->with('programs', $programs)
            ->with('ziswaf', $ziswaf)
            ->with('donates', $donates);
    }
}
