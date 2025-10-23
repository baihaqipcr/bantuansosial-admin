<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table        = 'pelanggan';
    protected $primaryKey   = 'pelanggan_id';
    protected $fillable     = [
        'nama_awal_penerima',
        'nama_akhir_penerima',
        'tgl_lahir',
        'kelamin',
        'email',
        'no_tlp',
    ];
};
