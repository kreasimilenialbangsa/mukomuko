@push('style')
    @include('admin.layouts.datatables_css')
@endpush

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped']) !!}

@push('script')
    @include('admin.layouts.datatables_js')
    {!! $dataTable->scripts() !!}

    <script>
        toggle('.toggle-active', "{{ route('admin.program.toggle_active') }}");
        toggle('.toggle-urgent', "{{ route('admin.program.toggle_urgent') }}");
    </script>
@endpush