<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Program;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ProgramDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.pages.programs.datatables_actions')
            ->editColumn('target_dana', '{{ "Rp " . number_format($target_dana,0,",",".") }}')
            ->editColumn('is_active', 'admin.layouts.toggle')
            ->rawColumns(['is_active', 'target_dana', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Program $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Program $model)
    {
        return $model->newQuery()
            ->with('category')
            ->select('programs.*');
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
            'location' => ['className' => 'text-center'],
            'target_dana' => ['className' => 'text-center'],
            'end_date' => ['className' => 'text-center'],
            'category.name' => ['className' => 'text-center', 'defaultContent' => 'Not set', 'name' => 'category.name'],
            'is_urgent' => ['className' => 'text-center'],
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
        return 'programs_datatable_' . time();
    }
}
