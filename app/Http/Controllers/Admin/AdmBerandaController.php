<?php


namespace App\Http\Controllers\Admin;

use App\Exports\ReportExportByMonth;
use App\Exports\ReportExportByYear;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;


class AdmBerandaController extends Controller
{
    public function exportLaporanBulan($month)
    {
        $bulan = $month - 1;
        date_default_timezone_set("Asia/Jakarta");
        $timestamp = Carbon::now();
        $month_name = date('F', strtotime(date('Y-F-d') . " $bulan month"));

        return Excel::download(new ReportExportByMonth($month), 'Resume Baznas Bulan' . $month_name . '_' . $timestamp->toDateString() . '.xlsx');
    }

    public function exportLaporanTahun($year)
    {
        date_default_timezone_set("Asia/Jakarta");
        $timestamp = Carbon::now();
        // $month_name = date('F', strtotime(date('Y-F-d') . " $year month"));

        return Excel::download(new ReportExportByYear($year), 'Resume Baznas Tahun ' . $year . '_' . $timestamp->toDateString() . '.xlsx');
    }
}