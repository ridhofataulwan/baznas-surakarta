<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    public function indexLayananRekening()
    {
        $rek = Rekening::all();
        return view('admin.layanan-rekening.index', compact('rek'));
    }

    public function addRekening()
    {
        return view('admin.layanan-rekening.add');
    }

    public function storeRekening()
    {
        $validator = Validator::make(request()->all(), [
            'no_rek' => 'required|numeric|unique:rekenings,no_rek',
            'jenis_rek' => 'required|string',
            'image' => 'required|max:10240|mimes:png,jpg,jpeg,svg,webp',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $image = request()->file('image');
        // return $image;
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        // Image::make($gambar)->resize(500, 300)->save('images/wilayah/' . $name_gen);

        $image->move(public_path('uploads/rekening'), $name_gen);
        $last_img = 'uploads/rekening/' . $name_gen;
        Rekening::create([
            'image' => $last_img,
            'jenis' => request('jenis_rek'),
            'no_rek' => request('no_rek'),
            // 'status' => 'HIDDEN',
        ]);
        return redirect('admin/layanan/rekening');
    }

    public function editRekening($rekeningID)
    {
        $rek = Rekening::find($rekeningID);
        if (!$rek) {
            return redirect()->back()->with('status', 'Data tidak ditemukan');
        }
        return view('admin.layanan-rekening.edit', compact('rek'));
    }

    public function updateRekening($rekeningID)
    {
        $rek = Rekening::find($rekeningID);
        if (!$rek) {
            return redirect()->back()->with('status', 'Data tidak ditemukan');
        }

        $validator = Validator::make(request()->all(), [
            'no_rek' => 'required|numeric|unique:rekenings,no_rek,' . $rekeningID,
            'jenis_rek' => 'required|string',
            'image' => 'required|max:10240|mimes:png,jpg,jpeg,svg,webp',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            // return $image;
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            // Image::make($gambar)->resize(500, 300)->save('images/wilayah/' . $name_gen);

            $image->move(public_path('uploads/rekening'), $name_gen);
            $last_img = 'uploads/rekening/' . $name_gen;
            $rek->update([
                'image' => $last_img,
                'jenis' => request('jenis_rek'),
                'no_rek' => request('no_rek')
            ]);
            return redirect('admin/layanan/rekening')->with('success', 'Data berhasil diupdate');
        } else {
            $rek->update([
                'no_rek' => request('no_rek'),
            ]);
            return redirect('admin/layanan/rekening')->with('success', 'Data berhasil diupdate');
        }
    }

    public function deleteRekening($rekeningID)
    {
        $rek = Rekening::find($rekeningID);
        if (!$rek) {
            return redirect()->back()->with('status', 'Data tidak ditemukan');
        }
        if (file_exists($rek->gambar)) {
            unlink($rek->gambar);
            Rekening::find($rekeningID)->delete();
            return redirect()->back()->with('success', 'Rekening Delete Successfully');
        } else {
            Rekening::find($rekeningID)->delete();
            return redirect()->back()->with('success', 'Rekening Delete Successfully');
        }
    }

    public function indexBayarZakat()
    {
        $bayar = Transaction::all();
        return view('admin.bayar-zakat.index', compact('bayar'));
    }

    public function updateStatusBayar($transID)
    {
        $trans = Transaction::find($transID);
        if (!$trans) {
            return redirect()->back()->with('success', 'Data tidak ditemukan');
        }
        $trans->status == 'HIDDEN' ? $trans->update(['status' => 'SHOW']) : $trans->update(['status' => 'HIDDEN']);
        return redirect()->back()->with('success', 'Data berhasil ditampilkan');
    }
}
