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

}
