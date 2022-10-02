@extends('admin.layouts.app')
@section('title')
    Detail Laporan 
@endsection

@push('style')
    @include('admin.layouts.datatables_css')
    <style>
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
                <h1>Detail Laporan - {{ \Carbon\Carbon::parse('01-'.Request::segment(4))->isoFormat('MMMM YYYY') }}</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.report.annual.index') }}">Laporan Tahunan</a></div>
                    <div class="breadcrumb-item active">{{ \Carbon\Carbon::parse('01-'.Request::segment(4))->isoFormat('MMMM YYYY') }}</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <button class="btn btn-primary form-btn export-button modal-export">Export</button>
            </div>
        </div>
        <div class="section-body">
            <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="income-tab2" data-toggle="tab" href="#income" role="tab" aria-controls="income" aria-selected="true">Detail Penerimaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="outcome-tab2" data-toggle="tab" href="#outcome" role="tab" aria-controls="outcome" aria-selected="false">Detail Pengeluaran</a>
                </li>
            </ul>

            <div class="card border border-top-0">
                <div class="card-body">
                    <div class="tab-content" id="myTab3Content">
                        <div class="tab-pane fade show active" id="income" role="tabpanel" aria-labelledby="income-tab2">
                            @include('admin.pages.reports.annual.table_income')
                        </div>
                        <div class="tab-pane fade" id="outcome" role="tabpanel" aria-labelledby="outcome-tab2">
                            @include('admin.pages.reports.annual.table_outcome')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <form action="{{ route('admin.report.annual.deatil.export', Request::segment(4)) }}" method="get">
            <div class="modal-header">
                <h5 class="modal-title">Export Dana Penerimaan & Pengeluaran</h5>
            </div>
            <div class="modal-body content-export">
                    <div class="row">
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="month">Bulan</label>
                                <select class="form-control select2-modal" month name="month">
                                    @foreach($months as $month)
                                        <option value="{{ $month['number'] }}" {{ $month['number'] == date('m') ? 'selected' : '' }}>{{ $month['text'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year">Tahun</label>
                                <select class="form-control select2-modal" id="year" name="year">
                                    @foreach($years as $year)
                                        <option value="{{ $year }}" {{ $year == date('m') ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-12">
                            <div class="form-group">
                                <label for="date_range">Tanggal</label>
                                <input type="text" class="form-control form-control-sm" name="date_range" id="date_range" placeholder="Filter Tanggal" value="" autocomplete="off" style="cursor: pointer;" required>
                                <input type="hidden" name="from_date" id="from_date"><input type="hidden" name="to_date" id="to_date">
                            </div>
                        </div> --}}
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
@endsection

@push('script')
    @include('admin.layouts.datatables_js')

    <script>
        $(document).ready(function() {
            $('.modal-export').on('click', function() {
                $('#exportModal').modal('toggle');
                
                $('#from_date').val('');
                $('#to_date').val('');
            });
        });
    </script>
@endpush

