<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ReportExportByMonth implements WithMultipleSheets
{
    protected $year, $month;

    public function __construct($month)
    {
        $this->month = $month;
    }

    public function sheets(): array
    {
        $month = $this->month;
        return [
            new MonthlyPayment($month),
            new MonthlyDistribution($month),
            new MonthlyProg($month),
            new MonthlyAshnaf($month),
        ];
    }
}