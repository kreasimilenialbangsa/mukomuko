<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateDonateRequest;
use App\Http\Requests\Admin\UpdateDonateRequest;
use App\Repositories\Admin\DonateRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Donate;
use App\Models\Admin\Ziswaf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;
use Yajra\DataTables\DataTables;

class ZiswafDonateController extends AppBaseController
{
    /** @var DonateRepository $donateRepository*/
    private $donateRepository;

    public function __construct(DonateRepository $donateRepo)
    {
        $this->donateRepository = $donateRepo;
    }

    /**
     * Display a listing of the Donate.
     *
     * @param DonateDataTable $donateDataTable
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $ziswaf = Ziswaf::select('id', 'title', 'category_id', 'created_at')
                ->whereCategoryId($request->category)
                ->withCount('donate')
                ->withSum('donate', 'total_donate')
                ->whereRelation('donate', 'location_id', Auth::user()->location_id)
                ->get();

            return DataTables::of($ziswaf)
                ->addColumn('action', 'admin.pages.ziswaf_donates.datatables_actions')
                ->editColumn('donate_sum_total_donate', '{{ "Rp " . number_format($donate_sum_total_donate,0,",",".") }}')
                ->make(true);

        }
        
        return view('admin.pages.ziswaf_donates.index');
    }

    /**
     * Show the form for creating a new Donate.
     *
     * @return Response
     */
    public function create($id)
    {
        $program = Ziswaf::whereId($id)
            ->with('category')
            ->withSum('donate', 'total_donate')
            ->firstOrFail();

        return view('admin.pages.ziswaf_donates.create');
    }

    /**
     * Store a newly created Donate in storage.
     *
     * @param CreateDonateRequest $request
     *
     * @return Response
     */
    public function store($id, CreateDonateRequest $request)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'type' => '\App\Models\Admin\Ziswaf',
            'type_id' => $id,
            'location_id' => Auth::user()->location_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'total_donate' => $request->total_donate,
            'is_anonim' => isset($request->is_anonim) ? $request->is_anonim : 0,
            'is_confirm' => 0
        ];

        $donate = $this->donateRepository->create($input);

        Flash::success('Donate saved successfully.');

        return redirect(route('admin.donatur.ziswaf.index'));
    }

    /**
     * Display the specified Donate.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Request $request, $id)
    {
        if($request->ajax()) {
            $donatur = Donate::select('id', 'type_id', 'name', 'email', 'phone', 'total_donate', 'is_confirm', 'created_at')
                ->with('ziswaf')
                ->whereType('\App\Models\Admin\Ziswaf')
                ->whereTypeId($id)
                ->whereUserId(Auth::user()->id)
                ->get();

            return DataTables::of($donatur)
                ->addColumn('action', 'admin.pages.ziswaf_donates.donatur.datatables_actions')
                ->editColumn('total_donate', '{{ "Rp " . number_format($total_donate,0,",",".") }}')
                ->editColumn('created_at', '{{ date("d/M/Y H:i", strtotime($created_at)) }}')
                ->editColumn('is_confirm', function($q) {
                    $status = $q->is_confirm == 1 ? '<span class="badge badge-primary">Approve</span>' : '<span class="badge badge-warning">Pending</span>';
                    return $status;
                })
                ->rawColumns(['is_confirm', 'action'])
                ->make(true);
        }

        return view('admin.pages.ziswaf_donates.donatur.index');
    }

    /**
     * Show the form for editing the specified Donate.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $donate = $this->donateRepository->find($id);

        if (empty($donate)) {
            Flash::error('Donate not found');

            return redirect(route('admin.donates.index'));
        }

        return view('admin.pages.ziswaf_donates.edit')->with('donate', $donate);
    }

    /**
     * Update the specified Donate in storage.
     *
     * @param int $id
     * @param UpdateDonateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDonateRequest $request)
    {
        $donate = $this->donateRepository->find($id);

        if (empty($donate)) {
            Flash::error('Donate not found');

            return redirect(route('admin.donates.index'));
        }

        $donate = $this->donateRepository->update($request->all(), $id);

        Flash::success('Donate updated successfully.');

        return redirect(route('admin.donates.index'));
    }

    /**
     * Remove the specified Donate from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $donate = $this->donateRepository->find($id);

        if (empty($donate)) {
            Flash::error('Donate not found');

            return redirect(route('admin.donates.index'));
        }

        $this->donateRepository->delete($id);

        Flash::success('Donate deleted successfully.');

        return redirect(route('admin.donates.index'));
    }
}
