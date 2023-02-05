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

class MonthlyAshnaf implements FromView, ShouldAutoSize, WithStyles, WithColumnWidths, WithTitle
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function sumAmount($ashnaf, $type)
    {
        $month = $this->id;
        if ($month < 10) {
            $month = '0' . $month;
        }
        $distributions = Distribution::getMonthly($month);

        $data = $distributions->where([
            ['type', 'LIKE', $type],
            ['ashnaf', '=', $ashnaf]
        ])->get();
        $amounts = 0;
        for ($i = 0; $i <= count($data) - 1; $i++) {
            $data[$i]->amount;
            $amounts += $data[$i]->amount;
        }
        return $amounts;
    }

    public function getAmount($type)
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
        $type = [
            $ashnaf[0] => $this->sumAmount($ashnaf[0], $type),
            $ashnaf[1] => $this->sumAmount($ashnaf[1], $type),
            $ashnaf[2] => $this->sumAmount($ashnaf[2], $type),
            $ashnaf[3] => $this->sumAmount($ashnaf[3], $type),
            $ashnaf[4] => $this->sumAmount($ashnaf[4], $type),
            $ashnaf[5] => $this->sumAmount($ashnaf[5], $type),
            $ashnaf[6] => $this->sumAmount($ashnaf[6], $type),
            $ashnaf[7] => $this->sumAmount($ashnaf[7], $type),
        ];
        return $type;
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
        $year = date('Y');
        $report = [];

        $types = [
            'FIDYAH',
            'FITRAH',
            'MAAL',
            'QURBAN',
            'INFAQ'
        ];

        $count = count($types);

        for ($i = 0; $i < $count; $i++) {
            $amount = $this->getAmount($types[$i]);
            $type = $types[$i];
            $data = [
                'amount' => $amount,
                'type' => $type,
            ];
            array_push($report, $data);
        }

        $month = $this->id;
        datefmt_set_pattern($fmt, 'MMMM');
        $monthName = datefmt_format($fmt, date_create('0001-' . $month . '-01'));
        return view('export.monthlyashnaf', [
            'reports' => $report,
            'year' => $year,
            'month' => $monthName,
            'sum' => $count + 4,
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