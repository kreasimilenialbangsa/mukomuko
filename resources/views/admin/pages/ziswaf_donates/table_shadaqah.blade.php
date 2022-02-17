@push('style')
    @include('admin.layouts.datatables_css')
@endpush

<div>
    <table class="table table-striped" id="table_shadaqah" width="100%">
        <thead>
            <tr>
                <th>Nama Ziswaf</th>
                {{-- <th>Total Donasi</th> --}}
                <th>Tanggal</th>
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
            var table = $('#table_shadaqah').DataTable({
                // dom: "<'row mb-1'<'col-sm'><'col-sm-3'<'fusername'>><'col-sm-4'<'fdate'>><'col-sm-2'<'bexport'>>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{!!  route('admin.donatur.ziswaf.index', ['category' => 4]) !!}",
                },
                columns: [
                    { data: 'title', name: 'title', className: "text-center" },
                    // { data: 'target_dana', name: 'target_dana', className: "text-center" },
                    { data: 'created_at', name: 'created_at', className: "text-center" },
                    { data: 'action', name: 'action', className: "text-center" },
                ]
            });
        });

    </script>
@endpush