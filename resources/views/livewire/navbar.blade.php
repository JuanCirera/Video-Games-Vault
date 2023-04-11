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
                            <a href="{{ route('profile',auth()->user()->username) }}" class="w-50">
                                <img src="{{auth()->user()->avatar}}" alt="profile_img" class="w-90 rounded-circle">
                            </a>
                        @endauth

                    </div>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ms-auto">
                            {{-- <li class="nav-item">
                                <a class="nav-link me-2 text-white" href="{{ route('register') }}">
                                    <i class="fas fa-user-circle opacity-6 me-1"></i>
                                    Crear cuenta
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2 text-white" href="{{ route('login') }}">
                                    <i class="fas fa-key opacity-6 me-1"></i>
                                    Iniciar sesión
                                </a>
                            </li> --}}
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
</div>
