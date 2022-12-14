<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            if ($d->request_category_id == 1) {
                $programs = "Kemanusiaan";
            } elseif ($d->request_category_id == 2) {
                $programs = "Pendidikan";
            } elseif ($d->request_category_id == 3) {
                $programs = "Kesehatan";
            } elseif ($d->request_category_id == 4) {
                $programs = "Advokasi dan Dakwah";
            } elseif ($d->request_category_id == 5) {
                $programs = "Ekonomi Produktif";
            }
        }

        return view('admin.permohonan-bantuan.index', compact('data', 'programs'));
    }
    public function detailPermohonan($id)
    {
        $db = DB::table('request');
        $req = $db->where('id', $id)->get()->first();

        $json =  json_decode($req->address);
        // echo gettype($json);

        $db = DB::table('provinces');
        $data = $db->get();

        return view('admin.permohonan-bantuan.detail', compact('data', 'req', 'json'));
    }
    public function createPermohonan()
    {
        $db = DB::table('provinces');
        $data = $db->get();
        return view('admin.permohonan-bantuan.add', compact('data'));
    }

    public function requestStore(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
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

        $requirements = [
            'surat_permohonan'  => ['name' => request('surat_permohonan')],
            'ktp'               => ['name' => request('ktp')],
            'kk'                => ['name' => request('kk')],
            'sktm'              => ['name' => request('sktm')],
            'suket'             => ['name' => request('suket')],
            'tagihan'           => ['name' => request('tagihan')],
            'proposal'          => ['name' => request('proposal')],
        ];

        $data = [
            'request_category_id'   => $request->category,
            'nik'                   => $request->nik,
            'name'                  => $request->name,
            'birthplace'            => $request->birthplace,
            'birthdate'             => $request->birthdate,
            'address'               => json_encode($address),
            'religion'              => $request->religion,
            'job'                   => $request->job,
            'phone_number'          => $request->phone_number,
            'description'           => $request->description,
            'requirements'          => json_encode($requirements),
        ];
        // dd($data);
        DB::table('request')->insert([
            'id'                    => rand(),
            'request_category_id'   => $data['request_category_id'],
            'nik'                   => $data['nik'],
            'name'                  => $data['name'],
            'birthplace'            => $data['birthplace'],
            'birthdate'             => $data['birthdate'],
            'address'               => $data['address'],
            'religion'              => $data['religion'],
            'job'                   => $data['job'],
            'phone_number'          => $data['phone_number'],
            'description'           => $data['description'],
            'requirements'          => $data['requirements'],
            // erorr
        ]);
        return redirect('admin/permohonan')->with('success', 'Data Permohonan Berhasil ditambahkan!');
    }
}