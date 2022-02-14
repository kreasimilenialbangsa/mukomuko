<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZiswafContoller extends Controller
{
    public function index(Request $request)
    {
        return view('pages.ziswaf');
    }
}
