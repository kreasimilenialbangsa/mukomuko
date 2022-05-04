<?php

namespace App\Http\Controllers;

use App\Models\Admin\Donate;
use App\Models\Admin\Program;
use App\Models\Admin\ProgramCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProgramContoller extends Controller
{
    public function index(Request $request)
    {
        $programs = Program::select('id', 'user_id', 'title', 'slug', 'location', 'end_date', 'image', 'target_dana', 'category_id', 'created_at', 'is_urgent')
            ->with('category')
            ->withSum('donate', 'total_donate')
            ->whereIsActive(1)
            ->when(isset($request->category), function($q) use($request) {
                return $q->whereCategoryId($request->category);
            })
            ->orderBy('is_urgent', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(12);

        foreach($programs as $program) {
            $date = Carbon::parse($program->end_date . ' 23:59:00');
            $now = Carbon::now();

            $program->count_day = $program->end_date < date('Y-m-d') ? 0 : $date->diffInDays($now);
        }

        $categories = ProgramCategory::select('name', 'id')
            ->get();

        
        $donates = Donate::select('id', 'name', 'total_donate', 'created_at', 'is_anonim')
            ->whereDate('created_at', Carbon::today())
            ->whereIsConfirm(1)
            ->get();
    
        return view('pages.program.index')
            ->with('categories', $categories)
            ->with('programs', $programs)
            ->with('donates', $donates);
    }

    public function detail($slug)
    {   
        $program = Program::whereSlug($slug)
            ->with(['user', 'category', 'news'])
            ->withCount('donate')
            ->withSum('donate', 'total_donate')
            ->whereIsActive(1)
            ->firstOrFail();

        $date = Carbon::parse($program->end_date . ' 23:59:00');
        $now = Carbon::now();

        $program->count_day = $program->end_date < date('Y-m-d') ? 0 : $date->diffInDays($now);

        $donates = Donate::select('id', 'name', 'total_donate', 'created_at', 'is_anonim')
            ->whereType('\App\Models\Admin\Program')
            ->whereTypeId($program->id)
            ->whereIsConfirm(1)
            ->orderBy('id', 'desc')
            ->get();

        $doa = Donate::select('id', 'name', 'total_donate', 'created_at', 'is_anonim', 'message')
            ->whereType('\App\Models\Admin\Program')
            ->whereTypeId($program->id)
            ->whereIsConfirm(1)
            ->whereNotNull('message')
            ->orderBy('id', 'desc')
            ->get();

        $programs = Program::select('id', 'user_id', 'title', 'slug', 'location', 'end_date', 'image', 'target_dana', 'category_id', 'created_at')
            ->with('category')
            ->withSum('donate', 'total_donate')
            ->where('id', '<>', $program->id)
            ->whereDate('end_date', '>', date('Y-m-d'))
            ->whereIsActive(1)
            ->limit(4)
            ->inRandomOrder()
            ->get();
            
        foreach($programs as $row) {
            $date = Carbon::parse($row->end_date . ' 23:59:00');
            $now = Carbon::now();

            $row->count_day = $row->end_date < date('Y-m-d') ? 0 : $date->diffInDays($now);
        }

        return view('pages.program.detail-program')
                ->with('donates', $donates)
                ->with('doa', $doa)
                ->with('program', $program)
                ->with('programs', $programs);
    }

    public function payment(Request $request)
    {
        session(['donate' => [
            'type' => '\App\Models\Admin\Program',
            'type_id' => $request->program,
            'nominal' => $request->nominal
        ]]);

        return redirect()->route('payment.index');
    }
}
