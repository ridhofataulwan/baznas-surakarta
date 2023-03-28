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
use App\Models\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\AdmPaymentController as AdmPaymentController;
use App\Models\Permohonan;

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
        $bayar = Payment::where('visible', 'SHOW')->where('valid', 'VALID')->latest()->take(10)->get();
        // Format Rupiah
        foreach ($bayar as $payment => $value) {
            $value->amount = AdmPaymentController::formatRupiah($value->amount, 'Rp. ');
        }

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
        $regencies = DB::table('address')->where(DB::raw('CHAR_LENGTH(id)'), '=', 8)->where('id', 'like', '33.72%')->get();
        return view('bayar.zakat', compact('regencies'));
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
    public function unduhDokumen()
    {
        $file = File::get();
        $search = false;
        return view('layanan.unduh-dokumen', compact('file', 'search'));
    }

    public function searchFile(Request $request)
    {
        $search = $request->search;
        $file = File::where('name', 'LIKE', '%' . $search . '%')->get();
        return view('layanan.unduh-dokumen', compact('file', 'search'));
    }

    public function permohonanBantuan()
    {
        $program = DB::table('program')->where('request', 1)->get();
        $regencies = DB::table('address')->where(DB::raw('CHAR_LENGTH(id)'), '=', 8)->where('id', 'like', '33.72%')->get();

        return view('layanan.permohonan-bantuan', compact('program', 'regencies'));
    }

    public function permohonanBantuanStore(Request $request)
    {
        $rules = [
            'program_id' => 'required',
            'name' => 'required',
            'nik' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'regency' => 'required',
            'village' => 'required',
            'religion' => 'required',
            'job' => 'required',
            'phone' => 'required',
            'description' => 'required',
        ];

        // Custom Error Message for Validation
        $messages = [
            'required' => 'Data :attribute harus diisi',
        ];

        $validator = Validator::make(request()->all(), $rules, $messages);
        if ($validator->fails()) {
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Data gagal dikirim. Silakan cek kembali form yang Anda isi');
            session()->flash('status', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // created_at ✅
        date_default_timezone_set("Asia/Jakarta");
        $created_at = date('Y-m-d H:i:s');

        $requirements = [
            'sp' => null,
            'ktp' => null,
            'kk' => null,
            'sktm' => null,
            'sp_kelurahan' => null,
            'tagihan_sklh' => null,
            'foto_usaha' => null,
            'tagihan_rs' => null,
            'proposal' => null,
        ];

        $date = date("dmy");
        $uniqueId = "REQ" . uniqid() . $date;
        $file = request()->file();
        foreach ($file as $label => $file) {
            $filename = $label . '-' . $uniqueId . '.' . $file->getClientOriginalExtension();
            $path = "uploads/permohonan/" . $label . '/';
            $requirements[$label] = $path . '' . $filename;
            $file->move(public_path($path), $filename);
        }

        $data = [
            'id' => $uniqueId,
            'program_id' => $request->program_id,
            'name' => $request->name,
            'nik' => $request->nik,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'address' => $request->village,
            'religion' => $request->religion,
            'job' => $request->job,
            'phone' => $request->phone,
            'description' => $request->description,
            'requirements' => json_encode($requirements),
            'created_at'    => $created_at,
        ];

        if ($validator->fails()) {
            // Gagal ❌   
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Tidak bisa menambahkan Permohonan');
            session()->flash('status', 'error');
            return redirect()->back()->with('danger', 'Permohonan gagal ditambahkan');
        }

        Permohonan::insert($data);
        // Success ✅   
        session()->flash('nomor-permohonan', $data['id']);
        session()->flash('title', 'Sukses');
        session()->flash('message', 'Data berhasil dikirim');
        session()->flash('status', 'success');
        return redirect('cek-permohonan-bantuan')->with('success', 'Permohonan berhasil dikirim. Anda bisa mengecek status permohonan pada laman ini');
    }


    public function cekPermohonanBantuan()
    {
        return view('layanan.cek-permohonan-bantuan');
    }


    public function cekPermohonanBantuanStore()
    {
        if (request()->id != null) {
            $label = 'Kode Permohonan';
            $id = request()->id;
            $data = DB::table('request')->where('id', $id)->latest()->get();
        } else {
            $label = 'NIK';
            $nik = request()->nik;
            $data = DB::table('request')->where('nik', $nik)->latest()->get();
        }
        if ($data == null) {
            session()->flash('error', request('nik') ? request('nik') : request('id'));
        } else {
            session()->flash('data', $data[0]);
        }
        return redirect('cek-permohonan-bantuan')->with('label', $label);
    }
}
