<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wakil;

class WakilController extends Controller
{
    public function __construct(){
        $this ->wakil = new Wakil();
    }

    public function wakil(){
        if(!session('login')){
            return redirect('/');
        }else{
        $alldata = [
            'allwakil'=>$this->wakil->alldata(), // mengambil class pada models alldata
        ];
        return view('wakilosis.wakilosis', $alldata);
    }
}

 // ke form tambah
 public function add(){
    if(!session('login')){
        return redirect('/');
    }else{

    return view('wakilosis.tambahwakilosis');
}
 }

// simpan data
public function save(){
    Request()->validate([
        'id_wakil' => 'required|max:155',
        'nis' => 'required|max:255',
        'nama_wakil' => 'required|max:255',
        'jenis_kelamin' => 'required|max:255',
        'kelas' => 'required|max:255',
        'nomor_hp' => 'required|max:255',

    ],[
        
        'nama.required' => 'nama wajib diisi yah',
        'status.required' => 'status wajib diisi yah',
        'pesan.required' => 'pesan wajib diisi yah',
    ]);

    $data = [
        'id_wakil' => Request()->id_wakil,
        'nis' => Request()->nis,
        'nama_wakil' => Request()->nama_wakil,
        'jenis_kelamin' => Request()->jenis_kelamin,
        'kelas' => Request()->kelas,
        'nomor_hp' => Request()->nomor_hp,
    ];

    $this->wakil->addpesan($data);
    return redirect()->route('wakil');

}



// ke form edit
public function edit($id_wakil){
    if(!session('login')){
        return redirect('/');
    }else{
    $data = [
        'main' => $this->wakil->editdata($id_wakil),
    ];
    return view ('wakilosis.editwakilosis',$data);
}
}


// update
public function update($id_wakil){
    request()->validate([
        'id_wakil' => 'required|max:155',
        'nis' => 'required|max:255',
        'nama_wakil' => 'required|max:255',
        'jenis_kelamin' => 'required|max:255',
        'kelas' => 'required|max:255',
        'nomor_hp' => 'required|max:255',
    ],[
        'nama.required' => 'judul wajib diisi yah',
        'status.required' => 'status wajib diisi yah',
        'pesan.required' => 'pesan wajib diisi yah',
    ]);

    $data = [
        'id_wakil' => Request()->id_wakil,
        'nis' => Request()->nis,
        'nama_wakil' => Request()->nama_wakil,
        'jenis_kelamin' => Request()->jenis_kelamin,
        'kelas' => Request()->kelas,
        'nomor_hp' => Request()->nomor_hp,
    ];

    $this->wakil->ubahdata($id_wakil, $data);

    return redirect()->route('wakil');
}

public function hapus($id_wakil){
    if(!session('login')){
        return redirect('/');
    }else{

    $this->wakil->hapus($id_wakil);
    return redirect()->route('wakil');
    }
}

}