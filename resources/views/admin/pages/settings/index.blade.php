@extends('admin.layouts.app')
@section('title')
    Settings
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.settings.create')}}" class="btn btn-primary form-btn">Setting <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">

           <div class="card">
                <div class="card-body">
                @include('admin.pages.settings.table')
            </div>
       </div>
   </div>

    </section>
@endsection

