<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function storeRequest(Request $request)
    {
        $data = [
            'request_category_id'   => $request->category,
            'nik'                   => $request->nik,
            'name'                  => $request->name,
            'birthplace'            => $request->birthplace,
            'birthdate'             => $request->birthdate,
            'alamat'                => $request->provinsi,
            'religion'              => $request->religion,
            'job'                   => $request->job,
            'phone_number'          => $request->phone_number,
            'description'           => $request->description,
            // 'requirements'          => $request->surat_permohonan,
        ];
        // dd($data['requirements']);
        DB::table('request')->insert([
            'id'                    => rand(),
            'request_category_id'   => $data['request_category_id'],
            'nik'                   => $data['nik'],
            'name'                  => $data['name'],
            'birthplace'            => $data['birthplace'],
            'birthdate'             => $data['birthdate'],
            'address'                => $data['alamat'],
            'religion'              => $data['religion'],
            'job'                   => $data['job'],
            'phone_number'          => $data['phone_number'],
            'description'           => $data['description'],
            'requirements'          => 'json requirements',
            // erorr
        ]);
        return redirect('permohonan')->with('success', 'Data Permohonan Berhasil ditambahkan!');
    }
}