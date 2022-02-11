<?php

namespace App\DataTables\Admin;

use App\Models\Admin\About;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AboutDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.pages.abouts.datatables_actions')
            ->editColumn('is_active', 'admin.layouts.toggle')
            ->rawColumns(['is_active', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\About $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(About $model)
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
            'title',
            'is_active'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'abouts_datatable_' . time();
    }
}
