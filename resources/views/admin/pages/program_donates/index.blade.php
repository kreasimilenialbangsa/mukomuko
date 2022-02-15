@extends('layouts.app')
@section('title')
    Donates 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Donates</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.donates.create')}}" class="btn btn-primary form-btn">Donate <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('admin.pages.donates.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

