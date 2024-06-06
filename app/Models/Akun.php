<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Akun extends Model
{
    public function alldata(){
        return DB::table('tb_akun')->get();
    }

    public function allstatus(){
        return DB::table('tb_akun')
                   ->where('status', 'belum voting')
                   ->get();
    }

    public function authlogin($nis_nip){
        return DB::table('tb_akun')->where('nis_nip',$nis_nip)->first();
    }

    public function editdata($id){
        return DB::table('tb_akun')->where('nis_nip', $id)->first();
     }
    
     public function addpesan($data){
      return DB::table('tb_akun')->insert($data);
   }  

     public function ubahdata($id, $data){
        DB::table('tb_akun')->where('nis_nip', $id)->update($data);
     }

     public function hapus($id){
      DB::table('tb_akun')->where('nis_nip', $id)->delete();
  }

  public function BelumVoting() {
    return DB::table('tb_akun')
        ->where('status', 'Belum Voting')
        ->get();
}

}
