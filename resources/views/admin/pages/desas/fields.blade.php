<div class="col-md-6">
    <!-- Parent Id Field -->
    <div class="form-group">
        {!! Form::label('parent_id', 'Kecamatan:') !!}
        {!! Form::select('parent_id', $kecamatan, @$desa->parent_id, ['class' => 'form-control select2']) !!}
    </div>

    <!-- Name Field -->
    <div class="form-group">
        {!! Form::label('name', 'Nama:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Is Active Field -->
<div class="form-group col-md-6">
    <div class="control-label">Aktif:</div>
    <label class="custom-switch mt-2 pl-0">
        <input type="checkbox" name="is_active" value="1" class="custom-switch-input" {{ @$desa->is_active == 1 ? 'checked' : '' }}>
        <span class="custom-switch-indicator"></span>
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.location.desa.index') }}" class="btn btn-light">Batal</a>
</div>
