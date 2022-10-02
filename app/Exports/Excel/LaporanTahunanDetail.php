<?php

namespace App\Exports\Excel;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LaporanTahunanDetail implements FromView, ShouldAutoSize, WithStyles, WithTitle
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
        return view('admin.exports.excel.laporan_tahunan_detail', $this->data);
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
        
        for ($i=5; $i < count($this->data['result']['income_detail'])+count($this->data['result']['outcome_detail'])+11; $i++) {
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

    public function title(): string
    {
        return 'Dana Penerimaan & Pengeluaran';
    }
}
