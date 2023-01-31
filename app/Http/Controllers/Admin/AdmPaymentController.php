<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Payment;
use IntlDateFormatter;
use Illuminate\Support\Facades\Mail;

class AdmPaymentController extends Controller
{
    /**
     * -------------------------------------------------------------------
     * pembayaran() - Index [GET]
     * -------------------------------------------------------------------
     * Method untuk menampilkan daftar pembayaran
     * @return view
     */
    public function pembayaran()
    {
        $data = Payment::where('visible', 'SHOW')->get();
        return view('admin.pembayaran.index', compact('data'));
        /**
         * ? Table Payment
         * *Properti
         * id, name, nik, gender, phone, email, address
         * type, amount, proof_of_payment, visible, valid 
         * created_at, updated_at
         * ============================
         */

        //  Date Formatter
        $fmt_date = datefmt_create(
            'id_ID',
            IntlDateFormatter::LONG,
            IntlDateFormatter::LONG,
            'Asia/Jakarta',
            IntlDateFormatter::GREGORIAN,
            'dd MMMM yyyy'
        );
        $fmt_time = datefmt_create(
            'id_ID',
            IntlDateFormatter::LONG,
            IntlDateFormatter::LONG,
            'Asia/Jakarta',
            IntlDateFormatter::GREGORIAN,
            'HH:mm'
        );

        $data = Payment::all();
        foreach ($data as $payment => $value) {
            $value->amount = $this->formatRupiah($value->amount, 'Rp. ');
        }
        foreach ($data as $phone => $value) {
            if (substr($value->phone, 0, 1) == '0') {
                $value->phone = '62' . substr($value->phone, 1);
            }
        }

        return view('admin.pembayaran.index', compact('data', 'fmt_date', 'fmt_time'));
    }
    public function detailPembayaran($id)
    {
        $db = DB::table('provinces');
        $data = $db->get();

        $req = DB::table('payment')->where('id', $id)->get()->first();
        $json =  json_decode($req->address);

        $payment = Payment::where('id', $id)->get()->first();
        return view('admin.pembayaran.detail', compact('data', 'payment', 'json'));
    }

    /**
     * -------------------------------------------------------------------
     * createPembayaran() - Create [GET]
     * -------------------------------------------------------------------
     * Method untuk menampilkan form buat data pembayaran baru
     * @return view
     */
    public function createPembayaran()
    {
        $db = DB::table('provinces');
        $data = $db->get();
        return view('admin.pembayaran.add', compact('data'));
        $provinces = DB::table('provinces')->get();
        $lembaga = DB::table('lembaga')->get();
        return view('admin.pembayaran.add', compact('provinces', 'lembaga'));
    }

    public function paymentStore()
    {
        /**
         * ? VALIDASI DATA
         * Ket: 
         * Nama, Nik, Jenis Kelamin, No HP, Email, Alamat (Kecamatan, Kelurahan)
         * Jenis Bayar, Nominal, Bukti Pembayaran
         * ? ======Comparasion with DB=======
         * Table Name : payment
         * AttrDB | Data Input
         * *id              = ai ✅🔐
         * *name            = name ✅
         * *nik             = nik ✅
         * *?gender - enum  = gender ✅
         * *phone           = phone ✅
         * *email           = email ✅
         * *! address       = address ✅
         * *! type          = type ✅
         * *! ammount       = ammount ✅
         * *! proof_of_payment - img    = proof_of_payment ✅
         * *! visible - boolean         = (-) DEFAULT
         * *! valid - enum              = (-) DEFAULT
         * *created_at - datetime        = (-) ✅
         * *updated_at - timestamp       = (-) DEFAULT
         */

        // DATA VALIDATION ✅🔐
        $validator = Validator::make(request()->all(), [
            'name' => 'required|string',
            'nik' => 'required|string|min:16|max:16',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            // 'address' => 'required',

            'type' => 'required',
            'amount' => 'required',
            'proof_of_payment' => 'required|max:1024|mimes:png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
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
            'address' => [
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
            ]
        ];

        //  amount ✅
        $pattern = ['/Rp/', '/[^\p{L}\p{N}\s]/u', '/ /'];
        $amount = preg_replace($pattern, '', request('amount'));


        // proof_of_payment ✅
        $file = request()->file('proof_of_payment');
        $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
        $pop = 'uploads/bayar/' . $filename;

        // created_at ✅
        date_default_timezone_set("Asia/Jakarta");
        $created_at = date('Y-m-d H:i:s');

        //  INSERT ✅
        $data = [
            'name' => request('name'),
            'nik' => request('nik'),
            'gender' => request('gender'),
            'phone' => request('phone'),
            'email' => request('email'),
            'address' => json_encode($address),

            'type' => request('type'),
            'amount' => $amount,
            'created_at' => $created_at,
            'proof_of_payment' => $pop,
        ];

        // dd($data);
        $file->move(public_path('uploads/bayar'), $filename);
        Payment::create($data);

        // SMTP MAIL ❗
        // Mail::to(request()->email)->send(new Notifikasi($tf->email, 'Anda berhasil membayar zakat ' . request('jenis') . ' dengan nominal Rp.' . request('nominal')));
        // $users = User::role('admin')->get();
        // foreach ($users as $user) {
        //     Mail::to($user->email)->send(new Notifikasi($user->email, 'Ada pembayar zakat baru dengan nama ' . $tf->name));
        // }
        return redirect()->back();
    /**
     * -------------------------------------------------------------------
     * setVisibility() 
     * -------------------------------------------------------------------
     * Set visibility data pembayaran
     * HIDDEN - SHOW
     */
    public function setVisibility(Request $request)
    {
        $id = $request->get('id');
        $visibility = $request->get('visibility');
        if ($visibility == 'HIDDEN') {
            $visibility = 'SHOW';
        } else {
            $visibility = 'HIDDEN';
        }
        DB::table('payment')->where('id', $id)->update(['visible' => $visibility]);
    }

    /**
     * -------------------------------------------------------------------
     * formatRupiah($angka, $prefix) 
     * -------------------------------------------------------------------
     * Method to set angka to format currency
     * Rp. $angka
     */
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

    public function destroyPembayaran($id)
    {
        // Check if data is already available 
        $data = Payment::where('id', $id)->get();

        // If data > 0, that means data has already stored in database
        // If request code and new_code same, that means it updates itself
        if (count($data) > 0) {
            Payment::where('id', $id)->delete();
            // Success ✅   
            session()->flash('title', 'Sukses');
            session()->flash('message', 'Data Pembayaran berhasil dihapus');
            session()->flash('status', 'success');
            return redirect('/admin/pembayaran/')->with('success', 'Data Pembayaran berhasil dihapus');
        } else {
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Data Pembayaran tidak ditemukan');
            session()->flash('status', 'error');
            return redirect('/admin/pembayaran/')->with('danger', 'Data Pembayaran tidak ditemukan');
        }
    }

    public function validatePembayaran($id, $value)
    {
        // Check if data is already available 
        $data = Payment::where('id', $id);

        // If data > 0, that means data has already stored in database
        if (count($data->get()) > 0) {
            $data->update([
                'valid' => $value,
            ]);
            // Success ✅   
            session()->flash('title', 'Sukses');
            session()->flash('message', 'Data Pembayaran berhasil diubah: ' . $value);
            session()->flash('status', 'success');
            return redirect('/admin/pembayaran/')->with('success', 'Data Pembayaran berhasil diubah: ' . $value);
        } else {
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Data Pembayaran tidak ditemukan');
            session()->flash('status', 'error');
            return redirect('/admin/pembayaran/')->with('danger', 'Data Pembayaran tidak ditemukan');
        }
    }
}