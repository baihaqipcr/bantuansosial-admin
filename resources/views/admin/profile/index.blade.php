@extends('layouts.admin.app')

@section('content')
<style>
    .form-control:focus {
    box-shadow: none;
    border: 1px solid #dc3545;
}

.card {
    background: linear-gradient(145deg, #1c1f26, #111318);
}

</style>
<div class="container-fluid">

    <h4 class="mb-4 text-light">Profil Pengguna</h4>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">

        <!-- FOTO PROFIL -->
        <div class="col-md-4">
            <div class="card bg-dark text-center p-4 rounded shadow">
                <img
                    src="{{ $user->foto_profil
                        ? Storage::url($user->foto_profil)
                        : asset('assets-admin/img/default.png') }}"
                    class="rounded-circle mb-3 mx-auto"
                    style="width:140px;height:140px;object-fit:cover;">

                <h5 class="text-light">{{ $user->username }}</h5>
                <small class="text-muted">{{ $user->email }}</small>
            </div>
        </div>

        <!-- FORM EDIT -->
        <div class="col-md-8">
            <div class="card bg-dark p-4 rounded shadow">

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="text-light">Username</label>
                        <input type="text" name="username"
                               class="form-control bg-black text-light border-0"
                               value="{{ $user->username }}">
                    </div>

                    <div class="mb-3">
                        <label class="text-light">Email</label>
                        <input type="email" name="email"
                               class="form-control bg-black text-light border-0"
                               value="{{ $user->email }}">
                    </div>

                    <div class="mb-3">
                        <label class="text-light">Foto Profil</label>
                        <input type="file" name="foto_profil"
                               class="form-control bg-black text-light border-0"
                               value="{{ $user->foto_profil }}">
                    </div>

                    <button class="btn btn-danger px-4">
                        Simpan Perubahan
                    </button>
                </form>

            </div>
        </div>

    </div>

</div>
@endsection
