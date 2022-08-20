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
                <th>Nama Program</th>
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
                    url: "{!!  route('admin.approval.program.index') !!}",
                },
                columns: [
                    { data: 'date_donate', name: 'date_donate', className: 'text-center' },
                    { data: 'user.name', name: 'user.name', className: 'text-center' },
                    { data: 'location.name', name: 'location.name', defaultContent: '-', className: 'text-center' },
                    { data: 'program.title', name: 'program.title', defaultContent: '<strong>(Program telah dihapus)</strong>', className: 'text-center' },
                    { data: 'name', name: 'name', className: 'text-center' },
                    { data: 'email', name: 'email', className: 'text-center' },
                    { data: 'phone', name: 'phone', className: 'text-center' },
                    { data: 'total_donate', name: 'total_donate', className: 'text-center' },
                    { data: 'action', name: 'action', className: 'text-center', orderable: false },
                ]
            });
        });


        $(document).on('click','.approve',function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Approve Donasi',
                icon: 'warning',
                text: "Anda yakin untuk approve donasi ini?",
                showCancelButton: true,
                confirmButtonColor: '#45BF7C',
                cancelButtonColor: '#B9B2B2',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Approve',
                }).then((result) => {
                if (result.isConfirmed) {
                    $(this).submit();
                }
            });
        });
    </script>
@endpush