<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\NewsDataTable;
use App\Helpers\FCM;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateNewsRequest;
use App\Http\Requests\Admin\UpdateNewsRequest;
use App\Repositories\Admin\NewsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\NewsCategory;
use App\Models\Admin\NewsImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Str;
use File;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Response;

class NewsController extends AppBaseController
{
    /** @var NewsRepository $newsRepository*/
    private $newsRepository;

    public function __construct(NewsRepository $newsRepo)
    {
        $this->newsRepository = $newsRepo;
    }

    /**
     * Display a listing of the News.
     *
     * @param NewsDataTable $newsDataTable
     *
     * @return Response
     */
    public function index(NewsDataTable $newsDataTable)
    {
        return $newsDataTable->render('admin.pages.news.index');
    }

    /**
     * Show the form for creating a new News.
     *
     * @return Response
     */
    public function create()
    {
        $category = NewsCategory::pluck('name', 'id');
        return view('admin.pages.news.create')
            ->with('category', $category);
    }

    /**
     * Store a newly created News in storage.
     *
     * @param CreateNewsRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsRequest $request)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category_id,
            'is_active' => isset($request->is_active) ? $request->is_active : 0,
            'is_highlight' => isset($request->is_highlight) ? $request->is_highlight : 0,
            'date_news' => $request->date_news . ' ' . date('H:i:s'),
        ];

        $news = $this->newsRepository->create($input);

        if($request->images) {
            foreach($request->images as $key => $images) {
                $file = $images['file'];
                $fileName = Str::slug($request->title).'_'.uniqid() . '.' . $file->getClientOriginalExtension();
                Storage::put('public/news/'.$fileName, File::get($file));
                $imageFile = '/news/'.$fileName;

                $dataImage = [
                    'file' => $imageFile,
                    'news_id' => $news->id
                ];

                $image = NewsImage::create($dataImage);

                if($key == 0) {
                    $thumbnail = $image;
                }
            }
        }

        if($request->broadcast == 1) {
            FCM::broadcast([
                'title' => $news->title,
                'body' => strip_tags($news->content),
                'image' => isset($thumbnail) ? env('APP_URL') .'/storage'.$thumbnail->file : null
            ]);
        }

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.news.index'));
    }

    /**
     * Display the specified News.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('admin.news.index'));
        }

        return view('admin.pages.news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified News.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('admin.news.index'));
        }

        $category = NewsCategory::pluck('name', 'id');

        return view('admin.pages.news.edit')
        ->with('category', $category)
            ->with('news', $news);
    }

    /**
     * Update the specified News in storage.
     *
     * @param int $id
     * @param UpdateNewsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsRequest $request)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('admin.news.index'));
        }

        $input = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category_id,
            'is_active' => isset($request->is_active) ? $request->is_active : 0,
            'is_highlight' => isset($request->is_highlight) ? $request->is_highlight : 0,
            'date_news' => $request->date_news . ' ' . date('H:i:s'),
        ];

        $news = $this->newsRepository->update($input, $id);

        if($request->images) {
            foreach($request->images as $key => $images) {
                if (isset($images['file'])) {
                    $file = $images['file'];
                    $fileName = Str::slug($request->title).'_'.uniqid() . '.' . $file->getClientOriginalExtension();
                    Storage::put('public/news/'.$fileName, File::get($file));
                    $imageFile = '/news/'.$fileName;

                    $dataImage = [
                        'file' => $imageFile,
                        'news_id' => $news->id
                    ];

                    if(isset($images['id'])) {
                        // Update images
                        NewsImage::whereId($images['id'])->update($dataImage);
                    } else {
                        // Save images
                        NewsImage::create($dataImage);
                    }
                }
                
                // Delete images
                if (isset($request->del)) {
                    $del = explode(",", $request->del);
                    
                    foreach ($del as $key => $id) {
                        NewsImage::whereId($id)->delete();
                    }
                }
            }
        }

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.news.index'));
    }

    /**
     * Remove the specified News from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('admin.news.index'));
        }

        $this->newsRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.news.index'));
    }

    public function toggleActive(Request $request)
    {
        $input = [
            'is_active' => $request->val
        ];

        $program = $this->newsRepository->update($input, $request->id);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah'
        ], 200);
    }

    public function toggleHighlight(Request $request)
    {
        $input = [
            'is_highlight' => $request->val
        ];

        $program = $this->newsRepository->update($input, $request->id);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah'
        ], 200);
    }
}
