<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\GalleryDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateGalleryRequest;
use App\Http\Requests\Admin\UpdateGalleryRequest;
use App\Repositories\Admin\GalleryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Str;
use File;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Response;

class GalleryController extends AppBaseController
{
    /** @var GalleryRepository $galleryRepository*/
    private $galleryRepository;

    public function __construct(GalleryRepository $galleryRepo)
    {
        $this->galleryRepository = $galleryRepo;
    }

    /**
     * Display a listing of the Gallery.
     *
     * @param GalleryDataTable $galleryDataTable
     *
     * @return Response
     */
    public function index(GalleryDataTable $galleryDataTable)
    {
        return $galleryDataTable->render('admin.pages.galleries.index');
    }

    /**
     * Show the form for creating a new Gallery.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.galleries.create');
    }

    /**
     * Store a newly created Gallery in storage.
     *
     * @param CreateGalleryRequest $request
     *
     * @return Response
     */
    public function store(CreateGalleryRequest $request)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            // 'description' => $request->description,
            'type' => $request->type,
            'is_active' => isset($request->is_active) ? $request->is_active : 0
        ];

        if($request->hasFile('content') && $request->type == 'image') {
            $request->validate([
                'image' => 'mimes:jpeg,png|max:1014',
            ]);

            $file = $request->file('content');
            $fileName = Str::slug($request->title).'_'.uniqid() . '.' . $file->getClientOriginalExtension();
            Storage::put('public/gallery/'.$fileName, File::get($file));

            $input['content'] = '/gallery/'.$fileName;

        } else {
            $input['content'] = $request->content;
        }

        $gallery = $this->galleryRepository->create($input);

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.galleries.index'));
    }

    /**
     * Display the specified Gallery.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gallery = $this->galleryRepository->find($id);

        if (empty($gallery)) {
            Flash::error('Gallery not found');

            return redirect(route('admin.galleries.index'));
        }

        return view('admin.pages.galleries.show')->with('gallery', $gallery);
    }

    /**
     * Show the form for editing the specified Gallery.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gallery = $this->galleryRepository->find($id);

        if (empty($gallery)) {
            Flash::error('Gallery not found');

            return redirect(route('admin.galleries.index'));
        }

        return view('admin.pages.galleries.edit')->with('gallery', $gallery);
    }

    /**
     * Update the specified Gallery in storage.
     *
     * @param int $id
     * @param UpdateGalleryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGalleryRequest $request)
    {
        $gallery = $this->galleryRepository->find($id);

        if (empty($gallery)) {
            Flash::error('Gallery not found');

            return redirect(route('admin.galleries.index'));
        }

        $input = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            // 'description' => $request->description,
            'type' => $request->type,
            'is_active' => isset($request->is_active) ? $request->is_active : 0
        ];

        if(isset($request->content)) {
            if($request->hasFile('content') && $request->type == 'image') {
                $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
    
                $file = $request->file('content');
                $fileName = Str::slug($request->title).'_'.uniqid() . '.' . $file->getClientOriginalExtension();
                Storage::put('public/gallery/'.$fileName, File::get($file));
    
                $input['content'] = '/gallery/'.$fileName;
            } else {
                $input['content'] = $request->content;
            }
        }


        $gallery = $this->galleryRepository->update($input, $id);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.galleries.index'));
    }

    /**
     * Remove the specified Gallery from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gallery = $this->galleryRepository->find($id);

        if (empty($gallery)) {
            Flash::error('Gallery not found');

            return redirect(route('admin.galleries.index'));
        }

        $this->galleryRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.galleries.index'));
    }

    public function toggleActive(Request $request)
    {
        $input = [
            'is_active' => $request->val
        ];

        $program = $this->galleryRepository->update($input, $request->id);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah'
        ], 200);
    }
}
