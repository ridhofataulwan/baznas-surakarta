<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Galeri;
use App\Models\Artikel;
use App\Models\DataZis;
use App\Models\Post;
use App\Models\CategoryPost;
use App\Mail\Notifikasi;
use App\Models\Rekening;
use App\Models\Inspirasi;
use App\Models\KabarZakat;
use App\Models\Transaction;
use App\Models\CategoryData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class BerandaController extends Controller
{
    public function index()
    {
        $category = CategoryPost::all();
        foreach ($category as $c) {
            $post[$c['name']] = Post::join('category_post', 'category_post.id', '=', 'post.category_id')->where('name', $c['name'])->latest()->take(3)->select(
                'post.*',
                'category_post.id as category_post_id',
                'category_post.name'
            )->get();
        }
        $galeri = Galeri::latest()->take(4)->get();
        $penyalur = DB::table('penyaluran')->latest('id')->first();
        $fitrah = DataZis::where('kategori', 1)->sum('price');
        $infaq = DataZis::where('kategori', 2)->sum('price');
        $sedekah = DataZis::where('kategori', 3)->sum('price');
        $fidyah = DataZis::where('kategori', 4)->sum('price');
        $bayar = Transaction::where('status', 'SHOW')->latest()->take(10)->get();

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

        return view('index', compact(
            'bayar',
            'galeri',
            'penyalur',
            'fitrah',
            'infaq',
            'sedekah',
            'fidyah',
            'post',
            'category'
        ));
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
        return view('bayar.zakat');
    }

    public function inspirasi()
    {
        return view('kabar.inspirasi');
    }

    public function article()
    {
        return view('kabar.article');
    }

    public function pendistribusian()
    {
        return view('kabar.pendistribusian');
    }

    public function videoKegiatan()
    {
        return view('kabar.video-kegiatan');
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

    public function rekeningInfak()
    {
        $rek = Rekening::all();
        return view('layanan.rekening-infak', compact('rek'));
    }

    public function rekeningSedekah()
    {
        $rek = Rekening::all();
        return view('layanan.rekening-sedekah', compact('rek'));
    }

    public function rekeningFidyah()
    {
        $rek = Rekening::all();
        return view('layanan.rekening-fidyah', compact('rek'));
    }

    public function rekeningPembayaran()
    {
        return view('layanan.layanan-pembayaran');
    }

    public function programKemanusiaan()
    {
        return view('program.program-kemanusiaan');
    }
    public function programPendidikan()
    {
        return view('program.program-pendidikan');
    }
    public function programKesehatan()
    {
        return view('program.program-kesehatan');
    }
    public function programAdvokasiDakwah()
    {
        return view('program.program-advokasi-dakwah');
    }
    public function programEkonomiProduktif()
    {
        return view('program.program-ekonomi-produktif');
    }
    public function programKKN()
    {
        return view('program.program-kkn');
    }

    public function programBeasiswa()
    {
        return view('program.program-beasiswa');
    }

    public function programDistribusi()
    {
        return view('program.program-distribusi');
    }

    public function programPemberdayaan()
    {
        return view('program.program-permberdayaan');
    }

    public function programSantunan()
    {
        return view('program.program-santunan');
    }

    public function programSubsidi()
    {
        return view('program.program-subsidi');
    }

    public function layananPembayaran()
    {
        return view('layanan.layanan-pembayaran');
    }

    // public function indexFitrah()
    // {
    //     $kabar = KabarZakat::latest()->take(3)->get();
    //     $artikel = Artikel::latest()->take(3)->get();
    //     $inspirasi = Inspirasi::latest()->take(3)->get();
    //     $distKabar = KabarZakat::latest()->first();
    //     $distArtikel = Artikel::latest()->first();
    //     $distInspirasi = Inspirasi::latest()->first();
    //     $galeri = Galeri::latest()->take(4)->get();
    //     return view('index-fitrah',compact('kabar','artikel','inspirasi','distArtikel','distKabar','distInspirasi','galeri'));
    // }

    // public function indexMaal()
    // {
    //     $kabar = KabarZakat::latest()->take(3)->get();
    //     $artikel = Artikel::latest()->take(3)->get();
    //     $inspirasi = Inspirasi::latest()->take(3)->get();
    //     $distKabar = KabarZakat::latest()->first();
    //     $distArtikel = Artikel::latest()->first();
    //     $distInspirasi = Inspirasi::latest()->first();
    //     $galeri = Galeri::latest()->take(4)->get();
    //     return view('index-maal',compact('kabar','artikel','inspirasi','distArtikel','distKabar','distInspirasi','galeri'));
    // }

    // public function indexFidyah()
    // {
    //     $kabar = KabarZakat::latest()->take(3)->get();
    //     $artikel = Artikel::latest()->take(3)->get();
    //     $inspirasi = Inspirasi::latest()->take(3)->get();
    //     $distKabar = KabarZakat::latest()->first();
    //     $distArtikel = Artikel::latest()->first();
    //     $distInspirasi = Inspirasi::latest()->first();
    //     $galeri = Galeri::latest()->take(4)->get();
    //     return view('index-fidyah',compact('kabar','artikel','inspirasi','distArtikel','distKabar','distInspirasi','galeri'));
    // }

    // public function indexQurban()
    // {
    //     $kabar = KabarZakat::latest()->take(3)->get();
    //     $artikel = Artikel::latest()->take(3)->get();
    //     $inspirasi = Inspirasi::latest()->take(3)->get();
    //     $distKabar = KabarZakat::latest()->first();
    //     $distArtikel = Artikel::latest()->first();
    //     $distInspirasi = Inspirasi::latest()->first();
    //     $galeri = Galeri::latest()->take(4)->get();
    //     return view('index-qurban',compact('kabar','artikel','inspirasi','distArtikel','distKabar','distInspirasi','galeri'));
    // }

    // public function indexInfaq()
    // {
    //     $kabar = KabarZakat::latest()->take(3)->get();
    //     $artikel = Artikel::latest()->take(3)->get();
    //     $inspirasi = Inspirasi::latest()->take(3)->get();
    //     $distKabar = KabarZakat::latest()->first();
    //     $distArtikel = Artikel::latest()->first();
    //     $distInspirasi = Inspirasi::latest()->first();
    //     $galeri = Galeri::latest()->take(4)->get();
    //     return view('index-infaq',compact('kabar','artikel','inspirasi','distArtikel','distKabar','distInspirasi','galeri'));
    // }

    public function editDanaTersalurkan()
    {
        $data = DB::table('penyaluran')->latest('updated_at')->first();
        return view('index.data-penyaluran', compact('data'));
    }

    public function storeDanaTersalurkan(Request $request)
    {
        $validated = $request->validate(
            [
                'penerima' => 'required|min:0|numeric',
                'penghimpun' => 'required|min:0|numeric',
                'dana_tersalurkan' => 'required|min:0|numeric',
                'donatur' => 'required|min:0|numeric',
            ]
        );

        if (!$validated) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        DB::table('penyaluran')->updateOrInsert(
            [
                'penerima' => $request->penerima,
                'penghimpun' => $request->penghimpun,
                'dana_tersalurkan' => $request->dana_tersalurkan,
                'donatur' => $request->donatur,
                'updated_at' => Carbon::now(),
            ]
        );

        return redirect()->back()->with('success', 'Penyaluran Sukses Di Update');
    }

    public function indexLaporanZis()
    {
        $data = DataZis::all();
        $category = CategoryData::all();
        return view('index.laporan-zis', compact('data', 'category'));
    }

    public function editLaporanZis($id)
    {
        $data = DataZis::find($id);
        $category = CategoryData::all();
        return view('index.edit-laporan-zis', compact('data', 'category'));
    }

    public function updateLaporanZis($id, Request $request)
    {
        $validated = $request->validate(
            [
                'kategori' => 'required|numeric',
                'price' => 'required|min:0|numeric',
            ]
        );

        if (!$validated) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        DataZis::find($id)->update([
            'kategori' => $request->kategori,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Laporan Zis Sukses Di Update');
    }

    public function deleteLaporanZis($id)
    {
        DataZis::find($id)->delete();
        return redirect()->back()->with('success', 'Laporan Zis Sukses Di Hapus');
    }

    public function terimaBayarZakat()
    {
        if (!empty(request('status'))) {
            $validator = Validator::make(request()->all(), [
                'jenis' => 'required',
                'nominal' => 'required',
                'image' => 'required|max:1024|mimes:png,jpg,jpeg',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $image = request()->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/bayar'), $name_gen);
            $last_img = 'uploads/bayar/' . $name_gen;
            $tf = Transaction::create([
                'jenis' => request('jenis'),
                'nominal' => request('nominal'),
                'image' => $last_img,
                'name' => 'Hamba Allah',
                'phone' => '12345678910',
                'email' => 'hamba@gmail.com',
                'status' => 'HIDDEN',
            ]);
            // Mail::to(request()->email)->send(new Notifikasi($tf->email, 'Anda berhasil membayar zakat ' . request('jenis') . ' dengan nominal Rp.' . request('nominal')));
            $users = User::role('admin')->get();
            foreach ($users as $user) {
                Mail::to($user->email)->send(new Notifikasi($user->email, 'Ada pembayar zakat baru dengan nama ' . $tf->name));
            }
            return redirect()->back();
        }
        $validator = Validator::make(request()->all(), [
            'jenis' => 'required',
            'nominal' => 'required',
            'image' => 'required|max:10240|mimes:png,jpg,jpeg,svg,webp',
            'name' => 'required|string|max:255',
            'nik' => 'string|min:16|max:16',
            'phone' => 'required',
            'email' => 'email',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $image = request()->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/bayar'), $name_gen);
        $last_img = 'uploads/bayar/' . $name_gen;
        Transaction::create([
            'jenis' => request('jenis'),
            'nominal' => request('nominal'),
            'image' => $last_img,
            'name' => request('name'),
            'nik' => request('nik'),
            'phone' => request('phone'),
            'email' => request('email'),
            'status' => 'HIDDEN',
        ]);
        Mail::to(request()->email)->send(new Notifikasi(request()->email, 'Anda berhasil membayar zakat ' . request('jenis') . ' dengan nominal Rp.' . request('nominal')));
        $users = User::role('admin')->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new Notifikasi($user->email, 'Ada pembayar zakat baru dengan nama ' . request('name')));
        }
        return redirect()->back();
    }
}