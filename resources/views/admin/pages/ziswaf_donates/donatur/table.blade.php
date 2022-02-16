@push('style')
    @include('admin.layouts.datatables_css')
@endpush

<div>
    <table class="table table-striped" id="table">
        <thead>
            <tr>
                <th>Nama Program</th>
                <th>Nama Donatur</th>
                <th>Jumlah Donasi</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@push('script')
    @include('admin.layouts.datatables_js')

    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable({
                // dom: "<'row mb-1'<'col-sm'><'col-sm-3'<'fusername'>><'col-sm-4'<'fdate'>><'col-sm-2'<'bexport'>>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{!!  route('admin.donatur.program.list', Request::segment(4)) !!}",
                },
                columns: [
                    { data: 'type_id, name: type_id', className: "text-center" },
                    { data: 'name', name: 'name', className: "text-center" },
                    { data: 'total_donate', name: 'total_donate', className: "text-center" },
                    { data: 'created_at', name: 'created_at', className: "text-center" },
                    { data: 'action', name: 'action', className: "text-center" },
                ]
            });
        });

    </script>
@endpush