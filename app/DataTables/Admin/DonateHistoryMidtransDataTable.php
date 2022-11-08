<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Donate;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class DonateHistoryMidtransDataTable extends DataTable
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

        return $dataTable->editColumn('date_donate', '{{ date("d/m/Y H:i", strtotime($date_donate)) }}')
            ->editColumn('type', function($q) {
                $program = $q->type == "\App\Models\Admin\Program" ? 'Program' : 'Ziswaf';
                return $program;
            })
            ->editColumn('type_id', function($q) {
                $program = isset($q->ziswaf) ? $q->ziswaf->title : (isset($q->program->title) ? $q->program->title : '-');
                return $program;
            })
            ->editColumn('is_confirm', function($q) {
                $status = $q->is_confirm == 0 ? '<div class="badge badge-warning">Pending</div>' : ($q->is_confirm == 1 ? '<div class="badge badge-success">Berhasil</div>' : '<div class="badge badge-danger">Kedaluwarsa</div>');
                return $status;
            })
            ->editColumn('total_donate', '{{ "Rp " . number_format($total_donate,0,",",".") }}')
            ->rawColumns(['is_confirm']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Donate $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Donate $model)
    {
        return $model->newQuery()
            ->select('donates.*')
            ->with('user')
            ->with('desa')
            ->with('ziswaf')
            ->with('program')
            ->whereIsPayment(1);
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
            ->parameters([
                // 'dom'       => 'Bfrtip',
                // 'stateSave' => true,
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
            'date_donate' => ['title' => 'Tgl Donasi', 'className' => 'text-center'],
            'name' => ['title' => 'Nama Donatur', 'className' => 'text-center'],
            'type' => ['title' => 'Jenis Donasi', 'className' => 'text-center', 'defaultContent' => '-'],
            'type_id' => ['title' => 'Nama Donasi', 'className' => 'text-center', 'defaultContent' => '-'],
            'total_donate' => ['title' => 'Jumlah Donasi', 'className' => 'text-center'],
            'is_confirm' => ['title' => 'Status', 'className' => 'text-center']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'donates_datatable_' . time();
    }
}
