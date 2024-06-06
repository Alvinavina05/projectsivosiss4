<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class wakil extends Model
{
    public function alldata(){
        return DB::table('tb_wakilosis')->get();
    }

    public function editdata($id_wakil){
        return DB::table('tb_wakilosis')->where('id_wakil', $id_wakil)->first();
    }

    public function addpesan($data){
        return DB::table('tb_wakilosis')->insert($data);
     }
    
    public function ubahdata($id_wakil, $data){
        DB::table('tb_wakilosis')->where('id_wakil', $id_wakil)->update($data);
     }

    public function hapus($id_wakil){
        DB::table('tb_wakilosis')->where('id_wakil', $id_wakil)->delete();
    }

}

