<?php

namespace App\Exports\Excel;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LaporanPengeluaranDanaExport implements FromView, ShouldAutoSize, WithStyles, WithTitle
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
        return view('admin.exports.excel.laporan_pengeluaran_dana', $this->data);
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
        
        $row2 = (count($this->data['result'][1]['outcome_detail']) + 1) * 12 + (3 * 12) + 4;

        for ($i=5; $i < $row2; $i++) {
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
        return 'Pengeluaran Dana';
    }
}
