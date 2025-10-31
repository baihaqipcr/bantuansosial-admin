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
                <li class="breadcrumb-item"><a href="#">Penerima Bantuan</a></li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data Penerima Bantuan</h1>
                <p class="mb-0">List data seluruh penerima bantuan</p>
            </div>
            <div>
                <a href="{{ route('penerima.create') }}" class="btn btn-success text-white"><i
                        class="far fa-question-circle me-1"></i>
                    Tambah Penerima</a>
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
                            <thead>
                                <tr>
                                    <th class="border-0">ID Penerima</th>
                                    <th class="border-0">ID Program</th>
                                    <th class="border-0">ID Warga</th>
                                    <th class="border-0">Keterangan</th>
                                    <th class="border-0 rounded-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPenerima as $item)
                                    <tr>
                                        <td>{{ $item->penerima_id }}</td>
                                        <td>{{ $item->program_id }}</td>
                                        <td>{{ $item->warga_id }}</td>
                                        <td>
                                            {{-- contoh badge --}}
                                            <span class="badge badge-dark-contrast">{{ $item->keterangan }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('penerima.edit', $item->penerima_id) }}"
                                                class="btn btn-info btn-sm">Edit</a>
                                            <form action="{{ route('penerima.destroy', $item->penerima_id) }}"
                                                method="POST" style="display:inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- .table-responsive -->
                </div> <!-- .card-body -->
            </div> <!-- .card -->
        </div>
    </div>
@endsection
