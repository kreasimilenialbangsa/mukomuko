<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-md-6">
    <div class="control-label">Is Active:</div>
    <label class="custom-switch mt-2 pl-0">
        <input type="checkbox" name="is_active" value="1" class="custom-switch-input" {{ @$kecamatan->is_active == 1 ? 'checked' : '' }}>
        <span class="custom-switch-indicator"></span>
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.location.kecamatan.index') }}" class="btn btn-light">Cancel</a>
</div>
