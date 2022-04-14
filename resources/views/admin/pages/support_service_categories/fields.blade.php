<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama Bantuan:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.category.bantuan.index') }}" class="btn btn-light">Batal</a>
</div>