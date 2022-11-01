<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KalkulatorController extends Controller
{
    public function calcFitrah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric|min:1000',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $price = $request->get('price');
        $weight = $request->get('weight');
        $response = '';
        if ($price != NULL && $weight != NULL) {
            $response = $price * $weight;
        } else {
            $response = '<b>Ooops!</b>pilih jenis zakat';
        }
        return number_format($response, 2, ',', '.');
    }

    public function calcMaal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gajiPokok' => 'required|numeric|min:1000',
            'tunjangan' => 'required|numeric|min:1000',
            // Saya Comment 
            // 'hutang' => 'required|numeric|min:1000',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $gaji = $request->get('gajiPokok');
        $tunjangan = $request->get('tunjangan');
        $hutang = $request->get('hutang');
        $harga = $gaji + $tunjangan - $hutang;
        $total = $harga * 2.5 / 100;
        return number_format($total, 2, ',', '.');;
    }

    public function calcFidyah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jiwa' => 'required|numeric|min:1',
            'hari' => 'required|numeric|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $day = $request->get('jiwa');
        $soul = $request->get('hari');
        $total = $day * $soul * 50000;
        return number_format($total, 2, ',', '.');
    }

    public function calcQurban(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'jenisQurban' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $qurban = $request->get('jenisQurban');
        switch ($qurban) {
            case 'A':
                $total = 2200000;
                break;
            case 'B':
                $total = 2500000;
                break;
            case 'C':
                $total = 17500000;
                break;
            default:
                $total = 0;
        }
        return number_format($total, 2, ',', '.');
    }

    public function calcInfaq(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'gaji' => 'required|numeric|min:1000',
            'tunjangan' => 'required|numeric|min:0',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $gaji = $request->get('gaji');
        $tunjangan = $request->get('tunjangan');
        $harga = $gaji + $tunjangan;
        $total = $harga * 2.5 / 100;
        return number_format($total, 2, ',', '.');
    }

    public function calcPenghasilan(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'gaji' => 'required|numeric|min:1000',
            'tunjangan' => 'required|numeric|min:0',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $gaji = $request->get('gaji');
        $tunjangan = $request->get('tunjangan');
        $penghasilan = $gaji + $tunjangan;
        $harga_emas = 841000;
        $nishab = $harga_emas / 12 * 85; // ! Harga Emas 1 Gram
        if ($penghasilan >= $nishab) {
            $total = $penghasilan * 2.5 / 100;
            $data = [
                'nishab' => number_format($nishab, 2, ',', '.'),
                'status' => true,
                'zakat' => number_format($total, 2, ',', '.')
            ];
            return $data;
        } else {
            $data = [
                'nishab' => number_format($nishab, 2, ',', '.'),
                'status' => false,
            ];
            return $data;
        }
    }
}
