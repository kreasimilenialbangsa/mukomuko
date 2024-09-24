@extends('admin.layouts.app')
@section('title')
    Laporan Midtrans 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Laporan Midtrans</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Laporan Midtrans</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                {{-- <a href="{{ route('admin.approval.ziswaf.index')}}" class="btn btn-primary form-btn">Kembali</a> --}}
            </div>
        </div>
    <div class="section-body">
       <div class="card border border-top-0">
            <div class="card-body">
                    @include('admin.pages.reports.midtrans.table')
                </div>
            </div>
       </div>
   </div>
    </section>

<!-- Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <form action="{{ route('admin.report.midtrans.export') }}" method="get">
            <div class="modal-header">
                <h5 class="modal-title">Export Laporan Midtrans</h5>
            </div>
            <div class="modal-body content-export">
                    <div class="row">
                        {{-- <div class="col-md-12">
                            <div class="form-group">
                                <label for="range_date">Tanggal</label>
                                <input type="text" class="form-control form-control-sm" name="range_date" id="range_date" placeholder="Filter Tanggal" value="" autocomplete="off" style="cursor: pointer;" required>
                                <input type="hidden" name="from_date" id="from_date"><input type="hidden" name="to_date" id="to_date">
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="period">Periode</label>
                                <select class="form-control select2" id="period" name="period">
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                    <option value="3">Akhir Tahun</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from">Dari Bulan</label>
                                <select class="form-control select2" id="from" name="from">
                                    @foreach($months as $key => $month)
                                    <option value="{{ $key+1 }}">{{ \Carbon\Carbon::parse('01-'.$month['month'])->isoFormat('MMMM') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="to">Ke Bulan</label>
                                <select class="form-control select2 select-to" id="to" name="to">
                                    @foreach($months as $key => $month)
                                    <option id="{{ $key+1 }}" value="{{ $key+1 }}" {{ $key+1 == date('m') ? 'selected' : '' }}>{{ \Carbon\Carbon::parse('01-'.$month['month'])->isoFormat('MMMM') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year">Tahun</label>
                                <select class="form-control select2" id="year" name="year">
                                    @foreach($year as $row)
                                        <option value="{{ $row }}" {{ $row == date('Y') ? 'selected' : '' }}>{{ $row }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Export</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@push('script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.modal-export').on('click', function() {
                $('#exportModal').modal('toggle');
                $('#from').val('');
                $('#to').val('');
            });
        });
    </script>
@endpush


