<div class="col-md-6">
    <!-- Name Field -->
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Is Anonim Field -->
    <div class="form-group">
        <div class="control-label">Sembunyikan nama (Hamba Allah):</div>
        <label class="custom-switch mt-2 pl-0">
            <input type="checkbox" name="is_anonim" value="1" class="custom-switch-input">
            <span class="custom-switch-indicator"></span>
        </label>
    </div>

    <!-- Email Field -->
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Phone Field -->
    <div class="form-group">
        {!! Form::label('phone', 'Phone:') !!}
        {!! Form::number('phone', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Message Field -->
    <div class="form-group">
        {!! Form::label('message', 'Message:') !!}
        {!! Form::textarea('message', null, ['class' => 'form-control', 'style' => 'height: 100px;']) !!}
    </div>

    <!-- Total Donate Field -->
    <div class="form-group">
        {!! Form::label('total_donate', 'Total Donate:') !!}
        {!! Form::number('total_donate', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="col-md-6">
    <div class="card-thumbnail mb-4">
        <div class="thumb-pict">
          <img class="w-100" src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}">
          <span class="tag-cat">{{ $program->category->name }}</span>
        </div>
        <div class="card-detail">
          <h6>{{ $program->title }}</h6>
          <p class="text-xs mb-1 font-medium">{{ $program->location }}</p>
          <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $program->donate_sum_total_donate/$program->target_dana*100 }}%" aria-valuenow="{{ $program->donate_sum_total_donate/$program->target_dana*100 }}" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="d-flex mt-2 justify-content-between">
            <div class="w-left mr-2">
              <span class="text-xs clr-grey">Terkumpul</span>
              <h6 class="text-sm">Rp {{ number_format($program->donate_sum_total_donate,0,",",".") }}</h6>
            </div>
            <div class="w-right text-right">
              <span class="text-xs clr-grey">Sisa Hari</span>
              <h6 class="text-sm">{{ $program->count_day }}</h6>
            </div>
          </div>
        </div>
      </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.donatur.program.index') }}" class="btn btn-light">Cancel</a>
</div>

@push('style')
    <style>
        .card-thumbnail {
        transition: .3s linear all;
        }

        .card-thumbnail:hover{
        transform: scale(1.02);
        }

        .card-thumbnail .thumb-pict{
        position: relative;
        border-radius: 4px 4px 0px 0px;
        }

        .card-thumbnail .tag-cat{
        background: #45BF7C;
        border-radius: 4px;
        padding: 3px 8px;
        color: white;
        position: absolute;
        z-index: 1;
        right: 15px;
        top: 10px;
        font-size: 0.75rem;
        font-weight: 500;
        }

        .card-thumbnail .thumb-pict img{
        height: 300px;
        object-fit: cover;
        border-radius: 4px 4px 0px 0px;
        object-position: center;
        }

        .card-thumbnail .card-detail {
        background: #FFFFFF;
        box-shadow: 0px 2px 4px rgb(0 0 0 / 8%);
        border-radius: 0px 0px 4px 4px;
        overflow-wrap: break-word;
            position: relative;
            word-break: break-word;
        padding: 15px;
        }

        .card-thumbnail .progress{
        height: 4px;
        border-radius: 10px;
        background:#E3E3E3;
        }

        .card-thumbnail .progress .bg-success{
        background-color: #45BF7C !important;
        }
    </style>
@endpush
