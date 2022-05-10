<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Outcome;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class OutcomeDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.pages.outcomes.datatables_actions')
            ->editColumn('created_at', '{{ date("d/m/Y", strtotime($created_at)) }}')
            ->editColumn('nominal', '{{ "Rp " . number_format($nominal,0,",",".") }}');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Outcome $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Outcome $model)
    {
        return $model->newQuery()
            ->with(['category', 'desa']);
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
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'created_at' => ['title' => 'Tanggal', 'className' => 'text-center',],
            'desa.name' => ['title' => 'Desa', 'data' => 'desa.name', 'name' => 'desa.name', 'className' => 'text-center',],
            'category.name' => ['title' => 'Kategori', 'data' => 'category.name', 'name' => 'category.name', 'className' => 'text-center',],
            'description' => ['title' => 'Deskripsi'],
            'nominal' => ['className' => 'text-center']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'outcomes_datatable_' . time();
    }
}
