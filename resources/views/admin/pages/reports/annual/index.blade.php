@extends('admin.layouts.app')
@section('title')
    Laporan Tahunan 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Laporan Tahunan</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Laporan Tahunan</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                {{-- <a href="{{ route('admin.approval.ziswaf.index')}}" class="btn btn-primary form-btn">Kembali</a> --}}
            </div>
        </div>
    <div class="section-body">
       <div class="card border border-top-0">
            <div class="card-body">
                    @include('admin.pages.reports.annual.table')
                </div>
            </div>
       </div>
   </div>
    </section>

<!-- Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <form action="{{ route('admin.report.annual.export') }}" method="get">
            <div class="modal-header">
                <h5 class="modal-title">Export Laporan Tahunan</h5>
            </div>
            <div class="modal-body content-export">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="range_date">Tanggal</label>
                                <input type="text" class="form-control form-control-sm" name="range_date" id="range_date" placeholder="Filter Tanggal" value="" autocomplete="off" style="cursor: pointer;" required>
                                <input type="hidden" name="from_date" id="from_date"><input type="hidden" name="to_date" id="to_date">
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
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@push('script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.modal-export').on('click', function() {
                $('#exportModal').modal('toggle');
                $('#range_date').val('');
                $('#from_date').val('');
                $('#to_date').val('');
            });

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
                $('input[name="from_date"]').val(picker.startDate.format('YYYY-MM-DD'));
                $('input[name="to_date"]').val(picker.endDate.format('YYYY-MM-DD'));
            });

            $('input[name="range_date"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                $('input[name="from_date"]').val('');
                $('input[name="to_date"]').val('');
            });
        });
    </script>
@endpush


