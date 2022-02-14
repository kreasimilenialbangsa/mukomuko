<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramContoller extends Controller
{
    public function index(Request $request)
    {
        return view('pages.program');
    }

    public function detail($slug)
    {
        return 'Detail Program';
    }
}
