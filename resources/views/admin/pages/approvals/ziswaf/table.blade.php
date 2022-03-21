@push('style')
    @include('admin.layouts.datatables_css')
@endpush

<div>
    <table class="table table-striped table-responsive-sm" id="table" width="100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>JIPZISNU</th>
                <th>Desa</th>
                <th>Nama Ziswaf</th>
                <th>Nama Donatur</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Jumlah Donasi</th>
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
                    url: "{!!  route('admin.approval.ziswaf.index') !!}",
                },
                columns: [
                    { data: 'created_at', name: 'created_at', className: 'text-center' },
                    { data: 'user.name', name: 'user.name', className: 'text-center' },
                    { data: 'location.name', name: 'location.name', defaultContent: '-', className: 'text-center' },
                    { data: 'ziswaf.title', name: 'ziswaf.title', className: 'text-center' },
                    { data: 'name', name: 'name', className: 'text-center' },
                    { data: 'email', name: 'email', className: 'text-center' },
                    { data: 'phone', name: 'phone', className: 'text-center' },
                    { data: 'total_donate', name: 'total_donate', className: 'text-center' },
                    { data: 'action', name: 'action', className: 'text-center', orderable: false },
                ]
            });
        });

    </script>
@endpush