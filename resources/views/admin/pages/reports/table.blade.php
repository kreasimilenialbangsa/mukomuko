@push('style')
    @include('admin.layouts.datatables_css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

<div>
    <table class="table table-striped table-responsive" id="table" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th width="250px">Kecamatan</th>
                <th width="250px">Desa</th>
                <th width="250px">JIPZISNU</th>
                <th width="250px">Total Donatur</th>
                <th width="250px">Jumlah Donasi</th>
                <th width="250px">MUJAMI' 10%</th>
                <th width="250px">UPZIS RANTING 45%</th>
                <th width="250px">LAZISNU 20%</th>
                <th width="250px">PC.NU 10%</th>
                <th width="250px">Jumlah</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@push('script')
    @include('admin.layouts.datatables_js')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable({
                dom: "<'row justify-content-between px-3'<<'fdate'>><<'bexport'>>><'row justify-content-between px-3'<<'fdate'>><f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{!!  route('admin.report.keuangan.index') !!}",
                    data: function(d) {
                        d.from_date = $('input[name="from_date"]').val(),
                        d.to_date = $('input[name="to_date"]').val()
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center' },
                    { data: 'desa.kecamatan.name', name: 'desa.kecamatan.name', className: 'text-center' },
                    { data: 'desa.name', name: 'desa.name', className: 'text-center' },
                    { data: 'name', name: 'name', className: 'text-center' },
                    { data: 'donate_count', name: 'donate_count', className: 'text-center' },
                    { data: 'donate_sum_total_donate', name: 'donate_sum_total_donate', className: 'text-center' },
                    { data: 'col1', name: 'col1', className: 'text-center' },
                    { data: 'col2', name: 'col2', className: 'text-center' },
                    { data: 'col3', name: 'col3', className: 'text-center' },
                    { data: 'col4', name: 'col4', className: 'text-center' },
                    { data: 'donate_sum_total_donate', name: 'donate_sum_total_donate', className: 'text-center' }
                ]
            });

            $("div.bexport").html(`<a href="#" target="_blank" class="btn btn-primary btn-sm btn-block export-button"><i class="fa fa-file-excel"></i> Export</a>`);

            $("div.fdate").html(`
                <label class="d-flex align-items-center">
                    <span style="width: 155px;">Filter Tanggal:</span>
                    <input type="text" class="form-control form-control-sm" name="range_date" placeholder="Filter Tanggal" value="" readonly style="cursor: pointer;">
                    <input type="hidden" name="from_date"><input type="hidden" name="to_date">
                </label>
            `);

            $('input[name="range_date"]').daterangepicker({
                autoUpdateInput: false,
                showDropdowns: true,
                alwaysShowCalendars: true,
                maxDate: new Date(),
                locale: {
                    "cancelLabel": "Clear",
                    "customRangeLabel": "Kustom Tanggal",
                    "applyLabel": "Terapkan",
                    "cancelLabel": "Kosongkan",
                    "daysOfWeek": [
                        "Min",
                        "Sen",
                        "Sel",
                        "Rab",
                        "Kam",
                        "Jum",
                        "Sab"
                    ],
                },
                ranges: {
                    'Hari Ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 Hari Lalu': [moment().subtract(6, 'days'), moment()],
                    '30 Hari Lalu': [moment().subtract(29, 'days'), moment()],
                    'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
                    'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            });

            $('input[name="range_date"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
                $('input[name="from_date"]').val(picker.startDate.format('YYYY-MM-DD'))
                $('input[name="to_date"]').val(picker.endDate.format('YYYY-MM-DD'))

                $('.export-button').attr('href', "#?from=" + picker.startDate.format('YYYY-MM-DD') + '&to=' + picker.endDate.format('YYYY-MM-DD') + '&user=' + $('select[name="username"]').val());

                table.draw();
            });

            $('input[name="range_date"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                $('input[name="from_date"]').val('')
                $('input[name="to_date"]').val('')

                $('.export-button').attr('href', "#?user=" + $('select[name="username"]').val());
                table.draw();
            });
        });

    </script>
@endpush