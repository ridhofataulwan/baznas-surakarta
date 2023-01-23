<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ReportExportByYear implements WithMultipleSheets
{
    protected $year;

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function sheets(): array
    {
        $year = $this->year;

        $sheets = [
            new AnnualyPayment($year),
            new AnnualyProgram($year),
            new AnnualyAshnaf($year),
        ];

        return $sheets;
    }
}