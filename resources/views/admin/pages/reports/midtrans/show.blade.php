@extends('admin.layouts.app')
@section('title')
    Detail Laporan Midtrans
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
                <h1>Detail Laporan Midtrans - {{ \Carbon\Carbon::parse('01-'.Request::segment(4))->isoFormat('MMMM YYYY') }}</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.report.midtrans.index') }}">Laporan Midtrans</a></div>
                    <div class="breadcrumb-item active">{{ \Carbon\Carbon::parse('01-'.Request::segment(4))->isoFormat('MMMM YYYY') }}</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.report.midtrans.index') }}"  class="btn btn-primary">Kembali</a>
            </div>
        </div>
        {{-- <div class="section-body">
            <div class="card border border-top-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-control form-control-sm select2 select-kecamatan" name="kecamatan">
                                <option value="">Semua Kecamatan</option>
                                @foreach($kecamatan as $row)
                                <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select class="form-control form-control-sm select2 select-desa" name="desa">
                                <option value="">Semua Desa</option>
                                @foreach($desa as $row)
                                    <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md d-flex justify-content-end">
                            <button class="btn btn-primary form-btn export-button modal-export">Export</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="section-body">
            {{-- <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="income-tab2" data-toggle="tab" href="#income" role="tab" aria-controls="income" aria-selected="true">Detail Penerimaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="outcome-tab2" data-toggle="tab" href="#outcome" role="tab" aria-controls="outcome" aria-selected="false">Detail Pengeluaran</a>
                </li>
            </ul> --}}

            <div class="card border border-top-0">
                <div class="card-body">
                    {{-- <div class="tab-content" id="myTab3Content">
                        <div class="tab-pane fade show active" id="income" role="tabpanel" aria-labelledby="income-tab2"> --}}
                            @include('admin.pages.reports.midtrans.table_income')
                        {{-- </div>
                        <div class="tab-pane fade" id="outcome" role="tabpanel" aria-labelledby="outcome-tab2">
                            @include('admin.pages.reports.midtrans.table_outcome')
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
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

