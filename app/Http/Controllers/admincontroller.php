<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;

class admincontroller extends Controller
{

    public function __construct(){
        $this ->akun = new Akun();
    }

    public function akun(){
        if(!session('login')){
            return redirect('/');
        }else{
        $alldata = [
            'allakun'=>$this->akun->alldata(), // mengambil class pada models alldata
        ];
        return view('akun.akun', $alldata);
    }
}

    // ke form tambah
    public function add(){
        if(!session('login')){
            return redirect('/');
        }else{

        return view('akun.tambah');
        }
    }

    // simpan data
    public function save(){
        Request()->validate([
            'nis_nip' => 'required|max:155',
            'nama_lengkap' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'kelas' => 'required|max:255',
            'id_posisi' => 'required|max:255',
            'status' => 'required|max:255',
            'pass' => 'required|max:255',

        ],[
            
            'nama.required' => 'nama wajib diisi yah',
            'status.required' => 'status wajib diisi yah',
            'pesan.required' => 'pesan wajib diisi yah',
        ]);

        $data = [
            'nis_nip' => Request()->nis_nip,
            'nama_lengkap' => Request()->nama_lengkap,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'kelas' => Request()->kelas,
            'id_posisi' => Request()->id_posisi,
            'status' => Request()->status,
            'pass' => Request()->pass,
        ];

        $this->akun->addpesan($data);
        return redirect()->route('akun');
    
}



    // ke form edit
    public function edit($id){
        if(!session('login')){
            return redirect('/');
        }else{
        $data = [
            'main' => $this->akun->editdata($id),
        ];
        return view ('akun.editakun',$data);
    }
}


// update
    public function update($id){
        request()->validate([
            'nis_nip' => 'required|max:155',
            'nama_lengkap' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'kelas' => 'required|max:255',
            'id_posisi' => 'required|max:255',
            'status' => 'required|max:255',
            'pass' => 'required|max:255',
        ],[
            'nama.required' => 'judul wajib diisi yah',
            'status.required' => 'status wajib diisi yah',
            'pesan.required' => 'pesan wajib diisi yah',
        ]);
    
        $data = [
            'nis_nip' => Request()->nis_nip,
            'nama_lengkap' => Request()->nama_lengkap,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'kelas' => Request()->kelas,
            'id_posisi' => Request()->id_posisi,
            'status' => Request()->status,
            'pass' => Request()->pass,
        ];
    
        $this->akun->ubahdata($id, $data);
    
        return redirect()->route('akun');
    }
    
    public function hapus($id){
        if(!session('login')){
            return redirect('/');
        }else{

        $this->akun->hapus($id);
        return redirect()->route('akun');
        }
    }

}
