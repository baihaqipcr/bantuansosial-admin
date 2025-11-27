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
            <a href="{{ route('pelanggan.create') }}" class="btn btn-success text-white"><i
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
                    <form method="GET" action="{{ route('pelanggan.index') }}" class="mb-3">
                        <div class="row">
                            <div class="col-md-2">
                                <select name="kelamin" class="form-select" onchange="this.form.submit()">
                                    <option value="">All</option>
                                    <option value="Male" {{ request('kelamin')=='Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ request('kelamin')=='Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" id="exampleInputIconRight" value="{{request('search')}}" placeholder="Search" aria-label="Search">
                                    <button type="submit" class="input-group-text" id="basic-addon2">
                                        @if(request('search'))
                                        <a href="{{ request()->fullUrlWithQuery(['search'=> null]) }}" class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
                                        @endif
                                        <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table id="table-pelanggan"
                        class="table table-centered table-nowrap mb-0 rounded table-dark-custom table-bordered">
                        <thead>
                            <tr>
                                <th class="border-0">Nama Awal</th>
                                <th class="border-0">Nama Akhir</th>
                                <th class="border-0">Tanggal Lahir</th>
                                <th class="border-0">Kelamin</th>
                                <th class="border-0">Email</th>
                                <th class="border-0">No HP</th>
                                <th class="border-0 rounded-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPelanggan as $item)
                            <tr>
                                <td>{{ $item->nama_awal_penerima }}</td>
                                <td>{{ $item->nama_akhir_penerima }}</td>
                                <td>{{ $item->tgl_lahir }}</td>
                                <td>{{ $item->kelamin }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_tlp }}</td>
                                <td>
                                    {{-- contoh badge --}}
                                    <span class="badge badge-dark-contrast">{{ $item->keterangan }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('pelanggan.edit', $item->pelanggan_id) }}"
                                        class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('pelanggan.destroy', $item->pelanggan_id) }}"
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
                        {{ $dataPelanggan->links('pagination::bootstrap-5') }}
                    </div>
                </div> <!-- .table-responsive -->
            </div> <!-- .card-body -->
        </div> <!-- .card -->
    </div>
</div>
@endsection