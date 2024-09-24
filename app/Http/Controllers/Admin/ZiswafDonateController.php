<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateDonateRequest;
use App\Http\Requests\Admin\UpdateDonateRequest;
use App\Repositories\Admin\DonateRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Desa;
use App\Models\Admin\Donate;
use App\Models\Admin\Ziswaf;
use App\Models\Admin\ZiswafCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
                ->withSum(['donate' => function($query) {
                    if(Auth::user()->hasRole('SuperAdmin')) {
                        $query->where('user_id', Auth::user()->id)->orWhere('parent_user', Auth::user()->id);
                    } else {
                        $query->where('location_id', Auth::user()->location_id)->where('user_id', Auth::user()->id);
                    }
                }], 'total_donate')
                ->withCount(['donate' => function($query) {
                    if(Auth::user()->hasRole('SuperAdmin')) {
                        $query->where('user_id', Auth::user()->id)->orWhere('parent_user', Auth::user()->id);
                    } else {
                        $query->where('location_id', Auth::user()->location_id)->where('user_id', Auth::user()->id);
                    }
                }])
                ->withCount(['my_donates' => function($query) {
                    if(Auth::user()->hasRole('SuperAdmin')) {
                        $query->where('user_id', Auth::user()->id)->orWhere('parent_user', Auth::user()->id);
                    } else {
                        $query->where('location_id', Auth::user()->location_id)->where('user_id', Auth::user()->id);
                    }
                }])
                ->get();

            return DataTables::of($ziswaf)
                ->addColumn('action', 'admin.pages.ziswaf_donates.datatables_actions')
                ->editColumn('donate_sum_total_donate', '{{ "Rp " . number_format($donate_sum_total_donate,0,",",".") }}')
                ->make(true);

        }

        $ziswafCategories = ZiswafCategory::select('id', 'name', 'slug', 'created_at')
            ->whereIsActive(1)
            ->get();
        
        return view('admin.pages.ziswaf_donates.index')
            ->with('ziswafCategories', $ziswafCategories);
    }

    /**
     * Show the form for creating a new Donate.
     *
     * @return Response
     */
    public function create($id, Request $request)
    {
        $desa = Desa::where('parent_id', '>', 0)->orderBy('name', 'asc')->pluck('name', 'id');

        if($request->ajax()) {
            $users = User::select('id', 'name')
                ->whereLocationId($request->type)
                ->when(isset($request->term), function($q) use($request) {
                    $q->where('name', 'LIKE', '%'.$request->term.'%');
                })
                ->orderBy('name', 'asc')
                ->get();
            return response()->json($users);
        }

        return view('admin.pages.ziswaf_donates.create')
            ->with('desa', $desa);
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
        if(Auth::user()->hasRole('SuperAdmin')) {
            $request->validate([
                'desa' => 'required',
                'akun' => 'required',
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required|min:10',
                'total_donate' => 'min:5',
                'date_donate' => 'required'
            ],[
                'desa.required' => 'Bagian isian desa wajib diisi.',
                'akun.required' => 'Bagian isian JPZISNU wajib diisi.',
                'name.required' => 'Bagian isian nama wajib diisi.',
                'phone.required' => 'Bagian isian telepon wajib diisi.',
                'total_donate.min' => 'Minimal donasi adalah Rp 1.000',
                'date_donate.required' => 'Bagian isian tangal donasi wajib diisi.'
            ]);
        } else {
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
        }

        $input = [
            'user_id' => Auth::user()->hasRole('SuperAdmin') ? $request->akun : Auth::user()->id,
            'order_id' => 'ZISWAF-'.time(),
            'type' => '\App\Models\Admin\Ziswaf',
            'type_id' => $id,
            'location_id' => Auth::user()->hasRole('SuperAdmin') ? $request->desa : Auth::user()->location_id,
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

        $type = '';
        if($id == 2) {
            $type = 'infaq';
        } else if($id == 3) {
            $type = 'wakaf';
        } else if($id == 4) {
            $type = 'shadaqah';
        } else {
            $type = 'zakat';
        }

        return redirect(route('admin.donatur.ziswaf.index').'#'.$type);
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
                ->with('ziswaf')
                ->whereType('\App\Models\Admin\Ziswaf')
                ->whereTypeId($id)
                ->whereUserId(Auth::user()->id)
                ->orWhere('parent_user', Auth::user()->id)
                ->get();

            return DataTables::of($donatur)
                ->addColumn('action', 'admin.pages.ziswaf_donates.donatur.datatables_actions')
                ->editColumn('name', function($q) {
                    return $q->is_anonim == 1 ? 'Hamba Allah' : $q->name;
                })
                ->editColumn('total_donate', '{{ "Rp " . number_format($total_donate,0,",",".") }}')
                ->editColumn('date_donate', '{{ date("d/m/Y H:i", strtotime($date_donate)) }}')
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
    public function edit($id, Request $request)
    {
        $donate = $this->donateRepository->find($id);

        if (empty($donate)) {
            Flash::error('Donate not found');

            return redirect(route('admin.donatur.ziswaf.list', $id));
        }

        if($request->ajax()) {
            $users = User::select('id', 'name')
                ->whereLocationId($request->type)
                ->when(isset($request->term), function($q) use($request) {
                    $q->where('name', 'LIKE', '%'.$request->term.'%');
                })
                ->orderBy('name', 'asc')
                ->get();
            return response()->json($users);
        }

        $desa = Desa::where('parent_id', '>', 0)->orderBy('name', 'asc')->pluck('name', 'id');

        return view('admin.pages.ziswaf_donates.edit')->with('donate', $donate)->with('desa', $desa);
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

            return redirect(route('admin.donatur.ziswaf.list', $id));
        }

        if(Auth::user()->hasRole('SuperAdmin')) {
            $request->validate([
                'desa' => 'required',
                'akun' => 'required',
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required|min:10',
                'total_donate' => 'min:4',
                'date_donate' => 'required'
            ],[
                'desa.required' => 'Bagian isian desa wajib diisi.',
                'akun.required' => 'Bagian isian JPZISNU wajib diisi.',
                'name.required' => 'Bagian isian nama wajib diisi.',
                'phone.required' => 'Bagian isian telepon wajib diisi.',
                'total_donate.min' => 'Minimal donasi adalah Rp 10.000',
                'date_donate.required' => 'Bagian isian tangal donasi wajib diisi.'
            ]);
        } else {
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
        }

        $input = [
            'user_id' => Auth::user()->hasRole('SuperAdmin') ? $request->akun : Auth::user()->id,
            // 'order_id' => 'ZISWAF-'.time(),
            'type' => '\App\Models\Admin\Ziswaf',
            'type_id' => $donate->type_id,
            'location_id' => Auth::user()->hasRole('SuperAdmin') ? $request->desa : Auth::user()->location_id ,
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

        return redirect(route('admin.donatur.ziswaf.list', $donate->type_id));
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

            return redirect(route('admin.donatur.ziswaf.list', $type_id));
        }

        $this->donateRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.donatur.ziswaf.list', $type_id));
    }
}
