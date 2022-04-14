<?php

namespace App\DataTables\Admin;

use App\Models\Admin\SupportAmbulance;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SupportAmbulanceDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.pages.support_ambulances.datatables_actions')
            ->editColumn('book_date', '{{ date("d/M/Y", strtotime($book_date)) }}')
            ->editColumn('is_confirm', function($q) {
                $status = $q->is_confirm == 1 ? '<span class="badge badge-primary">Approve</span>' : '<span class="badge badge-warning">Pending</span>';
                return $status;
            })
            ->rawColumns(['is_confirm', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SupportAmbulance $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SupportAmbulance $model)
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
            'book_date' => ['title' => 'Tanggal Pengajuan', 'className' => 'text-center'],
            'reason' => ['title' => 'Alasan Pengajuan', 'className' => 'text-center'],
            'is_confirm'  => ['title' => 'Status', 'className' => 'text-center'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'support_ambulances_datatable_' . time();
    }
}
