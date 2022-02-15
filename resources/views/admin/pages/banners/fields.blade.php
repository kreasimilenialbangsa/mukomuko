<div class="col">
    <!-- Title Field -->
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="row">
        <div class="col-md-6">
            <!-- Link Url Field -->
            <div class="form-group">
                {!! Form::label('link_url', 'Link Url:') !!}
                {!! Form::text('link_url', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <!-- Is Active Field -->
            <div class="form-group">
                <div class="control-label">Is Active:</div>
                <label class="custom-switch mt-2 pl-0">
                    <input type="checkbox" name="is_active" value="1" class="custom-switch-input" {{ @$banner->is_active == 1 ? 'checked' : '' }}>
                    <span class="custom-switch-indicator"></span>
                </label>
            </div>
        </div>
    </div>
</div>

<div class="col-md-5">
    <!-- Image Field -->
    <div class="form-group">
        {!! Form::label('image', 'Image:') !!}
        {!! Form::file('image', ['class' => 'form-control dropify', 'id' => 'input-file-now', 'data-height' => '300', 'data-default-file' => @$banner->image ? asset('storage/'.$banner->image) : '', 'data-allowed-file-extensions' => 'jpg jpeg png', 'data-max-file-size' => '1M']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.banners.index') }}" class="btn btn-light">Cancel</a>
</div>


