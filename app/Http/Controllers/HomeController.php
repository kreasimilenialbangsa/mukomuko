<?php

namespace App\Http\Controllers;

use App\Models\Admin\Banner;
use App\Models\Admin\Donate;
use App\Models\Admin\Gallery;
use App\Models\Admin\Information;
use App\Models\Admin\News;
use App\Models\Admin\Program;
use App\Models\Admin\Ziswaf;
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
        
        $total = Information::latest('id')->first();
        $total->donatur = Donate::whereIsConfirm(1)->count();

        $ziswaf = [
            'zakat' => Ziswaf::select('id', 'title')->whereCategoryId(1)->whereIsActive(1)->get(),
            'infaq' => Ziswaf::select('id', 'title')->whereCategoryId(2)->whereIsActive(1)->get(),
            'wakaf' => Ziswaf::select('id', 'title')->whereCategoryId(3)->whereIsActive(1)->get()
        ];

        // $total = [
        //     'penerima_manfaat' => 0,
        //     'penghimpunan' => Donate::whereIsConfirm(1)->sum('total_donate'),
        //     'penyaluran' => 0,
        //     'donatur' => Donate::whereIsConfirm(1)->count()
        // ];

        $donates = Donate::select('id', 'name', 'total_donate', 'created_at', 'is_anonim')
            ->whereIsConfirm(1)
            ->limit(12) 
            ->get();

        $programs = Program::select('id', 'user_id', 'title', 'slug', 'location', 'end_date', 'image', 'target_dana', 'category_id', 'created_at', 'is_urgent')
            ->with('category')
            ->withSum('donate', 'total_donate')
            ->whereIsActive(1)
            ->whereDate('end_date', '>', date('Y-m-d'))
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        foreach($programs as $program) {
            $date = Carbon::parse($program->end_date . ' 23:59:00');
            $now = Carbon::now();

            $program->count_day = $program->end_date < date('Y-m-d') ? 0 : $date->diffInDays($now);
        }

        $news = News::select('id', 'user_id', 'title', 'slug', 'category_id', 'created_at')
            ->with(['user', 'category', 'images'])
            ->whereIsActive(1)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();

        $galleries = Gallery::select('id', 'title', 'description', 'type', 'content', 'created_at')
            ->whereIsActive(1)
            ->orderBy('id', 'desc')
            ->limit(9)
            ->get();
        
        return view('pages.home.index')
            ->with('banners', $banners)
            ->with('total', $total)
            ->with('ziswaf', $ziswaf)
            ->with('donates', $donates)
            ->with('programs', $programs)
            ->with('news', $news)
            ->with('galleries', $galleries);
    }
}
