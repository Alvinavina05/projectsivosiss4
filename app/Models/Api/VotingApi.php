<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VotingApi extends Model
{
    protected $table = 'tb_voting';
    protected $primaryKey = 'nis_nip';
public $incrementing = false;
    protected $fillable = [
        'nis_nip',
        'nama_lengkap',
        'kelas',
        'id_kandidat',
        'tgl_memilih',
    ];

    public $timestamps = false;

    public function votingdonat()
    {
        return DB::table('tb_kandidat')
            ->join('tb_ketuaosis', 'tb_kandidat.id_ketua', '=', 'tb_ketuaosis.id_ketua')
            ->join('tb_wakilosis', 'tb_kandidat.id_wakil', '=', 'tb_wakilosis.id_wakil')
            ->leftJoin('tb_voting', 'tb_kandidat.id_kandidat', '=', 'tb_voting.id_kandidat')
            ->select(
                'tb_kandidat.id_kandidat',
                'tb_ketuaosis.nama_ketua AS Nama_Ketua',
                'tb_wakilosis.nama_wakil AS Nama_Wakil',
                DB::raw('COUNT(tb_voting.nis_nip) AS total_vote')
            )
            ->groupBy('tb_kandidat.id_kandidat', 'tb_ketuaosis.nama_ketua', 'tb_wakilosis.nama_wakil')
            // ->orderBy('total_vote', 'DESC')
            ->get();
    }

}
