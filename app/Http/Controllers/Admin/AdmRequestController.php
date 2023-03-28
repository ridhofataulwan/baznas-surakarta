<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdmRequestController extends Controller
{
    public function permohonan()
    {
        $db = DB::table('request');
        $data = $db->get();
        $programs = "";
        foreach ($data as $d) {
            if ($d->program_id == 1) {
                $programs = "Kemanusiaan";
            } elseif ($d->program_id == 2) {
                $programs = "Pendidikan";
            } elseif ($d->program_id == 3) {
                $programs = "Kesehatan";
            } elseif ($d->program_id == 4) {
                $programs = "Advokasi dan Dakwah";
            } elseif ($d->program_id == 5) {
                $programs = "Ekonomi Produktif";
            }
        }

        $title = 'Daftar Permohonan';
        return view('admin.permohonan-bantuan.index', compact('data', 'programs', 'title'));
    }
    public function peninjauanPermohonan()
    {
        $db = DB::table('request')->where('status', 'VALID')->orWhere('status', 'INVESTIGATE')->orWhere('status', 'DONE')->orWhere('status', 'ACCEPTED')->orWhere('status', 'UNACCEPTED');
        $data = $db->get();
        $programs = "";
        foreach ($data as $d) {
            if ($d->program_id == 1) {
                $programs = "Kemanusiaan";
            } elseif ($d->program_id == 2) {
                $programs = "Pendidikan";
            } elseif ($d->program_id == 3) {
                $programs = "Kesehatan";
            } elseif ($d->program_id == 4) {
                $programs = "Advokasi dan Dakwah";
            } elseif ($d->program_id == 5) {
                $programs = "Ekonomi Produktif";
            }
        }

        $title = 'Daftar Peninjauan Permohonan';
        return view('admin.permohonan-bantuan.index-peninjauan', compact('data', 'programs', 'title'));
    }
    public function detailPermohonan($id)
    {
        $db = DB::table('request');
        $req = $db->where('id', $id)->get()->first();

        $provinces  = DB::table('address')->where(DB::raw('CHAR_LENGTH(id)'), '=', 2)->get();
        $districts  = DB::table('address')->where(DB::raw('CHAR_LENGTH(id)'), '=', 5)->where('id', 'LIKE', substr($req->address, 0, 2) . '%')->get();
        $regencies  = DB::table('address')->where(DB::raw('CHAR_LENGTH(id)'), '=', 8)->where('id', 'LIKE', substr($req->address, 0, 5) . '%')->get();
        $villages  = DB::table('address')->where(DB::raw('CHAR_LENGTH(id)'), '=', 13)->where('id', 'LIKE', substr($req->address, 0, 8) . '%')->get();

        $title = 'Detail Permohonan';
        return view('admin.permohonan-bantuan.detail', compact('provinces', 'districts', 'regencies', 'villages', 'req', 'title'));
    }
    public function createPermohonan()
    {
        $program = DB::table('program')->where('request', 1)->get();
        $provinces  = DB::table('address')->where(DB::raw('CHAR_LENGTH(id)'), '=', 2)->get();

        $title = 'Tambah Permohonan';
        return view('admin.permohonan-bantuan.add', compact('provinces', 'program', 'title'));
    }

    public function requestStore(Request $request)
    {
        $rules = [
            'program_id' => 'required',
            'name' => 'required',
            'nik' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'province' => 'required',
            'district' => 'required',
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
        session()->flash('title', 'Sukses');
        session()->flash('message', 'Data berhasil dikirim');
        session()->flash('status', 'success');
        return redirect('/admin/permohonan')->with('success', 'Permohonan berhasil dikirim');
    }

    public function updateRequestStore(Request $request)
    {
        $rules = [
            'program_id' => 'required',
            'name' => 'required',
            'nik' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'province' => 'required',
            'district' => 'required',
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
            'id' => request('id'),
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
        session()->flash('title', 'Sukses');
        session()->flash('message', 'Data berhasil dikirim');
        session()->flash('status', 'success');
        return redirect('/admin/permohonan')->with('success', 'Permohonan berhasil dikirim');
    }

    public function validatePermohonan($id, $value)
    {
        // Check if data is already available 
        $data = Permohonan::where('id', $id);
        // If data > 0, that means data has already stored in database
        if (count($data->get()) > 0) {
            $data->update([
                'status' => $value,
            ]);
            // Success ✅   
            session()->flash('title', 'Sukses');
            session()->flash('message', 'Data permohonan berhasil diubah: ' . strtoupper($value));
            session()->flash('status', 'success');
            if ($value == "ACCEPTED") {
                // Distribusi Auto Fill
            }
            return redirect()->back()->with('success', 'Data permohonan berhasil diubah: ' . strtoupper($value));
        } else {
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Data permohonan tidak ditemukan');
            session()->flash('status', 'error');
            return redirect()->back()->with('danger', 'Data permohonan tidak ditemukan');
        }
    }

    public function destroyPermohonan($id)
    {
        // Check if data is already available 
        $data = Permohonan::where('id', $id)->get();


        $files = json_decode($data[0]->requirements);
        // If data > 0, that means data has already stored in database
        // If request code and new_code same, that means it updates itself
        if (count($data) > 0) {
            foreach ($files as $file => $filepath) {
                // Make loop to check if filepath is avaliable or not
                if (file_exists($filepath)) {
                    // Delete file
                    unlink($filepath);
                }
            }
            Permohonan::where('id', $id)->delete();
            // Success ✅   
            session()->flash('title', 'Sukses');
            session()->flash('message', 'Data permohonan berhasil dihapus');
            session()->flash('status', 'success');
            return redirect('/admin/permohonan/')->with('success', 'Data permohonan berhasil dihapus');
        } else {
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Data permohonan tidak ditemukan');
            session()->flash('status', 'error');
            return redirect('/admin/permohonan/')->with('danger', 'Data permohonan tidak ditemukan');
        }
    }
}
