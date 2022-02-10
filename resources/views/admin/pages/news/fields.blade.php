<div class="col-md-12">
    <ul class="nav nav-tabs" id="myTab2" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" role="tab" aria-controls="home" aria-selected="true">FORM</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">IMAGES</a>
        </li>
    </ul>
    <div class="tab-content tab-bordered" id="myTab3Content">
        <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab2">
            <!-- Title Field -->
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Content Field -->
            <div class="form-group">
                {!! Form::label('content', 'Content:') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control my-editor']) !!}
            </div>

            <!-- Category Id Field -->
            <div class="form-group">
                {!! Form::label('category_id', 'Category Id:') !!}
                {!! Form::number('category_id', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Is Active Field -->
            <div class="form-group">
                {!! Form::label('is_active', 'Is Active:') !!}
                {!! Form::number('is_active', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Is Highlight Field -->
            <div class="form-group">
                {!! Form::label('is_highlight', 'Is Highlight:') !!}
                {!! Form::number('is_highlight', null, ['class' => 'form-control']) !!}
            </div>
            
        </div>
        <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
            <div class="row">
                <div class="col-md-6">
                    <!-- Image Field -->
                    <div class="form-group">
                        {!! Form::label('image', 'Image:') !!}
                        {!! Form::file('image', ['class' => 'form-control dropify', 'id' => 'input-file-now', 'data-height' => '300', 'data-default-file' => @$banner->image ? asset('storage/'.$banner->image) : '', 'data-allowed-file-extensions' => 'jpg jpeg png', 'data-max-file-size' => '1M']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Image Field -->
                    <div class="form-group">
                        {!! Form::label('image', 'Image:') !!}
                        {!! Form::file('image', ['class' => 'form-control dropify', 'id' => 'input-file-now', 'data-height' => '300', 'data-default-file' => @$banner->image ? asset('storage/'.$banner->image) : '', 'data-allowed-file-extensions' => 'jpg jpeg png', 'data-max-file-size' => '1M']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">
            Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor. Nam malesuada orci non ornare vulputate. Ut ut sollicitudin magna. Vestibulum eget ligula ut ipsum venenatis ultrices. Proin bibendum bibendum augue ut luctus.
        </div>
    </div>
</div>


<div class="col-md-5">
    
</div>

<div class="col">
    
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.news.index') }}" class="btn btn-light">Cancel</a>
</div>