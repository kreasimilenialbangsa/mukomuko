<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Desa;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class DesaDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.pages.desas.datatables_actions')
            ->editColumn('is_active', 'admin.layouts.toggle')
            ->rawColumns(['is_active', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Desa $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Desa $model)
    {
        return $model->newQuery()
            ->select('locations.*', 'loc.name as parent')
            ->join('locations as loc', 'locations.parent_id', 'loc.id')
            ->where('locations.parent_id', '<>', 0);
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
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'export', 'className' => 'btn btn-primary no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-primary no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-primary no-corner',],
                ],
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
            'loc.name' => ['title' => 'Kecamatan', 'className' => 'text-center', 'data' => 'parent', 'name' => "loc.name"],
            'name' => ['title' => 'Desa', 'className' => 'text-center'],
            'is_active' => ['className' => 'text-center']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'desas_datatable_' . time();
    }
}
