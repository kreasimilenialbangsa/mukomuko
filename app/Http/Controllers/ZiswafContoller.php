<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZiswafContoller extends Controller
{
    public function index(Request $request)
    {
        return view('pages.ziswaf.index');
    }

    public function payment(Request $request)
    {
        session(['donate' => [
            'type' => '\App\Models\Admin\Ziswaf',
            'type_id' => $request->ziswaf,
            'nominal' => str_replace('.', '', $request->nominal)
        ]]);

        return redirect()->route('payment.index');
    }
}
