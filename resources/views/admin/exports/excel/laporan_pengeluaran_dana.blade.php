<table>
    <thead>
        <tr>
            <th style="text-align: center;" colspan="6"><b>LAPORAN PENGELUARAN DANA</b></th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="6"><b>LAZISNU KABUPATEN MUKOMUKO</b></th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="6"><b>TANGGAL {{ strtoupper(\Carbon\Carbon::parse($date['from_date'])->isoFormat('DD MMM YYYY')) }} SAMPAI {{ strtoupper(\Carbon\Carbon::parse($date['to_date'])->isoFormat('DD MMM YYYY')) }}</b></th>
        </tr>
    </thead>
</table>

<table>
    <thead>
        <tr>
            <th width="50px" style="text-align: center; background-color: #00B050;"><b>No</b></th>
            <th width="160px" style="text-align: center; background-color: #00B050;"><b>Tanggal</b></th>
            <th width="160px" style="text-align: center; background-color: #00B050;"><b>Desa</b></th>
            <th width="160px" style="text-align: center; background-color: #00B050;"><b>Bagan</b></th>
            <th width="160px" style="text-align: center; background-color: #00B050;"><b>Kategori</b></th>
            <th width="350px" style="text-align: center; background-color: #00B050;"><b>Deskripsi</b></th>
            <th width="200px" style="text-align: center; background-color: #00B050;"><b>Nominal</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($result as $no => $outcome)
        <tr>
            <td style="text-align: center;">{{ $no+1 }}</td>
            <td style="text-align: center;">{{ date("d/m/Y H:i", strtotime($outcome['date_outcome'])) }}</td>
            <td style="text-align: center;">{{ $outcome['desa']['name'] }}</td>
            <td style="text-align: center;">{{ isset($outcome['income']['name']) ? $outcome['income']['name'] : "-" }}</td>
            <td style="text-align: center;">{{ $outcome['category']['name'] }}</td>
            <td>{{ !empty($outcome['description']) ? $outcome['description'] : "-" }}</td>
            <td style="text-align: right;">{{ number_format($outcome['nominal'],0,",",",") }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6" style="text-align: center; background-color: #FFC000;"><strong>Total</strong></td>
            <td style="text-align: right; background-color: #FFC000;">{{ number_format($total,0,",",",") }}</td>
        </tr>
    </tfoot>
</table>