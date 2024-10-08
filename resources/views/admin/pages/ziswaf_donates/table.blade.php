<div>
    <table class="table table-striped" id="table_{{ $ziswaf->slug }}" width="100%">
        <thead>
            <tr>
                <th>Jenis {{ $ziswaf->name }}</th>
                <th>Total Donatur</th>
                <th>Total Donasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@push('script')    
    <script>
        $(document).ready(function() {
            var table = $('#table_{{ $ziswaf->slug}}').DataTable({
                // dom: "<'row mb-1'<'col-sm'><'col-sm-3'<'fusername'>><'col-sm-4'<'fdate'>><'col-sm-2'<'bexport'>>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{!!  route('admin.donatur.ziswaf.index', ['category' => $ziswaf->id]) !!}",
                },
                columns: [
                    { data: 'title', name: 'title', className: "text-center" },
                    { data: 'donate_count', name: 'donate_count', className: "text-center" },
                    { data: 'donate_sum_total_donate', name: 'donate_sum_total_donate', className: "text-center" },
                    { data: 'action', name: 'action', className: "text-center", orderable: false },
                ]
            });
        });

    </script>
@endpush