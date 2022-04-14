<div class="col-md-6">
    <!-- Book Date Field -->
    <div class="form-group">
        {!! Form::label('book_date', 'Tanggal Pengajuan:') !!}
        {!! Form::date('book_date', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Book Date Field -->
    <div class="form-group">
        {!! Form::label('reason', 'Alasan Pengajuan:') !!}
        {!! Form::textarea('reason', null, ['class' => 'form-control', 'style' => 'height: 150px']) !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary save']) !!}
    <a href="{{ route('admin.service.ambulan.index') }}" class="btn btn-light">Batal</a>
</div>

@push('script')
  <script>
    $(document).on('click','.save',function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah Anda yakin ingin menambahkan data ini?",
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
