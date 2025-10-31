        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Bansos Admin</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('assets-admin/img/anakin.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">HQ</h6>
                        <span>I brought peace</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <div class="navbar-nav w-100">
                        <a href="{{ route('dashboard') }}"
                        class="nav-item nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                        </a>

                        <a href="{{ route('penerima.index') }}"
                        class="nav-item nav-link {{ request()->routeIs('penerima.*') ? 'active' : '' }}">
                            <i class="fa fa-users me-2"></i>Data Penerima
                        </a>

                         <a href="{{ route('program.index') }}"
                        class="nav-item nav-link {{ request()->routeIs('program.*') ? 'active' : '' }}">
                            <i class="fa fa-list me-2"></i>Program Bantuan
                        </a>

                        <a href="{{ route('pendaftar.index') }}"
                        class="nav-item nav-link {{ request()->routeIs('pendaftar.*') ? 'active' : '' }}">
                            <i class="fa fa-box me-2"></i>Pendaftar
                        </a>
                </div>
            </nav>
        </div>
