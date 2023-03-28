<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lembaga;
use App\Models\Payment;
use Illuminate\Http\Request;
use IntlDateFormatter;


class AdmLembagaController extends Controller
{
    public function listLembaga()
    {
        $lembaga = Lembaga::all();
        $title = 'Daftar Lembaga';
        return view('admin.lembaga.index', compact('lembaga', 'title'));
    }

    public function storeLembaga(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'type' => 'required',
        ]);

        // created_at ✅
        date_default_timezone_set("Asia/Jakarta");
        $created_at = date('Y-m-d H:i:s');

        // remove ' ' whitespace
        $code = str_replace(" ", "-", $request->code);

        $data = [
            'code'          => $code,
            'name'          => $request->name,
            'type'          => $request->type,
            'created_at'    => $created_at,
        ];
        $isEmpty = Lembaga::where('code', $data['code'])->get();
        if (count($isEmpty) != 0) {
            // Gagal ❌   
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Data sudah tersedia. Tidak bisa menambahkan lembaga yang kodenya sama');
            session()->flash('status', 'error');
            return redirect()->back()->with('danger', 'Lembaga gagal ditambahkan');
        }

        if ($validated) {

            Lembaga::insert($data);
            // Success ✅   
            session()->flash('title', 'Sukses');
            session()->flash('message', 'Data berhasil dikirim');
            session()->flash('status', 'success');
            return redirect('/admin/lembaga/')->with('success', 'Lembaga berhasil ditambahkan');
        }
    }

    public function updateLembaga(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'new_code' => 'required',
            'name' => 'required',
            'type' => 'required',
        ]);
        if ($validated) {
            // Check if data is already available 
            $data = Lembaga::where('code', $request->new_code)->get();

            // If data > 0, that means data has already stored in database
            // If request code and new_code same, that means it updates itself
            if (count($data) > 0 && $request->code != $request->new_code) {
                // Gagal ❌   
                session()->flash('title', 'Gagal');
                session()->flash('message', 'Data sudah tersedia. Tidak bisa mengubah lembaga yang kodenya sama');
                session()->flash('status', 'error');
                return redirect()->back()->with('danger', 'Lembaga gagal diubah');
            }
            $lembaga = Lembaga::where('code', $request->code);
            $lembaga->timestamps = false;
            $lembaga->update([
                'code' => $request->new_code,
                'name' => $request->name,
                'type' => $request->type,
            ]);

            // Check Code in Property 'nik' | Payment Table
            $payment = Payment::where('nik', $request->code);
            if ($payment == true) {
                $payment->update([
                    'name' => $request->name,
                    'nik' => $request->new_code
                ]);
            }

            // Success ✅   
            session()->flash('title', 'Sukses');
            session()->flash('message', 'Data berhasil diubah');
            session()->flash('status', 'success');
            return redirect('/admin/lembaga/')->with('success', 'Lembaga berhasil diubah');
        }
        session()->flash('title', 'Gagal');
        session()->flash('message', 'Data gagal dikirim. Silakan cek kembali form yang Anda isi');
        session()->flash('status', 'error');
        return redirect('/admin/lembaga/');
    }

    public function destroyLembaga($code)
    {
        // Check if data is already available 
        $data = Payment::where('nik', $code)->get();

        // If data > 0, that means data has already stored in database
        // If request code and new_code same, that means it updates itself
        if (count($data) > 0) {
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Data lembaga digunakan di tabel pembayaran. Tidak boleh dihapus');
            session()->flash('status', 'error');
            return redirect('/admin/lembaga/')->with('danger', 'Lembaga ini tidak boleh dihapus');
        }

        $lembaga = Lembaga::where('code', $code);
        if (count($lembaga->get()) > 0) {
            $lembaga->delete();
            // Success ✅   
            session()->flash('title', 'Sukses');
            session()->flash('message', 'Data berhasil dihapus');
            session()->flash('status', 'success');
            return redirect('/admin/lembaga/')->with('success', 'Lembaga berhasil dihapus');
        } else {
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Data gagal dikirim. Silakan cek kembali form yang Anda isi');
            session()->flash('status', 'error');
            return redirect('/admin/lembaga/')->with('danger', 'Lembaga tidak tersedia');
        }
    }
}
