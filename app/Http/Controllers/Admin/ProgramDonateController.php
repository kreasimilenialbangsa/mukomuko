<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateDonateRequest;
use App\Http\Requests\Admin\UpdateDonateRequest;
use App\Repositories\Admin\DonateRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Donate;
use App\Models\Admin\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Response;
use Yajra\DataTables\DataTables;

class ProgramDonateController extends AppBaseController
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
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $programs = Program::select('id', 'title', 'category_id', 'end_date', 'target_dana', 'created_at')
                ->with('category')
                ->withCount('donate')
                ->withSum('donate', 'total_donate')
                ->whereIsActive(1)
                ->get();

            foreach($programs as $program) {
                $date = Carbon::parse($program->end_date . ' 23:59:00');
                $now = Carbon::now();
    
                $program->count_day = $program->end_date < date('Y-m-d') ? 0 : $date->diffInDays($now);
            }

            return $result = DataTables::of($programs)
                ->addColumn('action', 'admin.pages.program_donates.datatables_actions')
                ->editColumn('donate_sum_total_donate', '{{ "Rp " . number_format($donate_sum_total_donate,0,",",".") }}')
                ->editColumn('created_at', '{{ date("d/M/Y", strtotime($created_at)) }}')
                ->make(true);
        }
        
        return view('admin.pages.program_donates.index');
    }

    /**
     * Show the form for creating a new Donate.
     *
     * @return Response
     */
    public function create($id)
    {
        $program = Program::whereId($id)
            ->with('category')
            ->withSum('donate', 'total_donate')
            ->firstOrFail();
    
        $date = Carbon::parse($program->end_date . ' 23:59:00');
        $now = Carbon::now();

        $program->count_day = $date->diffInDays($now);
        
        return view('admin.pages.program_donates.create')
            ->with('program', $program);
    }

    /**
     * Store a newly created Donate in storage.
     *
     * @param CreateDonateRequest $request
     *
     * @return Response
     */
    public function store(CreateDonateRequest $request, $id)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'type' => '\App\Models\Admin\Program',
            'type_id' => $id,
            'location_id' => Auth::user()->location_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'total_donate' => str_replace('.', '', $request->total_donate),
            'is_anonim' => isset($request->is_anonim) ? $request->is_anonim : 0,
            'is_confirm' => 0
        ];

        $donate = $this->donateRepository->create($input);

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.donatur.program.index', $id));
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
                ->with('program')
                ->whereType('\App\Models\Admin\Program')
                ->whereTypeId($id)
                ->whereUserId(Auth::user()->id)
                ->get();

            return DataTables::of($donatur)
                ->addColumn('action', 'admin.pages.program_donates.donatur.datatables_actions')
                ->editColumn('total_donate', '{{ "Rp " . number_format($total_donate,0,",",".") }}')
                ->editColumn('created_at', '{{ date("d/M/Y H:i", strtotime($created_at)) }}')
                ->editColumn('is_confirm', function($q) {
                    $status = $q->is_confirm == 1 ? '<span class="badge badge-primary">Approve</span>' : '<span class="badge badge-warning">Pending</span>';
                    return $status;
                })
                ->rawColumns(['is_confirm', 'action'])
                ->make(true);
        }

        return view('admin.pages.program_donates.donatur.index');
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

            return redirect(route('admin.donatur.program.list', $id));
        }

        return view('admin.pages.program_donates.edit')->with('donate', $donate);
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

            return redirect(route('admin.donatur.program.list'));
        }

        $donate = $this->donateRepository->update($request->all(), $id);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.donatur.program.list', $id));
    }

    /**
     * Remove the specified Donate from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($type_id, $id)
    {
        $donate = $this->donateRepository->find($id);

        if (empty($donate)) {
            Flash::error('Donate not found');

            return redirect(route('admin.donatur.program.list'));
        }

        $this->donateRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.donatur.program.list', $type_id));
    }
}
