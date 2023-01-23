<?php

namespace App\Exports;

use App\Models\Distribution;
use Illuminate\Contracts\View\View;
use IntlDateFormatter;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AnnualyAshnaf implements FromView, ShouldAutoSize, WithStyles, WithColumnWidths, WithTitle
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function sumAmount($ashnaf, $month)
    {
        $year = $this->id;
        $distributions = Distribution::getAnnualy($year);

        $data = $distributions->where([
            ['created_at', 'LIKE', $year . '-' . $month . '%'],
            ['ashnaf', $ashnaf]
        ])->get();

        $amounts = 0;
        for ($i = 0; $i <= count($data) - 1; $i++) {
            $data[$i]->amount;
            $amounts += $data[$i]->amount;
        }
        return $amounts;
    }

    public function getAmount($month)
    {
        $ashnaf = [
            'Fakir',
            'Miskin',
            'Fisabilillah',
            'Amil',
            'Mualaf',
            'Hamba Sahaya',
            'Gharimin',
            'Ibnus Sabil',
        ];
        $month = [
            $ashnaf[0] => $this->sumAmount($ashnaf[0], $month),
            $ashnaf[1] => $this->sumAmount($ashnaf[1], $month),
            $ashnaf[2] => $this->sumAmount($ashnaf[2], $month),
            $ashnaf[3] => $this->sumAmount($ashnaf[3], $month),
            $ashnaf[4] => $this->sumAmount($ashnaf[4], $month),
            $ashnaf[5] => $this->sumAmount($ashnaf[5], $month),
            $ashnaf[6] => $this->sumAmount($ashnaf[6], $month),
            $ashnaf[7] => $this->sumAmount($ashnaf[7], $month),
        ];

        return $month;
    }

    public function view(): View
    {
        $fmt = new IntlDateFormatter(
            'id_ID',
            IntlDateFormatter::LONG,
            IntlDateFormatter::NONE,
            'Asia/Jakarta',
            IntlDateFormatter::GREGORIAN
        );
        $year = $this->id;
        $report = [];

        for ($i = 1; $i <= 12; $i++) {
            if ($i <= 9) {
                $amount = $this->getAmount('0' . $i);
                $date = date_create('0001-0' . $i . '-01');
            } else {
                $amount = $this->getAmount($i);
                $date = date_create('0001-' . $i . '-01');
            }
            datefmt_set_pattern($fmt, 'MMMM');
            $month_name = datefmt_format($fmt, $date);
            $data = [
                'amount' => $amount,
                'month' => $month_name,
            ];
            array_push($report, $data);
        }
        return view('export.annualyashnaf', [
            'reports' => $report,
            'year' => $year,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            3 => ['font' => ['bold' => true]],
            4 => ['font' => ['bold' => true]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 4,
            'B' => 15,
            'C' => 10,
            'D' => 10,
            'E' => 10,
            'F' => 10,
            'G' => 10,
            'H' => 10,
        ];
    }
    /**
     * @return string
     */
    public function title(): string
    {
        return 'Worksheet Ashnaf';
    }
}