<?php

namespace App\Http\Controllers;

use App\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{

    public function showAllVouchers()
    {
        return response()->json(Voucher::all());
    }

    public function showOneVoucher($id)
    {
        return response()->json(Voucher::find($id));
    }

    public function create(Request $request)
    {
        $request["code"] = $this->randomPassword();
        $voucher = Voucher::create($request->all());

        return response()->json($voucher, 201);
    }

    public function update($id, Request $request)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->update($request->all());

        return response()->json($voucher, 200);
    }

    public function delete($id)
    {
        Voucher::findOrFail($id)->delete();
        return response('Voucher Was Deleted Successfully', 200);
    }


    public function consumeVoucher(Request $request)
    {
        $teste = Voucher::where('code', '=', $request['code'])
                          ->where('expiration', '<=', date("Y-m-d H:i:s"))
                          ->where('used','=', '0')->first();
        $id  = $teste["id"];
        if ($id > 0)
        {
            $voucher = Voucher::findOrFail($id);
            $request["used"] = 1;

            $voucher->update($request->all());

            $sucess = array("sucess" => "Valid Vouchers Used");

            return json_encode($sucess);
        }
        else
        {
            $fail = array("failed" => "Invalid or Used Voucher");

            return json_encode($fail);
        }



        return response()->json($voucher, 200);
    }

    private function randomPassword() {
    $alphabet = [   'a',
                    'b',
                    'c',
                    'd',
                    'e',
                    'f',
                    'g',
                    'h',
                    'i',
                    'j',
                    'k',
                    'l',
                    'm',
                    'n',
                    'o',
                    'p',
                    'q',
                    'r',
                    's',
                    't',
                    'u',
                    'w',
                    'x',
                    'y',
                    'z',
                    'A',
                    'B',
                    'C',
                    'D',
                    'E',
                    'F',
                    'G',
                    'H',
                    'I',
                    'J',
                    'K',
                    'L',
                    'M',
                    'N',
                    'O',
                    'P',
                    'Q',
                    'R',
                    'S',
                    'T',
                    'U',
                    'W',
                    'X',
                    'Y',
                    'Z',
                    '0',
                    '1',
                    '2',
                    '3',
                    '4',
                    '5',
                    '6',
                    '7',
                    '8',
                    '9',
                    '%',
                    '$',
                    '&',
                    '@' ];
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, count($alphabet)-1);
        $pass[$i] = $alphabet[$n];
    }
    return implode($pass);
}
}