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
            <li class="breadcrumb-item"><a href="#">Pendaftar</a></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Data Pendaftar</h1>
            <p class="mb-0">List data seluruh pendaftar</p>
        </div>
        <div>
            <a href="{{ route('pendaftar.create') }}" class="btn btn-success text-white"><i
                    class="far fa-question-circle me-1"></i>
                Tambah Pendaftar</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow mb-4 card-dark-surface">
            <div class="card-body">
                <div class="table-responsive section-dark">
                    <table id="table-pendaftar" class="table table-dark-custom table-hover table-bordered mb-0 rounded">
                        <thead>
                            <tr>
                                <th class="border-0">ID Pendaftar</th>
                                <th class="border-0">ID Program</th>
                                <th class="border-0">ID Warga</th>
                                <th class="border-0">Status Seleksi</th>
                                <th class="border-0 rounded-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPendaftar as $item)
                            <tr>
                                <td>{{ $item->pendaftar_id }}</td>
                                <td>{{ $item->program_id }}</td>
                                <td>{{ $item->warga_id }}</td>
                                <td>
                                    @if ($item->keterangan == 'Diterima')
                                    <span class="badge bg-success">Diterima</span>
                                    @elseif($item->keterangan == 'Ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                    @else
                                    <span class="badge bg-warning text-dark">Proses</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('pendaftar.edit', $item->pendaftar_id) }}"
                                        class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('pendaftar.destroy', $item->pendaftar_id) }}"
                                        method="POST" style="display:inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $dataPendaftar->links('pagination::bootstrap-5') }}
                    </div>
                </div> <!-- table-responsive -->
            </div>
        </div>
    </div>
</div>

{{-- end main content --}}
@endsection