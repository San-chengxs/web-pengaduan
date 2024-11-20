<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanggapan extends Model
{
    use HasFactory;


    protected $primarykey = 'id_tanggapan';

    protected $fillable = [
        'id_pengaduan',
        'tgl_pengaduan',
        'tanggapan',
        'id_petugas',
    ];
}
