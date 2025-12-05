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
                <form action="{{ route('pelanggan.update', $dataPelanggan->pelanggan_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        <!-- KOLOM 1 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label for="nama_awal_penerima" class="form-label">Nama Awal</label>
                                <input type="text"
                                    name="nama_awal_penerima"
                                    id="nama_awal_penerima"
                                    class="form-control @error('nama_awal_penerima') is-invalid @enderror"
                                    value="{{ old('nama_awal_penerima', $dataPelanggan->nama_awal_penerima) }}"
                                    required>
                                @error('nama_awal_penerima')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nama_akhir_penerima" class="form-label">Nama Terakhir</label>
                                <input type="text"
                                    name="nama_akhir_penerima"
                                    id="nama_akhir_penerima"
                                    class="form-control @error('nama_akhir_penerima') is-invalid @enderror"
                                    value="{{ old('nama_akhir_penerima', $dataPelanggan->nama_akhir_penerima) }}">
                                @error('nama_akhir_penerima')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <!-- KOLOM 2 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Ulang Tahun</label>
                                <input type="date"
                                    name="tgl_lahir"
                                    id="tgl_lahir"
                                    class="form-control @error('tgl_lahir') is-invalid @enderror"
                                    value="{{ old('tgl_lahir', $dataPelanggan->tgl_lahir ? date('Y-m-d', strtotime($dataPelanggan->tgl_lahir)) : '') }}">
                                @error('tgl_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kelamin" class="form-label">Kelamin</label>
                                <select id="kelamin"
                                    name="kelamin"
                                    class="form-select @error('kelamin') is-invalid @enderror">

                                    <option value="" disabled {{ old('kelamin', $dataPelanggan->kelamin) == '' ? 'selected' : '' }}>Pilih Gender</option>
                                    <option value="Laki-laki" {{ old('kelamin', $dataPelanggan->kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('kelamin', $dataPelanggan->kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    <option value="Other" {{ old('kelamin', $dataPelanggan->kelamin) == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>

                                @error('kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <!-- KOLOM 3 -->
                        <div class="col-lg-4 col-md-12">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"
                                    name="email"
                                    id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $dataPelanggan->email) }}"
                                    required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="no_tlp" class="form-label">Nomor Kontak</label>
                                <input type="text"
                                    name="no_tlp"
                                    id="no_tlp"
                                    class="form-control @error('no_tlp') is-invalid @enderror"
                                    value="{{ old('no_tlp', $dataPelanggan->no_tlp) }}">
                                @error('no_tlp')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role"
                                    name="role"
                                    class="form-select @error('role') is-invalid @enderror">

                                    <option value="" disabled {{ old('role', $dataPelanggan->role) == '' ? 'selected' : '' }}>Pilih Role</option>
                                    <option value="Administrator" {{ old('role', $dataPelanggan->role) == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                    <option value="Member" {{ old('role', $dataPelanggan->role) == 'Member' ? 'selected' : '' }}>Member</option>
                                    <option value="Mitra" {{ old('role', $dataPelanggan->role) == 'Mitra' ? 'selected' : '' }}>Mitra</option>
                                </select>

                                @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-primary px-4">Simpan</button>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary ms-2 px-4">Batal</a>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>
@endsection