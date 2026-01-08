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
            <a href="{{ route('pelanggan.index') }}" class="btn btn-primary"><i class="far fa-question-circle me-1"></i> Kembali</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow mb-4 card-dark-surface">
            <div class="card-body">
                <form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-4">

                        <!-- ================= KOLOM 1 ================= -->
                        <div class="col-lg-4 col-md-6">

                            <div class="mb-3">
                                <label for="nama_awal_penerima" class="form-label">Nama Awal</label>
                                <input type="text" name="nama_awal_penerima" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_akhir_penerima" class="form-label">Nama Terakhir</label>
                                <input type="text" name="nama_akhir_penerima" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Ulang Tahun</label>
                                <input type="date" name="tgl_lahir" class="form-control">
                            </div>

                        </div>

                        <!-- ================= KOLOM 2 ================= -->
                        <div class="col-lg-4 col-md-6">

                            <div class="mb-3">
                                <label for="kelamin" class="form-label">Kelamin</label>
                                <select name="kelamin" class="form-select">
                                    <option selected disabled>Pilih Gender</option>
                                    <option value="Male">Laki-laki</option>
                                    <option value="Female">Perempuan</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" class="form-select">
                                    <option selected disabled>Pilih Role</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Member">Member</option>
                                    <option value="Mitra">Mitra</option>
                                </select>
                            </div>

                        </div>

                        <!-- ================= KOLOM 3 ================= -->
                        <div class="col-lg-4 col-md-12">

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="no_tlp" class="form-label">Nomor Kontak</label>
                                <input type="text" name="no_tlp" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="foto_profil" class="form-label">Foto Profil</label>
                                <input type="file" name="foto_profil" class="form-control">
                                <small class="text-muted">JPG / PNG, max 2MB</small>
                            </div>

                        </div>

                    </div>

                    <!-- ================= BUTTON ================= -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">Simpan</button>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary ms-2 px-4">Batal</a>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
@endsection