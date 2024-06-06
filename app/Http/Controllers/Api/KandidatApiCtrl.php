<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Api\KandidatApi;

class KandidatApiCtrl extends Controller
{
    public function index()
    {
        $kandidat = KandidatApi::all();
        return response()->json($kandidat);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_kandidat' => 'required|unique:tb_kandidat',
            'visi' => 'required',
            'misi' => 'required',
            'id_ketua' => 'required',
            'id_wakil' => 'required',
            'gambar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $kandidat = KandidatApi::create($request->all());
        return response()->json($kandidat, 201);
    }

    public function show($id_kandidat)
    {
        $kandidat = KandidatApi::find($id_kandidat);

        if (is_null($kandidat)) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        return response()->json($kandidat);
    }

    public function update(Request $request, $id_kandidat)
    {
        $kandidat = KandidatApi::find($id_kandidat);
    
        if (is_null($kandidat)) {
            return response()->json(['message' => 'Account not found'], 404);
        }
    
        $validator = Validator::make($request->all(), [
            'id_kandidat' => 'required|unique:tb_kandidat,id_kandidat,' . $id_kandidat . ',id_kandidat',
            'visi' => 'required',
            'misi' => 'required',
            'id_ketua' => 'required',
            'id_wakil' => 'required',
            'gambar' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        $kandidat->update($request->all());
        return response()->json($kandidat);
    }

    public function destroy($id_kandidat)
    {
        $kandidat = KandidatApi::find($id_kandidat);

        if (is_null($kandidat)) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        $kandidat->delete();
        return response()->json(['message' => 'Account deleted successfully']);
    }
}
