@extends('admin.layouts.app')
@section('title')
    Perolehan Kaleng NU 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h1>Perolehan Kaleng NU</h1>
                <div class="section-header-breadcrumb mt-2">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Perolehan Kaleng NU</div>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                {{-- <a href="{{ route('admin.approval.ziswaf.index')}}" class="btn btn-primary form-btn">Kembali</a> --}}
            </div>
        </div>
        <div class="section-body">
            <div class="card border border-top-0">
                    <div class="card-body">
                            @include('admin.pages.reports.financial.table')
                        </div>
                    </div>
            </div>
        </div>
    </section>

<!-- Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <form action="{{ route('admin.report.keuangan.export') }}" method="get">
            <div class="modal-header">
                <h5 class="modal-title">Export Perolehan Kaleng NU</h5>
            </div>
            <div class="modal-body content-export">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="month">Bulan</label>
                                <select class="form-control select2-modal" month name="month">
                                    @foreach($months as $month)
                                        <option value="{{ $month['number'] }}" {{ $month['number'] == date('m') ? 'selected' : '' }}>{{ $month['text'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year">Tahun</label>
                                <select class="form-control select2-modal" id="year" name="year">
                                    @foreach($years as $year)
                                        <option value="{{ $year }}" {{ $year == date('m') ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="desa">Desa</label>
                                <select class="form-control select2-modal" id="desa" name="desa">
                                    <option value="">Semua Desa</option>
                                    @foreach($desa as $row)
                                        <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
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

@push('script')
    <script>
        $(document).ready(function() {
            $('.modal-export').on('click', function() {
                $('#exportModal').modal('toggle');
            });
        });
    </script>
@endpush


