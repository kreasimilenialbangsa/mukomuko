<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AboutDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateAboutRequest;
use App\Http\Requests\Admin\UpdateAboutRequest;
use App\Repositories\Admin\AboutRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Str;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Response;

class AboutController extends AppBaseController
{
    /** @var AboutRepository $aboutRepository*/
    private $aboutRepository;

    public function __construct(AboutRepository $aboutRepo)
    {
        $this->aboutRepository = $aboutRepo;
    }

    /**
     * Display a listing of the About.
     *
     * @param AboutDataTable $aboutDataTable
     *
     * @return Response
     */
    public function index(AboutDataTable $aboutDataTable)
    {
        return $aboutDataTable->render('admin.pages.abouts.index');
    }

    /**
     * Show the form for creating a new About.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.abouts.create');
    }

    /**
     * Store a newly created About in storage.
     *
     * @param CreateAboutRequest $request
     *
     * @return Response
     */
    public function store(CreateAboutRequest $request)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'is_active' => isset($request->is_active) ? $request->is_active : 0
        ];

        $about = $this->aboutRepository->create($input);

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.abouts.index'))->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified About.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $about = $this->aboutRepository->find($id);

        if (empty($about)) {
            Flash::error('About not found');

            return redirect(route('admin.abouts.index'));
        }

        return view('admin.pages.abouts.show')->with('about', $about);
    }

    /**
     * Show the form for editing the specified About.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $about = $this->aboutRepository->find($id);

        if (empty($about)) {
            Flash::error('About not found');

            return redirect(route('admin.abouts.index'));
        }

        return view('admin.pages.abouts.edit')->with('about', $about);
    }

    /**
     * Update the specified About in storage.
     *
     * @param int $id
     * @param UpdateAboutRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAboutRequest $request)
    {
        $about = $this->aboutRepository->find($id);

        if (empty($about)) {
            Flash::error('About not found');

            return redirect(route('admin.abouts.index'));
        }

        $input = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'is_active' => isset($request->is_active) ? $request->is_active : 0
        ];

        $about = $this->aboutRepository->update($input, $id);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.abouts.index'));
    }

    /**
     * Remove the specified About from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $about = $this->aboutRepository->find($id);

        if (empty($about)) {
            Flash::error('About not found');

            return redirect(route('admin.abouts.index'));
        }

        $this->aboutRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.abouts.index'));
    }

    public function toggleActive(Request $request)
    {
        $input = [
            'is_active' => $request->val
        ];

        $program = $this->aboutRepository->update($input, $request->id);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah'
        ], 200);
    }
}
