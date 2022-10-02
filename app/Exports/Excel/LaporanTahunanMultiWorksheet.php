<?php

namespace App\Exports\Excel;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class LaporanTahunanMultiWorksheet implements WithMultipleSheets
{
    protected $data;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function sheets(): array
    {
        $sheets = [
            'Rekap' => new LaporanTahunanExport($this->data),
            'Penerimaan Dana' => new LaporanTahunanPenerimaanDanaExport($this->data),
            'Pengeluaran Dana' => new LaporanTahunanPengeluaranDanaExport($this->data),
        ];

        return $sheets;
    }
}
