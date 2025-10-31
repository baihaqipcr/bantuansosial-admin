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
                    <li class="breadcrumb-item"><a href="#">Penerima</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Penerima Bantuan</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Tambah Penerima Bantuan</h1>
                    <p class="mb-0">Form untuk menambahkan data penerima baru.</p>
                </div>
                <div>
                    <a href="{{ route('penerima.index') }}" class="btn btn-primary"><i class="far fa-question-circle me-1"></i> Kembali</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow mb-4 card-dark-surface">
                    <div class="card-body">
                        <form action="{{ route('penerima.update', $dataPenerima->penerima_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-4">
                                <!-- ID Penerima (otomatis / readonly) -->
                                        <div class="mb-3">
                                            <label for="penerima_id" class="form-label">ID Penerima</label>
                                            <input type="text" name="penerima_id" id="penerima_id"
                                                class="form-control" value="{{ old('penerima_id', $penerima->penerima_id ?? 'AUTO') }}"
                                                readonly>
                                            <small class="text-muted">ID dibuat otomatis oleh sistem</small>
                                        </div>

                                        <!-- ID Program -->
                                        <div class="mb-3">
                                            <label for="program_id" class="form-label">ID Program</label>
                                            <input type="text" name="program_id" id="program_id"
                                                class="form-control"
                                                value="{{ old('program_id') }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-6">
                                        <!-- ID Warga -->
                                        <div class="mb-3">
                                            <label for="warga_id" class="form-label">ID Warga</label>
                                            <input type="text" name="warga_id" id="warga_id"
                                                class="form-control"
                                                value="{{ old('warga_id', $penerima->warga_id ?? '') }}"
                                                required>
                                        </div>

                                        <!-- Keterangan -->
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <textarea name="keterangan" id="keterangan"
                                                    class="form-control" rows="3"
                                                    placeholder="Masukkan keterangan tambahan (opsional)">{{ old('keterangan', $penerima->keterangan ?? '') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <!-- Tombol Simpan dan Batal -->
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <a href="{{ route('penerima.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
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
