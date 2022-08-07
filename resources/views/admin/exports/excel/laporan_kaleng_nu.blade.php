<table>
    <thead>
        <tr>
            <th style="text-align: center;" colspan="14"><b>REKAPITULASI HASIL PEROLEHAN KALENG NU</b></th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="14"><b>LAZISNU KABUPATEN MUKOMUKO</b></th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="14"><b>BULAN {{ strtoupper($date['month']) }} TAHUN {{ $date['year'] }}</b></th>
        </tr>
    </thead>
</table>

<table>
    <thead>
        <tr>
            <th width="50px" style="background-color: #A5A5A5; text-align: center;"><b>NO</b></th>
            <th width="150px" style="background-color: #FFFF00; text-align: center;"><b>KECAMATAN</b></th>
            <th width="150px" style="background-color: #A5A5A5; text-align: center;"><b>DESA</b></th>
            <th width="150px" style="background-color: #A5A5A5; text-align: center;"><b>JPZISNU</b></th>
            <th width="130px" style="background-color: #A5A5A5; text-align: center;"><b>JUMLAH KALENG</b></th>
            <th width="160px" style="background-color: #A5A5A5; text-align: center;"><b>PEROLEHAN KALENG NU</b></th>
            @foreach($incomes as $income)
                <th width="150px" style="background-color: #A5A5A5; text-align: center;"><b>{{$income['name'] }} {{ $income['precent'] }}%</b></th>
            @endforeach
            <th width="110px" style="background-color: #A5A5A5; text-align: center;"><b>JUMLAH</b></th>
            <th width="130px" style="background-color: #A5A5A5; text-align: center;"><b>KETERANGAN</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $key => $item)
        <tr>
            <td style="text-align: center;">{{ $key+1 }}</td>
            <td style="background-color: #FFFF00;">{{ $item['desa']['kecamatan']['name'] }}</td>
            <td>{{ $item['desa']['name'] }}</td>
            <td>{{ $item['name'] }}</td>
            {{-- <td>{{ $item['name'] }}</td> --}}
            <td style="text-align: center;">{{ $item['donate_count'] }}</td>
            <td>{{ number_format($item['donate_sum_total_donate'],0,",",",") }}</td>
            @foreach($incomes as $no => $income)
            <th>{{ number_format($item['col'. strval($no+1)],0,",",",") }}</th>
            @endforeach
            <td>{{ number_format($item['donate_sum_total_donate'],0,",",",") }}</td>
            <td style="text-align: center;">-</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" style="background-color: #00B050; text-align: center;">JUMLAH</td>
            <td style="background-color: #00B050; text-align: center;">{{ $total['donatur'] }}</td>
            <td style="background-color: #00B050;">{{ number_format($total['donate1'],0,",",",") }}</td>
            <td style="background-color: #00B050;">{{ number_format($total['col1'],0,",",",") }}</td>
            <td style="background-color: #00B050;">{{ number_format($total['col2'],0,",",",") }}</td>
            <td style="background-color: #00B050;">{{ number_format($total['col3'],0,",",",") }}</td>
            <td style="background-color: #00B050;">{{ number_format($total['col4'],0,",",",") }}</td>
            <td style="background-color: #00B050;">{{ number_format($total['col5'],0,",",",") }}</td>
            <td style="background-color: #00B050;">{{ number_format($total['donate2'],0,",",",") }}</td>
            <td style="background-color: #00B050; text-align: center;">-</td>
        </tr>
    </tfoot>
</table>