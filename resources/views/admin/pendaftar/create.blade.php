@extends('layouts.admin.app')

@section('content')
 <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Pendaftar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Pendaftar</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Tambah Program Bantuan</h1>
                    <p class="mb-0">Form untuk menambahkan data pendaftar.</p>
                </div>
                <div>
                    <a href="{{ route('pendaftar.index') }}" class="btn btn-primary"><i class="far fa-question-circle me-1"></i> Kembali</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow mb-4 card-dark-surface">
                    <div class="card-body">
                        <form action="{{ route('pendaftar.store') }}" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <!-- ID Pendaftar (otomatis / readonly) -->
                                        <div class="mb-3">
                                            <label for="pendaftar_id" class="form-label">ID Pendaftar</label>
                                            <input type="text" name="pendaftar_id" id="pendaftar_id"
                                                class="form-control" value="{{ old('pendaftar_id', $pendaftar->pendaftar_id ?? 'AUTO') }}"
                                                readonly>
                                            <small class="text-muted">ID dibuat otomatis oleh sistem</small>
                                        </div>

                                        <!-- ID Program -->
                                        <div class="mb-3">
                                            <label for="program_id" class="form-label">Kode</label>
                                            <input type="text" name="program_id" id="program_id"
                                                class="form-control"
                                                value="{{ old('program', $pendaftar->program ?? '') }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-6">
                                        <!-- ID Warga -->
                                        <div class="mb-3">
                                            <label for="warga_id" class="form-label">Nama Program</label>
                                            <input type="text" name="warga_id" id="warga_id"
                                                class="form-control"
                                                value="{{ old('warga_id', $pendaftar->warga ?? '') }}"
                                                required>
                                        </div>

                                        <!-- Keterangan -->
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Status Seleksi</label>
                                            <input type="text" name="keterangan" id="keterangan"
                                                class="form-control"
                                                value="{{ old('keterangan', $pendaftar->keterangan ?? '') }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <!-- Tombol Simpan dan Batal -->
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <a href="{{ route('pendaftar.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
@endsection
