@push('style')
    @include('admin.layouts.datatables_css')
    <style>
        .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
            line-height: calc(1em + .75rem);
        }
        .select2-container--bootstrap4 .select2-selection--single {
            height: 31px !important;
        }
        .select2-container .select2-selection--multiple, .select2-container .select2-selection--single {
            min-height: unset !important;
        }
    
        .table:not(.table-sm) tfoot th {
            border-bottom: none;
            background-color: rgba(0, 0, 0, 0.04);
            color: #666;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        table.dataTable tfoot th {
            border-top: 1px solid #ddd !important;
            border-bottom: 1px solid #ddd !important;
        }
    </style>
@endpush

<div>
    <table class="table table-striped" id="table" width="100%">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Bulan</th>
                <th colspan="2">Total</th>
                <th rowspan="2">Status</th>
                <th rowspan="2">Aksi</th>
            </tr>
            <tr>
                <th>Penerimaan</th>
                <th>Pengeluaran</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Jumlah</th>
                <th>Total Income</th>
                <th>Total Outcome</th>
                <th colspan="2"></th>
            </tr>
        </tfoot>
    </table>
</div>

@push('script')
    @include('admin.layouts.datatables_js')

    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable({
                dom: "<'row justify-content-between px-3 mb-2'<'row justify-content-center'<'px-2 py-1 py-md-0'<'fdate'>><'px-2 py-1 py-md-0'<'fkecamatan'>><'px-2 py-1 py-md-0'<'fdesa'>>><<'bexport'>>><'row justify-content-between px-3 mb-1'>" + "<'row'<'col-sm-12'tr>>",
                pageLength: 100,
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: {
                    url: "{!!  route('admin.report.annual.index') !!}",
                    data: function(d) {
                        d.year = $('select[name="year"]').val()
                        d.kecamatan = $('.fselect-kecamatan').val()
                        d.desa = $('.fselect-desa').val()
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center' },
                    { data: 'month_text', name: 'month_text', className: 'text-center' },
                    { data: 'income', name: 'income', className: 'text-center' },
                    { data: 'outcome', name: 'outcome', className: 'text-center' },
                    { data: 'status', name: 'status', className: 'text-center' },
                    { data: 'action', name: 'action', className: 'text-center', orderable: false }
                ],
                footerCallback: function ( row, data, start, end, display ) {
                    var api = this.api();

                    const rupiah = (number)=>{
                        return new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                        minimumFractionDigits: 0
                        }).format(number);
                    }
        
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,.Rp]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
        
                    // Total over all pages
                    totalIncome = api.column( 2 ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );
                    totalOutcome = api.column( 3 ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );
        
                    // Update footer
                    $( api.column( 2 ).footer() ).html(rupiah(totalIncome));
                    $( api.column( 3 ).footer() ).html(rupiah(totalOutcome));
                }
            });

            $("div.bexport").html(`<button class="btn btn-primary btn-block modal-export"><i class="fa fa-file-excel"></i> Export</button>`);

            $("div.fdate").html(`
                <label class="d-flex align-items-center">
                        <span class="mr-2">Tahun:</span>
                        <select class="form-control form-control-sm fselect2" name="year">
                            @foreach($year as $row)
                                <option value="{{ $row }}" {{ $row == date('Y') ? 'selected' : '' }}>{{ $row }}</option>
                            @endforeach
                        </select>
                </label>
            `);

            $('select[name="year"]').on('change', function(){
                table.draw();
            });

            $("div.fkecamatan").html(`
                <div style="width: 170px;">
                    <select class="form-control form-control-sm fselect2 fselect-kecamatan" name="kecamatan">
                        <option value="">Semua Kecamatan</option>
                        @foreach($kecamatan as $row)
                            <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            `);

            $('.fselect-kecamatan').on('change', function(){
                table.draw();
            });

            $("div.fdesa").html(`
                <div style="width: 150px;">
                    <select class="form-control form-control-sm fselect2 fselect-desa" name="desa">
                        <option value="">Semua Desa</option>
                        @foreach($desa as $row)
                            <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            `);

            $('.fselect-desa').on('change', function(){
                table.draw();
            });

            $('.fselect2').select2({
                theme: 'bootstrap4',
            });
        });

    </script>
@endpush