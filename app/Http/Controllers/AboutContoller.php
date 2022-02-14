<?php

namespace App\Http\Controllers;

use App\Models\Admin\About;
use Illuminate\Http\Request;

class AboutContoller extends Controller
{
    public function index($slug)
    {
        $about = About::whereSlug($slug)->firstOrFail();

        return view('pages.about.index')
            ->with('about', $about);
    }
}
