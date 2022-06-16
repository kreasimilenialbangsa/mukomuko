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
                {{-- <a href="{{ route('admin.approval.ziswaf.index')}}" class="btn btn-primary form-btn">Kembali</a> --}}
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
@endsection

@push('script')
    @include('admin.layouts.datatables_js')
@endpush

