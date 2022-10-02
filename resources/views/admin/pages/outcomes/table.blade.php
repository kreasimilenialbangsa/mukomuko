@push('style')
    @include('admin.layouts.datatables_css')

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <style>
        .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
            line-height: calc(1em + .75rem);
        }
        .select2-container--bootstrap4 .select2-selection--single {
            height: 31px !important;
        }
        .select2-container .select2-selection--multiple, .select2-container .select2-selection--single {
            min-height: unset !important;
        }
        .table:not(.table-sm) tfoot th {
            border-bottom: none;
            background-color: rgba(0, 0, 0, 0.04);
            color: #666;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        table.dataTable tfoot th {
            border-top: 1px solid #ddd !important;
            border-bottom: 1px solid #ddd !important;
        }
    </style>
@endpush

<table class="table table-striped" id="table" width="100%">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Desa</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Nominal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">Jumlah</th>            
            <th>0</th>
            <th></th>
        </tr>
    </tfoot>
</table>

@push('script')
    @include('admin.layouts.datatables_js')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable({
                // dom: "<'row justify-content-between px-3 mb-2'<<'fdate'>><<'bexport'>>><'row justify-content-between px-3 mb-1'<'row px-0 col-12 col-md-4'<'col-12 col-md-6'<'fkecamatan'>><'col-12 col-md-6'<'fdesa'>>><f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                dom: "<'row justify-content-between px-3 mb-2'<<'fdate'>><<'bexport'>>><'row justify-content-between px-3 mb-1'<'row px-0 col-12 col-md-4'<'col-12 col-md-6'<'fkecamatan'>><'col-12 col-md-6'<'fdesa'>>><f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                pageLength: 50,
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: {
                    url: "{!!  route('admin.outcomes.index') !!}",
                    data: function(d) {
                        d.from_date = $('input[name="from_date"]').val(),
                        d.to_date = $('input[name="to_date"]').val(),
                        d.kecamatan = $('select[name="kecamatan"]').val(),
                        d.desa = $('select[name="desa"]').val()
                    }
                },
                columns: [
                    { data: 'date_outcome', name: 'date_outcome', defaultContent: '-', className: 'text-center' },
                    { data: 'desa.name', name: 'desa.name', defaultContent: '-', className: 'text-center' },
                    { data: 'category.name', name: 'category.name', defaultContent: '-', className: 'text-center' },
                    { data: 'description', name: 'description', defaultContent: '-', className: 'text-center' },
                    { data: 'nominal', name: 'nominal', defaultContent: '-', className: 'text-center' },
                    { data: 'action', name: 'action', className: 'text-center' }
                ],
                footerCallback: function ( row, data, start, end, display ) {
                    var api = this.api();

                    const rupiah = (number)=>{
                        return new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                        minimumFractionDigits: 0
                        }).format(number);
                    }
        
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,.Rp]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
        
                    // Total over all pages
                    total = api.column( 4 ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );
        
                    // Update footer
                    $( api.column( 4 ).footer() ).html(rupiah(total));
                }
            });

            $("div.bexport").html(`<button type="button" class="btn btn-primary btn-block export-button modal-export"><i class="fa fa-file-excel"></i> Export</button>`);

            $("div.fdate").html(`
                <label class="d-flex align-items-center">
                    <span style="width: 155px;">Filter Tanggal:</span>
                    <input type="text" class="form-control form-control-sm" name="range_date" placeholder="{{ \Carbon\Carbon::now()->startOfMonth()->format('d/m/Y') }} - {{ \Carbon\Carbon::now()->format('d/m/Y') }}" value="" autocomplete="off" style="cursor: pointer;">
                    <input type="hidden" name="from_date"><input type="hidden" name="to_date">
                </label>
            `);

            $('input[name="range_date"]').daterangepicker({
                autoUpdateInput: false,
                showDropdowns: true,
                alwaysShowCalendars: true,
                maxDate: new Date(),
                locale: {
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
                table.draw();
            });

            $('input[name="range_date"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                $('input[name="from_date"]').val('')
                $('input[name="to_date"]').val('')
                table.draw();
            });

            $("div.fkecamatan").html(`
                <select class="form-control form-control-sm fselect2" name="kecamatan">
                    <option value="">Semua Kecamatan</option>
                    @foreach($kecamatan as $row)
                        <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                    @endforeach
                </select>
            `);

            $('select[name="kecamatan"]').on('change', function(){
                table.draw();
            });

            $("div.fdesa").html(`
                <select class="form-control form-control-sm fselect2" name="desa">
                    <option value="">Semua Desa</option>
                    @foreach($desa as $row)
                        <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                    @endforeach
                </select>
            `);

            $('select[name="desa"]').on('change', function(){
                table.draw();
            });

            $('.fselect2').select2({
                theme: 'bootstrap4',
            });
        });
    </script>
@endpush