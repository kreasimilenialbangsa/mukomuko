<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ZiswafDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateZiswafRequest;
use App\Http\Requests\Admin\UpdateZiswafRequest;
use App\Repositories\Admin\ZiswafRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\ZiswafCategory;
use Illuminate\Support\Facades\Auth;
use Response;

class ZiswafController extends AppBaseController
{
    /** @var ZiswafRepository $ziswafRepository*/
    private $ziswafRepository;

    public function __construct(ZiswafRepository $ziswafRepo)
    {
        $this->ziswafRepository = $ziswafRepo;
    }

    /**
     * Display a listing of the Ziswaf.
     *
     * @param ZiswafDataTable $ziswafDataTable
     *
     * @return Response
     */
    public function index(ZiswafDataTable $ziswafDataTable)
    {
        return $ziswafDataTable->render('admin.pages.ziswafs.index');
    }

    /**
     * Show the form for creating a new Ziswaf.
     *
     * @return Response
     */
    public function create()
    {
        $category = ZiswafCategory::pluck('name', 'id');
        return view('admin.pages.ziswafs.create')
            ->with('category', $category);
    }

    /**
     * Store a newly created Ziswaf in storage.
     *
     * @param CreateZiswafRequest $request
     *
     * @return Response
     */
    public function store(CreateZiswafRequest $request)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'is_active' => 1
        ];

        $ziswaf = $this->ziswafRepository->create($input);

        Flash::success('Ziswaf saved successfully.');

        return redirect(route('admin.ziswafs.index'));
    }

    /**
     * Display the specified Ziswaf.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ziswaf = $this->ziswafRepository->find($id);

        if (empty($ziswaf)) {
            Flash::error('Ziswaf not found');

            return redirect(route('admin.ziswafs.index'));
        }

        return view('admin.pages.ziswafs.show')->with('ziswaf', $ziswaf);
    }

    /**
     * Show the form for editing the specified Ziswaf.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ziswaf = $this->ziswafRepository->find($id);

        if (empty($ziswaf)) {
            Flash::error('Ziswaf not found');

            return redirect(route('admin.ziswafs.index'));
        }

        return view('admin.pages.ziswafs.edit')->with('ziswaf', $ziswaf);
    }

    /**
     * Update the specified Ziswaf in storage.
     *
     * @param int $id
     * @param UpdateZiswafRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateZiswafRequest $request)
    {
        $ziswaf = $this->ziswafRepository->find($id);

        if (empty($ziswaf)) {
            Flash::error('Ziswaf not found');

            return redirect(route('admin.ziswafs.index'));
        }

        $input = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'is_active' => 1
        ];

        $ziswaf = $this->ziswafRepository->update($input, $id);

        Flash::success('Ziswaf updated successfully.');

        return redirect(route('admin.ziswafs.index'));
    }

    /**
     * Remove the specified Ziswaf from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ziswaf = $this->ziswafRepository->find($id);

        if (empty($ziswaf)) {
            Flash::error('Ziswaf not found');

            return redirect(route('admin.ziswafs.index'));
        }

        $this->ziswafRepository->delete($id);

        Flash::success('Ziswaf deleted successfully.');

        return redirect(route('admin.ziswafs.index'));
    }
}
