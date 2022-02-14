<?php

namespace App\Http\Controllers;

use App\Models\Admin\Service;
use Illuminate\Http\Request;

class ServiceContoller extends Controller
{
    public function index($slug)
    {
        $service = Service::whereSlug($slug)->firstOrFail();

        return view('pages.service.index')
            ->with('service', $service);
    }
}
