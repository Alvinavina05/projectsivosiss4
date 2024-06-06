<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KandidatApi extends Model
{
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