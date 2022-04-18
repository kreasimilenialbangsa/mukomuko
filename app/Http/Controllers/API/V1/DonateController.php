<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin\Donate;
use App\Models\Admin\Program;
use App\Models\Admin\Ziswaf;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function all(Request $request)
    {
        $donates = Donate::select('id', 'type', 'type_id', 'name', 'message', 'total_donate', 'created_at', 'is_anonim')
            ->when(isset($request->user_id), function($q) use($request){
                return $q->whereUserId($request->user_id);
            })
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
            $donate->event = $donate->type::select('id', 'user_id', 'title')->find($donate->type_id);
            $donate->type = $donate->type == '\App\Models\Admin\Program' ? 'program' : 'ziswaf';
            $donate->name = $donate->is_anonim == 1 ? 'Hamba Allah' : $donate->name;
        }

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $donates
        ]);
    }

    public function detailById(Request $request, $id)
    {
        $donate = Donate::select('id', 'type', 'type_id', 'name', 'message', 'total_donate', 'created_at', 'is_anonim')
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

        $donate->event = $donate->type::select('id', 'user_id', 'title')->find($donate->type_id);
        $donate->type = $donate->type == '\App\Models\Admin\Program' ? 'program' : 'ziswaf';
        $donate->name = $donate->is_anonim == 1 ? 'Hamba Allah' : $donate->name;

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $donate
        ]);
    }

    public function allPrograms(Request $request)
    {
        $donates = Donate::select('id', 'type', 'type_id', 'name', 'message', 'total_donate', 'created_at', 'is_anonim')
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
            $donate->event = $donate->type::select('id', 'user_id', 'title')->find($donate->type_id);
            $donate->type = $donate->type == '\App\Models\Admin\Program' ? 'program' : 'ziswaf';
            $donate->name = $donate->is_anonim == 1 ? 'Hamba Allah' : $donate->name;
        }

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $donates
        ]);
    }

    public function detailByProgram(Request $request, $id)
    {
        $donates = Donate::select('id', 'type', 'type_id', 'name', 'message', 'total_donate', 'created_at', 'is_anonim')
            ->whereType('\App\Models\Admin\Program')
            ->whereTypeId($id)
            ->whereIsConfirm(1)
            ->paginate(isset($request->limit) ? $request->limit : 12);

        if(empty($donates)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404); 
        }

        foreach($donates as $donate) {
            $donate->event = $donate->type::select('id', 'user_id', 'title')->find($donate->type_id);
            $donate->type = $donate->type == '\App\Models\Admin\Program' ? 'program' : 'ziswaf';
            $donate->name = $donate->is_anonim == 1 ? 'Hamba Allah' : $donate->name;
        }

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $donates
        ]);
    }

    public function allZiswaf(Request $request)
    {
        $donates = Donate::select('id', 'type', 'type_id', 'name', 'message', 'total_donate', 'created_at', 'is_anonim')
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
            $donate->event = $donate->type::select('id', 'user_id', 'title')->find($donate->type_id);
            $donate->type = $donate->type == '\App\Models\Admin\Program' ? 'program' : 'ziswaf';
            $donate->name = $donate->is_anonim == 1 ? 'Hamba Allah' : $donate->name;
        }

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $donates
        ]);
    }

    public function detailByZiswaf(Request $request, $id)
    {
        $donates = Donate::select('id', 'type', 'type_id', 'name', 'message', 'total_donate', 'created_at', 'is_anonim')
            ->whereType('\App\Models\Admin\Ziswaf')
            ->whereTypeId($id)
            ->whereIsConfirm(1)
            ->paginate(isset($request->limit) ? $request->limit : 12);

        if(empty($donates)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404); 
        }

        foreach($donates as $donate) {
            $donate->event = $donate->type::select('id', 'user_id', 'title')->find($donate->type_id);
            $donate->type = $donate->type == '\App\Models\Admin\Program' ? 'program' : 'ziswaf';
            $donate->name = $donate->is_anonim == 1 ? 'Hamba Allah' : $donate->name;
        }

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $donates
        ]);
    }
}
