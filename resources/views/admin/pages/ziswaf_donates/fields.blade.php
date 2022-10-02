<div class="col-md-6">
    <!-- Name Field -->
    <div class="form-group">
        {!! Form::label('name', 'Nama:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Is Anonim Field -->
    <div class="form-group">
        <div class="control-label">Sembunyikan nama (Hamba Allah):</div>
        <label class="custom-switch mt-2 pl-0">
            <input type="checkbox" name="is_anonim" value="1" class="custom-switch-input" {{ @$donate->is_anonim == 1 ? 'checked' : '' }}>
            <span class="custom-switch-indicator"></span>
        </label>
    </div>

    <!-- Donate Date Field -->
    <div class="form-group">
      {!! Form::label('date_donate', 'Tanggal Donasi:') !!}
      {!! Form::date('date_donate', @$donate->date_donate ? date('Y-m-d', strtotime($donate->date_donate)) : date('Y-m-d'), ['class' => 'form-control', 'max' => date('Y-m-d')]) !!}
    </div>

    <!-- Email Field -->
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Phone Field -->
    <div class="form-group">
        {!! Form::label('phone', 'Telepon:') !!}
        {!! Form::number('phone', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Message Field -->
    <div class="form-group">
        {!! Form::label('message', 'Doa:') !!}
        {!! Form::textarea('message', null, ['class' => 'form-control', 'style' => 'height: 100px;']) !!}
    </div>

    <!-- Total Donate Field -->
    {!! Form::label('total_donate', 'Total Donasi:') !!}
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Rp</span>
        </div>
        {!! Form::text('total_donate', null, ['class' => 'form-control currency', 'aria-describedby' => 'basic-addon1']) !!}
    </div>
</div>

<div class="col-md-6">
    {{-- <div class="card-thumbnail mb-4">
        <div class="thumb-pict">
          <img class="w-100" src="{{ asset('storage/' . $ziswaf->image) }}" alt="{{ $ziswaf->title }}">
          <span class="tag-cat">{{ $ziswaf->category->name }}</span>
        </div>
        <div class="card-detail">
          <h6>{{ $ziswaf->title }}</h6>
          <p class="text-xs mb-1 font-medium">{{ $ziswaf->location }}</p>
          <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $ziswaf->donate_sum_total_donate/$ziswaf->target_dana*100 }}%" aria-valuenow="{{ $ziswaf->donate_sum_total_donate/$ziswaf->target_dana*100 }}" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="d-flex mt-2 justify-content-between">
            <div class="w-left mr-2">
              <span class="text-xs clr-grey">Terkumpul</span>
              <h6 class="text-sm">Rp {{ number_format($ziswaf->donate_sum_total_donate,0,",",".") }}</h6>
            </div>
            <div class="w-right text-right">
              <span class="text-xs clr-grey">Sisa Hari</span>
              <h6 class="text-sm">{{ $ziswaf->count_day }}</h6>
            </div>
          </div>
        </div>
    </div> --}}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary save']) !!}
    <a href="{{ route('admin.donatur.ziswaf.index') }}" class="btn btn-light">Batal</a>
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
