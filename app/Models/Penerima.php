<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    protected $table        = 'penerima';
    protected $primaryKey   = 'penerima_id';
    protected $fillable     = [
        'warga_id',
        'keterangan',
    ];
}
