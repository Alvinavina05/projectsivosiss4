<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\AkunApiCtrl;
use App\Http\Controllers\Api\KandidatApiCtrl;
use App\Http\Controllers\Api\VotingApiCtrl;

Route::get('/akun/tampil', [AkunApiCtrl::class, 'index']);
Route::get('/akun/tampil/{nis_nips}', [AkunApiCtrl::class, 'show']);
// Route::get('/akun/tampil/user/{user}', [AkunApiCtrl::class, 'showuser']);
Route::post('/akun/tambah', [AkunApiCtrl::class, 'store']);
Route::put('/akun/update/{nis_nips}', [AkunApiCtrl::class, 'update']);
Route::delete('/akun/hapus/{nis_nips}', [AkunApiCtrl::class, 'destroy']);

Route::get('/kandidat/tampil', [KandidatApiCtrl::class, 'index']);
Route::get('/kandidat/tampil/{id_kandidats}', [KandidatApiCtrl::class, 'show']);
// Route::get('/akun/tampil/user/{user}', [AkunApiCtrl::class, 'showuser']);
Route::post('/kandidat/tambah', [KandidatApiCtrl::class, 'store']);
Route::put('/kandidat/update/{id_kandidats}', [KandidatApiCtrl::class, 'update']);
Route::delete('/kandidat/hapus/{id_kandidats}', [KandidatApiCtrl::class, 'destroy']);

Route::get('/voting/tampil', [VotingApiCtrl::class, 'index']);
Route::get('/voting/tampil/{nis_nips}', [VotingApiCtrl::class, 'show']);
// Route::get('/akun/tampil/user/{user}', [AkunApiCtrl::class, 'showuser']);
Route::post('/voting/tambah', [VotingApiCtrl::class, 'store']);
Route::get('/voting/total', [VotingApiCtrl::class, 'donut']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


