<div>
    <table class="table table-striped" id="table_income" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Penerimaan Dana</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Jumlah</th>
                <th>Total</th>
            </tr>
        </tfoot>
    </table>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            var table1 = $('#table_income').DataTable({
                dom: "<'row justify-content-between px-3 mb-2'<<'fdate'>>><'row justify-content-between px-3 mb-1'>" + "<'row'<'col-sm-12'tr>>",
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{!!  route('admin.report.annual.show', ['date' => Request::segment(4), 'type' => 'income']) !!}",
                    data: function(d) {
                        d.kecamatan = $('.select-kecamatan').val(),
                        d.desa = $('.select-desa').val()
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center' },
                    { data: 'title', name: 'title', className: 'text-center' },
                    { data: 'total_donate', name: 'total_donate', className: 'text-center' },
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
                    total = api.column( 2 ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );
        
                    // Update footer
                    $( api.column( 2 ).footer() ).html(rupiah(total));
                }
            });

            $("div.bexport").html(`<a href="#" target="_blank" class="btn btn-primary btn-sm btn-block export-button"><i class="fa fa-file-excel"></i> Export</a>`);

            $('.select-kecamatan').on('change', function(){
                table1.draw();
            });

            $('.select-desa').on('change', function(){
                table1.draw();
            });
        });

    </script>
@endpush