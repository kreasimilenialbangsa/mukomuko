@push('style')
    @include('admin.layouts.datatables_css')
@endpush

<div>
    <table class="table table-striped table-responsive-sm" id="table" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>JIPZISNU</th>
                <th>Total Donatur</th>
                <th>Jumlah Donasi</th>
                <th>MJAMI' 10%</th>
                <th>UPZIS RANTING 45%</th>
                <th>LAZISNU 20%</th>
                <th>PC.NU 10%</th>
                <th>Jumlah</th>
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
                    url: "{!!  route('admin.report.keuangan.index') !!}",
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center' },
                    { data: 'desa.kecamatan.name', name: 'desa.kecamatan.name', className: 'text-center' },
                    { data: 'desa.name', name: 'desa.name', className: 'text-center' },
                    { data: 'name', name: 'name', className: 'text-center' },
                    { data: 'donate_count', name: 'donate_count', className: 'text-center' },
                    { data: 'donate_sum_total_donate', name: 'donate_sum_total_donate', className: 'text-center' },
                    { data: 'donate_sum_total_donate', name: 'donate_sum_total_donate', className: 'text-center' },
                    { data: 'donate_sum_total_donate', name: 'donate_sum_total_donate', className: 'text-center' },
                    { data: 'donate_sum_total_donate', name: 'donate_sum_total_donate', className: 'text-center' },
                    { data: 'donate_sum_total_donate', name: 'donate_sum_total_donate', className: 'text-center' },
                    { data: 'donate_sum_total_donate', name: 'donate_sum_total_donate', className: 'text-center' }
                ]
            });
        });

    </script>
@endpush