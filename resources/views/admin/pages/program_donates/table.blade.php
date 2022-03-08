@push('style')
    @include('admin.layouts.datatables_css')
@endpush

<div>
    <table class="table table-striped table-responsive-sm" id="table" width="100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Program</th>
                <th>Kategori</th>
                <th>Total Donatur</th>
                <th>Total Donasi</th>
                <th>Sisa Hari</th>
                <th>Aksi</th>
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
                    url: "{!!  route('admin.donatur.program.index') !!}",
                },
                columns: [
                    { data: 'created_at', name: 'created_at', className: "text-center" },
                    { data: 'title', name: 'title', className: "text-center" },
                    { data: 'category.name', name: 'category.name', className: "text-center" },
                    { data: 'donate_count', name: 'donate_count', className: "text-center" },
                    { data: 'donate_sum_total_donate', name: 'donate_sum_total_donate', defaultContent: 'Rp 0', className: "text-center" },
                    { data: 'count_day', name: 'count_day', className: "text-center" },
                    { data: 'action', name: 'action', className: "text-center", orderable: false },
                ]
            });
        });

    </script>
@endpush