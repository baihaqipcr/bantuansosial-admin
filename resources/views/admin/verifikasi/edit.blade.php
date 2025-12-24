@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <h1 class="h4">Edit Verifikasi Lapangan</h1>
    <p>Perbarui data dan foto verifikasi lapangan</p>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow mb-4 card-dark-surface">
            <div class="card-body">

                <form action="{{ route('verifikasi.update', $verifikasi->id) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Petugas --}}
                    <div class="mb-3">
                        <label class="form-label">Petugas</label>
                        <input type="text"
                               name="petugas"
                               class="form-control"
                               value="{{ old('petugas', $verifikasi->petugas) }}"
                               required>
                    </div>

                    {{-- Tanggal --}}
                    <div class="mb-3">
                        <label class="form-label">Tanggal Verifikasi</label>
                        <input type="date"
                               name="tanggal_verifikasi"
                               class="form-control"
                               value="{{ old('tanggal_verifikasi', $verifikasi->tanggal_verifikasi) }}"
                               required>
                    </div>

                    {{-- Skor --}}
                    <div class="mb-3">
                        <label class="form-label">Skor</label>
                        <input type="number"
                               name="skor"
                               class="form-control"
                               value="{{ old('skor', $verifikasi->skor) }}"
                               required>
                    </div>

                    {{-- Catatan --}}
                    <div class="mb-3">
                        <label class="form-label">Catatan</label>
                        <textarea name="catatan"
                                  class="form-control"
                                  rows="3">{{ old('catatan', $verifikasi->catatan) }}</textarea>
                    </div>

                    {{-- FOTO --}}
                    <div class="mb-3">
                        <label class="form-label">Foto Verifikasi</label>

                        {{-- Preview foto lama --}}
                        <div class="mb-2">
                            <img
                                src="{{ $verifikasi->foto_verifikasi
                                    ? asset('storage/'.$verifikasi->foto_verifikasi)
                                    : asset('assets/img/default-avatar.png') }}"
                                width="120"
                                class="rounded border"
                                style="object-fit: cover;">
                        </div>

                        <input type="file"
                               name="foto_verifikasi"
                               class="form-control">
                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti foto
                        </small>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success px-4">
                            Update
                        </button>
                        <a href="{{ route('verifikasi.index') }}"
                           class="btn btn-outline-secondary ms-2 px-4">
                            Batal
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
