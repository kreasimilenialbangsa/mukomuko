<?php

namespace App\Exports\Excel;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LaporanKalengNuExport implements FromView, ShouldAutoSize, WithStyles
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

    public function view(): View
    {
        return view('admin.exports.excel.laporan_kaleng_nu', $this->data);
    }

    public function styles(Worksheet $sheet): array
    {
        $config = [
            6 => [
                    "borders" => [
                        "allBorders" => [
                            "borderStyle" => Border::BORDER_THIN,
                            "color" => ["rgb" => "000000"],
                    ],
                ],
            ],
        ];

        for ($i=5; $i < count($this->data['result'])+7; $i++) { 
            $config[$i] = [
                "borders" => [
                    "allBorders" => [
                        "borderStyle" => Border::BORDER_THIN,
                        "color" => ["rgb" => "000000"],
                    ],
                ],
            ];
        }

        return $config;
    }
}
