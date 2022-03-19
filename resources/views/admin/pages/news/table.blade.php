@push('style')
    @include('admin.layouts.datatables_css')
@endpush

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped']) !!}

@push('script')
    @include('admin.layouts.datatables_js')
    {!! $dataTable->scripts() !!}

    <script>
        toggle('.toggle-highlight', "{{ route('admin.news.toggle_highlight') }}");
        toggle('.toggle-active', "{{ route('admin.news.toggle_active') }}");
    </script>
@endpush