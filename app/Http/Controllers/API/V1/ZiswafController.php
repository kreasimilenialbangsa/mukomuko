<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ziswaf;
use App\Models\Admin\ZiswafCategory;
use Illuminate\Http\Request;

class ZiswafController extends Controller
{
    public function all(Request $request)
    {
        $ziswaf = ZiswafCategory::select('id', 'name', 'slug', 'created_at')
            ->with('category')
            ->whereIsActive(1)
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $ziswaf
        ]);
    }

    public function detail(Request $request, $id)
    {
        $ziswaf = ZiswafCategory::select('id', 'name', 'slug', 'created_at')
            ->with('category:id,user_id,category_id,title,is_active,created_at')
            ->whereId($id)
            ->whereIsActive(1)
            ->first();

        if(empty($ziswaf)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404); 
        }

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $ziswaf
        ]);
    }
}
