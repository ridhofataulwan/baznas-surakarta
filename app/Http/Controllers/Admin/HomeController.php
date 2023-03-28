<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::take(5)->latest('id')->get();
        $allpost = Post::get()->count();
        $count_category = DB::table('category_post')->get()->count();
        $count_file = DB::table('file')->get()->count();
        $messages = Message::take(3)->latest('id', 'desc')->get();
        $count_messages = Message::count();

        date_default_timezone_set("Asia/Jakarta");
        $now = date('Y');
        $margin = $now - 2023;
        if ($margin < 5) {
            $last = 2023;
        } else {
            $last = $now - 5;
        }
        $Month = date('Y-m-d');
        $thisMonth = (int)date("m");
        $title = 'Dashboard CMS';
        return view('admin.admin-cms', compact('messages', 'posts', 'count_messages', 'count_category', 'count_file', 'now', 'last', 'allpost', 'Month', 'thisMonth', 'title'));
    }

    public function dashboard()
    {
        $payment = DB::table('payment')->get()->count();
        $distribution = DB::table('distribution')->get()->count();
        $request = DB::table('request')->get()->count();

        $count = [
            'payment' => $payment,
            'distribution' => $distribution,
            'request' => $request,
        ];

        $in = DB::table('payment')
            ->where('valid', 'VALID')
            ->sum('amount');
        $out = DB::table('distribution')
            ->sum('amount');
        $amount = [
            'in' => $this::formatRupiah($in, 'Rp'),
            'out' => $this::formatRupiah($out, 'Rp'),
        ];

        $tb_payment = DB::table('payment')->take(3)->latest('id', 'desc')->get();
        foreach ($tb_payment as $tb) {
            $tb->amount = $this::formatRupiah($tb->amount, 'Rp');
        }
        $tb_distribution = DB::table('distribution')->take(3)->latest('id', 'desc')->get();
        foreach ($tb_distribution as $tb) {
            $tb->amount = $this::formatRupiah($tb->amount, 'Rp');
        }
        $tb_request = DB::table('request')->take(3)->latest('id', 'desc')->get();
        $table = [
            'payment' => $tb_payment,
            'distribution' => $tb_distribution,
            'request' => $tb_request,
        ];

        $minfaq =  DB::table('payment')
            ->where('valid', 'VALID')
            ->where('type', 'INFAQ')
            ->sum('amount');
        $kinfaq =  DB::table('distribution')
            ->where('type', 'INFAQ')
            ->sum('amount');
        $mzakat =  DB::table('payment')
            ->where('valid', 'VALID')
            ->where('type', 'MAAL')
            ->sum('amount');
        $kzakat =  DB::table('distribution')
            ->where('type', 'MAAL')
            ->sum('amount');

        $saldo = [
            'infaq' => $this::formatRupiah(($minfaq - $kinfaq), 'Rp'),
            'zakat' =>  $this::formatRupiah(($mzakat - $kzakat), 'Rp'),
        ];

        date_default_timezone_set("Asia/Jakarta");
        $now = date('Y');
        $margin = $now - 2023;
        if ($margin < 5) {
            $last = 2023;
        } else {
            $last = $now - 5;
        }
        $Month = date('Y-m-d');
        $thisMonth = (int)date("m");
        $title = 'Dashboard Transaksi';
        return view('admin.admin-paydist', compact('saldo', 'payment', 'table', 'amount', 'count', 'now', 'last', 'Month', 'thisMonth', 'title'));
    }

    /**
     * -------------------------------------------------------------------
     * formatRupiah($angka, $prefix) 
     * -------------------------------------------------------------------
     * Method to set angka to format currency
     * Rp. $angka
     */
    public static function formatRupiah($angka, $prefix = "")
    {
        $number_string = preg_replace("/[^,\d]/", "", $angka);
        $split = explode(",", $number_string);
        $sisa = strlen($split[0]) % 3;
        $rupiah = substr($split[0], 0, $sisa);
        $ribuan = substr($split[0], $sisa);
        $ribuan = preg_match_all("/\d{3}/", $ribuan, $match);
        if ($ribuan) {
            $separator = $sisa ? "." : "";
            $rupiah .= $separator . implode(".", $match[0]);
        }
        $rupiah = isset($split[1]) ? $rupiah . "," . $split[1] : $rupiah;
        return $prefix == "" ? $rupiah : "Rp. " . $rupiah;
    }
}
