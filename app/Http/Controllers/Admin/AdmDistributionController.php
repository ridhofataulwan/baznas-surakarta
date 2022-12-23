<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmDistributionController extends Controller
{
    public function penyaluran()
    {
        return view('admin.penyaluran.index');
    }
    public function createPenyaluran()
    {
        $db = DB::table('provinces');
        $data = $db->get();
        return view('admin.penyaluran-sedekah.add', compact('data'));
    }
}