<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdmBerandaController extends Controller
{
    public function exportLaporanBulan($id)
    {
        $id = $id - 1;
        date_default_timezone_set("Asia/Jakarta");
        $timestamp = Carbon::now();
        $month_name = date('F', strtotime(date('Y-F-d') . " $id month"));
        $prodata = "";
        $prodata .= '<table border="1" cellspacing="0" cellpadding="5">
        <thead style="font-weight: bold;">
            <td rowspan="2">No</td>
            <td rowspan="2">Bulan</td>
            <td colspan="8" style="text-align: center;">
               Penyaluran / Tasaruf
            
            </td>
           <tr>
                <td>Fakir</td>
                <td>Miskin</td>
                <td>Fisabilillah</td>
                <td>Ibnu Sabil</td>
                <td>Ghorim</td>
                <td>Muallaf</td>
                <td>Amil</td>
                <td>Total</td>
            </tr>
        </thead>
        </table>';

        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename = Resume_Bulan_' . $month_name . "_" . $timestamp->toDateString() . '.xls');
        echo $prodata;
    }

    public function exportLaporanTahun($id)
    {
        $data = "Laporan Bulan";
        return $data;
    }
    //
}