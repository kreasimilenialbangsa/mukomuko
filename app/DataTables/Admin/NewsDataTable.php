<?php

namespace App\DataTables\Admin;

use App\Models\Admin\News;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class NewsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.pages.news.datatables_actions')
            ->editColumn('image', '<img src="{{ $images ? asset("storage".$images[0]["file"]) : asset("img/no_image.jpg") }}" height="120px"/>')
            ->editColumn('created_at', '{{ date("d/M/Y", strtotime($created_at)) }}')
            ->editColumn('is_active', 'admin.layouts.toggle')
            ->rawColumns(['is_active', 'image','action'])
            ->filter(function($query) {
                $query->where('category_id', 1);
            }, true);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\News $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(News $model)
    {
        return $model->newQuery()
            ->with(['images', 'category']);
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
                ]
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
            'title' => ['title' => 'Nama'],
            'image' => ['searchable' => false, 'orderable' => false, 'className' => 'text-center', 'title' => 'Gambar'],
            'created_at' => ['className' => 'text-center', 'title' => 'Tgl Pembuatan'],
            'category_id' => ['className' => 'text-center', 'data' => 'category.name', 'name' => 'category_id', 'title' => 'Kategori'],
            'is_highlight' => ['className' => 'text-center', 'title' => 'Highlight'],
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
        return 'news_datatable_' . time();
    }
}
