@extends('admin.layouts.app')
@section('title')
    Edit Ziswaf Category 
@endsection
@section('content')
    <section class="section">
            <div class="section-header">
                <h3 class="page__heading m-0">Edit Ziswaf Category</h3>
                <div class="section-header-breadcrumb">
                    <a href="{{ route('admin.category.ziswaf.index') }}"  class="btn btn-primary">Back</a>
                </div>
            </div>
  <div class="content">
              @include('stisla-templates::common.errors')
              <div class="section-body">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body ">
                                    {!! Form::model($ziswafCategory, ['route' => ['admin.category.ziswaf.update', $ziswafCategory->id], 'method' => 'patch']) !!}
                                        <div class="row">
                                            @include('admin.pages.ziswaf_categories.fields')
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
