@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pages/profile.css') }}">
@endsection

@section('content')
  <div class="historytrans-page">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          @include('layouts.sidebar-profile')
        </div>
        <div class="col-md-9">
          <div class="box-white p-4">
            <h5>Riwayat Transaksi</h5>
            <div class="list-history">
              @forelse($donates as $donate)
              <div class="d-center border-bottom py-4 justify-content-between">
                <div class="type">
                  <h6>{{ $donate->type == '\App\Models\Admin\Ziswaf' ? $donate->ziswaf->title :  $donate->program->title }}</h6>
                  <div class="date-price">
                    <span class="clr-grey">{{ date('d M Y', strtotime($donate->created_at)) }} |</span>
                    <span class="clr-green">{{ "Rp " . number_format($donate->total_donate,0,",",".") }}</span>
                  </div>
                </div>
                <div class="pill-status {{ $donate->is_confirm == 0 ? 'yellow' : ($donate->is_confirm == 1 ? 'green' : 'gray') }}">
                  {{ $donate->is_confirm == 0 ? 'Pending' : ($donate->is_confirm == 1 ? 'Sukses' : 'Kedaluwarsa') }}
                </div>
              </div>
              @empty
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
  </script>
@endsection