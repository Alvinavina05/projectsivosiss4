<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KandidatApi extends Model
{
	public function alldata()
    {
        return DB::table('tb_kandidat as k')
            ->join('tb_ketuaosis as ketua', 'k.id_ketua', '=', 'ketua.id_ketua')
            ->join('tb_wakilosis as wakil', 'k.id_wakil', '=', 'wakil.id_wakil')
            ->select(
                'k.id_kandidat',
                'k.visi',
                'k.misi',
                'ketua.nama_ketua',
                'wakil.nama_wakil',
                'k.gambar'
            )
            ->get();
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