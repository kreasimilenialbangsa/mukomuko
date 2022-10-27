<div class="col-md-6">
    <!-- Title Field -->
    <div class="form-group">
        {!! Form::label('title', 'Judul Notifikasi:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Body Field -->
    <div class="form-group">
        {!! Form::label('body', 'Pesan:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control', 'style' => 'height: 100px']) !!}
    </div>
</div>

<div class="col-md-6">
    <!-- Image Field -->
    <div class="form-group">
        {!! Form::label('image', 'Gambar:') !!}

        <div class="custom-file mb-3">
            <input id="thumbnail" class="form-control" type="text" name="filepath" readonly value="{{ @$notification->image }}">
            <label class="custom-file-label" id="lfm" for="validatedCustomFile" data-input="thumbnail" data-preview="holder">{{ @$notification->image ? $notification->image : 'Pilih gambar...' }}</label>
        </div>

        @if(@$notification)
            <img id="holder" style="margin-top:15px;max-height:100px;" src="{{ $notification->image }}">
        @else
            <img id="holder" style="margin-top:15px;max-height:100px;">
        @endif
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Kirim', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.notifications.index') }}" class="btn btn-light">Batal</a>
</div>

@push('script')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#lfm').filemanager();
            $('#thumbnail').on('change', function() {
                var image = $(this).val();

                $('#holder').attr('src', image);
                $('.custom-file-label').html(image);
            })
        });
    </script>
@endpush