<?php

namespace App\Http\Controllers;

use App\Models\Admin\Desa;
use Illuminate\Http\Request;

class RegiterController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->type == 'kecamatan' ? 0 : 1;

        $locations = Desa::when(($type == 0), function($q) {
            return $q->whereParentId(0);
        })->when(($type == 1), function($q) {
            return $q->where('parent_id', '>', 0);
        })->pluck('name', 'id');
        
        return view('pages.register.index')
            ->with('locations', $locations);
    }

    public function storage(Request $request)
    {
        return 'test';
    }
}
