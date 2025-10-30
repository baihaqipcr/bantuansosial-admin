<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ProgramBantuanController;

class ProgramBantuan extends Model
{
    protected $table        = 'program';
    protected $primaryKey   = 'program_id';
    protected $fillable     = [
        'kode',
        'nama_program',
        'tahun',
        'deskripsi',
        'anggaran',
    ];
}
