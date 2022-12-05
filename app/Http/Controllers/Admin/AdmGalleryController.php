<?php

namespace App\Http\Controllers\Admin;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class AdmGalleryController extends Controller
{
    public function indexGaleri()
    {
        $galeri = Galeri::latest()->paginate(10);

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
