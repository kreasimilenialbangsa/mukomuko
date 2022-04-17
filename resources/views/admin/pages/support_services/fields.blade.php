<div class="col-md-6">
    <!-- Category Id Field -->
    <div class="form-group">
        {!! Form::label('name', 'Nama:') !!}
        {!! Form::text(null, $user->name, ['class' => 'form-control', 'readonly' => 'true']) !!}
    </div>

    <!-- Category Id Field -->
    <div class="form-group">
        {!! Form::label('nik', 'NIK:') !!}
        {!! Form::text(null, $user->profile->nik, ['class' => 'form-control', 'readonly' => 'true']) !!}
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <!-- Category Id Field -->
            <div class="form-group">
                {!! Form::label('birth_place', 'Tempat Lahir:') !!}
                {!! Form::text(null, $user->profile->birth_place, ['class' => 'form-control', 'readonly' => 'true']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <!-- Category Id Field -->
            <div class="form-group">
                {!! Form::label('birth_day', 'Tanggal Lahir:') !!}
                {!! Form::date(null, $user->profile->birth_day, ['class' => 'form-control', 'readonly' => 'true']) !!}
            </div>  
        </div>
    </div>

    <!-- Reason Field -->
    <div class="form-group">
        {!! Form::label('address', 'Alamat:') !!}
        {!! Form::textarea(null, $user->profile->address, ['class' => 'form-control', 'style' => 'height:100px;', 'readonly' => 'true']) !!}
    </div>
</div>

<div class="col-md-6">
    <!-- Category Id Field -->
    <div class="form-group">
        {!! Form::label('category_id', 'Untuk Keperluan:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control select2']) !!}
    </div>

    <!-- Reason Field -->
    <div class="form-group">
        {!! Form::label('reason', 'Alasan Mengajukan Permohonan Bantuan:') !!}
        {!! Form::textarea('reason', null, ['class' => 'form-control', 'style' => 'height:100px;']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary save']) !!}
    <a href="{{ route('admin.service.dana.index') }}" class="btn btn-light">Batal</a>
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