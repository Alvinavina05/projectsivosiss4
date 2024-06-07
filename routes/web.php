<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\KetuaController;
use App\Http\Controllers\WakilController;
use App\Http\Controllers\KandidatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\datapolingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/login', function () {
//     return view('admin.login');
// });

Route::get('/', [AuthController::class, 'submit']);
Route::post('/authlogin',[AuthController::class,'auth']);
Route::get('/akses/logout',[AuthController::class,'logout']);


Route::get('/dashboard',[DashController::class,'index']);


// AKUN
Route::get('/akun',[admincontroller::class,'akun'])->name('akun');
Route::get('/akun/edit/{id}',[admincontroller::class,'edit']);
Route::post('/akun/update/{id}', [admincontroller::class, 'update']);
Route::get('/akun/tambah', [admincontroller::class, 'add']);
Route::post('/akun/simpan', [admincontroller::class, 'save']);
Route::get('/akun/hapus/{id}',[admincontroller::class, 'hapus']);


// Ketua OSIS
Route::get('/ketuaosis',[KetuaController::class,'ketua'])->name('ketua');
Route::get('/ketuaosis/edit/{id_ketua}',[KetuaController::class,'edit']);
Route::post('/ketuaosis/update/{id_ketua}',[KetuaController::class, 'update']);
Route::get('/ketuaosis/tambah',[KetuaController::class, 'add']);
Route::post('/ketuaosis/simpan',[KetuaController::class, 'save']);
Route::get('/ketuaosis/hapus/{id_ketua}',[KetuaController::class, 'hapus']);


// Wakil Osis
Route::get('/wakilosis',[WakilController::class,'wakil'])->name('wakil');
Route::get('/wakilosis/edit/{id_wakil}',[WakilController::class,'edit']);
Route::post('/wakilosis/update/{id_wakil}',[WakilController::class, 'update']);
Route::get('/wakilosis/tambah',[WakilController::class, 'add']);
Route::post('/wakilosis/simpan',[WakilController::class, 'save']);
Route::get('/wakilosis/hapus/{id_wakil}',[WakilController::class, 'hapus']);

// Kandidat
Route::get('/kandidat',[KandidatController::class,'index'])->name('kandidat');
Route::get('/kandidat/edit/{id_kandidat}',[KandidatController::class,'editakandidat']);
Route::post('/kandidat/update/{id_kandidat}',[KandidatController::class, 'update']);
Route::get('/kandidat/tambah',[KandidatController::class, 'tambah']);
Route::post('/kandidat/simpan',[KandidatController::class, 'save']);
Route::get('/kandidat/hapus/{id_kandidat}',[KandidatController::class, 'hapusData']);


// Voting
Route::get('/voting',[VotingController::class,'voting'])->name('voting');
Route::get('/voting/edit/{nis_nip}',[VotingController::class,'edit']);
Route::post('/voting/update/{nis_nip}',[VotingController::class, 'update']);
Route::get('/voting/tambah',[VotingController::class, 'tambah']);
Route::post('/voting/simpan',[VotingController::class, 'save']);
Route::get('/voting/hapus/{nis_nip}',[VotingController::class, 'hapus']);

// datapoling
Route::get('/datapoling',[datapolingController::class,'index'])->name('index');
