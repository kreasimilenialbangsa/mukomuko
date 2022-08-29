<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Donate;
use App\Models\Admin\Program;
use App\Models\Admin\SupportAmbulance;
use App\Models\Admin\SupportService;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $isAdmin = Auth::user()->role_user->role->id == 1 || Auth::user()->role_user->role->id == 2 ? true : false;

        if($request->ajax()){
                $from_date = isset($request->from_date) ? $request->from_date : Carbon::now()->subDays(9)->format('Y-m-d');
                $to_date = isset($request->to_date) ? $request->to_date : date('Y-m-d');
                $between = CarbonPeriod::create($from_date, $to_date);

                $dates = []; $ziswaf = []; $program = [];

                foreach($between as $date) {
                    $dates[] = $date->isoFormat('DD MMM');

                    $statisicZiswaf = DB::table('donates')
                        ->select(DB::raw("DATE_FORMAT(date_donate, '%d-%m') as date"), DB::raw("SUM(total_donate) as total"))
                        ->whereType('\App\Models\Admin\Ziswaf')
                        ->whereIsConfirm(1)
                        ->whereIsPayment(0)
                        ->whereNull('deleted_at')
                        ->when(true, function($q) use ($date) {
                            $q->whereBetween('date_donate', [$date->format('Y-m-d').' 00:00:00', $date->format('Y-m-d').' 23:59:00']);
                        })
                        ->groupBy('date')
                        ->first();
                    $ziswaf[] += isset($statisicZiswaf->total) ? $statisicZiswaf->total : 0;

                    $statisicProgram = DB::table('donates')
                        ->select(DB::raw("DATE_FORMAT(date_donate, '%d-%m') as date"), DB::raw("SUM(total_donate) as total"))
                        ->whereType('\App\Models\Admin\Program')
                        ->whereIsConfirm(1)
                        ->whereIsPayment(0)
                        ->whereNull('deleted_at')
                        ->when(true, function($q) use ($date) {
                            $q->whereBetween('date_donate', [$date->format('Y-m-d').' 00:00:00', $date->format('Y-m-d').' 23:59:00']);
                        })
                        ->groupBy('date')
                        ->first();
                    $program[] += isset($statisicProgram->total) ? $statisicProgram->total : 0;
                }
                $result = [
                    'date' => $dates,
                    'ziswaf' => $ziswaf,
                    'program' => $program
                ];

            return response()->json([
                'status' => true,
                'data' => $result
            ]);
        }

        $total_ziswaf = [
            'pending' => Donate::whereIsConfirm(0)
                ->whereIsPayment(0)
                ->whereType('\App\Models\Admin\Ziswaf')
                ->when($isAdmin == false, function($q) {
                    $q->whereUserId(Auth::user()->id);
                })
                ->count(),
            'complete' => Donate::whereIsConfirm(1)
                ->whereIsPayment(0)
                ->whereType('\App\Models\Admin\Ziswaf')
                ->when($isAdmin == false, function($q) {
                    $q->whereUserId(Auth::user()->id);
                })
                ->count(),
            'total' => Donate::whereType('\App\Models\Admin\Ziswaf')
                ->whereIsPayment(0)
                ->when($isAdmin == false, function($q) {
                    $q->whereUserId(Auth::user()->id);
                })
                ->count(),
        ];

        $total_program = [
            'pending' => Donate::whereIsConfirm(0)
                ->whereIsPayment(0)
                ->whereType('\App\Models\Admin\Program')
                ->when($isAdmin == false, function($q) {
                    $q->whereUserId(Auth::user()->id);
                })
                ->count(),
            'complete' => Donate::whereIsConfirm(1)
                ->whereIsPayment(0)
                ->whereType('\App\Models\Admin\Program')
                ->when($isAdmin == false, function($q) {
                    $q->whereUserId(Auth::user()->id);
                })
                ->count(),
            'total' => Donate::whereType('\App\Models\Admin\Program')
                ->whereIsPayment(0)
                ->when($isAdmin == false, function($q) {
                    $q->whereUserId(Auth::user()->id);
                })
                ->count(),
        ];

        $penghimpunan = [
            'ziswaf' => Donate::whereIsConfirm(1)
                ->whereIsPayment(0)
                ->whereType('\App\Models\Admin\Ziswaf')
                ->when($isAdmin == false, function($q) {
                    $q->whereUserId(Auth::user()->id);
                })
                ->sum('total_donate'),
            'program' => Donate::whereIsConfirm(1)
                ->whereIsPayment(0)
                ->whereType('\App\Models\Admin\Program')
                ->when($isAdmin == false, function($q) {
                    $q->whereUserId(Auth::user()->id);
                })
                ->sum('total_donate'),
            'total' => Donate::whereIsConfirm(1)
                ->whereIsPayment(0)
                ->when($isAdmin == false, function($q) {
                    $q->whereUserId(Auth::user()->id);
                })
                ->sum('total_donate')
        ];

        $donates_ziswaf = Donate::select('id', 'type', 'type_id', 'name', 'email', 'phone', 'total_donate', 'is_confirm', 'created_at')
            ->with('program', 'ziswaf')
            ->whereType('\App\Models\Admin\Ziswaf')
            ->whereUserId(Auth::user()->id)
            ->whereIsPayment(0)
            ->orderBy('id', 'desc')
            ->limit('5')
            ->get();

        $donates_program = Donate::select('id', 'type', 'type_id', 'name', 'email', 'phone', 'total_donate', 'is_confirm', 'created_at')
            ->with('program', 'ziswaf')
            ->whereType('\App\Models\Admin\Program')
            ->whereUserId(Auth::user()->id)
            ->whereIsPayment(0)
            ->orderBy('id', 'desc')
            ->limit('5')
            ->get();

        $ambulance = SupportAmbulance::select('id', 'user_id', 'book_date', 'reason', 'is_confirm')
            ->with('user')
            ->whereRelation('user', 'deleted_at', null)
            ->whereIsConfirm(0)
            ->when($isAdmin == false, function($q) {
                $q->whereUserId(Auth::user()->id);
            })
            ->orderBy('id', 'desc')
            ->get();

        $service = SupportService::select('id', 'user_id', 'category_id', 'reason', 'nominal', 'is_confirm', 'created_at')
            ->with('user', 'category')
            ->whereRelation('user', 'deleted_at', null)
            ->whereIsConfirm(0)
            ->when($isAdmin == false, function($q) {
                $q->whereUserId(Auth::user()->id);
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.pages.dashboard.index')
            ->with('isAdmin', $isAdmin)
            ->with('total_ziswaf', $total_ziswaf)
            ->with('total_program', $total_program)
            ->with('penghimpunan', $penghimpunan)
            ->with('donates_ziswaf', $donates_ziswaf)
            ->with('donates_program', $donates_program)
            ->with('ambulance', $ambulance)
            ->with('service', $service);
    }
}
