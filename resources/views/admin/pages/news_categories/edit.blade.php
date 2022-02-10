@extends('admin.layouts.app')
@section('title')
    Edit News Category 
@endsection
@section('content')
    <section class="section">
            <div class="section-header">
                <h3 class="page__heading m-0">Edit News Category</h3>
                <div class="section-header-breadcrumb">
                    <a href="{{ route('admin.newsCategories.index') }}"  class="btn btn-primary">Back</a>
                </div>
            </div>
  <div class="content">
              @include('stisla-templates::common.errors')
              <div class="section-body">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body ">
                                    {!! Form::model($newsCategory, ['route' => ['admin.newsCategories.update', $newsCategory->id], 'method' => 'patch']) !!}
                                        <div class="row">
                                            @include('admin.pages.news_categories.fields')
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
