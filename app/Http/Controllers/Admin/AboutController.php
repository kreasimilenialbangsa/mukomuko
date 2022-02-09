<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AboutDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateAboutRequest;
use App\Http\Requests\Admin\UpdateAboutRequest;
use App\Repositories\Admin\AboutRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
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
        $input = $request->all();

        $about = $this->aboutRepository->create($input);

        Flash::success('About saved successfully.');

        return redirect(route('admin.abouts.index'));
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

        $about = $this->aboutRepository->update($request->all(), $id);

        Flash::success('About updated successfully.');

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

        Flash::success('About deleted successfully.');

        return redirect(route('admin.abouts.index'));
    }
}
