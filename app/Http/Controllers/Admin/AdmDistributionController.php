<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdmDistributionController extends Controller
{
    public function penyaluran()
    {
        $db = DB::table('distribution');
        $data = $db->get();
        foreach ($data as $distribution => $value) {
            $value->amount = $this->formatRupiah($value->amount, 'Rp. ');
        }
        foreach ($data as $phone => $value) {
            if (substr($value->phone, 0, 1) == '0') {
                $value->phone = '62' . substr($value->phone, 1);
            }
        }

        $title = 'Daftar Penyaluran';
        return view('admin.penyaluran.index', compact('data', 'title'));
    }
    public function createPenyaluran()
    {
        $lembaga = DB::table('lembaga')->where('type', 'PENERIMA')->orWhere('type', 'PEMBAYAR_PENERIMA')->get();
        $program = DB::table('program')->where('distribution', 1)->get();
        $provinces  = DB::table('address')->where(DB::raw('CHAR_LENGTH(id)'), '=', 2)->get();

        $title = 'Tambah Penyaluran';
        return view('admin.penyaluran.add', compact('provinces', 'program', 'lembaga', 'title'));
    }

    /**
     * -------------------------------------------------------------------
     * penyaluranStore() - Create [POST]
     * -------------------------------------------------------------------
     * Method untuk membuat data penyaluran baru ke dalam database
     * @return view
     */
    public function penyaluranStore()
    {
        // Custom Error Message for Validation
        $messages = [
            'required' => 'Data :attribute harus diisi',
            'in'      => 'Data :attribute harus bertipe :values',
            'nik.min' => 'Panjang NIK minimal 16 karakter',
            'nik.max' => 'Panjang NIK maksimal 16 karakter',
            'amount.min' => 'Jumlah besaran minimal Rp.10.000',
        ];

        // Set Rules for Form Input
        $rules = [
            'name' => 'required|string',
            'nik' => 'required|string|min:16|max:16',
            'phone' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'province' => 'required',
            'district' => 'required',
            'regency' => 'required',
            'village' => 'required',

            'job' => 'required',
            'type' => 'required',
            'amount' => 'required|int|min:10000',
        ];

        // Adding rule if Lembaga is Set
        if (request('lembaga')) {
            unset($rules['name']);
            unset($rules['nik']);
            unset($rules['gender']);
            unset($rules['birthplace']);
            unset($rules['birthdate']);

            $lembaga = DB::table('lembaga')->where('code', request('lembaga'))->first();
            $nik = $lembaga->code;
            $name = $lembaga->name;
            $gender = "";
            $birthplace = '';
            $birthdate = '0001-01-01';
        } else {
            $nik = request('nik');
            $name = request('name');
            $gender = request('gender');
            $birthplace = request('birthplace');
            $birthdate = request('birthdate');
        }

        //  amount ✅
        $pattern = ['/Rp/', '/[^\p{L}\p{N}\s]/u', '/ /'];
        $amount = preg_replace($pattern, '', request('amount'));

        // change amount data into integer
        request()->merge([
            'amount' => $amount,
        ]);
        // DATA VALIDATION ✅🔐
        $validator = Validator::make(request()->all(), $rules, $messages);
        if ($validator->fails()) {
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Data gagal dikirim. Silakan cek kembali form yang Anda isi');
            session()->flash('status', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //  amount ✅
        $pattern = ['/Rp/', '/[^\p{L}\p{N}\s]/u', '/ /'];
        $amount = preg_replace($pattern, '', request('amount'));

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
        $uniqueId = "DIS" . uniqid() . $date;
        $file = request()->file();
        foreach ($file as $label => $file) {
            $filename = $label . '-' . $uniqueId . '.' . $file->getClientOriginalExtension();
            $path = "uploads/penyaluran/" . $label . '/';
            $requirements[$label] = $path . '' . $filename;
            $file->move(public_path($path), $filename);
        }
        // dd($requirements);

        //  INSERT ✅
        $data = [
            'id' => $uniqueId,
            'dist_type' => request('dist_type'),
            'distribution_date' => request('dist_date'),
            'program_id' => request('program_id'),

            'gender' => $gender,
            'name' => $name,
            'nik' => $nik,
            'ashnaf' => request('ashnaf'),
            'birthplace' => $birthplace,
            'birthdate' => $birthdate,
            'phone' => request('phone'),
            'religion' => request('religion'),
            'job' => request('job'),
            'address' => request('village'),

            'type' => request('type'),
            'description' => request('description'),
            'amount' => $amount,
            'requirements' => json_encode($requirements),
            'created_at'    => $created_at,
        ];
        Distribution::insert($data);

        // SMTP MAIL ❗ Disabled
        // Mail::to(request()->email)->send(new Notifikasi($tf->email, 'Anda berhasil membayar zakat ' . request('jenis') . ' dengan nominal Rp.' . request('nominal')));
        // $users = User::role('admin')->get();

        // Success ✅   
        session()->flash('title', 'Sukses');
        session()->flash('message', 'Data berhasil dikirim');
        session()->flash('status', 'success');
        return redirect('/admin/penyaluran');
    }

    public function detailPenyaluran($id)
    {
        $dist = DB::table('distribution')->where('id', $id)->get()->first();

        $provinces  = DB::table('address')->where(DB::raw('CHAR_LENGTH(id)'), '=', 2)->get();
        $districts  = DB::table('address')->where(DB::raw('CHAR_LENGTH(id)'), '=', 5)->where('id', 'LIKE', substr($dist->address, 0, 2) . '%')->get();
        $regencies  = DB::table('address')->where(DB::raw('CHAR_LENGTH(id)'), '=', 8)->where('id', 'LIKE', substr($dist->address, 0, 5) . '%')->get();
        $villages  = DB::table('address')->where(DB::raw('CHAR_LENGTH(id)'), '=', 13)->where('id', 'LIKE', substr($dist->address, 0, 8) . '%')->get();

        $program = DB::table('distribution')->join('program', 'distribution.program_id', '=', 'program.id')->get()->first();
        $title = 'Detail Penyaluran';
        return view('admin.penyaluran.detail', compact('provinces', 'districts', 'regencies', 'villages', 'dist', 'program', 'title'));
    }

    public function destroyPenyaluran($id)
    {
        // Check if data is already available 
        $data = DB::table('distribution')->where('id', $id)->get();


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
            DB::table('distribution')->where('id', $id)->delete();
            // Success ✅   
            session()->flash('title', 'Sukses');
            session()->flash('message', 'Data penyaluran berhasil dihapus');
            session()->flash('status', 'success');
            return redirect('/admin/penyaluran/')->with('success', 'Data penyaluran berhasil dihapus');
        } else {
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Data penyaluran tidak ditemukan');
            session()->flash('status', 'error');
            return redirect('/admin/penyaluran/')->with('danger', 'Data penyaluran tidak ditemukan');
        }
    }

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
