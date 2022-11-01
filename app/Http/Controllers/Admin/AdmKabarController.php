<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Artikel;
use App\Models\Inspirasi;
use App\Models\KabarZakat;
use App\Models\Post;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class AdmKabarController extends Controller
{
    public function indexBerita()
    {
        $berita = Berita::latest()->paginate(10);
        return view('admin.kabar.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBerita()
    {
        return view('admin.kabar.add');
    }

    public function storeBerita(Request $request)
    {
        $validated = $request->validate(
            [
                'judul' => 'required|unique:berita',
                'deskripsi' => 'required',
                'gambar' => 'required|mimes:jpg,jpeg,png',
            ]

        );

        $gambar = $request->file('gambar');
        $name_gen = hexdec(uniqid()) . '.' . $gambar->getClientOriginalExtension();
        // Image::make($gambar)->resize(500, 300)->save('images/wilayah/' . $name_gen);

        $gambar->move(public_path('uploads/berita'), $name_gen);
        $last_img = 'uploads/berita/' . $name_gen;

        Berita::insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('index.berita')->with('success', 'Berita Sukses Ditambahkan');
    }


    public function editBerita($beritaID)
    {
        $berita = Berita::find($beritaID);
        // return $berita;
        return view('admin.kabar.edit', compact('berita'));
    }

    public function updateBerita(Request $request, $beritaID)
    {
        $berita = Berita::find($beritaID);

        $old_image = $request->old_image;
        $berita_image = $request->file('gambar');

        if ($berita_image) {

            $name_gen = hexdec(uniqid()) . '.' . $berita_image->getClientOriginalExtension();
            $berita_image->move(public_path('uploads/berita'), $name_gen);
            $last_img = 'uploads/berita/' . $name_gen;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            $berita->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'gambar' => $last_img,
            ]);

            return redirect()->back()->with('success', 'Berita Updated Successfully');
        } else {
            $berita->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);

            return redirect()->back()->with('success', 'Berita Updated Successfully');
        }
    }
    public function destroyBerita($beritaID)
    {
        $berita = Berita::find($beritaID);
        if (file_exists($berita->gambar)) {
            unlink($berita->gambar);
            Berita::find($beritaID)->delete();
            return redirect()->back()->with('success', 'Berita Delete Successfully');
        } else {
            Berita::find($beritaID)->delete();
            return redirect()->back()->with('success', 'Berita Delete Successfully');
        }
    }



    public function indexKabarZakat()
    {
        $kabarzakat = KabarZakat::latest()->get();
        return view('admin.kabarzakat.index', compact('kabarzakat'));
    }

    public function createKabarZakat()
    {
        return view('admin.KabarZakat.add');
    }

    public function storeKabarZakat(Request $request)
    {
        $validated = $request->validate(
            [
                'judul' => 'required|unique:berita',
                'deskripsi' => 'required',
                'gambar' => 'required|mimes:jpg,jpeg,png|max:10240',
            ]
        );

        $gambar = $request->file('gambar');
        $name_gen = hexdec(uniqid()) . '.' . $gambar->getClientOriginalExtension();
        // Image::make($gambar)->resize(500, 300)->save('images/wilayah/' . $name_gen);

        $gambar->move(public_path('uploads/kabarzakat'), $name_gen);
        $last_img = 'uploads/kabarzakat/' . $name_gen;

        KabarZakat::insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('index.kabarzakat')->with('success', 'Kabar Zakat Sukses Ditambahkan');
    }

    public function editKabarZakat($kabarzakatID)
    {
        $kabarzakat = KabarZakat::find($kabarzakatID);
        return view('admin.kabarzakat.edit', compact('kabarzakat'));
    }

    public function updateKabarZakat(Request $request, $kabarzakatID)
    {
        $kabarzakat = KabarZakat::find($kabarzakatID);

        $old_image = $request->old_image;
        $kabarzakat_image = $request->file('gambar');

        if ($kabarzakat_image) {

            $name_gen = hexdec(uniqid()) . '.' . $kabarzakat_image->getClientOriginalExtension();
            $kabarzakat_image->move(public_path('uploads/kabarzakat'), $name_gen);
            $last_img = 'uploads/kabarzakat/' . $name_gen;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            $kabarzakat->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'gambar' => $last_img,
            ]);

            return redirect()->back()->with('success', 'Berita Updated Successfully');
        } else {
            $kabarzakat->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);

            return redirect()->back()->with('success', 'Berita Updated Successfully');
        }
    }

    public function destroyKabarZakat($kabarzakatID)
    {
        $kabarzakat = KabarZakat::find($kabarzakatID);
        if (file_exists($kabarzakat->gambar)) {
            unlink($kabarzakat->gambar);
            KabarZakat::find($kabarzakatID)->delete();
            return redirect()->back()->with('success', 'Berita Delete Successfully');
        } else {
            KabarZakat::find($kabarzakatID)->delete();
            return redirect()->back()->with('success', 'Berita Delete Successfully');
        }
    }

    public function statusKabarZakat($kabarzakatID)
    {
        $kabarzakat = KabarZakat::find($kabarzakatID);
        $kabarzakat->status == 'ACTIVE' ? $kabarzakat->update(['status' => 'INACTIVE']) : $kabarzakat->update(['status' => 'ACTIVE']);
        // return $kabarzakat->status;
        return redirect()->back()->with('success', 'Status Data Artikel berhasil Dirubah');
    }

    public function indexArtikel()
    {
        $artikel = Artikel::latest()->paginate(10);
        return view('admin.artikel.index', compact('artikel'));
    }

    public function createArtikel()
    {
        return view('admin.artikel.add');
    }

    public function storeArtikel(Request $request)
    {
        $validated = $request->validate(
            [
                'judul' => 'required|unique:berita',
                'deskripsi' => 'required',
                'gambar' => 'required|mimes:jpg,jpeg,png',
            ]

        );

        $gambar = $request->file('gambar');
        $name_gen = hexdec(uniqid()) . '.' . $gambar->getClientOriginalExtension();
        // Image::make($gambar)->resize(500, 300)->save('images/wilayah/' . $name_gen);

        $gambar->move(public_path('uploads/artikel'), $name_gen);
        $last_img = 'uploads/artikel/' . $name_gen;

        Artikel::insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('index.artikel')->with('success', 'Berita Sukses Ditambahkan');
    }

    public function editArtikel($artikelID)
    {
        $artikel = Artikel::find($artikelID);
        // return $berita;
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function updateArtikel(Request $request, $artikelID)
    {
        $artikel = Artikel::find($artikelID);

        $old_image = $request->old_image;
        $artikel_image = $request->file('gambar');

        if ($artikel_image) {

            $name_gen = hexdec(uniqid()) . '.' . $artikel_image->getClientOriginalExtension();
            $artikel_image->move(public_path('uploads/artikel'), $name_gen);
            $last_img = 'uploads/artikel/' . $name_gen;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            $artikel->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'gambar' => $last_img,
            ]);

            return redirect()->back()->with('success', 'Berita Updated Successfully');
        } else {
            $artikel->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);

            return redirect()->back()->with('success', 'Berita Updated Successfully');
        }
    }

    public function destroyArtikel($artikelID)
    {
        $artikel = Artikel::find($artikelID);
        if (file_exists($artikel->gambar)) {
            unlink($artikel->gambar);
            Artikel::find($artikelID)->delete();
            return redirect()->back()->with('success', 'Berita Delete Successfully');
        } else {
            Artikel::find($artikelID)->delete();
            return redirect()->back()->with('success', 'Berita Delete Successfully');
        }
    }

    public function statusArtikel($artikelID)
    {
        $artikel = Artikel::find($artikelID);
        $artikel->status == 'ACTIVE' ? $artikel->update(['status' => 'INACTIVE']) : $artikel->update(['status' => 'ACTIVE']);
        // return $kabarzakat->status;
        return redirect()->back()->with('success', 'Status Data Artikel berhasil Dirubah');
    }

    public function indexInspirasi()
    {
        $inspirasi = Inspirasi::latest()->paginate(10);
        return view('admin.inspirasi.index', compact('inspirasi'));
    }

    public function createInspirasi()
    {
        return view('admin.inspirasi.add');
    }

    public function storeInspirasi(Request $request)
    {
        $validated = $request->validate(
            [
                'judul' => 'required|unique:berita',
                'deskripsi' => 'required',
                'gambar' => 'required|mimes:jpg,jpeg,png',
            ]

        );

        $gambar = $request->file('gambar');
        $name_gen = hexdec(uniqid()) . '.' . $gambar->getClientOriginalExtension();
        // Image::make($gambar)->resize(500, 300)->save('images/wilayah/' . $name_gen);

        $gambar->move(public_path('uploads/inspirasi'), $name_gen);
        $last_img = 'uploads/inspirasi/' . $name_gen;

        Inspirasi::insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('index.inspirasi')->with('success', 'Berita Sukses Ditambahkan');
    }

    public function editInspirasi($inspirasiID)
    {
        $inspirasi = Inspirasi::find($inspirasiID);
        // return $berita;
        return view('admin.inspirasi.edit', compact('inspirasi'));
    }

    public function updateInspirasi(Request $request, $inspirasiID)
    {
        $inspirasi = Inspirasi::find($inspirasiID);

        $old_image = $request->old_image;
        $inspirasi_image = $request->file('gambar');

        if ($inspirasi_image) {

            $name_gen = hexdec(uniqid()) . '.' . $inspirasi_image->getClientOriginalExtension();
            $inspirasi_image->move(public_path('uploads/inspirasi'), $name_gen);
            $last_img = 'uploads/inspirasi/' . $name_gen;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            $inspirasi->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'gambar' => $last_img,
            ]);

            return redirect()->back()->with('success', 'Berita Updated Successfully');
        } else {
            $inspirasi->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);

            return redirect()->back()->with('success', 'Berita Updated Successfully');
        }
    }

    public function destroyInspirasi($inspirasiID)
    {
        $inspirasi = Inspirasi::find($inspirasiID);
        if (file_exists($inspirasi->gambar)) {
            unlink($inspirasi->gambar);
            Inspirasi::find($inspirasiID)->delete();
            return redirect()->back()->with('success', 'Berita Delete Successfully');
        } else {
            Inspirasi::find($inspirasiID)->delete();
            return redirect()->back()->with('success', 'Berita Delete Successfully');
        }
    }

    public function statusInspirasi($inspirasiID)
    {
        $inspirasi = Inspirasi::find($inspirasiID);
        $inspirasi->status == 'ACTIVE' ? $inspirasi->update(['status' => 'INACTIVE']) : $inspirasi->update(['status' => 'ACTIVE']);
        // return $kabarzakat->status;
        return redirect()->back()->with('success', 'Status Data Artikel berhasil Dirubah');
    }

    public function indexGaleri()
    {
        $galeri = Galeri::latest()->paginate(10);

        // foreach ($galeri as $g) {
        //     foreach (explode('|', $g->gambar) as $image) {
        //         return $image;
        //     }
        // }

        return view('admin.galeri.index', compact('galeri'));
    }
    public function createGaleri()
    {
        return view('admin.galeri.add');
    }
    public function storeGaleri(Request $request)
    {
        $validated = $request->validate(
            [
                'judul' => 'required|unique:galeri',
                'gambar' => 'required',
            ]

        );

        $gambar = $request->file('gambar');

        foreach ($gambar as $multi_gambar) {
            $name_gen = hexdec(uniqid()) . '.' . $multi_gambar->getClientOriginalExtension();
            // Image::make($gambar)->resize(500, 300)->save('images/wilayah/' . $name_gen);

            $multi_gambar->move(public_path('uploads/galeri'), $name_gen);
            $last_img[] = 'uploads/galeri/' . $name_gen;
        }
        Galeri::insert([
            'judul' => $request->judul,
            'gambar' => implode("|", $last_img),
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('index.galeri')->with('success', 'Galeri Sukses Ditambahkan');
    }

    public function editGaleri($galeriID)
    {
        $galeri = Galeri::find($galeriID);
        // return $berita;
        return view('admin.galeri.edit', compact('galeri'));
    }
    public function updateGaleri(Request $request, $galeriID)
    {
        $galeri = Galeri::find($galeriID);

        $old_image = $request->old_image;
        // dd($old_image);
        $galeri_image = $request->file('gambar');




        if ($galeri_image) {
            foreach ($galeri_image as $multi_img) {

                $name_gen = hexdec(uniqid()) . '.' . $multi_img->getClientOriginalExtension();
                $multi_img->move(public_path('uploads/galeri'), $name_gen);
                $last_img[] = 'uploads/galeri/' . $name_gen;
                // unlink($old_image);
                // foreach ($old_image as $multi_old) {
                //     if (file_exists($multi_old)) {
                //         unlink($multi_old);
                //     }
                // }
            }
            $galeri->update([
                'judul' => $request->judul,
                'gambar' => implode("|", $last_img),
            ]);

            return redirect('/admin/galeri')->with('success', 'Galeri Updated Successfully');
        } else {
            $galeri->update([
                'judul' => $request->judul,
            ]);

            return redirect()->back()->with('success', 'Galeri Updated Successfully');
        }
    }

    public function destroyGaleri($galeriID)
    {
        $galeri = Galeri::find($galeriID);
        if (file_exists($galeri->gambar)) {
            unlink($galeri->gambar);
            Galeri::find($galeriID)->delete();
            return redirect()->back()->with('success', 'Berita Delete Successfully');
        } else {
            Galeri::find($galeriID)->delete();
            return redirect()->back()->with('success', 'Berita Delete Successfully');
        }
    }
}