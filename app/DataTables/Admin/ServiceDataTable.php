<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Service;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ServiceDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.pages.services.datatables_actions')
            ->editColumn('is_active', 'admin.layouts.toggle')
            ->rawColumns(['is_active', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Service $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Service $model)
    {
        return $model->newQuery();
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
            'title' => ['className' => 'text-center', 'title' => 'Nama'],
            'is_active' => ['className' => 'text-center', 'title' => 'Aktif']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'services_datatable_' . time();
    }
}
