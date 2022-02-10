<div class="col-md-5">
    <!-- Image Field -->
    <div class="form-group">
        {!! Form::label('image', 'Image:') !!}
        {!! Form::file('image', ['class' => 'form-control dropify', 'id' => 'input-file-now', 'data-height' => '300', 'data-default-file' => @$banner->image ? asset('storage/'.$banner->image) : '', 'data-allowed-file-extensions' => 'jpg jpeg png', 'data-max-file-size' => '1M']) !!}
    </div>
</div>

<div class="col">
    <!-- Title Field -->
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Description Field -->
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control my-editor']) !!}
    </div>

    <!-- Link Url Field -->
    <div class="form-group">
        {!! Form::label('link_url', 'Link Url:') !!}
        {!! Form::text('link_url', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.banners.index') }}" class="btn btn-light">Cancel</a>
</div>


