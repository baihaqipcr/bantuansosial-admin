        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3 d-flex align-items-center gap-2">
                    <img
                        src="{{ asset('assets/img/logo1-removebg-preview.png') }}"
                        alt="SIBANSOS Logo"
                        style="height: 40px; width: auto;">
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        @auth
                        @if ($item->foto_profil)
                        <img src="{{ asset('storage/'.$item->foto_profil) }}"
                            width="40"
                            height="40"
                            class="rounded-circle"
                            style="object-fit: cover;">
                        @else
                        <div class="avatar-inisial">
                            {{ $item->inisial }}
                        </div>
                        @endif

                        <span class="d-none d-lg-inline-flex">
                            {{ Auth::user()->username }}
                        </span>
                        @endauth

                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <div class="navbar-nav w-100">
                        <a href="{{ route('dashboard') }}"
                            class="nav-item nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                        </a>

                        <a href="{{ route('pelanggan.index') }}"
                            class="nav-item nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
                            <i class="fa fa-users me-2"></i>Data Pelanggan
                        </a>

                        <a href="{{ route('penerima.index') }}"
                            class="nav-item nav-link {{ request()->routeIs('penerima.*') ? 'active' : '' }}">
                            <i class="fa fa-pen me-2"></i>Data Penerima
                        </a>

                        <a href="{{ route('program.index') }}"
                            class="nav-item nav-link {{ request()->routeIs('program.*') ? 'active' : '' }}">
                            <i class="fa fa-list me-2"></i>Program Bantuan
                        </a>

                        <a href="{{ route('verifikasi.index') }}"
                            class="nav-item nav-link {{ request()->routeIs('verifikasi.*') ? 'active' : '' }}">
                            <i class="fa fa-check-circle me-2"></i>Verifikasi
                        </a>

                        <a href="{{ route('pendaftar.index') }}"
                            class="nav-item nav-link {{ request()->routeIs('pendaftar.*') ? 'active' : '' }}">
                            <i class="fa fa-box me-2"></i>Pendaftar
                        </a>
                        <div>
                            <form action="{{ route('logout') }}" method="POST" class="mt-auto text-center">
                                @csrf
                                <button type="submit" class="btn btn-danger w-75 logout-btn mt-3">
                                    <i class="fa fa-sign-out-alt me-2"></i>Logout
                                </button>
                            </form>
                        </div>
            </nav>
        </div>