<?php

namespace App\Http\Controllers;

use App\Models\Admin\News;
use App\Models\Admin\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $highlight = News::select('id', 'user_id', 'title', 'slug', 'content', 'category_id', 'date_news', 'created_at')
            ->with(['user', 'category', 'images'])
            ->whereIsActive(1)
            ->whereIsHighlight(1)
            ->orderBy('date_news', 'desc')
            ->get();

        $categories = NewsCategory::select('name', 'id')->get();
        
        $news = News::select('id', 'user_id', 'title', 'slug', 'content', 'category_id', 'date_news', 'created_at')
            ->with(['user', 'category', 'images'])
            ->when(isset($request->category), function($q) use($request) {
                return $q->whereCategoryId($request->category);
            })
            ->when(isset($request->search), function($q) use($request) {
                return $q->where('title', 'LIKE', '%'.$request->search.'%');
            })
            ->whereIsActive(1)
            ->orderBy('date_news', 'desc')
            ->paginate(12);

        return view('pages.news.index')
            ->with('highlight', $highlight)
            ->with('categories', $categories)
            ->with('news', $news);
    }

    public function detail($slug)
    {
        $news = News::select('id', 'category_id', 'user_id', 'title', 'slug', 'content', 'date_news', 'created_at')
            ->with(['user', 'category', 'images'])
            ->whereSlug($slug)
            ->whereIsActive(1)
            ->firstOrFail();

        $latestNews = News::select('id', 'category_id', 'user_id', 'title', 'slug', 'date_news', 'created_at')
            ->with(['user', 'category', 'images'])
            ->where('id', '<>', $news->id)
            ->whereIsActive(1)
            ->limit(4)
            ->get();

        return view('pages.news.detail-news')
            ->with('latestNews', $latestNews)
            ->with('news', $news);
    }
}
