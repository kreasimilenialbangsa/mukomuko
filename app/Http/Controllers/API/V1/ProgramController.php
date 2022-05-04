<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin\Program;
use App\Models\Admin\ProgramCategory;
use App\Models\Admin\ProgramNews;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function all(Request $request)
    {
        $programs = Program::select('id', 'user_id', 'title', 'slug', 'location', 'end_date', 'image', 'target_dana', 'category_id', 'created_at', 'is_urgent')
            ->with('category')
            ->withSum('donate', 'total_donate')
            ->whereIsActive(1)
            ->when(isset($request->search), function ($q) use ($request) {
                $q->where('title', 'LIKE', '%' . $request->search . '%');
            })
            ->when(isset($request->category), function ($q) use ($request) {
                return $q->whereCategoryId($request->category);
            })
            ->when(isset($request->is_urgent), function ($q) use ($request) {
                $q->whereIsUrgent($request->is_urgent == 1 ? 1 : 0)->orderBy('is_urgent', 'desc');
            })
            ->orderBy('id', 'desc')
            ->paginate(isset($request->limit) ? $request->limit : 12);

        if (empty($programs)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404);
        }

        foreach ($programs as $program) {
            $date = Carbon::parse($program->end_date . ' 23:59:00');
            $now = Carbon::now();

            $program->count_day = $program->end_date < date('Y-m-d') ? 0 : $date->diffInDays($now);
        }

        return response()->json([
            'status' => true,
            'success' => 'success',
            'data' => $programs
        ], 200);
    }


    public function detail(Request $request, $id)
    {
        $program = Program::select('id', 'user_id', 'title', 'slug', 'description', 'location', 'end_date', 'image', 'target_dana', 'category_id', 'created_at', 'is_urgent')
            ->whereId($id)
            ->with(['user', 'category', 'news'])
            ->withCount('donate')
            ->withSum('donate', 'total_donate')
            ->whereIsActive(1)
            ->first();

        if (empty($program)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404);
        }

        $date = Carbon::parse($program->end_date . ' 23:59:00');
        $now = Carbon::now();

        $program->count_day = $program->end_date < date('Y-m-d') ? 0 : $date->diffInDays($now);

        $program->description = str_replace('/storage/', env('APP_URL').'/storage/', $program->description);

        foreach($program->news as $news) {
            $news['description'] = $news['description'] = str_replace('/storage/', env('APP_URL').'/storage/', $news['description']);
        }

        return response()->json([
            'status' => true,
            'success' => 'success',
            'data' => $program
        ], 200);
    }

    public function latestNews(Request $request, $program_id)
    {
        $latestNews = ProgramNews::select('id', 'user_id', 'program_id', 'description', 'created_at')
            ->whereProgramId($program_id)
            ->orderBy('id', 'desc')
            ->get();

        if (empty($latestNews)) {
            return response()->json([
                'status' => false,
                'success' => 'data not found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'status' => true,
            'success' => 'success',
            'data' => $latestNews
        ], 200);
    }

    public function category(Request $request)
    {
        $categories = ProgramCategory::select('id', 'name', 'slug')->orderBy('name', 'asc')->get();

        if (empty($categories)) {
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
