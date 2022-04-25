@extends('admin.layouts.app')
@section('title')
    Informasi Dana 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Informasi Dana</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Informasi Dana</div>
                </div>
            </div>
        </div>
    <div class="section-body">
           <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.informations.store', 'class' => 'form-save']) !!}
                    <div class="row">
                        @include('admin.pages.informations.fields')
                    </div>
                    {!! Form::close() !!}
            </div>
       </div>
   </div>
    </section>
@endsection

