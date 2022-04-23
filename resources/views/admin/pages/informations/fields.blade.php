<div class="col-md-7 col-12">
    <!-- Title Field -->
    <div class="form-group">
        {!! Form::label('title', 'Penerima Manfaat:') !!}
        {!! Form::text('penerima_manfaat', $informations->penerima_manfaat, ['class' => 'form-control currency', 'aria-describedby' => 'basic-addon1']) !!}
    </div>

    <!-- Title Field -->
    <div class="form-group">
        {!! Form::label('title', 'Penghimpunan:') !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Rp</span>
            </div>
            {!! Form::text('penghimpunan', $informations->penghimpunan, ['class' => 'form-control currency', 'aria-describedby' => 'basic-addon1']) !!}
        </div>
    </div>

    <!-- Title Field -->
    <div class="form-group">
        {!! Form::label('title', 'Penyaluran:') !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Rp</span>
            </div>
            {!! Form::text('penyaluran', $informations->penyaluran, ['class' => 'form-control currency', 'aria-describedby' => 'basic-addon1']) !!}
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 d-flex align-items-center">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary save']) !!}
    <div class="ml-2">
        <span class="text-danger"><i>Terakhir di perbarui: {{ date('d/M/Y H:i:s', strtotime($informations->created_at)) }}</i></span>
    </div>
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

