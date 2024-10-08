@extends('admin.layouts.app')
@section('title')
    Daftar Donatur Program 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Donatur Program</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.donatur.program.index') }}">Donasi Program</a></div>
                    <div class="breadcrumb-item">Daftar Donatur Program</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.donatur.program.index')}}" class="btn btn-primary form-btn">Kembali</a>
            </div>
        </div>
    <div class="section-body">
       <div class="card border border-top-0">
            <div class="card-body">
                    @include('admin.pages.program_donates.donatur.table')
                </div>
            </div>
       </div>
   </div>
    
    </section>
@endsection

