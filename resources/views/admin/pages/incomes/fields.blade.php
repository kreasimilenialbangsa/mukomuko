<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama Perolehan:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Precent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precent', 'Persentase Perolehan (%):') !!}
    {!! Form::text('precent', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.report.incomes.index') }}" class="btn btn-light">Batal</a>
</div>
