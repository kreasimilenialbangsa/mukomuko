<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\NewsCategoryDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateNewsCategoryRequest;
use App\Http\Requests\Admin\UpdateNewsCategoryRequest;
use App\Repositories\Admin\NewsCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Str;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Session;
use Response;

class NewsCategoryController extends AppBaseController
{
    /** @var NewsCategoryRepository $newsCategoryRepository*/
    private $newsCategoryRepository;

    public function __construct(NewsCategoryRepository $newsCategoryRepo)
    {
        $this->newsCategoryRepository = $newsCategoryRepo;
    }

    /**
     * Display a listing of the NewsCategory.
     *
     * @param NewsCategoryDataTable $newsCategoryDataTable
     *
     * @return Response
     */
    public function index(NewsCategoryDataTable $newsCategoryDataTable)
    {
        return $newsCategoryDataTable->render('admin.pages.news_categories.index');
    }

    /**
     * Show the form for creating a new NewsCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.news_categories.create');
    }

    /**
     * Store a newly created NewsCategory in storage.
     *
     * @param CreateNewsCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsCategoryRequest $request)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        $newsCategory = $this->newsCategoryRepository->create($input);
        
        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.category.news.index'));
    }

    /**
     * Display the specified NewsCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $newsCategory = $this->newsCategoryRepository->find($id);

        if (empty($newsCategory)) {
            Flash::error('News Category not found');

            return redirect(route('admin.category.news.index'));
        }

        return view('admin.pages.news_categories.show')->with('newsCategory', $newsCategory);
    }

    /**
     * Show the form for editing the specified NewsCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $newsCategory = $this->newsCategoryRepository->find($id);

        if (empty($newsCategory)) {
            Flash::error('News Category not found');

            return redirect(route('admin.category.news.index'));
        }

        return view('admin.pages.news_categories.edit')->with('newsCategory', $newsCategory);
    }

    /**
     * Update the specified NewsCategory in storage.
     *
     * @param int $id
     * @param UpdateNewsCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsCategoryRequest $request)
    {
        $newsCategory = $this->newsCategoryRepository->find($id);

        if (empty($newsCategory)) {
            Flash::error('News Category not found');

            return redirect(route('admin.category.news.index'));
        }

        $input = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        $newsCategory = $this->newsCategoryRepository->update($input, $id);

        Session::flash('success', 'Data berhasil dubah');

        return redirect(route('admin.category.news.index'));
    }

    /**
     * Remove the specified NewsCategory from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $newsCategory = $this->newsCategoryRepository->find($id);

        if (empty($newsCategory)) {
            Flash::error('News Category not found');

            return redirect(route('admin.category.news.index'));
        }

        $this->newsCategoryRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.category.news.index'));
    }
}
