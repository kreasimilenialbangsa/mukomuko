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
@endsection

