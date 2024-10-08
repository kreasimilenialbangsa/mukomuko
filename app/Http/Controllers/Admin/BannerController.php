<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\BannerDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateBannerRequest;
use App\Http\Requests\Admin\UpdateBannerRequest;
use App\Repositories\Admin\BannerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Str;
use File;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Response;

class BannerController extends AppBaseController
{
    /** @var BannerRepository $bannerRepository*/
    private $bannerRepository;

    public function __construct(BannerRepository $bannerRepo)
    {
        $this->bannerRepository = $bannerRepo;
    }

    /**
     * Display a listing of the Banner.
     *
     * @param BannerDataTable $bannerDataTable
     *
     * @return Response
     */
    public function index(BannerDataTable $bannerDataTable)
    {
        return $bannerDataTable->render('admin.pages.banners.index');
    }

    /**
     * Show the form for creating a new Banner.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.banners.create');
    }

    /**
     * Store a newly created Banner in storage.
     *
     * @param CreateBannerRequest $request
     *
     * @return Response
     */
    public function store(CreateBannerRequest $request)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => 'description',
            'link_url' => $request->link_url,
            'is_active' => isset($request->is_active) ? $request->is_active : 0,
        ];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpeg,png|max:1014',
            ]);

            $file = $request->file('image');
            $fileName = Str::slug($request->title).'_'.uniqid() . '.' . $file->getClientOriginalExtension();
            Storage::put('public/banner/'.$fileName, File::get($file));

            $input['image'] = '/banner/'.$fileName;
        }

        $banner = $this->bannerRepository->create($input);

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.banners.index'));
    }

    /**
     * Display the specified Banner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            Flash::error('Banner not found');

            return redirect(route('admin.banners.index'));
        }

        return view('admin.pages.banners.show')->with('banner', $banner);
    }

    /**
     * Show the form for editing the specified Banner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            Flash::error('Banner not found');

            return redirect(route('admin.banners.index'));
        }

        return view('admin.pages.banners.edit')->with('banner', $banner);
    }

    /**
     * Update the specified Banner in storage.
     *
     * @param int $id
     * @param UpdateBannerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBannerRequest $request)
    {
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            Flash::error('Banner not found');

            return redirect(route('admin.banners.index'));
        }

        $input = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => 'description',
            'link_url' => $request->link_url,
            'is_active' => isset($request->is_active) ? $request->is_active : 0,
        ];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpeg,png|max:1014',
            ]);

            $file = $request->file('image');
            $fileName = Str::slug($request->title).'_'.uniqid() . '.' . $file->getClientOriginalExtension();
            Storage::put('public/banner/'.$fileName, File::get($file));

            $input['image'] = '/banner/'.$fileName;
        }

        $banner = $this->bannerRepository->update($input, $id);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.banners.index'));
    }

    /**
     * Remove the specified Banner from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            Flash::error('Banner not found');

            return redirect(route('admin.banners.index'));
        }

        $this->bannerRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.banners.index'));
    }

    public function toggleActive(Request $request)
    {
        $input = [
            'is_active' => $request->val
        ];

        $program = $this->bannerRepository->update($input, $request->id);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah'
        ], 200);
    }
}
