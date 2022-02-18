@extends('admin.layouts.app')
@section('title')
    Daftar Donatur Ziswaf 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Donatur Ziswaf </h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.donatur.ziswaf.index')}}" class="btn btn-primary form-btn">Kembali</a>
            </div>
        </div>
    <div class="section-body">
       <div class="card border border-top-0">
            <div class="card-body">
                    @include('admin.pages.approvals.ziswaf.table')
                </div>
            </div>
       </div>
   </div>
    
    </section>
@endsection

