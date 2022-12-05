<?php

namespace App\Http\Controllers;

use App\Models\DataZis;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function getDistrict(Request $request)
    {
        $provinces_id = $request->get('province_id');
        $data = DB::table('districts')->where('provinces_id', $provinces_id)->get();
        return $data;
    }

    public function getRegency(Request $request)
    {
        $provinces_id = $request->get('province_id');
        $districts_id = $request->get('district_id');
        $data = DB::table('regencies')->where(['provinces_id' => $provinces_id, 'districts_id' => $districts_id])->get();
        return $data;
    }

    public function getVillage(Request $request)
    {
        $provinces_id = $request->get('province_id');
        $districts_id = $request->get('district_id');
        $regencies_id = $request->get('regency_id');
        $data = DB::table('villages')->where(['provinces_id' => $provinces_id, 'districts_id' => $districts_id, 'regencies_id' => $regencies_id,])->get();
        return $data;
    }

    public function getDataZisCategory(Request $request)
    {
        $id = $request->get('id');
        $output = '';
        $no = 1;
        if ($id != NULL) {
            $data = DataZis::where('kategori', $id)->get();
        } else {
            $data = DataZis::all();
        }
        foreach ($data as $b) {
            $output .= '
            <tr>
                <th scope="row">' . $no++ . '</th>
                <td>' . $b->category->display . '</td>
                <td>' . $b->price . '</td>
                <td>
                    ' . $b->created_at . '
                </td>
                <td>

                    <a href="' . url('admin/data-zis/edit/' . $b->id) . '"
                        class="btn btn-transparent text-center text-dark">
                        <i class="fas fa-edit fa-2x"></i>
                    </a>
                    <a  href="' . url('admin/data-zis/delete/' . $b->id) . '"
                        class="btn btn-transparent text-center text-dark" >
                        <i class="fas fa-trash-alt fa-2x"></i>
                    </a>
                </td>
            </tr>
            ';
        }

        return $output;
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
