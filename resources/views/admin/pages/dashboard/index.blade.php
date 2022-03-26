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
                <div class="card-stats-title">Ziswaf 
                  {{-- <div class="dropdown d-inline">
                    <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">August</a>
                    <ul class="dropdown-menu dropdown-menu-sm">
                      <li class="dropdown-title">Select Month</li>
                      <li><a href="#" class="dropdown-item">January</a></li>
                      <li><a href="#" class="dropdown-item">February</a></li>
                      <li><a href="#" class="dropdown-item">March</a></li>
                      <li><a href="#" class="dropdown-item">April</a></li>
                      <li><a href="#" class="dropdown-item">May</a></li>
                      <li><a href="#" class="dropdown-item">June</a></li>
                      <li><a href="#" class="dropdown-item">July</a></li>
                      <li><a href="#" class="dropdown-item active">August</a></li>
                      <li><a href="#" class="dropdown-item">September</a></li>
                      <li><a href="#" class="dropdown-item">October</a></li>
                      <li><a href="#" class="dropdown-item">November</a></li>
                      <li><a href="#" class="dropdown-item">December</a></li>
                    </ul>
                  </div> --}}
                </div>
                <div class="card-stats-items justify-content-center">
                  <div class="card-stats-item">
                    <div class="card-stats-item-count">{{ $total_ziswaf['pending'] }}</div>
                    <div class="card-stats-item-label">Pending</div>
                  </div>
                  <div class="card-stats-item">
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
                <div class="card-stats-title">Program
                  {{-- <div class="dropdown d-inline">
                    <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">August</a>
                    <ul class="dropdown-menu dropdown-menu-sm">
                      <li class="dropdown-title">Select Month</li>
                      <li><a href="#" class="dropdown-item">January</a></li>
                      <li><a href="#" class="dropdown-item">February</a></li>
                      <li><a href="#" class="dropdown-item">March</a></li>
                      <li><a href="#" class="dropdown-item">April</a></li>
                      <li><a href="#" class="dropdown-item">May</a></li>
                      <li><a href="#" class="dropdown-item">June</a></li>
                      <li><a href="#" class="dropdown-item">July</a></li>
                      <li><a href="#" class="dropdown-item active">August</a></li>
                      <li><a href="#" class="dropdown-item">September</a></li>
                      <li><a href="#" class="dropdown-item">October</a></li>
                      <li><a href="#" class="dropdown-item">November</a></li>
                      <li><a href="#" class="dropdown-item">December</a></li>
                    </ul>
                  </div> --}}
                </div>
                <div class="card-stats-items justify-content-center">
                  <div class="card-stats-item">
                    <div class="card-stats-item-count">{{ $total_program['pending'] }}</div>
                    <div class="card-stats-item-label">Pending</div>
                  </div>
                  <div class="card-stats-item">
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
                <div class="card-stats-title">Penghimpunan Dana
                  {{-- <div class="dropdown d-inline">
                    <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">August</a>
                    <ul class="dropdown-menu dropdown-menu-sm">
                      <li class="dropdown-title">Select Month</li>
                      <li><a href="#" class="dropdown-item">January</a></li>
                      <li><a href="#" class="dropdown-item">February</a></li>
                      <li><a href="#" class="dropdown-item">March</a></li>
                      <li><a href="#" class="dropdown-item">April</a></li>
                      <li><a href="#" class="dropdown-item">May</a></li>
                      <li><a href="#" class="dropdown-item">June</a></li>
                      <li><a href="#" class="dropdown-item">July</a></li>
                      <li><a href="#" class="dropdown-item active">August</a></li>
                      <li><a href="#" class="dropdown-item">September</a></li>
                      <li><a href="#" class="dropdown-item">October</a></li>
                      <li><a href="#" class="dropdown-item">November</a></li>
                      <li><a href="#" class="dropdown-item">December</a></li>
                    </ul>
                  </div> --}}
                </div>
                <div class="card-stats-items justify-content-center">
                  <div class="card-stats-item">
                    <div class="card-stats-item-count">{{ "Rp " . number_format($penghimpunan['ziswaf'],0,",",".") }}</div>
                    <div class="card-stats-item-label">Ziswaf</div>
                  </div>
                  <div class="card-stats-item">
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
          @role('SuperAdmin|Kabupaten')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Statistik Donasi</h4>
                        <div class="d-flex align-items-center">
                          {{-- <span style="width: 155px;">Filter Tanggal:</span> --}}
                          <input type="text" class="form-control form-control-sm" name="range_date" placeholder="Filter Tanggal" value="" autocomplete="off" style="cursor: pointer;">
                          <input type="hidden" name="from_date"><input type="hidden" name="to_date">
                          <button class="btn btn-primary btn-block export ml-3"><i class="fa fa-arrow-circle-down"></i> Download</button>
                        </div>
                    </div>
                    <div class="card-body">
                      <div id="barChart" style="width: 100%"></div>
                    </div>
                </div>
            </div>
          @endrole

          @role('SuperAdmin|Kecamatan|Desa')
            <div class="col-md-4">
              <div class="card card-hero">
                <div class="card-header">
                  <div class="card-icon">
                    <i class="far fa-question-circle"></i>
                  </div>
                  <h4>14</h4>
                  <div class="card-description">Customers need help</div>
                </div>
                <div class="card-body p-0">
                  <div class="tickets-list">
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>My order hasn't arrived yet</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Laila Tazkiah</div>
                        <div class="bullet"></div>
                        <div class="text-primary">1 min ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Please cancel my order</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Rizal Fakhri</div>
                        <div class="bullet"></div>
                        <div>2 hours ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Do you see my mother?</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Syahdan Ubaidillah</div>
                        <div class="bullet"></div>
                        <div>6 hours ago</div>
                      </div>
                    </a>
                    <a href="features-tickets.html" class="ticket-item ticket-more">
                      View All <i class="fas fa-chevron-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endrole

          @role('SuperAdmin|Desa')
            <div class="col-md-8">
              <div class="card">
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
                          <th>Aksi</th>
                        </tr>
                        @forelse($donates as $donate)
                        <tr>
                          <td class="font-weight-600">{{ $donate->program->title }}</td>
                          <td class="font-weight-600">{{ $donate->name }}</td>
                          <td>{!! $donate->status = 1 ? '<span class="badge badge-primary">Approve</span>' : '<span class="badge badge-warning">Pending</span>' !!}</td>
                          <td>{{ date('d/M/Y H:i:s', strtotime($donate->created_at)) }}</td>
                          <td>
                            <a href="#" class="btn btn-primary">Detail</a>
                          </td>
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
          @endrole
          
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
              ranges: {
                  'Hari Ini': [moment(), moment()],
                  'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                  '7 Hari Lalu': [moment().subtract(6, 'days'), moment()],
                  '30 Hari Lalu': [moment().subtract(29, 'days'), moment()],
                  'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
                  'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              }
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
                  url: "",
                  data: param,
                  success: function(data) {
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
                            categories: [
                                'Jan',
                                'Feb',
                                'Mar',
                                'Apr',
                                'May',
                                'Jun',
                                'Jul',
                                'Aug',
                                'Sep',
                                'Oct',
                                'Nov',
                                'Dec'
                            ],
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
                              data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

                          }, {
                              name: 'Program',
                              data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

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

