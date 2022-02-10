@extends('admin.layouts.app')
@section('title')
    Edit Ziswaf 
@endsection
@section('content')
    <section class="section">
            <div class="section-header">
                <h3 class="page__heading m-0">Edit Ziswaf</h3>
                <div class="section-header-breadcrumb">
                    <a href="{{ route('admin.ziswafs.index') }}"  class="btn btn-primary">Back</a>
                </div>
            </div>
  <div class="content">
              @include('stisla-templates::common.errors')
              <div class="section-body">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body ">
                                    {!! Form::model($ziswaf, ['route' => ['admin.ziswafs.update', $ziswaf->id], 'method' => 'patch']) !!}
                                        <div class="row">
                                            @include('admin.pages.ziswafs.fields')
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
