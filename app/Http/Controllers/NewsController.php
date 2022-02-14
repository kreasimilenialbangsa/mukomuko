<?php

namespace App\Http\Controllers;

use App\Models\Admin\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $highlight = News::select('id', 'user_id', 'title', 'slug', 'content', 'category_id', 'created_at')
            ->with(['user', 'category', 'images'])
            ->whereIsActive(1)
            ->whereIsHighlight(1)
            ->orderBy('id', 'desc')
            ->get();
        
        $news = News::select('id', 'user_id', 'title', 'slug', 'content', 'category_id', 'created_at')
            ->with(['user', 'category', 'images'])
            ->whereIsActive(1)
            ->orderBy('id', 'desc')
            ->paginate(12);

        return view('pages.news.index')
            ->with('highlight', $highlight)
            ->with('news', $news);
    }

    public function detail($slug)
    {
        return 'Detail News';
    }
}
