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

class MonthlyDistribution implements FromView, ShouldAutoSize, WithStyles, WithColumnWidths, WithTitle
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        $month = $this->id;
        $fmt = new IntlDateFormatter(
            'id_ID',
            IntlDateFormatter::LONG,
            IntlDateFormatter::NONE,
            'Asia/Jakarta',
            IntlDateFormatter::GREGORIAN
        );
        $report = [];
        if ($month < 10) {
            $month = '0' . $month;
        }
        $db = Distribution::getMonthly($month)->get();
        $count = count($db);
        $year = date('Y');

        $program = ['kemanusiaan', 'Pendidikan', 'Kesehatan', 'Advokasi dan Dakwah', 'Ekonomi Produktif'];

        for ($i = 0; $i <= $count - 1; $i++) {
            $payment = $db[$i];

            $data = [
                'name'      => $payment->name,
                'phone'     => $payment->phone,
                'type'      => $payment->type,
                'ashnaf'    => $payment->ashnaf,
                'program'   => $program[$i],
                'amount'    => $payment->amount,
            ];

            array_push($report, $data);
        }
        datefmt_set_pattern($fmt, 'MMMM');
        $monthName = datefmt_format($fmt, date_create('0001-' . $month . '-01'));
        return view('export.monthlydistribution', [
            'reports' => $report,
            'year' => $year,
            'month' => $monthName,
            'sum' => $count + 3,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
            3 => ['font' => ['bold' => true]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 4,
            'B' => 15,
            'C' => 20,
            'D' => 20,
            'E' => 10,
        ];
    }
    /**
     * @return string
     */
    public function title(): string
    {
        return 'Worksheet Distribution';
    }
}
