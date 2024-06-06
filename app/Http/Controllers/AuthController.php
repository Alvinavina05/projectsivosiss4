<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(){

        $this ->akun = new Akun();
    }

    public function submit(){
        return view('admin.login');
    }

    public function auth()
    {
        request()->validate([
            'nis_nip' => 'required',
            'pass' => 'required',
        ]);
    
        $data = $this->akun->authlogin(request()->nis_nip);
    
        if (!$data) {
            return redirect('/')->with('error', 'nis_nip atau password salah.');
        } else {
            if (request()->pass === $data->pass && $data->id_posisi === 'Admin') {
                session()->put([
                    'nis_nip' => $data->nis_nip,
                    'nama_lengkap' => $data->nama_lengkap,
                    'jenis_kelamin' => $data->jenis_kelamin,
                    'kelas' => $data->kelas,
                    'id_posisi' => $data->id_posisi,
                    'status' => $data->status,
                    'pass' => $data->pass,
                    'qr' => $data->qr,
                    'login' => true,     
                ]);
                return redirect('/dashboard'); //ke dashboard
            } else {
                // Jika level bukan admin atau password tidak cocok
                return redirect('/')->with('error', 'nis_nip atau password salah.');
            }
        }
    }


    public function logout(){
        session()->flush();
        return redirect('/');// Ke front end
    }

    
    //ke buat akun
    // public function kebuatakun(){
    //     return view('registrasi');
    // }

    // public function buatakun(Request $request){
    //     $request->validate([
    //         'nama' => 'required',
    //         'username' => 'required',
    //         'password' => 'required|min:8|confirmed',
    //         'status' => 'required',
    //     ]);
    //     $nama = $request->nama;
    //     $username = $request->username;
    //     $pass = $request->password;
    //     $status = $request->status;

    //     $data = petugas::create([
    //         'nama_petugas' => $nama,
    //         'username' => $username,
    //         'password' => Hash::make($pass),
    //         'status' => $status,
    //     ]);

    //     return redirect('/login');
    // }

    

}
