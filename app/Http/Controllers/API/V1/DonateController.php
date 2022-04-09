<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin\Donate;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function all(Request $request)
    {
        $donates = Donate::select('id', 'type', 'name', 'message', 'total_donate', 'created_at', 'is_anonim')
            ->whereIsConfirm(1)
            ->orderBy('id', 'desc')
            ->paginate(isset($request->limit) ? $request->limit : 12);

        if(empty($donates)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404); 
        }

        foreach($donates as $donate) {
            $donate->type = $donate->type == '\App\Models\Admin\Program' ? 'program' : 'ziswaf';
            $donate->name = $donate->is_anonim == 1 ? 'Anonim' : $donate->name;
        }

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $donates
        ]);
    }

    public function detailById(Request $request, $id)
    {
        $donate = Donate::select('id', 'type', 'name', 'message', 'total_donate', 'created_at', 'is_anonim')
            ->whereId($id)
            ->whereIsConfirm(1)
            ->first();

        if(empty($donate)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404); 
        }

        $donate->type = $donate->type == '\App\Models\Admin\Program' ? 'program' : 'ziswaf';
        $donate->name = $donate->is_anonim == 1 ? 'Anonim' : $donate->name;

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $donate
        ]);
    }

    public function allPrograms(Request $request)
    {
        $donates = Donate::select('id', 'type', 'name', 'message', 'total_donate', 'created_at', 'is_anonim')
            ->whereType('\App\Models\Admin\Program')
            ->whereIsConfirm(1)
            ->orderBy('id', 'desc')
            ->paginate(isset($request->limit) ? $request->limit : 12);

        if(empty($donates)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404); 
        }

        foreach($donates as $donate) {
            $donate->type = $donate->type == '\App\Models\Admin\Program' ? 'program' : 'ziswaf';
            $donate->name = $donate->is_anonim == 1 ? 'Anonim' : $donate->name;
        }

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $donates
        ]);
    }

    public function detailByProgram(Request $request, $id)
    {
        $donate = Donate::select('id', 'type', 'name', 'message', 'total_donate', 'created_at', 'is_anonim')
            ->whereType('\App\Models\Admin\Program')
            ->whereTypeId($id)
            ->whereIsConfirm(1)
            ->first();

        if(empty($donate)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404); 
        }

        $donate->type = $donate->type == '\App\Models\Admin\Program' ? 'program' : 'ziswaf';
        $donate->name = $donate->is_anonim == 1 ? 'Anonim' : $donate->name;

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $donate
        ]);
    }

    public function allZiswaf(Request $request)
    {
        $donates = Donate::select('id', 'type', 'name', 'message', 'total_donate', 'created_at', 'is_anonim')
            ->whereType('\App\Models\Admin\Ziswaf')
            ->whereIsConfirm(1)
            ->orderBy('id', 'desc')
            ->paginate(isset($request->limit) ? $request->limit : 12);

        if(empty($donates)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404); 
        }

        foreach($donates as $donate) {
            $donate->type = $donate->type == '\App\Models\Admin\Program' ? 'program' : 'ziswaf';
            $donate->name = $donate->is_anonim == 1 ? 'Anonim' : $donate->name;
        }

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $donates
        ]);
    }

    public function detailByZiswaf(Request $request, $id)
    {
        $donate = Donate::select('id', 'type', 'name', 'message', 'total_donate', 'created_at', 'is_anonim')
            ->whereType('\App\Models\Admin\Ziswaf')
            ->whereTypeId($id)
            ->whereIsConfirm(1)
            ->first();

        if(empty($donate)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404); 
        }

        $donate->type = $donate->type == '\App\Models\Admin\Program' ? 'program' : 'ziswaf';
        $donate->name = $donate->is_anonim == 1 ? 'Anonim' : $donate->name;

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $donate
        ]);
    }
}
