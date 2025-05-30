<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main" style="background-color: #F5EEDC; height: 100vh; overflow: hidden;">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#">
            <img src="{{ asset('argon/assets/img/logo-ct-dark.png') }}" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Akreditasi</span>
        </a>
    </div>

    <hr class="horizontal dark mt-0">

    <!-- Sidenav scrollable content -->
    <div class="collapse navbar-collapse w-auto flex-grow-1" id="sidenav-scrollbar"
         style="overflow-y: auto; padding-bottom: 1rem;">
        <ul class="navbar-nav">

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}" href="{{ url('/') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <!-- Kelola Akun Pengguna -->
            <li class="nav-item">
                <a class="nav-link {{ ($activeMenu == 'akun') ? 'active' : '' }}" href="{{ url('/akun') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kelola Akun Pengguna</span>
                </a>
            </li>

            <!-- Data Dosen -->
            <li class="nav-item">
                <a class="nav-link {{ ($activeMenu == 'akun') ? 'active' : '' }}" href="{{ url('/dosen') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Dosen</span>
                </a>
            </li>

            <!-- Dropdown Kriteria -->
            <li class="nav-item">
                <a class="nav-link {{ Str::startsWith($activeMenu, 'kriteria') ? '' : 'collapsed' }}" data-bs-toggle="collapse" href="#submenuKriteria"
                   role="button" aria-expanded="{{ Str::startsWith($activeMenu, 'kriteria') ? 'true' : 'false' }}" aria-controls="submenuKriteria">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kriteria</span>
                    <i class="fas fa-chevron-down ms-auto text-xs"></i>
                </a>

                <div class="collapse {{ Str::startsWith($activeMenu, 'kriteria') ? 'show' : '' }}" id="submenuKriteria">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item">
                            <a class="nav-link {{ ($activeMenu == 'kriteria1') ? 'active' : '' }}" href="{{ url('/kriteria1') }}">Kriteria 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ ($activeMenu == 'kriteria2') ? 'active' : '' }}" href="{{ url('/kriteria2') }}">Kriteria 2</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Kriteria 3</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Kriteria 4</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Kriteria 5</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Kriteria 6</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Kriteria 7</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Kriteria 8</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Kriteria 9</a></li>
                    </ul>
                </div>
            </li>

            <!-- Notifikasi -->
            <li class="nav-item">
                <a class="nav-link {{ ($activeMenu == 'notifikasi') ? 'active' : '' }}" href="{{ url('/notifikasi') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bell-55 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Notifikasi</span>
                </a>
            </li>
            <!-- Logout -->
            <li class="nav-item mt-3">
                <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-button-power text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="GET" class="d-none">
                    @csrf
                </form>
            </li>

        </ul>
{{--        Usahakan jangan disini ntar berantahkan udh nyoba , misal mau di fix aku trimakasih   ~Axel --}}
    </div>
</aside>
