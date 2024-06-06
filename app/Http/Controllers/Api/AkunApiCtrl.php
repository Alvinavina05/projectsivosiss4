<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\Api\AkunApi;


class AkunApiCtrl extends Controller
{
    public function index()
    {
        $akun = AkunApi::all();
        return response()->json($akun);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis_nip' => 'required|unique:tb_akun',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'id_posisi' => 'required',
            'status' => 'required',
            'pass' => 'required',
            'qr' => '',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $akun = AkunApi::create($request->all());
        return response()->json($akun, 201);
    }

    public function show($nis_nip)
    {
        $akun = AkunApi::find($nis_nip);

        if (is_null($akun)) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        return response()->json($akun);
    }

    public function update(Request $request, $nis_nip)
    {
        $akun = AkunApi::find($nis_nip);
    
        if (is_null($akun)) {
            return response()->json(['message' => 'Account not found'], 404);
        }
    
        $validator = Validator::make($request->all(), [
            'nis_nip' => 'required|unique:tb_akun,nis_nip,' . $nis_nip . ',nis_nip',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'id_posisi' => 'required',
            'status' => 'required',
            'pass' => 'required',
            'qr' => '',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        $akun->update($request->all());
        return response()->json($akun);
    }

    public function destroy($nis_nip)
    {
        $akun = AkunApi::find($nis_nip);

        if (is_null($akun)) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        $akun->delete();
        return response()->json(['message' => 'Account deleted successfully']);
    }

}