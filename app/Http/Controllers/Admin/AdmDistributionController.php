<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmDistributionController extends Controller
{
    public function penyaluran()
    {
        $db = DB::table('distribution');
        $data = $db->get();

        $title = 'Daftar Penyaluran';
        // return view('admin.penyaluran.index', compact('data'));
        return view('admin.penyaluran.index', compact('data', 'title'));
    }
    public function createPenyaluran()
    {
        $db = DB::table('provinces');
        $data = $db->get();
        return view('admin.penyaluran.add', compact('data', 'title'));
    }

    public function detailPenyaluran($id)
    {
        $db = DB::table('distribution');
        $dist = $db->where('id', $id)->get()->first();

        $json_address =  json_decode($dist->address);

        $db = DB::table('provinces');
        $data = $db->get();

        $program = DB::table('distribution')->join('program', 'distribution.program_id', '=', 'program.id')->get()->first();
        // dd($program->name);
        return view('admin.penyaluran.detail', compact('data', 'dist', 'json_address', 'program'));
        $title = 'Detail Penyaluran';
        return view('admin.penyaluran.detail', compact('data', 'dist', 'json_address', 'program', 'title'));
    }
}
