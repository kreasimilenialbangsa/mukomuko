<table>
    <thead>
        <tr>
            <th style="text-align: center;" colspan="5"><b>LAPORAN TAHUNAN</b></th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="5"><b>LAZISNU KABUPATEN MUKOMUKO</b></th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="5"><b>TAHUN {{ $year }}</b></th>
        </tr>
    </thead>
</table>

<table>
    <thead>
        <tr>
            <th rowspan="2" width="50px" style="text-align: center; background-color: #00B050;"><b>No</b></th>
            <th rowspan="2" width="160px" style="text-align: center; background-color: #00B050;"><b>Bulan</b></th>
            <th colspan="2" width="160px" style="text-align: center; background-color: #00B050;"><b>Total</b></th>
            <th rowspan="2" width="140px" style="text-align: center; background-color: #00B050;"><b>Status</b></th>
        </tr>
        <tr>
            <th width="160px" style="text-align: center; background-color: #00B050;"><b>Penerimaan</b></th>
            <th width="160px" style="text-align: center; background-color: #00B050;"><b>Pengeluaran</b></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($result as $key => $item)
            <tr>
                <td style="text-align: center;">{{ $key+1 }}</td>
                <td>{{ $item['month_text'] }}</td>
                <td>{{ number_format($item['income'],0,",",",") }}</td>
                <td>{{ number_format($item['outcome'],0,",",",") }}</td>
                <td style="text-align: center;">{{ $item['status'] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center;">Data tidak ada</td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2" style="text-align: center; background-color: #FFC000;">Total</td>
            <td style="background-color: #FFC000;">{{ number_format($total['total_income'],0,",",",") }}</td>
            <td style="background-color: #FFC000;">{{ number_format($total['total_outcome'],0,",",",") }}</td>
            <td style="text-align: center; background-color: #FFC000;">-</td>
        </tr>
    </tfoot>
</table>