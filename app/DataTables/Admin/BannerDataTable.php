<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Banner;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BannerDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.pages.banners.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Banner $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Banner $model)
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
            'user_id',
            'title',
            'image',
            'description',
            'link_url',
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
        return 'banners_datatable_' . time();
    }
}
