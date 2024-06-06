<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kandidat;
use App\Models\Ketua;
use App\Models\wakil;


class KandidatController extends Controller
{
    public function __construct(){
        
        $this ->kandidat = new kandidat();
        $this ->ketua = new Ketua();
        $this ->wakil = new Wakil();
    }

   
    public function index()
    {
        if(!session('login')){
            return redirect('/');
        }else{
        $alldata = [
            'kandidat'=>$this->kandidat->alldata(), // mengambil class pada models alldata
        ];
        return view('kandidat.kandidat', $alldata);
    }
}



public function tambah()
{
    if(!session('login')){
        return redirect('/');
    }else{
    $alldata = [
        'kandidat'=>$this->kandidat->alldata(), // mengambil class pada models alldata
        'ketua'=>$this->ketua->alldata(),
        'wakil'=>$this->wakil->alldata(),
    ];
    return view('kandidat.tambah', $alldata);
}
}

    /**
     * Store a newly created resource in storage.
     */
    public function save(){
            // Validasi input
            Request()->validate([
                'id_kandidat' => 'required|max:255',
                'id_ketua' => 'required|max:50',
                'id_wakil' => 'required|max:50',
                'visi' => 'required',
                'misi' => 'required',
                'gambar' => 'mimes:jpg,png,JPEG,gif|max:5120',
            ], [
                'user.max' => 'Panjang maksimum untuk user adalah 255 karakter.',
                'gambar.max' => 'Ukuran maksimum file gambar adalah 5MB.',
            ]);
            
            // Inisialisasi variabel untuk menyimpan URL gambar
            $gambarUrl = null;
    
            // Cek apakah ada file gambar yang diunggah
            if (request()->hasFile('gambar')) {
                $gambar = request()->file('gambar'); // Mengambil file gambar dari request
                $ekstensi = $gambar->getClientOriginalExtension();
                // Membuat nama file yang unik dengan menambahkan tanggal saat ini (tahun-bulan-hari)
                $namaGambar = date('Ymd') . '_' . uniqid() . '.' . $ekstensi;
                $gambar->move(public_path('gambarkandidat/'), $namaGambar); // Memindahkan file gambar ke folder yang ditentukan
                $gambarUrl = asset('gambarkandidat/' . $namaGambar); // Menghasilkan URL gambar
            }
            
            // Data yang akan disimpan
            $data = [
                'id_kandidat' => request()->id_kandidat,
                'visi' => request()->visi,
                'misi' => request()->misi,
                'id_ketua' => request()->id_ketua,
                'id_wakil' =>request()->id_wakil,
                'gambar' => $gambarUrl, // Menggunakan URL gambar jika ada, jika tidak tetap null
            ];
            
            // Menyimpan data ke database
            $this->kandidat->addData($data);
            return redirect()->route('kandidat', ['alert' => 'success']); // Menggunakan with() untuk mengirim pesan flash
        }

    /**
     * Display the specified resource.
     */
    public function editakandidat($id_kandidat){
        if(!session('login')){
            return redirect('/');
        }else{
 
        $data = [
            'main'=>$this->kandidat->editakandidat($id_kandidat),
            'allketua'=>$this->ketua->alldata(),
            'allwakil'=>$this->wakil->alldata(),
        ];
        return view('kandidat.edit', $data);
    }
}


    public function update(Request $request, $id_kandidat)
    {
        $kandidat = $this->kandidat->find($id_kandidat);

        if (!$kandidat) {
            return redirect()->route('kandidat')->with('error', 'Data tidak ditemukan');
        }

        // Validasi input
        $request->validate([
            'id_kandidat' => 'required|max:255',
            'id_ketua' => 'required|max:50',
            'id_wakil' => 'required|max:50',
            'visi' => 'required',
            'misi' => 'required',
            'gambar' => 'mimes:jpg,png,JPEG,gif|max:5120',
        ], [
            'user.max' => 'Panjang maksimum untuk user adalah 255 karakter.',
            'gambar.max' => 'Ukuran maksimum file gambar adalah 5MB.',
        ]);

        // Periksa apakah ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            // Menghapus gambar lama jika ada
            $namaGambar = basename($kandidat->gambar);
    
            // Hapus gambar terkait
            $gambarPath = public_path('gambarkandidat/' . $namaGambar);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }

            $gambar = $request->file('gambar'); // Mengambil file gambar dari request
            $ekstensi = $gambar->getClientOriginalExtension();
            // Membuat nama file yang unik dengan menambahkan tanggal saat ini (tahun-bulan-hari)
            $namaGambar = date('Ymd') . '_' . uniqid() . '.' . $ekstensi;
            $gambar->move(public_path('gambarkandidat/'), $namaGambar); // Memindahkan file gambar ke folder yang ditentukan
            $gambarUrl = asset('gambarkandidat/' . $namaGambar); // Menghasilkan URL gambar

            // Perbarui data gambar di database
            $kandidat->gambar = $gambarUrl;
        }

        // Perbarui data lainnya
        $kandidat->visi = $request->visi;
        $kandidat->misi = $request->misi;
        $kandidat->id_ketua = $request->id_ketua;
        $kandidat->id_wakil = $request->id_wakil;

        $kandidat->save();

        return redirect()->route('kandidat', ['update' => 'berhasil']);
        // return redirect()->route('kandidat')->with('success', 'Data berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function hapusData($id_kandidat){
        if(!session('login')){
            return redirect('/');
        }else{
        $kandidat = kandidat::where('id_kandidat', $id_kandidat)->first();
            try {
                $namaGambar = basename($kandidat->gambar);
    
                // Hapus gambar terkait
                $gambarPath = public_path('gambarkandidat/' . $namaGambar);
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }
    
                // Hapus data pengguna dari database
                $kandidat->delete();
    
                return redirect()->route('kandidat', ['hapus' => 'berhasil']);
              
            } catch (\Exception $e) {
                return response()->json(['error' => true, 'message' => 'Data tidak dapat dihapus karena berelasi dengan lahan!']);
            }
    }
}


}
