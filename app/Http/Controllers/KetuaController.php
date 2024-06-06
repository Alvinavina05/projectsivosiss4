<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ketua;

class KetuaController extends Controller
{

    public function __construct(){
        $this ->ketua = new Ketua();
    }

    public function ketua(){
        if(!session('login')){
            return redirect('/');
        }else{
        $alldata = [
            'allketua'=>$this->ketua->alldata(), // mengambil class pada models alldata
        ];
        return view('ketuaosis.ketuaosis', $alldata);
    }
}

 // ke form tambah
 public function add(){
    if(!session('login')){
        return redirect('/');
    }else{

    return view('ketuaosis.tambahketuaosis');
}
 }

// simpan data
public function save(){
    Request()->validate([
        'id_ketua' => 'required|max:155',
        'nis' => 'required|max:255',
        'nama_ketua' => 'required|max:255',
        'jenis_kelamin' => 'required|max:255',
        'kelas' => 'required|max:255',
        'nomor_hp' => 'required|max:255',

    ],[
        
        'nama.required' => 'nama wajib diisi yah',
        'status.required' => 'status wajib diisi yah',
        'pesan.required' => 'pesan wajib diisi yah',
    ]);

    $data = [
        'id_ketua' => Request()->id_ketua,
        'nis' => Request()->nis,
        'nama_ketua' => Request()->nama_ketua,
        'jenis_kelamin' => Request()->jenis_kelamin,
        'kelas' => Request()->kelas,
        'nomor_hp' => Request()->nomor_hp,
    ];

    $this->ketua->addpesan($data);
    return redirect()->route('ketua');

}



// ke form edit
public function edit($id_ketua){
    if(!session('login')){
        return redirect('/');
    }else{
    $data = [
        'main' => $this->ketua->editdata($id_ketua),
    ];
    return view ('ketuaosis.editketuaosis',$data);
}
}


// update
public function update($id_ketua){
    request()->validate([
        'id_ketua' => 'required|max:155',
        'nis' => 'required|max:255',
        'nama_ketua' => 'required|max:255',
        'jenis_kelamin' => 'required|max:255',
        'kelas' => 'required|max:255',
        'nomor_hp' => 'required|max:255',
    ],[
        'nama.required' => 'judul wajib diisi yah',
        'status.required' => 'status wajib diisi yah',
        'pesan.required' => 'pesan wajib diisi yah',
    ]);

    $data = [
        'id_ketua' => Request()->id_ketua,
        'nis' => Request()->nis,
        'nama_ketua' => Request()->nama_ketua,
        'jenis_kelamin' => Request()->jenis_kelamin,
        'kelas' => Request()->kelas,
        'nomor_hp' => Request()->nomor_hp,
    ];

    $this->ketua->ubahdata($id_ketua, $data);

    return redirect()->route('ketua');
}

public function hapus($id_ketua){
    if(!session('login')){
        return redirect('/');
    }else{
    $this->ketua->hapus($id_ketua);
    return redirect()->route('ketua');
    }
}

}