@push('style')
    @include('admin.layouts.datatables_css')
@endpush

<div>
    <table class="table table-striped table-responsive-sm" id="table" width="100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Anggota</th>
                <th>Tanggal Pengajuan</th>
                <th>Alasan Pengajuan</th>
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
                    url: "{!!  route('admin.approval.ambulan.index') !!}",
                },
                columns: [
                    { data: 'created_at', name: 'created_at', className: 'text-center' },
                    { data: 'user.name', name: 'user.name', className: 'text-center' },
                    { data: 'book_date', name: 'book_date', className: 'text-center' },
                    { data: 'reason', name: 'reason', className: 'text-center' },
                    { data: 'action', name: 'action', className: 'text-center', orderable: false },
                ]
            });
        });

        $(document).on('click','.approve',function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Approve Pengajuan',
                icon: 'warning',
                text: "Anda yakin untuk approve pengajuan ini?",
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