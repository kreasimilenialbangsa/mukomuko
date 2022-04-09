<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.profile.index');
    }

    public function history(Request $request)
    {
        return view('pages.profile.history-transaction');
    }

    public function inbox(Request $request)
    {
        return view('pages.profile.inbox');
    }

    public function notification(Request $request)
    {
        return view('pages.profile.notification');
    }

}
