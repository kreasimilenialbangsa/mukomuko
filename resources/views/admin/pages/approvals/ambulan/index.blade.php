@extends('admin.layouts.app')
@section('title')
    Daftar Pengajuan Ambulan 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Daftar Pengajuan Ambulan</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Daftar Pengajuan Ambulan</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.approval.ambulan.index')}}" class="btn btn-primary form-btn">Kembali</a>
            </div>
        </div>
    <div class="section-body">
       <div class="card border border-top-0">
            <div class="card-body">
                    @include('admin.pages.approvals.ambulan.table')
                </div>
            </div>
       </div>
   </div>
    
    </section>
@endsection

