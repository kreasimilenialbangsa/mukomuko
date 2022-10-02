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
            ->editColumn('created_at', '{{ date("d/m/Y", strtotime($created_at)) }}')
            ->editColumn('target_dana', '{{ "Rp " . number_format($target_dana,0,",",".") }}')
            ->editColumn('is_urgent', 'admin.layouts.toggle_urgent')
            ->editColumn('end_date', '{{ date("d/M/Y", strtotime($end_date)) }}')
            ->editColumn('is_active', 'admin.layouts.toggle_active')
            ->rawColumns(['is_active', 'is_urgent', 'target_dana', 'action']);
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
            'created_at' => ['title' => 'Tgl Pembuatan'],
            'title' => ['title' => 'Nama'],
            'location' => ['className' => 'text-center', 'title' => 'Lokasi'],
            'target_dana' => ['className' => 'text-center'],
            'end_date' => ['className' => 'text-center', 'title' => 'Tgl Berakhir'],
            'category.name' => ['className' => 'text-center', 'defaultContent' => 'Not set', 'name' => 'category.name', 'title' => 'Kategori'],
            'is_urgent' => ['className' => 'text-center', 'title' => 'Darurat'],
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
        return 'programs_datatable_' . time();
    }
}
