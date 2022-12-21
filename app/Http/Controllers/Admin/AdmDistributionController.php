<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmDistributionController extends Controller
{
    public function penyaluran()
    {
        return view('admin.penyaluran.index');
    }
    public function createPenyaluran()
    {
        return view('admin.penyaluran.add');
    }
}
