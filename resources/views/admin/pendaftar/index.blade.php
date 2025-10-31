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
                                                class="btn btn-info btn-sm">
                                                <svg class="icon icon-xs me-2" fill="none" stroke-width="1.5"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 7.125 18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('pendaftar.destroy', $item->pendaftar_id) }}"
                                                method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <svg class="icon icon-xs me-2" fill="none" stroke-width="1.5"
                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166M4.772 5.79a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916" />
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- table-responsive -->
                </div>
            </div>
        </div>
    </div>

    {{-- end main content --}}
@endsection
