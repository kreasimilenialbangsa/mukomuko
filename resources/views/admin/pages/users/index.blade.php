@extends('admin.layouts.app')
@section('title')
    {{ request()->segment(3) == 'members' ? 'Akun Anggota' : 'Akun User' }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>{{ request()->segment(3) == 'members' ? 'Akun Anggota' : 'Akun User' }}</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">{{ request()->segment(3) == 'members' ? 'Akun Anggota' : 'Akun User' }}</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.account.'.request()->segment(3).'.create')}}" class="btn btn-primary form-btn"><i class="fas fa-plus"></i> Akun</a>
            </div>
        </div>
    <div class="section-body">

           <div class="card">
                <div class="card-body">
                @include('admin.pages.users.table')
            </div>
       </div>
   </div>

    </section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content pb-4">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
            <h4 class="mb-4">Scan QR Code</h4>
            <div class="qr-code-content"></div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('script')
  <script>
      $(document).on('click','.qr-code',function(e){
        e.preventDefault();
        let id = $(this).data('id');

        $.ajax({
            url: "{{ route('admin.account.qrcode') }}",
            type: "POST",
            data: {
              "_token": "{{ csrf_token() }}",
              "id": id
            },
            success: function(res){
              $('.qr-code-content').html(res);
            }
        })
      });
  </script>
@endpush
