<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function indexRegion()
    {
        $db = DB::table('provinces');
        $data = $db->get();

        return view('index-region', compact('data'));
    }
}
