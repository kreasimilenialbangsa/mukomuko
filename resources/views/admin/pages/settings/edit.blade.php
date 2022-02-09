@extends('admin.layouts.app')
@section('title')
    Edit Setting 
@endsection
@section('content')
    <section class="section">
            <div class="section-header">
                <h1>Edit Setting</h1>
                <div class="section-header-breadcrumb">
                    <a href="{{ route('admin.settings.index') }}"  class="btn btn-primary">Back</a>
                </div>
            </div>

  <div class="content">
              @include('stisla-templates::common.errors')
              <div class="section-body">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body ">
                                    {!! Form::model($setting, ['route' => ['admin.settings.update', $setting->id], 'method' => 'patch']) !!}
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
