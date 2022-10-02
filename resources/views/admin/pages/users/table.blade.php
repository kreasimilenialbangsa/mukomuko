@push('style')
    @include('admin.layouts.datatables_css')
@endpush

<div class="table-responsive">
{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped']) !!}
</div>

@push('script')
    @include('admin.layouts.datatables_js')
    {!! $dataTable->scripts() !!}

    <script>
        toggle('.toggle-active', "{{ route('admin.user.toggle_active') }}");
    </script>
@endpush