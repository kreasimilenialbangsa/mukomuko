<?php

namespace App\Http\Controllers;

use App\Models\Admin\Ziswaf;
use Illuminate\Http\Request;

class ZiswafContoller extends Controller
{
    public function index(Request $request)
    {
        $ziswaf = [
            'zakat' => Ziswaf::select('id', 'title')->whereCategoryId(1)->whereIsActive(1)->get(),
            'infaq' => Ziswaf::select('id', 'title')->whereCategoryId(2)->whereIsActive(1)->get(),
            'wakaf' => Ziswaf::select('id', 'title')->whereCategoryId(3)->whereIsActive(1)->get()
        ];

        return view('pages.ziswaf.index')
            ->with('ziswaf', $ziswaf);
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
