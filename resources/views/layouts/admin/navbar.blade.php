         <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
             <a href="#" class="sidebar-toggler flex-shrink-0">
                 <i class="fa fa-bars"></i>
             </a>

             <form class="d-none d-md-flex ms-4">
                 <input class="form-control bg-dark border-0" type="search" placeholder="Search">
             </form>

             <div class="navbar-nav align-items-center ms-auto">
                 <div class="nav-item dropdown">

                     <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                         <img class="rounded-circle me-lg-2" src="{{ asset('assets-admin/img/anakin.jpg') }}" alt=""
                             style="width: 40px; height: 40px;">

                         {{-- Aman kalau user belum login --}}
                         <span class="d-none d-lg-inline-flex">
                             {{ Auth::user()->name ?? 'Baihaqi'}}
                         </span>
                     </a>

                     <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                         <a href="#" class="dropdown-item">My Profile</a>
                         <a href="#" class="dropdown-item">Settings</a>

                         {{-- Logout --}}
                         @auth
                         <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0 m-0">
                             @csrf
                             <button type="submit" class="btn btn-link text-start w-100 text-light" style="text-decoration:none;">
                                 Log Out
                             </button>
                         </form>
                         @endauth
                     </div>

                 </div>
             </div>
         </nav>