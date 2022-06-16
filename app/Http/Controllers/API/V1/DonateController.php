<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin\Donate;
use App\Models\Admin\Program;
use App\Models\Admin\Ziswaf;
use App\Models\User;
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


    //private API
    public function getDonateByAdmin(Request $request)
    {
        $donates = Donate::select('id', 'type', 'type_id', 'name', 'email', 'phone', 'message', 'total_donate', 'created_at', 'is_anonim', 'is_confirm')
            ->when(isset($request->type), function($q) use($request){
                return $q->whereType($request->type == 'program' ? '\App\Models\Admin\Program' : '\App\Models\Admin\Ziswaf');
            })
            ->whereUserId(auth()->user()->id)
            ->orderBy('id', 'desc')
            ->paginate(isset($request->limit) ? $request->limit : 10);

        if(empty($donates)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404); 
        }

        foreach($donates as $donate) {
            if($donate->type == '\App\Models\Admin\Program') {
                $donate->event = $donate->type::select('id', 'user_id', 'title', 'image')->find($donate->type_id);
            } else {
                $donate->event = $donate->type::select('id', 'user_id', 'title')->find($donate->type_id);
                $donate->event->image = null;
            }
            $donate->type = $donate->type == '\App\Models\Admin\Program' ? 'program' : 'ziswaf';
            $donate->name = $donate->is_anonim == 1 ? 'Hamba Allah' : $donate->name;
        }

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $donates
        ]);
        
    }

    public function getDonateByUser(Request $request)
    {
        $donates = Donate::select('id', 'type', 'type_id', 'name', 'email', 'phone', 'message', 'total_donate', 'created_at', 'is_anonim', 'is_confirm')
            ->when(isset($request->type), function($q) use($request){
                return $q->whereType($request->type == 'program' ? '\App\Models\Admin\Program' : '\App\Models\Admin\Ziswaf');
            })
            ->Where('email', auth()->user()->email)
            ->orderBy('id', 'desc')
            ->paginate(isset($request->limit) ? $request->limit : 10);

        if(empty($donates)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404); 
        }

        foreach($donates as $donate) {
            if($donate->type == '\App\Models\Admin\Program') {
                $donate->event = $donate->type::select('id', 'user_id', 'title', 'image')->find($donate->type_id);
            } else {
                $donate->event = $donate->type::select('id', 'user_id', 'title')->find($donate->type_id);
                $donate->event->image = null;
            }
            $donate->type = $donate->type == '\App\Models\Admin\Program' ? 'program' : 'ziswaf';
            $donate->name = $donate->is_anonim == 1 ? 'Hamba Allah' : $donate->name;
        }

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $donates
        ]);
        
    }
    
    public function donateJipzisnu(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'total_donate' => 'required|min:5',
        ]);

        $type = $request->type == 'program' ? '\App\Models\Admin\Program' : '\App\Models\Admin\Ziswaf';

        $input = [
            'user_id' => auth()->user()->id,
            'order_id' => strtoupper($request->type).'-'.time(),
            'type' => $type,
            'type_id' => $request->type_id,
            'location_id' => auth()->user()->location_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => isset($request->message) ? $request->message : null,
            'total_donate' => $request->total_donate,
            'is_anonim' => 0,
            'is_confirm' => 0
        ];

        $donate = Donate::create($input);

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $donate
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $donate = Donate::find($id);

        if(empty($donate)){
            return response()->json([
                'status' => false,
                'message' => 'data not found'
            ], 404);
        }

        Donate::whereId($donate->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }
}
