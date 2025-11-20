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
                <li class="breadcrumb-item"><a href="#">Program Bantuan</a></li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data Program Bantuan</h1>
                <p class="mb-0">List data seluruh program bantuan</p>
            </div>
            <div>
                <a href="{{ route('program.create') }}" class="btn btn-success text-white"><i
                        class="far fa-question-circle me-1"></i>
                    Tambah Program</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow mb-4 card-dark-surface">
                <div class="card-body">
                    <div class="table-responsive section-dark">
                        <table id="table-program" class="table table-dark-custom table-hover table-bordered mb-0 rounded">
                            <thead>
                                <tr>
                                    <th class="border-0">Id program</th>
                                    <th class="border-0">Kode Program</th>
                                    <th class="border-0">Nama Program</th>
                                    <th class="border-0">Tahun</th>
                                    <th class="border-0">Deskripsi</th>
                                    <th class="border-0">Anggaran</th>
                                    <th class="border-0 rounded-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataProgram as $item)
                                    <tr>
                                        <td>{{ $item->program_id }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->nama_program }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>
                                            <span
                                                class="badge badge-dark-contrast">{{ number_format($item->anggaran, 0, ',', '.') }}</span>
                                        </td>
                                        <td>
                                             <a href="{{ route('program.edit', $item->program_id) }}"
                                                class="btn btn-info btn-sm">Edit</a>
                                            <form action="{{ route('program.destroy', $item->program_id) }}"
                                                method="POST" style="display:inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- table-responsive -->
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div>
    </div>

    {{-- end main content --}}
@endsection
