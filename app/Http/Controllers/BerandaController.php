<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Galeri;
use App\Models\Post;
use App\Models\CategoryPost;
use App\Mail\Notifikasi;
use App\Models\Rekening;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class BerandaController extends Controller
{
    public function index()
    {
        $category = CategoryPost::where('id', '!=', '1')->get();
        foreach ($category as $c) {
            $post[$c['name']] = Post::join('category_post', 'category_post.id', '=', 'post.category_id')->where('name', $c['name'])->where('status', "ACTIVE")->latest()->take(3)->select(
                'post.*',
                'category_post.id as category_post_id',
                'category_post.name'
            )->get();
        }

        $galeri = Galeri::latest()->take(4)->get();
        $bayar = Payment::where('status', 'SHOW')->latest()->take(10)->get();

        // Menyamarkan nama pembayar zakat
        foreach ($bayar as $key => $g) {
            $name = $g->name = explode(" ", $g->name);
            $new_name = [];
            foreach ($name as $n => $a) {
                $a = strrev($a);
                $a = str_repeat("*", strlen($a) - 2) . substr($a, -2);
                $a = strrev($a);
                array_push($new_name, $a);
            }
            $g->name = implode(" ", $new_name);
        }

        return view('index', compact('bayar', 'galeri', 'post', 'category'));
    }

    public function legalitas()
    {
        return view('tentang-kami.legalitas');
    }

    public function visiMisi()
    {
        return view('tentang-kami.visi-misi');
    }

    public function strukturOrganisasi()
    {
        return view('tentang-kami.struktur-organisasi');
    }

    public function organisasi()
    {
        return view('tentang-kami.organisasi');
    }

    public function sejarahOrganisasi()
    {
        return view('tentang-kami.sejarah-organisasi');
    }

    public function zakat()
    {
        $regencies = DB::table('regencies')->where([
            'provinces_id' => '33',
            'districts_id' => '72'
        ])->get();

        $default_region = [
            'province' => 33,
            'district' => 72,
        ];

        return view('bayar.zakat', compact('regencies', 'default_region'));
    }

    public function hubungiKami()
    {
        return view('hubungi-kami');
    }

    public function notFound()
    {
        return view('404');
    }

    public function rekening()
    {
        $rek = Rekening::where('jenis', 'zakat')->get();
        return view('layanan.rekening', compact('rek'));
    }
    public function rekeningPembayaran()
    {
        return view('layanan.layanan-pembayaran');
    }

    public function layananPembayaran()
    {
        return view('layanan.layanan-pembayaran');
    }
    public function permohonanBantuan()
    {
        return view('layanan.permohonan-bantuan');
    }
    public function cekPermohonanBantuan()
    {
        return view('layanan.cek-permohonan-bantuan');
    }
}
