<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonaturController extends Controller
{
    public function index()
    {
        return view('pages.donatur.index');
    }
}
