@push('style')
    @include('admin.layouts.datatables_css')
@endpush

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped']) !!}

@push('script')
    @include('admin.layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endpush