<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav
                class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid">
                    <a href="{{ route('welcome') }}"
                    class="navbar-brand font-weight-bolder text-primary text-gradient ms-lg-0 text-lg" style="font-family: monospace">
                        VIDEO GAMES VAULT 
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
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
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
