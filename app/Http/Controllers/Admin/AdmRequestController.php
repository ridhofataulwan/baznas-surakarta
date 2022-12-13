<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmRequestController extends Controller
{
    public function permohonan()
    {
        return view('admin.permohonan-bantuan.index');
    }
    public function detailPermohonan($id)
    {
        return view('admin.permohonan-bantuan.detail');
    }
    public function createPermohonan()
    {
        return view('admin.permohonan-bantuan.add');
    }
}
