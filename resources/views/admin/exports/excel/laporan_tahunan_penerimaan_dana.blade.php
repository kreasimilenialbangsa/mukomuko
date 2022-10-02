<table>
    <thead>
        <tr>
            <th style="text-align: center;" colspan="5"><b>LAPORAN PENERIMAAN DANA TAHUNAN BERDASARKAN PROGRAM</b></th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="5"><b>LAZISNU KABUPATEN MUKOMUKO</b></th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="5"><b>TAHUN {{ $year }}</b></th>
        </tr>
    </thead>
</table>

@forelse($result as $key => $row)
    @if($key > 0)
    <table>
        <thead>
            <tr>
                <th colspan="5" style="text-align: center;"><b>BULAN {{ strtoupper($row['month_text']) }} {{ $year }}</b></th>
            </tr>
            <tr>
                <th width="50px" style="text-align: center; background-color: #00B050;"><b>No</b></th>
                <th colspan="3" width="250px" style="text-align: center; background-color: #00B050;"><b>Penerima Dana</b></th>
                <th width="160px" style="text-align: center; background-color: #00B050;"><b>Jumlah</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($row['income_detail'] as $no => $income)
            <tr>
                <td style="text-align: center;">{{ $no+1 }}</td>
                <td colspan="3">{{ $income['title'] }}</td>
                <td>{{ number_format($income['total_donate'],0,",",",") }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: center; background-color: #FFC000;">Total</td>
                <td style="background-color: #FFC000;">{{ number_format($row['income'],0,",",",") }}</td>
            </tr>
        </tfoot>
    </table>
    @endif
@empty
@endforelse