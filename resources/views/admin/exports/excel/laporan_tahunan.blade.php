<table>
    <thead>
        <tr>
            <th style="text-align: center;" colspan="5"><b>LAPORAN TAHUNAN</b></th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="5"><b>LAZISNU KABUPATEN MUKOMUKO</b></th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="5"><b>TAHUN 2022</b></th>
        </tr>
    </thead>
</table>

<table>
    <thead>
        <tr>
            <th rowspan="2" style="text-align: center;"><b>No</b></th>
            <th rowspan="2" style="text-align: center;"><b>Bulan</b></th>
            <th colspan="2" style="text-align: center;"><b>Total</b></th>
            <th rowspan="2" style="text-align: center;"><b>Status</b></th>
        </tr>
        <tr>
            <th style="text-align: center;"><b>Penerimaan</b></th>
            <th style="text-align: center;"><b>Pengeluaran</b></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($result as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @empty
            
        @endforelse
    </tbody>
</table>