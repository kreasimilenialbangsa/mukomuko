@extends('admin.layouts.app')

@section('title')
    Pengeluaran 
@endsection

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

@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Pengeluaran</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Pengeluaran</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.outcomes.create')}}" class="btn btn-primary form-btn"><i class="fas fa-plus"></i> Pengeluaran</a>
            </div>
        </div>
        <div class="section-body">
            <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">Semua Pengeluaran</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="infaq-tab" data-toggle="tab" href="#infaq" role="tab" aria-controls="infaq" aria-selected="true">Infak Tidak Terikat</a>
                </li>
            </ul>
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="myTab3Content">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab2">
                            @include('admin.pages.outcomes.table_1', ['type' => 'all'])
                        </div>
                        <div class="tab-pane fade" id="infaq" role="tabpanel" aria-labelledby="infaq-tab2">
                            @include('admin.pages.outcomes.table_2', ['type' => 'infaq'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Modal -->
<div class="modal fade" id="exportModal1" tabindex="-1" aria-labelledby="exportModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <form action="{{ route('admin.outcomes.export') }}" method="get">
            <div class="modal-header">
                <h5 class="modal-title">Export Laporan Pengeluaran</h5>
            </div>
            <div class="modal-body content-export">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group fmodal1">
                                <label for="date_range">Tanggal</label>
                                <input type="text" class="form-control form-control-sm" name="date_range" id="date_range" placeholder="Filter Tanggal" value="" autocomplete="off" style="cursor: pointer;" required>
                                <input type="hidden" name="from_date" id="from_date"><input type="hidden" name="to_date" id="to_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <select class="form-control select2-modal" id="kecamatan" name="kecamatan">
                                    <option value="">Semua Kecamatan</option>
                                    @foreach($kecamatan as $row)
                                        <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="desa">Desa</label>
                                <select class="form-control select2-modal" id="desa" name="desa">
                                    <option value="">Semua Desa</option>
                                    @foreach($desa as $row)
                                        <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Export</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="exportModal2" tabindex="-1" aria-labelledby="exportModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        {{-- <form action="{{ route('admin.outcomes.export') }}" method="get"> --}}
            <div class="modal-header">
                <h5 class="modal-title">Export Laporan Pengeluaran Infak Tidak Terikat</h5>
            </div>
            <div class="modal-body content-export">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group fmodal2">
                                <label for="date_range">Tanggal</label>
                                <input type="text" class="form-control form-control-sm" name="date_range" id="date_range" placeholder="Filter Tanggal" value="" autocomplete="off" style="cursor: pointer;" required>
                                <input type="hidden" name="from_date" id="from_date"><input type="hidden" name="to_date" id="to_date">
                            </div>
                        </div>
                    </div>
                </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Export</button>
            </div>
        {{-- </form> --}}
        </div>
    </div>
</div>
@endsection

@push('script')
    @include('admin.layouts.datatables_js')

    <script>
        $(document).ready(function() {
            $('.modal-export1').on('click', function() {
                $('#exportModal1').modal('toggle');
                $('.fmodal1 #date_range').val('');
                $('.fmodal1 #from_date').val('');
                $('.fmodal1 #to_date').val('');
            });

            $('.fmodal1 input[name="date_range"]').daterangepicker({
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

            $('.fmodal1 input[name="date_range"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
                $('.fmodal1 #from_date').val(picker.startDate.format('YYYY-MM-DD'))
                $('.fmodal1 #to_date').val(picker.endDate.format('YYYY-MM-DD'))
            });

            $('.fmodal1 input[name="date_range"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                $('.fmodal1 #from_date').val('')
                $('.fmodal1 #to_date').val('')
            });

            

            $('.modal-export2').on('click', function() {
                $('#exportModal2').modal('toggle');
                $('.fmodal2 #date_range').val('');
                $('.fmodal2 #from_date').val('');
                $('.fmodal2 #to_date').val('');
            });

            $('.fmodal2 input[name="date_range"]').daterangepicker({
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

            $('.fmodal2 input[name="date_range"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
                $('.fmodal2 #from_date').val(picker.startDate.format('YYYY-MM-DD'))
                $('.fmodal2 #to_date').val(picker.endDate.format('YYYY-MM-DD'))
            });

            $('.fmodal2 input[name="date_range"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                $('.fmodal2 #from_date').val('')
                $('.fmodal2 #to_date').val('')
            });
        });
    </script>

    <script>
        $(function(){
            var hash = window.location.hash;
            hash && $('ul.nav a[href="' + hash + '"]').tab('show');

            $('.nav-tabs a').click(function (e) {
                $(this).tab('show');
                var scrollmem = $('body').scrollTop();
                window.location.hash = this.hash;
                $('html,body').scrollTop(scrollmem);
            });
        });
    </script>
@endpush
