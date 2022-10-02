<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'admin.pages.users.datatables_actions')
            ->addIndexColumn()
            ->editColumn('is_active', 'admin.layouts.toggle_active')
            ->editColumn('created_at', '{{ date("d/m/Y", strtotime($created_at)) }}')
            // ->addColumn('qrcode', '{!! $is_member == 1 ? QrCode::size(75)->generate(route("profile.show", $id)) : "-" !!}')
            ->rawColumns(['is_active', 'qrcode', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()
            ->with('role_user.role', 'desa')
            ->whereIsMember(request()->segment(3) == 'members' ? 1 : 0)
            ->select('users.*')->where('users.id', '<>', Auth::user()->id);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => 'Aksi'])
            ->parameters([
                // 'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    
                    ['extend' => 'export', 'className' => 'btn btn-primary no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-primary no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-primary no-corner',],
                ],
                'scrollX' => true
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'name' => ['className' => 'text-center', 'title' => 'Nama'],
            'email' => ['className' => 'text-center'],
            'role_user.role.name' => ['defaultContent' => 'Not set', 'title' => 'Role', 'name'=> 'role_user.role.name', 'className' => 'text-center'],
            'desa.name' => ['defaultContent' => 'Not set', 'title' => 'Wilayah', 'name'=> 'desa.name', 'data' => 'desa.name', 'className' => 'text-center'],
            'created_at' => ['className' => 'text-center', 'title' => 'Tgl Pembuatan'],
            'is_active' => ['className' => 'text-center', 'title' => 'Aktif'],
            // 'qrcode' => ['className' => 'text-center', 'title' => 'QRcode']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users_datatable_' . time();
    }
}
