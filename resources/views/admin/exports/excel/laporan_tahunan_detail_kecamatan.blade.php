<table>
    <thead>
        <tr>
            <th style="text-align: center;" colspan="5"><b>LAPORAN DANA PENERIMAAN DAN PENGELUARAN</b></th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="5"><b>LAZISNU KABUPATEN MUKOMUKO</b></th>
        </tr>
        <tr>    
            <th style="text-align: center;" colspan="5"><b>BULAN {{ strtoupper(\Carbon\Carbon::parse($month)->isoFormat('MMMM')) }} TAHUN {{ $year }}</b></th>
        </tr>
    </thead>
</table>

@foreach($kecamatan as $key => $row)
    <table>
        <thead>
            @if($key != 0)
                <tr><th></th><th></th><th></th><th></th><th></th></tr>
                <tr><th></th><th></th><th></th><th></th><th></th></tr>
            @endif
            <tr>
                <th colspan="5" style="text-align: center; background-color: #00B050;"><b>LAPORAN KECAMATAN</b></th>
            </tr>
            <tr>
                <th colspan="5" style="text-align: center; background-color: #00B050;"><b>{{ strtoupper($row['location']) }}</b></th>
            </tr>
            <tr>
                <th width="50px" style="text-align: center; background-color: #00B050;"><b>No</b></th>
                <th colspan="3" width="250px" style="text-align: center; background-color: #00B050;"><b>Penerima Dana</b></th>
                <th width="160px" style="text-align: center; background-color: #00B050;"><b>Jumlah</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($row['data']['result']['income_detail'] as $no => $income)
            <tr>
                <td style="text-align: center;">{{ $no+1 }}</td>
                <td colspan="3">{{ $income['title'] }}</td>
                <td style="text-align: right;">{{ number_format($income['total_donate'],0,",",",") }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: center; background-color: #FFC000;">Total</td>
                <td style="background-color: #FFC000; text-align: right;">{{ number_format($row['data']['total']['total_income'],0,",",",") }}</td>
            </tr>
        </tfoot>
    </table>

    <table>
        <thead>
            <tr>
                <th width="50px" style="text-align: center; background-color: #00B050;"><b>No</b></th>
                <th colspan="3" width="250px" style="text-align: center; background-color: #00B050;"><b>Pengeluaran Dana</b></th>
                <th width="160px" style="text-align: center; background-color: #00B050;"><b>Jumlah</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($row['data']['result']['outcome_detail'] as $no => $outcome)
            <tr>
                <td style="text-align: center;">{{ $no+1 }}</td>
                <td colspan="3">{{ $outcome['title'] }}</td>
                <td style="text-align: right;">{{ number_format($outcome['total_donate'],0,",",",") }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: center; background-color: #FFC000;">Total</td>
                <td style="background-color: #FFC000; text-align: right;">{{ number_format($row['data']['total']['total_outcome'],0,",",",") }}</td>
            </tr>
        </tfoot>
    </table>
@endforeach