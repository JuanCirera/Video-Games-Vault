<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav
                class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-3 py-2 start-0 end-0 mx-4">
                <div class="row">
                    <div class="col-4">
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                    </div>
                    <div class="col-4">
                        {{-- NOTE: para el pc --}}
                        {{-- class="navbar-brand font-weight-bolder text-primary text-gradient text-lg" style="font-family: monospace" --}}
                        <a href="{{ route('home') }}" class="navbar-brand">
                            {{-- VIDEO GAMES VAULT  --}}
                            <img src="/img/logos/VGV.svg" alt="vgv" class="w-100">
                        </a>
                    </div>
                    <div class="col-4 d-flex gap-2 justify-content-end">

                        @guest
                            <a href="{{ route('login') }}">
                                <i class="fa-regular fa-circle-user text-secondary text-2xl ps-3 pt-2"></i>
                            </a>
                        @endguest
                        @auth
                            {{-- NOTE: Si llamo a auth() se queda guardada la primera sesion, no el usuario actual, con Auth si funciona --}}
                            <a class="w-50" data-bs-toggle="offcanvas" href="#profileOffcanvas">
                                <img src="{{ auth()->user()->avatar }}" alt="profile_img" class="w-90 rounded-circle">
                            </a>
                        @endauth

                    </div>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link me-2 text-white" href="{{ route('home') }}">
                                    <i class="fas fa-home opacity-6 me-1"></i>
                                    Inicio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2 text-white" href="{{ route('home') }}">
                                    <i class="fas fa-gamepad opacity-6 me-1"></i>
                                    Plataformas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2 text-white" href="{{ route('home') }}">
                                    <i class="fa-solid fa-dice opacity-6 me-1"></i>
                                    Géneros
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2 text-white" href="{{ route('home') }}">
                                    <i class="fas fa-code opacity-6 me-1"></i>
                                    Desarrolladoras
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2 text-white" href="{{ route('home') }}">
                                    <i class="fas fa-store opacity-6 me-1"></i>
                                    Tiendas
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
    @auth
        <div class="offcanvas offcanvas-end bg-gray-900 w-50 blur shadow-none border-0" tabindex="-1" id="profileOffcanvas"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body pt-0">
                <p class="offcanvas-title text-body text-wrap text-md py-2"><span class="text-body">@</span>{{ Auth::user()->username }}</p>
                <div class="accordion" id="accordionOffcanvas">
                    <div class="accordion-item mb-3">
                        <h5 class="accordion-header text-white" id="headingOne">
                            <button class="text-white accordion-button border-bottom font-weight-bold collapsed"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false"
                                aria-controls="collapse1">
                                Mi cuenta
                                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                    aria-hidden="true"></i>
                                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                    aria-hidden="true"></i>
                            </button>
                        </h5>
                        <div id="collapse1" class="accordion-collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionOffcanvas" style="">
                            <div class="accordion-body p-0 opacity-8">
                                <ul class="nav">
                                    <li class="nav-item w-100">
                                        <a class="nav-link text-white"
                                            href="{{ route('profile', Auth::user()->username) }}">
                                            Perfil
                                        </a>
                                    </li>
                                    <li class="nav-item w-100">
                                        <a class="nav-link text-white"
                                            href="{{ route('profile', Auth::user()->username) }}">
                                            Mis datos
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="nav-link text-warning font-weight-bold">
                        <i class="fas fa-right-from-bracket"></i> Cerrar sesión
                    </a>
                </form>
            </div>
        </div>
    @endauth
</div>
