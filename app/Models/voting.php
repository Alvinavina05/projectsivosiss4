<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class voting extends Model
{
    public function alldata() {
        return DB::table('tb_voting')
            ->select(
                'tb_voting.nis_nip',
                'tb_akun.nama_lengkap',
                'tb_akun.kelas',
                'tb_kandidat.id_kandidat',
                DB::raw('MAX(tb_voting.tgl_memilih) AS tgl_memilih')
            )
            ->join('tb_akun', 'tb_voting.nis_nip', '=', 'tb_akun.nis_nip')
            ->join('tb_kandidat', 'tb_voting.id_kandidat', '=', 'tb_kandidat.id_kandidat')
            ->groupBy('tb_voting.nis_nip', 'tb_akun.nama_lengkap', 'tb_akun.kelas', 'tb_kandidat.id_kandidat')
            ->get();
    }

    public function editdata($id){
        return DB::table('tb_voting')->where('nis_nip', $id)->first();
     }
    
     public function addpesan($data){
      return DB::table('tb_voting')->insert($data);
   }  

     public function ubahdata($id, $data){
        DB::table('tb_voting')->where('nis_nip', $id)->update($data);
     }

     public function hapus($id){
      DB::table('tb_voting')->where('nis_nip', $id)->delete();
  }
  public function BelumVoting() {
    return DB::table('tb_voting')
        ->where('status', 'Belum Voting')
        ->get();
}

}
