@extends('layouts.admin.app')

@section('content')
{{-- start main content --}}
<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#">Verifikasi Lapangan</a></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Data Verifikasi Lapangan</h1>
            <p class="mb-0">List data Verifikasi Lapangan</p>
        </div>
        <div>
            <a href="{{ route('verifikasi.create') }}" class="btn btn-success text-white"><i
                    class="far fa-question-circle me-1"></i>
                Tambah Verifikasi</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow mb-4 card-dark-surface"> <!-- gunakan card-dark-surface -->
            <div class="card-body">
                <div class="table-responsive section-dark"> <!-- optional wrapper -->
                    <table id="table-pelanggan"
                        class="table table-centered table-nowrap mb-0 rounded table-dark-custom table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Foto Verifikasi</th>
                            <th>Nama Pelanggan</th>
                            <th>Petugas</th>
                            <th>Tanggal</th>
                            <th>Skor</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($verifikasi_lapangan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->foto_verifikasi }}</td>
                                <td>{{ $item->pelanggan->nama_awal_pelanggan ?? '-' }}</td>
                                <td>{{ $item->petugas }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->skor }}</td>
                                <td>{{ $item->catatan }}</td>
                                <td>
                                    <a href="{{ route('verifikasi.edit', $item->verifikasi_id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('verifikasi.destroy', $item->verifikasi_id) }}"
                                        method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                    </div>
                </div> <!-- .table-responsive -->
            </div> <!-- .card-body -->
        </div> <!-- .card -->
    </div>
</div>
@endsection