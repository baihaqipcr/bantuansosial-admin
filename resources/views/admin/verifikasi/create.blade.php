@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <h1 class="h4">Verifikasi Lapangan</h1>
    <p>Form untuk menambahkan Verifikasi Lapangan</p>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow mb-4 card-dark-surface">
            <div class="card-body">

                <form action="{{ route('verifikasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="petugas" class="form-label">Petugas</label>
                        <input type="text" name="petugas" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_verifikasi" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal_verifikasi" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="skor" class="form-label">Skor</label>
                        <input type="number" name="skor" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea name="catatan" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto_verifikasi" class="form-label">Foto Profil</label>
                        <input type="file" name="foto_verifikasi" class="form-control">
                        <small class="text-muted">JPG / PNG, max 2MB</small>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('verifikasi.index') }}" class="btn btn-outline-secondary ms-2 px-4">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection