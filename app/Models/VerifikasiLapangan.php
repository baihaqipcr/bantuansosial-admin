<?php

namespace App\Models;

use App\Models\Pendaftar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VerifikasiLapangan extends Model
{
    use HasFactory;

    protected $table = 'verifikasi_lapangan';
    protected $primaryKey = 'verifikasi_id';

    protected $fillable = [
        'pendaftar_id',
        'petugas',
        'tanggal_verifikasi',
        'catatan',
        'skor',
        'foto_verifikasi',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'pendaftar_id');
    }
}
