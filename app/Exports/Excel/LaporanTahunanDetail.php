<?php

namespace App\Exports\Excel;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class LaporanTahunanDetail implements WithMultipleSheets
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
            'Kabupaten' => new LaporanTahunanDetailKabupaten($this->data),
            'Kecamatan' => new LaporanTahunanDetailKecamatan($this->data),
            'Desa' => new LaporanTahunanDetailDesa($this->data),
        ];

        return $sheets;
    }
}
