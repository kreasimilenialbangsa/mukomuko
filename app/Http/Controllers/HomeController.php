<?php

namespace App\Http\Controllers;

use App\Models\Admin\Banner;
use App\Models\Admin\Donate;
use App\Models\Admin\Gallery;
use App\Models\Admin\News;
use App\Models\Admin\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banner::select('id', 'title', 'description', 'image', 'link_url')
            ->whereIsActive(1)
            ->orderBy('id', 'asc')
            ->get();
        
        $total = [
            'penerima_manfaat' => 0,
            'penghimpunan' => Donate::whereIsConfirm(1)->sum('total_donate'),
            'penyaluran' => 0,
            'donatur' => Donate::whereIsConfirm(1)->count()
        ];

        $donates = Donate::select('id', 'name', 'total_donate', 'created_at', 'is_anonim')
            ->whereIsConfirm(1)
            ->get();

        $programs = Program::select('id', 'user_id', 'title', 'slug', 'location', 'end_date', 'image', 'target_dana', 'category_id', 'created_at')
            ->with('category')
            ->withSum('donate', 'total_donate')
            ->whereIsActive(1)
            ->orderBy('created_at', 'desc')
            ->get();

        foreach($programs as $program) {
            $date = Carbon::parse($program->end_date . ' 23:59:00');
            $now = Carbon::now();

            $program->count_day = $date->diffInDays($now);
        }

        $news = News::select('id', 'user_id', 'title', 'slug', 'category_id', 'created_at')
            ->with(['user', 'category', 'images'])
            ->whereIsActive(1)
            ->orderBy('id', 'desc')
            ->get();

        $galleries = Gallery::select('id', 'title', 'description', 'type', 'content', 'created_at')
            ->whereIsActive(1)
            ->orderBy('id', 'desc')
            ->get();
        
        return view('pages.home.index')
            ->with('banners', $banners)
            ->with('total', $total)
            ->with('donates', $donates)
            ->with('programs', $programs)
            ->with('news', $news)
            ->with('galleries', $galleries);
    }
}
