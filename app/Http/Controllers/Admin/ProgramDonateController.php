<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateDonateRequest;
use App\Http\Requests\Admin\UpdateDonateRequest;
use App\Repositories\Admin\DonateRepository;
use Laracasts\Flash\Flash;
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
                ->withCount(['my_donates' => function($query) {
                    $query->where('user_id', Auth::user()->id);
                }])
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
                ->editColumn('created_at', '{{ date("d/m/Y", strtotime($created_at)) }}')
                ->make(true);
        }

        $donateHistory = Donate::select('id', 'user_id', 'type_id', 'location_id', 'name', 'email', 'phone', 'total_donate', 'date_donate', 'is_confirm', 'created_at')
            ->whereUserId(Auth::user()->id)
            ->orderBy('date_donate', 'desc')
            ->paginate(12);
        
        return view('admin.pages.program_donates.index')
            ->with('donateHistory', $donateHistory);
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|min:10',
            'total_donate' => 'min:5',
            'date_donate' => 'required'
        ],[
            'name.required' => 'Bagian isian nama wajib diisi.',
            'phone.required' => 'Bagian isian telepon wajib diisi.',
            'total_donate.min' => 'Minimal donasi adalah Rp 1.000',
            'date_donate.required' => 'Bagian isian tangal donasi wajib diisi.'
        ]);

        $input = [
            'user_id' => Auth::user()->id,
            'order_id' => 'PROGRAM-'.time(),
            'type' => '\App\Models\Admin\Program',
            'type_id' => $id,
            'location_id' => Auth::user()->location_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'total_donate' => str_replace('.', '', $request->total_donate),
            'date_donate' => $request->date_donate . ' ' . date('H:i:s'),
            'is_anonim' => isset($request->is_anonim) ? $request->is_anonim : 0,
            'is_confirm' => 0
        ];

        $donate = $this->donateRepository->create($input);

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.donatur.program.list', $donate->type_id));
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
            $donatur = Donate::select('id', 'type_id', 'name', 'email', 'phone', 'total_donate', 'date_donate', 'is_anonim', 'is_confirm', 'created_at')
                ->with('program')
                ->whereType('\App\Models\Admin\Program')
                ->whereTypeId($id)
                ->whereUserId(Auth::user()->id)
                ->get();

            return DataTables::of($donatur)
                ->addColumn('action', 'admin.pages.program_donates.donatur.datatables_actions')
                ->editColumn('name', function($q) {
                    return $q->is_anonim == 1 ? 'Hamba Allah' : $q->name;
                })
                ->editColumn('total_donate', '{{ "Rp " . number_format($total_donate,0,",",".") }}')
                ->editColumn('date_donate', '{{ date("d/m/Y H:i", strtotime($date_donate)) }}')
                ->editColumn('is_confirm', function($q) {
                    $status = $q->is_confirm == 1 ?'<span class="badge badge-primary">Disetujui</span>' : ($status = $q->is_confirm == 2 ?'<span class="badge badge-danger">Ditolak</span>' : '<span class="badge badge-warning">Pending</span>') ;
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

        if (empty($donate) || $donate->is_confirm == 1) {
            Flash::error('Donate not found');

            return redirect(route('admin.donatur.program.list', $donate->type_id));
        }

        $program = Program::whereId($donate->type_id)
            ->with('category')
            ->withSum('donate', 'total_donate')
            ->firstOrFail();
    
        $date = Carbon::parse($program->end_date . ' 23:59:00');
        $now = Carbon::now();

        $program->count_day = $date->diffInDays($now);

        return view('admin.pages.program_donates.edit')
            ->with('program', $program)
            ->with('donate', $donate);
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

            return redirect(route('admin.donatur.program.list', $donate->type_id));
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|min:10',
            'total_donate' => 'min:4',
            'date_donate' => 'required'
        ],[
            'name.required' => 'Bagian isian nama wajib diisi.',
            'phone.required' => 'Bagian isian telepon wajib diisi.',
            'total_donate.min' => 'Minimal donasi adalah Rp 10.000',
            'date_donate.required' => 'Bagian isian tangal donasi wajib diisi.'
        ]);

        $input = [
            'user_id' => Auth::user()->id,
            // 'order_id' => 'PROGRAM-'.time(),
            'type' => '\App\Models\Admin\Program',
            'type_id' => $donate->type_id,
            'location_id' => Auth::user()->location_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'total_donate' => str_replace('.', '', $request->total_donate),
            'date_donate' => $request->date_donate . ' ' . date('H:i:s'),
            'is_anonim' => isset($request->is_anonim) ? $request->is_anonim : 0,
            'is_confirm' => 0
        ];

        $this->donateRepository->update($input, $id);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.donatur.program.list', $donate->type_id));
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
