<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voting;
use App\Models\akun;
use App\Models\kandidat;

class VotingController extends Controller
{
    public function __construct(){
        $this ->voting = new Voting();
        $this ->akun = new akun();
        $this ->kandidat = new kandidat();
       
    }

    public function voting() {
        if(!session('login')){
            return redirect('/');
        }else{
        $alldata = [
            'allvoting' => $this->voting->alldata(), // mengambil class pada models alldata
        ];
        return view('voting.voting', $alldata);
    }
}


 // ke form tambah
 public function tambah(){
    if(!session('login')){
        return redirect('/');
    }else{

        $alldata = [
            'voting'=>$this->voting->alldata(), // mengambil class pada models alldata
            'akun'=>$this->akun->allstatus(),
            'kandidat'=>$this->kandidat->alldata(),
        ];
        return view('voting.tambahvoting', $alldata);
    }
}

public function save() {
    // Validasi input
    Request()->validate([
        'nis_nip' => 'required|max:155',
        'id_kandidat' => 'required|max:255',
    ],[
        'nis_nip.required' => 'NIS/NIP wajib diisi.',
        'id_kandidat.required' => 'ID Kandidat wajib diisi.',
    ]);

    // Data yang akan disimpan
    $data = [
        'nis_nip' => request()->nis_nip,
        'id_kandidat' => request()->id_kandidat,
        'tgl_memilih' => now(), // Menggunakan timestamp saat ini
    ];

   // Menyimpan data ke database
   $this->voting->addpesan($data);
   return redirect()->route('voting', ['alert' => 'success']); // Menggunakan with() untuk mengirim pesan flash
}


// ke form edit
public function edit($nis_nip){
    if(!session('login')){
        return redirect('/');
    }else{
    $data = [
        'main'=>$this->voting->editdata($nis_nip),
        'allakun'=>$this->akun->alldata(),
        'allkandidat'=>$this->kandidat->alldata(),
    ];
    return view ('voting.edit',$data);
}
}


// update
public function update($nis_nip){
    request()->validate([
        'nis_nip' => 'required|max:155',
        'nama_lengkap' => 'required|max:255',
        'kelas' => 'required|max:255',
        'id_kandidat' => 'required|max:255',
        'tgl_memilih' => 'required|max:255',
    ],[
        'nis_nip.required' => 'NIS/NIP wajib diisi.',
        'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
        'kelas.required' => 'Kelas wajib diisi.',
        'id_kandidat.required' => 'ID Kandidat wajib diisi.',
        'tgl_memilih.required' => 'Tanggal memilih wajib diisi.',
    ]);

    $data = [
        'nis_nip' => request()->nis_nip,
        'nama_lengkap' => request()->nama_lengkap,
        'kelas' => request()->kelas,
        'id_kandidat' => request()->id_kandidat,
        'tgl_memilih' =>request()->tgl_memilih,
    ];

    $this->voting->ubahdata($nis_nip, $data);

    return redirect()->route('voting');
}

public function hapus($nis_nip){
    if(!session('login')){
        return redirect('/');
    }else{

    $this->voting->hapus($nis_nip);
    return redirect()->route('voting');
    }
}

}