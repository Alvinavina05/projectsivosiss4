<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AkunApi extends Model
{
    protected $table = 'tb_akun';
    protected $primaryKey = 'nis_nip';
public $incrementing = false;
    protected $fillable = [
        'nis_nip',
        'nama_lengkap',
        'jenis_kelamin',
        'kelas',
        'id_posisi',
        'status',
        'pass',
        'qr',
    ];

    public $timestamps = false;

}