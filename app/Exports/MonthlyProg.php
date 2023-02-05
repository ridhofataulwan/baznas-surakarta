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

class MonthlyProg implements FromView, ShouldAutoSize, WithStyles, WithColumnWidths, WithTitle
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function sumAmount($program, $type)
    {
        $month = $this->id;
        if ($month < 10) {
            $month = '0' . $month;
        }
        $distributions = Distribution::getMonthly($month);

        $data = $distributions->where([
            ['type', 'LIKE', $type],
            ['program_id', '=', $program]
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
        $program = [
            '1',
            '2',
            '3',
            '4',
            '5',
        ];
        $type = [
            $program[0] => $this->sumAmount($program[0], $type),
            $program[1] => $this->sumAmount($program[1], $type),
            $program[2] => $this->sumAmount($program[2], $type),
            $program[3] => $this->sumAmount($program[3], $type),
            $program[4] => $this->sumAmount($program[4], $type),
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
        return view('export.monthlyprog', [
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
        return 'Worksheet Program';
    }
}