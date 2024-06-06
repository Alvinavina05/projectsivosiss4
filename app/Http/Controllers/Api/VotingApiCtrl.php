<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Api\VotingApi;


class VotingApiCtrl extends Controller
{
    public function index()
    {
        $voting = VotingApi::all();
        return response()->json($voting);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis_nip' => 'required|unique:tb_voting',
            'nama_lengkap' => 'required',
            'kelas' => 'required',
            'id_kandidat' => 'required',
            'tgl_memilih' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $voting = VotingApi::create($request->all());
        return response()->json($voting, 201);
    }

    public function show($nis_nip)
    {
        $voting = VotingApi::find($nis_nip);

        if (is_null($voting)) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        return response()->json($voting);
    }

    public function update(Request $request, $nis_nip)
    {
        $voting = VotingApi::find($nis_nip);
    
        if (is_null($voting)) {
            return response()->json(['message' => 'Account not found'], 404);
        }
    
        $validator = Validator::make($request->all(), [
            'nis_nip' => 'required|unique:tb_voting,nis_nip,' . $nis_nip . ',nis_nip',
            'nama_lengkap' => 'required',
            'kelas' => 'required',
            'id_kandidat' => 'required',
            'tgl_memilih' => '',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        $voting->update($request->all());
        return response()->json($voting);
    }

    public function destroy($nis_nip)
    {
        $akun = VotingApi::find($nis_nip);

        if (is_null($akun)) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        $akun->delete();
        return response()->json(['message' => 'Account deleted successfully']);
    }
}
