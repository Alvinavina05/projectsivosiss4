<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ketua extends Model
{
    public function alldata(){
        return DB::table('tb_ketuaosis')->get();
    }
    public function editdata($id_ketua){
        return DB::table('tb_ketuaosis')->where('id_ketua', $id_ketua)->first();
    }
    public function addpesan($data){
        return DB::table('tb_ketuaosis')->insert($data);
     }
     public function ubahdata($id_ketua, $data){
        DB::table('tb_ketuaosis')->where('id_ketua', $id_ketua)->update($data);
     }
    public function hapus($id_ketua){
        DB::table('tb_ketuaosis')->where('id_ketua', $id_ketua)->delete();
    }

}
