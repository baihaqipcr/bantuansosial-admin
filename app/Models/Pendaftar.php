<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table        = 'pendaftar';
    protected $primaryKey   = 'pendaftar_id';
    protected $fillable     = [
        'program_id',
        'warga_id',
        'keterangan',
    ];
}
