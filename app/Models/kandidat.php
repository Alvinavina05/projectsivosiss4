<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class kandidat extends Model
{

    public function alldata(){
        return DB::table('tb_kandidat')
        ->join('tb_wakilosis', 'tb_kandidat.id_wakil', '=', 'tb_wakilosis.id_wakil')
        ->join('tb_ketuaosis', 'tb_kandidat.id_ketua', '=', 'tb_ketuaosis.id_ketua')
        ->select('tb_kandidat.*', 'tb_wakilosis.nama_wakil', 'tb_ketuaosis.nama_ketua')
        ->get();
    }

    public function addData($data){
        return DB::table('tb_kandidat')->insert($data);
      }

      public function editakandidat($id_kandidat){
        return DB::table('tb_kandidat')->where('id_kandidat', $id_kandidat)->first();
     }


      protected $table = 'tb_kandidat';
    protected $primaryKey = 'id_kandidat';
public $incrementing = false;
    protected $fillable = [
        'id_kandidat',
        'visi',
        'misi',
        'id_ketua',
        'id_wakil',
        'gambar',
    ];

    public $timestamps = false;

}
