<div class="col-sm-6">
    <!-- Desa Id Field -->
    <div class="form-group">
        {!! Form::label('desa_id', 'Desa:') !!}
        {!! Form::select('desa_id', $desa, null, ['class' => 'form-control select2']) !!}
    </div>
    
    <!-- Category Id Field -->
    <div class="form-group">
        {!! Form::label('category_id', 'Kategori:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control select2']) !!}
    </div>
</div>
    
<div class="col-sm-6">
    <!-- Description Field -->
    <div class="form-group">
        {!! Form::label('description', 'Deskripsi:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'style' => 'height: 150px;']) !!}
    </div>

    <!-- Nominal Field -->
    {!! Form::label('nominal', 'Nominal:') !!}
    <div class="input-group mb-3">
        <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Rp</span>
        </div>
        {!! Form::text('nominal', null, ['class' => 'form-control currency', 'aria-describedby' => 'basic-addon1']) !!}
    </div>
</div>
    <!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary save']) !!}
    <a href="{{ route('admin.outcomes.index') }}" class="btn btn-light">Batal</a>
</div>

@push('script')
  <script>
    $(document).on('click','.save',function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah Anda yakin data sudah benar?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#45BF7C',
            cancelButtonColor: '#B9B2B2',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Simpan',
            }).then((result) => {
            if (result.isConfirmed) {
                $('.form-save').submit();
            }
        });
    });
  </script>    
@endpush
