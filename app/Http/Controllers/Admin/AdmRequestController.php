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
        $db = DB::table('request')->where('status', 'VALID')->orWhere('status', 'INVESTIGATE')->orWhere('status', 'DONE')->orWhere('status', 'ACCEPTED');
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

        $json_address =  json_decode($req->address);
        // echo gettype($json_address);

        $db = DB::table('provinces');
        $data = $db->get();

        $title = 'Detail Permohonan';
        return view('admin.permohonan-bantuan.detail', compact('data', 'req', 'json_address', 'title'));
    }
    public function createPermohonan()
    {
        $program = DB::table('program')->where('request', 1)->get();
        $provinces = DB::table('provinces')->get();

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

        // Get Region Name ✅
        $province = DB::table('provinces')->where('id', request('province'))->first();
        $district = DB::table('districts')->where([
            'id'            => request('district'),
            'provinces_id'  => request('province'),
        ])->first();
        $regency = DB::table('regencies')->where([
            'id'            => request('regency'),
            'districts_id'  => request('district'),
            'provinces_id'  => request('province'),
        ])->first();
        $village = DB::table('villages')->where([
            'id'            => request('village'),
            'regencies_id'  => request('regency'),
            'districts_id'  => request('district'),
            'provinces_id'  => request('province'),
        ])->first();

        //  address ✅
        $address = [
            'province' => [
                'id' => request('province'),
                'name' => $province->name,
            ],
            'district' => [
                'id' => request('district'),
                'name' => $district->name,
            ],
            'regency' => [
                'id' => request('regency'),
                'name' => $regency->name,
            ],
            'village' => [
                'id' => request('village'),
                'name' => $village->name,
            ],
        ];

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
            'address' => json_encode($address),
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
