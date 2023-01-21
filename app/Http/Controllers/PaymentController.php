<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class PaymentController extends Controller
{
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


        // Custom Error Message for Validation
        $messages = [
            'required' => 'Data :attribute harus diisi',
            'in'      => 'Data :attribute harus bertipe :values',
            'amount.min' => 'Jumlah besaran minimal Rp.10.000',
            'proof_of_payment.required' => 'Bukti pembayaran harus diisi',
            'proof_of_payment.mimes' => 'Bukti pembayaran harus bertpe gambar :values',
            'proof_of_payment.max' => 'Bukti pembayaran maksimal berukuran :max KB',
        ];

        // Set Rules for Form Input
        $rules = [
            'name' => 'required|string',
            'nik' => 'required|string|min:16|max:16',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'regency' => 'required',
            'village' => 'required',

            'type' => 'required',
            'amount' => 'required|int|min:10000',
            'proof_of_payment' => 'required|max:5000|mimes:png,jpg,jpeg',
        ];

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

        // // Store Uploaded File
        // $file->move(public_path('uploads/bayar'), $filename);
        // // Insert to Database
        // Payment::create($data);

        // SMTP MAIL ❗Disabled
        // Mail::to(request()->email)->send(new Notifikasi($tf->email, 'Anda berhasil membayar zakat ' . request('jenis') . ' dengan nominal Rp.' . request('nominal')));
        // $users = User::role('admin')->get();
        // foreach ($users as $user) {
        //     Mail::to($user->email)->send(new Notifikasi($user->email, 'Ada pembayar zakat baru dengan nama ' . $tf->name));
        // }

        // Success ✅   
        session()->flash('title', 'Sukses');
        session()->flash('message', 'Data berhasil dikirim');
        session()->flash('status', 'success');
        return redirect()->back();
    }
}
