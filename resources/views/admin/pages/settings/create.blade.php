@extends('admin.layouts.app')
@section('title')
    Create Setting
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">New Setting</h3>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.settings.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="section-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="card">
                           <div class="card-body ">
                                {!! Form::open(['route' => 'admin.settings.store']) !!}
                                    <div class="row">
                                        @include('admin.pages.settings.fields')
                                    </div>
                                {!! Form::close() !!}
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </section>
@endsection
