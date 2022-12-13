<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmPaymentController extends Controller
{
    public function pembayaran()
    {
        return view('admin.pembayaran.index');
    }
    public function detailPembayaran($id)
    {
        return view('admin.pembayaran.detail');
    }
    public function createPembayaran()
    {
        return view('admin.pembayaran.add');
    }
}
