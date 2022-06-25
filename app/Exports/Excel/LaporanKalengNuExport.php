<?php

namespace App\Exports\Excel;

use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanKalengNuExport implements FromCollection
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

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->data);
    }
}
