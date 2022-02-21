<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <!-- Title Field -->
            <div class="form-group">
                {!! Form::label('title', 'Nama:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <!-- Is Active Field -->
            <div class="form-group">
                <div class="control-label">Aktif:</div>
                <label class="custom-switch mt-2 pl-0">
                    <input type="checkbox" name="is_active" value="1" class="custom-switch-input" {{ @$about->is_active == 1 ? 'checked' : '' }}>
                    <span class="custom-switch-indicator"></span>
                </label>
            </div>
        </div>
    </div>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Deskripsi:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control my-editor']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.abouts.index') }}" class="btn btn-light">Batal</a>
</div>
