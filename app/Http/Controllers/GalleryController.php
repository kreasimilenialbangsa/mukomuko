<?php

namespace App\Http\Controllers;

use App\Models\Admin\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::select('id', 'title', 'type', 'content', 'created_at')
            ->whereIsActive(1)
            ->orderBy('id', 'desc')
            ->paginate(12);

        return view('pages.gallery.index')
            ->with('galleries', $galleries);
    }
}
