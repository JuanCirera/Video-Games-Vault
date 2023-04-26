<aside class="sidenav bg-gray-800 navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex justify-content-center align-items-center" href="{{ route('home') }}"
            target="_blank">
            <img src="{{Storage::url('img/logos/VGV.svg')}}" class="navbar-brand-img" alt="main_logo">
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <span class="fa-solid fa-chart-simple text-primary text-sm opacity-10"></span>
                    </div>
                    <span class="nav-link-text ms-1 text-white">Dashboard</span>
                </a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <span class="fas fa-eye text-primary text-sm opacity-10"></span>
                    </div>
                    <span class="nav-link-text ms-1 text-white">Vista de usuario</span>
                </a>
            </li>
            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Perfil</h6>
            </li> --}}
        </ul>
    </div>
</aside>
