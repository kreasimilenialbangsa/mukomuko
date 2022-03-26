<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Donate;
use App\Models\Admin\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_ziswaf = [
            'pending' => Donate::whereIsConfirm(0)->whereType('\App\Models\Admin\Ziswaf')->count(),
            'complete' => Donate::whereIsConfirm(1)->whereType('\App\Models\Admin\Ziswaf')->count(),
            'total' => Donate::whereType('\App\Models\Admin\Ziswaf')->count(),
        ];

        $total_program = [
            'pending' => Donate::whereIsConfirm(0)->whereType('\App\Models\Admin\Program')->count(),
            'complete' => Donate::whereIsConfirm(1)->whereType('\App\Models\Admin\Program')->count(),
            'total' => Donate::whereType('\App\Models\Admin\Program')->count(),
        ];

        $penghimpunan = [
            'ziswaf' => Donate::whereIsConfirm(1)->whereType('\App\Models\Admin\Ziswaf')->sum('total_donate'),
            'program' => Donate::whereIsConfirm(1)->whereType('\App\Models\Admin\Program')->sum('total_donate'),
            'total' => Donate::whereIsConfirm(1)->sum('total_donate')
        ];

        $donates = Donate::select('id', 'type_id', 'name', 'email', 'phone', 'total_donate', 'is_confirm', 'created_at')
            ->with('program')
            ->whereType('\App\Models\Admin\Program')
            ->whereUserId(Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.pages.dashboard.index')
            ->with('total_ziswaf', $total_ziswaf)
            ->with('total_program', $total_program)
            ->with('penghimpunan', $penghimpunan)
            ->with('donates', $donates);
    }
}
