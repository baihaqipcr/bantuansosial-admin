<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Pelanggan extends Model
{
    protected $table        = 'pelanggan';
    protected $primaryKey   = 'pelanggan_id';
    protected $fillable     = [
        'foto_profil',
        'nama_awal_penerima',
        'nama_akhir_penerima',
        'role',
        'tgl_lahir',
        'kelamin',
        'email',
        'no_tlp',
    ];
    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }

    public function scopeSearch($query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
                }
            });
        }
    }
    public function getInisialAttribute()
    {
        $namaAwal  = trim($this->nama_awal_penerima ?? '');
        $namaAkhir = trim($this->nama_akhir_penerima ?? '');

        if ($namaAwal && $namaAkhir) {
            return strtoupper(
                mb_substr($namaAwal, 0, 1) .
                    mb_substr($namaAkhir, 0, 1)
            );
        }
        return strtoupper(mb_substr($namaAwal, 0, 2));
    }
};
