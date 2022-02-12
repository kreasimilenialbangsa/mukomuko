<div class="col-md-6">
    <div class="row">
        <!-- Type Field -->
        <div class="form-group col-md-12">
            {!! Form::label('type', 'Type:') !!}
            <br>
            <label class="selectgroup-item">
                <input type="radio" name="type" value="image" class="selectgroup-input" {{ @$gallery->type == 'image' ? 'checked' : 'checked' }}>
                <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-image"></i> Image</span>
            </label>
            <label class="selectgroup-item">
                <input type="radio" name="type" value="video" class="selectgroup-input" {{ @$gallery->type == 'video' ? 'checked' : '' }}>
                <span class="selectgroup-button selectgroup-button-icon"><i class="fab fa-youtube"></i> Video</span>
              </label>
        </div>
        <!-- Image Field -->
        <div class="content-type form-group col-md-12 {{ @$gallery->type == 'video' ? 'd-none' : '' }}" id="image">
            {!! Form::label('content', 'Image:') !!}
            @if(@$gallery->type == 'image')
            {!! Form::file('content', ['class' => 'content-image form-control dropify', 'id' => 'input-file-now', 'data-height' => '300', 'data-default-file' => @$gallery->content ? asset('storage/'.$gallery->content) : '', 'data-allowed-file-extensions' => 'jpg jpeg png', 'data-max-file-size' => '1M']) !!}
            @else
            {!! Form::file('content', ['class' => 'content-image form-control dropify', 'id' => 'input-file-now', 'data-height' => '300', 'data-allowed-file-extensions' => 'jpg jpeg png', 'data-max-file-size' => '1M']) !!}
            @endif
        </div>

        <!-- Viedo Field -->
        <div class="content-type form-group col-sm-12 {{ @$gallery->type == 'video' ? '' : 'd-none' }}" id="video">
            {!! Form::label('content', 'Embed YouTube:') !!}
            {!! Form::textarea('content', @$gallery->type == 'video' ? $gallery->content : '', ['class' => 'content-video form-control', 'style' => 'height:100px']) !!}
        </div>
    </div>
</div>

<div class="col-md-6">
    <!-- Title Field -->
    <div class="row">
        <div class="form-group col-sm-12">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        
        <!-- Link Url Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('link_url', 'Link Url:') !!}
            {!! Form::text('link_url', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Is Active Field -->
        <div class="form-group col-md-6">
            <div class="control-label">Is Active:</div>
            <label class="custom-switch mt-2 pl-0">
                <input type="checkbox" name="is_active" value="1" class="custom-switch-input" {{ @$gallery->is_active == 1 ? 'checked' : '' }}>
                <span class="custom-switch-indicator"></span>
            </label>
        </div>

        <!-- Description Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control my-editor']) !!}
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.galleries.index') }}" class="btn btn-light">Cancel</a>
</div>

@push('script')
    <script>
        $(document).on('input', 'input[name=type]', function (){
            let val = $(this).val();
            $('.content-type').toggleClass('d-none');

            if(val == 'image') {
                $('.content-video').attr('disable', 'disable');
                $('.content-image').removeAttr('disabled', 'disabled');
            } else {
                $('.content-video').removeAttr('disable', 'disable');
                $('.content-image').attr('disabled', 'disabled');
            }
        });
    </script>
@endpush
