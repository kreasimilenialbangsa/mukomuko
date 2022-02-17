<?php

namespace App\Http\Controllers;

use App\Models\Admin\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProgramContoller extends Controller
{
    public function index(Request $request)
    {
        $programs = Program::select('id', 'user_id', 'title', 'slug', 'location', 'end_date', 'image', 'target_dana', 'category_id', 'created_at')
            ->with('category')
            ->whereIsActive(1)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        foreach($programs as $program) {
            $date = Carbon::parse($program->end_date . ' 23:59:00');
            $now = Carbon::now();

            $program->count_day = $date->diffInDays($now);
        }
        
        return view('pages.program.index')
            ->with('programs', $programs);
    }

    public function detail($slug)
    {
        return view('pages.program.detail-program');
    }
}
