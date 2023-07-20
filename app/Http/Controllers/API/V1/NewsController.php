<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin\News;
use App\Models\Admin\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function all(Request $request)
    {
        $news = News::select('id', 'user_id', 'title', 'slug', 'content', 'category_id', 'date_news', 'created_at')
            ->with(['user', 'category', 'images'])
            ->when(isset($request->category), function($q) use($request) {
                return $q->whereCategoryId($request->category);
            })
            ->when(isset($request->highlight), function($q) use($request) {
                return $q->whereIsHighlight($request->highlight == 1 ? 1 : 0);
            })
            ->when(isset($request->search), function($q) use($request) {
                return $q->where('title', 'LIKE', '%'.$request->search.'%');
            })
            ->whereIsActive(1)
            ->orderBy('date_news', 'desc')
            ->paginate(isset($request->limit) ? $request->limit : 12);

        if(empty($news)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404); 
        }

        foreach($news as $item) {
            $item->url = env('APP_URL').'/berita/'.$item->slug;
        }

        return response()->json([
            'status' => true,
            'success' => 'success',
            'data' => $news
        ], 200); 
    }

    public function detail(Request $request, $id)
    {
        $news = News::select('id', 'category_id', 'user_id', 'title', 'slug', 'content', 'date_news', 'created_at')
            ->with(['user', 'category', 'images'])
            ->whereId($id)
            ->whereIsActive(1)
            ->first();

        if(empty($news)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404); 
        }

        $news->content = str_replace('/storage/', env('APP_URL').'/storage/', $news->content);
        $news->url = env('APP_URL').'/berita/'.$news->slug;

        $latestNews = News::select('id', 'category_id', 'user_id', 'title', 'slug', 'date_news', 'created_at')
            ->with(['user', 'category', 'images'])
            ->where('id', '<>', $news->id)
            ->whereIsActive(1)
            ->limit(4)
            ->orderBy('date_news', 'desc')
            ->get();

        return response()->json([
            'status' => true,
            'success' => 'success',
            'data' => [
                'news' => $news,
                'latest_news' => $latestNews
            ]
        ], 200); 
        
    }

    public function category(Request $request)
    {
        $categories = NewsCategory::select('id', 'name', 'slug' )->orderBy('name', 'asc')->get();

        if(empty($categories)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404); 
        }

        return response()->json([
            'status' => true,
            'success' => 'success',
            'data' => $categories
        ], 200); 
    }
}
