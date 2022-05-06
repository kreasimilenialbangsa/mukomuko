<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin\Donate;
use App\Models\Admin\Information;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class InformationController extends Controller
{
    public function total()
    {
        $total = Information::latest('id')->first();
        $total->donatur = Donate::whereIsConfirm(1)->count();

        return response()->json([
            'status' => true,
            'success' => 'success',
            'data' => $total
        ], 200); 
    }

    public function totalGoZiswaf(Request $request)
    {
        $total = Donate::whereType('\App\Models\Admin\Ziswaf')
            ->whereIsPayment(0)
            ->whereUserId(auth()->user()->id)
            ->sum('total_donate');
        
        return response()->json([
            'status' => true,
            'success' => 'success',
            'data' => $total
        ], 200); 
    }

    public function scanQR(Request $request, $user_id)
    {
        $user = User::select('id', 'name', 'email', 'is_active')
            ->with('profile:id,user_id,address,telp')
            ->whereId($user_id)
            ->first();

        if(empty($user)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404); 
        }

        return response()->json([
            'status' => true,
            'success' => 'success',
            'data' => $user
        ], 200); 
    }
}