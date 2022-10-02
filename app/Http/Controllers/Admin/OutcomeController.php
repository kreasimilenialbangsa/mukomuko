<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\OutcomeDataTable;
use App\Exports\Excel\LaporanPengeluaranDanaExport;
use App\Http\Requests\Admin\CreateOutcomeRequest;
use App\Http\Requests\Admin\UpdateOutcomeRequest;
use App\Repositories\Admin\OutcomeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Desa;
use App\Models\Admin\Kecamatan;
use App\Models\Admin\Outcome;
use App\Models\Admin\OutcomeCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Response;
use Yajra\DataTables\DataTables;

class OutcomeController extends AppBaseController
{
    /** @var OutcomeRepository $outcomeRepository*/
    private $outcomeRepository;

    public function __construct(OutcomeRepository $outcomeRepo)
    {
        $this->outcomeRepository = $outcomeRepo;
    }

    /**
     * Display a listing of the Outcome.
     *
     * @param OutcomeDataTable $outcomeDataTable
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kecamatan = Kecamatan::select('id', 'name')
            ->whereParentId(0)
            ->whereIsActive(1)
            ->orderBy('name', 'asc')
            ->get();
        
        $desa = Kecamatan::select('id', 'name')
            ->where('parent_id', '<>', 0)
            ->whereIsActive(1)
            ->orderBy('name', 'asc')
            ->get();

        if($request->ajax()) {
            $outcomes = Outcome::select('outcomes.id', 'outcomes.user_id', 'outcomes.desa_id', 'outcomes.category_id', 'outcomes.description', 'outcomes.nominal', 'outcomes.date_outcome')
                ->join('locations', 'locations.id', 'outcomes.desa_id')
                ->with(['category', 'desa'])
                ->when(!empty($request->kecamatan), function($q) use($request) {
                    $q->where('locations.parent_id', $request->kecamatan);
                })
                ->when(!empty($request->desa), function($q) use($request) {
                    $q->where('locations.id', $request->desa);
                })
                ->when(true, function($q) use ($request) {
                    if(isset($request->from_date) && isset($request->to_date)) {
                        $q->whereBetween('date_outcome', [$request->from_date . ' 00:59:00', $request->to_date . ' 23:59:00']);
                    } else {
                        $q->whereBetween('date_outcome', [Carbon::now()->startOfMonth()->format('Y-m-d') . ' 00:59:00', Carbon::now()->endOfMonth()->format('Y-m-d') . ' 23:59:00']);
                    }
                })
                ->get();

            return DataTables::of($outcomes)
                ->addColumn('action', 'admin.pages.outcomes.datatables_actions')
                ->editColumn('date_outcome', '{{ date("d/m/Y H:i", strtotime($date_outcome)) }}')
                ->editColumn('nominal', '{{ "Rp " . number_format($nominal,0,",",".") }}')
                ->make(true);
        }
            
        return view('admin.pages.outcomes.index')
            ->with('kecamatan', $kecamatan)
            ->with('desa', $desa);
    }

    /**
     * Show the form for creating a new Outcome.
     *
     * @return Response
     */
    public function create()
    {
        $desa = Desa::where('parent_id', '>', 0)->pluck('name', 'id');
        $categories = OutcomeCategory::pluck('name', 'id');

        return view('admin.pages.outcomes.create')
            ->with('desa', $desa)
            ->with('categories', $categories);
    }

    /**
     * Store a newly created Outcome in storage.
     *
     * @param CreateOutcomeRequest $request
     *
     * @return Response
     */
    public function store(CreateOutcomeRequest $request)
    {
        $request->validate([
            'nominal' => 'min:4',
        ],[
            'nominal.min' => 'Minimal nominal adalah Rp 10.000',
        ]);

        $input = [
            'user_id' => Auth::user()->id,
            'desa_id' => $request->desa_id,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'nominal' => str_replace('.', '', $request->nominal),
            'date_outcome' => $request->date_outcome . ' ' . date('H:i:s')
        ];

        $outcome = $this->outcomeRepository->create($input);

        Session::flash('success', 'Data berhasil ditambah');

        return redirect(route('admin.outcomes.index'));
    }

    /**
     * Display the specified Outcome.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $outcome = $this->outcomeRepository->find($id);

        if (empty($outcome)) {
            Flash::error('Outcome not found');

            return redirect(route('admin.outcomes.index'));
        }

        return view('admin.pages.outcomes.show')->with('outcome', $outcome);
    }

    /**
     * Show the form for editing the specified Outcome.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $outcome = $this->outcomeRepository->find($id);

        if (empty($outcome)) {
            Flash::error('Outcome not found');

            return redirect(route('admin.outcomes.index'));
        }

        $desa = Desa::where('parent_id', '>', 0)->pluck('name', 'id');
        $categories = OutcomeCategory::pluck('name', 'id');

        return view('admin.pages.outcomes.edit')
            ->with('desa', $desa)
            ->with('categories', $categories)
            ->with('outcome', $outcome);
    }

    /**
     * Update the specified Outcome in storage.
     *
     * @param int $id
     * @param UpdateOutcomeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOutcomeRequest $request)
    {
        $outcome = $this->outcomeRepository->find($id);

        if (empty($outcome)) {
            Flash::error('Outcome not found');

            return redirect(route('admin.outcomes.index'));
        }

        $input = [
            'user_id' => Auth::user()->id,
            'desa_id' => $request->desa_id,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'nominal' => str_replace('.', '', $request->nominal),
            'date_outcome' => $request->date_outcome . ' ' . date('H:i:s')
        ];

        $outcome = $this->outcomeRepository->update($input, $id);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.outcomes.index'));
    }

    /**
     * Remove the specified Outcome from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $outcome = $this->outcomeRepository->find($id);

        if (empty($outcome)) {
            Flash::error('Outcome not found');

            return redirect(route('admin.outcomes.index'));
        }

        $this->outcomeRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.outcomes.index'));
    }

    public function export(Request $request)
    {   
        $outcomes = Outcome::select('outcomes.id', 'outcomes.user_id', 'outcomes.desa_id', 'outcomes.category_id', 'outcomes.description', 'outcomes.nominal', 'outcomes.date_outcome')
            ->join('locations', 'locations.id', 'outcomes.desa_id')
            ->with(['category', 'desa'])
            ->when(!empty($request->kecamatan), function($q) use($request) {
                $q->where('locations.parent_id', $request->kecamatan);
            })
            ->when(!empty($request->desa), function($q) use($request) {
                $q->where('locations.id', $request->desa);
            })
            ->when(true, function($q) use ($request) {
                if(isset($request->from_date) && isset($request->to_date)) {
                    $q->whereBetween('date_outcome', [$request->from_date . ' 00:59:00', $request->to_date . ' 23:59:00']);
                } else {
                    $q->whereBetween('date_outcome', [Carbon::now()->startOfMonth()->format('Y-m-d') . ' 00:59:00', Carbon::now()->endOfMonth()->format('Y-m-d') . ' 23:59:00']);
                }
            })
            ->get();

        $total['total_outcome'] = 0;
        foreach($outcomes as $key => $outcome) {
            $total['total_outcome'] += intval($outcome['nominal']);
        }

        $data = [
            "result" => $outcomes->toArray(),
            "total" => $total['total_outcome'],
            "date" => [
                "from_date" => date('Y-m-d', strtotime($request->from_date)),
                "to_date" => date('Y-m-d', strtotime($request->to_date))
            ]
        ];

        $filename = 'REKAPITULASI PENGELUARAN DANA_'. date('d-m-Y', strtotime($request->from_date)) . '_' . date('d-m-Y', strtotime($request->to_date)) .'.xlsx';

        return Excel::download(new LaporanPengeluaranDanaExport($data), $filename);
    }
}
