<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ProgramDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateProgramRequest;
use App\Http\Requests\Admin\UpdateProgramRequest;
use App\Repositories\Admin\ProgramRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\ProgramCategory;
use App\Models\Admin\Kecamatan;
use App\Models\Admin\ProgramNews;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Str;
use File;
use Flash;
use Response;

class ProgramController extends AppBaseController
{
    /** @var ProgramRepository $programRepository*/
    private $programRepository;

    public function __construct(ProgramRepository $programRepo)
    {
        $this->programRepository = $programRepo;
    }

    /**
     * Display a listing of the Program.
     *
     * @param ProgramDataTable $programDataTable
     *
     * @return Response
     */
    public function index(ProgramDataTable $programDataTable)
    {
        return $programDataTable->render('admin.pages.programs.index');
    }

    /**
     * Show the form for creating a new Program.
     *
     * @return Response
     */
    public function create()
    {
        $category = ProgramCategory::pluck('name', 'id');
        $location = Kecamatan::pluck('name', 'id');

        return view('admin.pages.programs.create')
            ->with('category', $category)
            ->with('location', $location);
    }

    /**
     * Store a newly created Program in storage.
     *
     * @param CreateProgramRequest $request
     *
     * @return Response
     */
    public function store(CreateProgramRequest $request)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
            'location' => $request->location,
            'target_dana' => $request->target_dana,
            'end_date' => $request->end_date,
            'category_id' => $request->category_id,
            'is_urgent' => isset($request->is_urgent) ? $request->is_urgent : 0,
            'is_active' => isset($request->is_active) ? $request->is_active : 0
        ];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpeg,png|max:1014',
            ]);

            $file = $request->file('image');
            $fileName = Str::slug($request->title).'_'.uniqid() . '.' . $file->getClientOriginalExtension();
            Storage::put('public/program/'.$fileName, File::get($file));

            $input['image'] = '/program/'.$fileName;
        }

        $program = $this->programRepository->create($input);

        Flash::success('Program saved successfully.');

        return redirect(route('admin.programs.index'));
    }

    /**
     * Display the specified Program.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $program = $this->programRepository->find($id);

        if (empty($program)) {
            Flash::error('Program not found');

            return redirect(route('admin.programs.index'));
        }

        return view('admin.pages.programs.show')->with('program', $program);
    }

    /**
     * Show the form for editing the specified Program.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $program = $this->programRepository->find($id);

        if (empty($program)) {
            Flash::error('Program not found');

            return redirect(route('admin.programs.index'));
        }

        $category = ProgramCategory::pluck('name', 'id');
        $location = Kecamatan::pluck('name', 'id');

        return view('admin.pages.programs.edit')
            ->with('program', $program)
            ->with('category', $category)
            ->with('location', $location);
    }

    /**
     * Update the specified Program in storage.
     *
     * @param int $id
     * @param UpdateProgramRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProgramRequest $request)
    {
        $program = $this->programRepository->find($id);

        if (empty($program)) {
            Flash::error('Program not found');

            return redirect(route('admin.programs.index'));
        }

        $input = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
            'location' => $request->location,
            'target_dana' => $request->target_dana,
            'end_date' => $request->end_date,
            'category_id' => $request->category_id,
            'is_urgent' => isset($request->is_urgent) ? $request->is_urgent : 0,
            'is_active' => isset($request->is_active) ? $request->is_active : 0
        ];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpeg,png|max:1014',
            ]);

            $file = $request->file('image');
            $fileName = Str::slug($request->title).'_'.uniqid() . '.' . $file->getClientOriginalExtension();
            Storage::put('public/program/'.$fileName, File::get($file));

            $input['image'] = '/program/'.$fileName;
        }

        $program = $this->programRepository->update($input, $id);

        if(isset($request->news)) {
            foreach($request->news as $key => $news) {
                if(isset($news['description'])) {
                    $dataNews = [
                        'user_id' => Auth::user()->id,
                        'program_id' => $program->id,
                        'description' => $news['description']
                    ];

                    if(isset($news['id'])) {
                        // Update news
                        ProgramNews::whereId($news['id'])->update($dataNews);
                    } else {
                        // Create news
                        ProgramNews::create($dataNews);
                    }
                }
            }

            // Delete news
            if (isset($request->del)) {
                $del = explode(",", $request->del);
                
                foreach ($del as $key => $id) {
                    ProgramNews::whereId($id)->delete();
                }
            }
        }

        Flash::success('Program updated successfully.');

        return redirect(route('admin.programs.index'));
    }

    /**
     * Remove the specified Program from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $program = $this->programRepository->find($id);

        if (empty($program)) {
            Flash::error('Program not found');

            return redirect(route('admin.programs.index'));
        }

        $this->programRepository->delete($id);

        Flash::success('Program deleted successfully.');

        return redirect(route('admin.programs.index'));
    }
}
