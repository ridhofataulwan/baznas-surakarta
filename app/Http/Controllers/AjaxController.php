<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function getDistrict(Request $request)
    {
        $id = $request->get('id');
        $data = DB::table('address')->where(DB::raw('CHAR_LENGTH(id)'), '=', 5)->where('id', 'LIKE', $id . '%')->get();
        return $data;
    }

    public function getRegency(Request $request)
    {
        $id = $request->get('id');
        $data = DB::table('address')->where(DB::raw('CHAR_LENGTH(id)'), '=', 8)->where('id', 'LIKE', $id . '%')->get();
        return $data;
    }

    public function getVillage(Request $request)
    {
        $id = $request->get('id');
        $data = DB::table('address')->where(DB::raw('CHAR_LENGTH(id)'), '=', 13)->where('id', 'LIKE', $id . '%')->get();
        return $data;
    }


    public function getDataRekening(Request $request)
    {
        $jenis = $request->get('jenis');
        $data = Rekening::where('jenis', $jenis)->get();
        $output = '';
        $no = 1;
        foreach ($data as $r) {
            $output .= '
            <tr class="align-middle">
                <th scope="row">' . $no++ . '</th>
                <td><img src="' . $r->image . '" height="150px" alt=""></td>
                <td><input type="text" id="myText" class="form-control bg-transparent border-0" readonly value="' . $r->no_rek . '"></td>
                <td>
                    <button class="btn" type="button" onclick="handleClick(' . $r->no_rek . ')"><i class="fas fa-copy"></i></button>
                </td>
            </tr>
            ';
        }
        return $output;
    }
}
