@extends('admin.layouts.app')

@section('title')
  Dashboard
@endsection

@section('content')
    <section class="section">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
              <div class="card-stats">
                <div class="card-stats-title">Ziswaf</div>
                <div>
                  <div class="card-stats-item text-left">
                    <div class="card-stats-item-count">{{ $total_ziswaf['pending'] }}</div>
                    <div class="card-stats-item-label">Pending</div>
                  </div>
                  <div class="card-stats-item text-left">
                    <div class="card-stats-item-count">{{ $total_ziswaf['complete'] }}</div>
                    <div class="card-stats-item-label">Approve</div>
                  </div>
                </div>
              </div>
              <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-archive"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Ziswaf</h4>
                </div>
                <div class="card-body">
                  {{ $total_ziswaf['total'] }}
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
              <div class="card-stats">
                <div class="card-stats-title">Program</div>
                <div>
                  <div class="card-stats-item text-left">
                    <div class="card-stats-item-count">{{ $total_program['pending'] }}</div>
                    <div class="card-stats-item-label">Pending</div>
                  </div>
                  <div class="card-stats-item text-left">
                    <div class="card-stats-item-count">{{ $total_program['complete'] }}</div>
                    <div class="card-stats-item-label">Approve</div>
                  </div>
                </div>
              </div>
              <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-archive"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Program</h4>
                </div>
                <div class="card-body">
                  {{ $total_program['total'] }}
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
              <div class="card-stats">
                <div class="card-stats-title">Penghimpunan Dana</div>
                <div>
                  <div class="card-stats-item text-left">
                    <div class="card-stats-item-count">{{ "Rp " . number_format($penghimpunan['ziswaf'],0,",",".") }}</div>
                    <div class="card-stats-item-label">Ziswaf</div>
                  </div>
                  <div class="card-stats-item  text-left">
                    <div class="card-stats-item-count">{{ "Rp " . number_format($penghimpunan['program'],0,",",".") }}</div>
                    <div class="card-stats-item-label">Program</div>
                  </div>
                </div>
              </div>
              <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-archive"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Penghimpunan Dana</h4>
                </div>
                <div class="card-body">
                  {{ "Rp " . number_format($penghimpunan['total'],0,",",".") }}
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-md-8">
            <div class="row">
              @role('SuperAdmin|Kabupaten')
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Statistik Donasi</h4>
                            <div class="d-flex align-items-center">
                              {{-- <span style="width: 155px;">Filter Tanggal:</span> --}}
                              <div class="filter-date">
                                <input type="text" class="form-control form-control-sm" name="range_date" placeholder="Filter Tanggal" value="" autocomplete="off" style="cursor: pointer; width: 200px;">
                                <input type="hidden" name="from_date"><input type="hidden" name="to_date">
                              </div>
                              <button class="btn btn-primary btn-block export ml-3"><i class="fa fa-arrow-circle-down"></i> Download</button>
                            </div>
                        </div>
                        <div class="card-body">
                          <div id="barChart" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
              @endrole

              @role('SuperAdmin|Desa')
                <div class="col-md-12">
                  <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" id="form-tab2" data-toggle="tab" href="#form2" role="tab" aria-controls="form" aria-selected="true">Ziswaf</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="images-tab2" data-toggle="tab" href="#images2" role="tab" aria-controls="images" aria-selected="false">Program</a>
                      </li>
                  </ul>

                  <div class="card">
                    <div class="card-body border border-top-0">
                      <div class="tab-content" id="myTab3Content">
                        <div class="tab-pane fade show active" id="form2" role="tabpanel" aria-labelledby="form-tab2">
                          <div class="card mb-0">
                            <div class="card-header">
                              <h4>List Donasi</h4>
                              <div class="card-header-action">
                                <a href="{{ route('admin.donatur.ziswaf.index') }}" class="btn btn-danger">Lihat Lebih Banyak <i class="fas fa-chevron-right"></i></a>
                              </div>
                            </div>
                            <div class="card-body p-0">
                              <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                  <tbody>
                                    <tr>
                                      <th>Nama Ziswaf</th>
                                      <th>Nama Donatur</th>
                                      <th>Status</th>
                                      <th>Tanggal</th>
                                    </tr>
                                    @forelse($donates_ziswaf as $donate)
                                    <tr>
                                      <td class="font-weight-600">{{ $donate->type == '\App\Models\Admin\Ziswaf' ? @$donate->ziswaf->title :  @$donate->program->title }}</td>
                                      <td class="font-weight-600">{{ $donate->name }}</td>
                                      <td>{!! $donate->is_confirm == 1 ? '<span class="badge badge-primary">Approve</span>' : '<span class="badge badge-warning">Pending</span>' !!}</td>
                                      <td>{{ date('d/M/Y H:i:s', strtotime($donate->created_at)) }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                      <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                    @endforelse
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="images2" role="tabpanel" aria-labelledby="images-tab2">
                          <div class="card mb-0">
                            <div class="card-header">
                              <h4>List Donasi</h4>
                              <div class="card-header-action">
                                <a href="{{ route('admin.donatur.program.index') }}" class="btn btn-danger">Lihat Lebih Banyak <i class="fas fa-chevron-right"></i></a>
                              </div>
                            </div>
                            <div class="card-body p-0">
                              <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                  <tbody>
                                    <tr>
                                      <th>Nama Program</th>
                                      <th>Nama Donatur</th>
                                      <th>Status</th>
                                      <th>Tanggal</th>
                                    </tr>
                                    @forelse($donates_program as $donate)
                                    <tr>
                                      <td class="font-weight-600">{{ $donate->type == '\App\Models\Admin\Ziswaf' ? @$donate->ziswaf->title :  @$donate->program->title }}</td>
                                      <td class="font-weight-600">{{ $donate->name }}</td>
                                      <td>{!! $donate->is_confirm == 1 ? '<span class="badge badge-primary">Approve</span>' : '<span class="badge badge-warning">Pending</span>' !!}</td>
                                      <td>{{ date('d/M/Y H:i:s', strtotime($donate->created_at)) }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                      <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                    @endforelse
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endrole
            </div>
          </div>

          <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                  <div class="card card-hero">
                    <div class="card-header">
                      <div class="card-icon">
                        <i class="fas fa-ambulance"></i>
                      </div>
                      <h4>{{ count($ambulance) }}</h4>
                      <div class="card-description">Permohonan Ambulan</div>
                    </div>
                    <div class="card-body p-0">
                      <div class="tickets-list">
                        @forelse ($ambulance as $item)
                          <a href="{{ $isAdmin == true ? '#' : route('admin.service.ambulan.edit', $item->id) }}" class="ticket-item">
                            <div class="ticket-title">
                              <h4>Permohonan Ambulan - {{ date('d/m/Y', strtotime($item->book_date)) }}</h4>
                            </div>
                            <div class="ticket-info">
                              <div>{{ $item->user->name }}</div>
                              <div class="bullet"></div>
                              <div class="text-primary">{{ \Carbon\Carbon::parse($item->book_date)->diffForHumans() }}</div>
                            </div>
                          </a>
                        @empty
                          <a href="#" class="ticket-item">
                            <div class="ticket-title">
                              <h4>Tidak ada permohonan</h4>
                            </div>
                          </a>
                        @endforelse
                        <a href="{{ $isAdmin == true ? route('admin.approval.ambulan.index') : route('admin.service.ambulan.index') }}" class="ticket-item ticket-more">
                          Lihat Semuanya <i class="fas fa-chevron-right"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="card card-hero">
                    <div class="card-header">
                      <div class="card-icon">
                        <i class="fas fa-money-bill-wave"></i>
                      </div>
                      <h4>{{ count($service) }}</h4>
                      <div class="card-description">Permohonan Dana</div>
                    </div>
                    <div class="card-body p-0">
                      <div class="tickets-list">
                        @forelse ($service as $item)
                        <a href="{{ $isAdmin == true ? route('admin.approval.dana.edit', $item->id) : route('admin.service.dana.edit', $item->id) }}" class="ticket-item">
                          <div class="ticket-title">
                            <h4>{{ $item->category->name }}</h4>
                          </div>
                          <div class="ticket-info">
                            <div>{{ $item->user->name }}</div>
                            <div class="bullet"></div>
                            <div class="text-primary">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</div>
                          </div>
                        </a>
                        @empty
                        <a href="#" class="ticket-item">
                          <div class="ticket-title">
                            <h4>Tidak ada permohonan</h4>
                          </div>
                        </a>
                        @endforelse
                        <a href="{{ $isAdmin == true ? route('admin.approval.dana.index') : route('admin.service.dana.index') }}" class="ticket-item ticket-more">
                          Lihat Semuanya <i class="fas fa-chevron-right"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </section>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@push('script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
      $(document).ready(function() {
          // Select2
          $('.standard-select').select2({
              theme: 'bootstrap4'
          });

          $('input[name="range_date"]').daterangepicker({
              autoUpdateInput: false,
              showDropdowns: true,
              alwaysShowCalendars: true,
              maxDate: new Date(),
              maxSpan: {
                  days: 10
              },
              locale: {
                  "cancelLabel": "Clear",
                  "customRangeLabel": "Kustom Tanggal",
                  "applyLabel": "Terapkan",
                  "cancelLabel": "Kosongkan",
                  "daysOfWeek": [
                      "Min",
                      "Sen",
                      "Sel",
                      "Rab",
                      "Kam",
                      "Jum",
                      "Sab"
                  ],
              },
              // ranges: {
              //     'Hari Ini': [moment(), moment()],
              //     'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              //     '7 Hari Lalu': [moment().subtract(6, 'days'), moment()],
              //     '30 Hari Lalu': [moment().subtract(29, 'days'), moment()],
              //     'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
              //     'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              // }
          });

          chart();

          $('input[name="range_date"]').on('apply.daterangepicker', function(ev, picker) {
              $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
              $('input[name="from_date"]').val(picker.startDate.format('YYYY-MM-DD'));
              $('input[name="to_date"]').val(picker.endDate.format('YYYY-MM-DD'));
              chart();
          });

          $('input[name="range_date"]').on('cancel.daterangepicker', function(ev, picker) {
              $(this).val('');
              $('input[name="from_date"]').val('');
              $('input[name="to_date"]').val('');
              chart();
          });

          $('.select-filter').on('change', function() {
              chart();
          });

          function chart() {
              var type = $('select[name=type]').val();
              var from_date = $('input[name=from_date]').val();
              var to_date = $('input[name=to_date]').val();

              var param = {
                  type: type,
                  from_date: from_date,
                  to_date: to_date
              };

              $.ajax({
                  url: "{{ url()->current() }}",
                  data: param,
                  success: function(res) {
                      charts = new Highcharts.Chart({
                          exporting: {
                              enabled: false
                          },
                          credits: {
                              enabled: false
                          },
                          chart: {
                              type: 'column',
                              renderTo: "barChart"
                          },
                          title: {
                              text: ''
                          },
                          subtitle: {
                              text: ''
                          },
                          xAxis: {
                            categories: res.data.date,
                              crosshair: true
                          },
                          yAxis: {
                              min: 0,
                              title: {
                              text: 'Total'
                              }
                          },
                          plotOptions: {
                              column: {
                                  pointPadding: 0.2,
                                  borderWidth: 0,
                                  dataLabels: {
                                      enabled: true,
                                      crop: false,
                                      overflow: 'none'
                                  }
                              }
                          },
                          colors: [
                              '#7cb5ec',
                              '#434348',
                              '#dfb985',
                              '#f7a35c',
                              '#dc3545'
                          ],
                          series: [{
                              name: 'Ziswaf',
                              data: res.data.ziswaf

                          }, {
                              name: 'Program',
                              data: res.data.program
                          }]
                      });

                      $(document).on('click', '.export', function(){
                          charts.exportChart();
                      });
                  }
              });
          }
      });
  </script>
@endpush

