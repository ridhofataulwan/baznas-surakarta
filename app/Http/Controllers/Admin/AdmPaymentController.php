<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Payment;

class AdmPaymentController extends Controller
{
    public function pembayaran()
    {
        $data = Payment::where('visible', 'SHOW')->get();
        return view('admin.pembayaran.index', compact('data'));
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
    public function createPembayaran()
    {
        $db = DB::table('provinces');
        $data = $db->get();
        return view('admin.pembayaran.add', compact('data'));
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
    }
}