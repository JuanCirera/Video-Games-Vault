<div>
    <div class="container mt-7 min-vh-100">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark bg-gray-900">
                <li class="breadcrumb-item active text-white" aria-current="page"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Perfil</li>
            </ol>
        </nav>
        <section class="text-center">
            {{-- User data --}}
            <div class="mb-2">
                <img src="{{ $user->avatar }}" alt="avatar" class="rounded-circle">
            </div>
            <div>
                <h4 class="text-white text-bold">{{ $user->username }}</h4>
            </div>
            <div class="mt-4">
                <ul class="list-inline text-white">
                    <li class="list-inline-item">Siguiendo <sup class="text-secondary">43</sup></li>
                    <li class="list-inline-item">Seguidores <sup class="text-secondary">230</sup></li>
                    <li class="list-inline-item"><a href="" class="text-white">Ajustes</a></li>
                </ul>
            </div>
            {{--  --}}
            {{-- Profile internal nav --}}
            <div class="mt-4">
                <div class="dropdown" id="navParent">
                    <a href="#" class="btn bg-gray-800 dropdown-toggle text-white w-100" data-bs-toggle="dropdown"
                        id="profile_nav">
                        <i class="fas fa-chart-simple"></i> Overview
                    </a>
                    <ul class="dropdown-menu w-100 text-center bg-gray-800 blur mt-2" aria-labelledby="profile_nav">
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#overview">
                                <i class="fas fa-chart-simple"></i> Overview
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#library">
                                <i class="fas fa-book"></i> Biblioteca
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#wishlist">
                                <i class="fas fa-bookmark"></i> Favoritos
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#tracking">
                                <i class="fas fa-location-crosshairs"></i> Lista de seguimiento
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#reviews">
                                <i class="fas fa-star"></i> Reviews
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{--  --}}
            {{-- Profile content --}}
            {{-- TODO: meter datos reales --}}
            <article class="collapse mt-5 show" id="overview" data-bs-parent="#navParent">
                <div>
                    <h4 class="text-white">120 videojuegos</h4>
                    <div class="d-flex mt-4">
                        <div class="col-5">
                            <span class="text-white">Completados</span>
                        </div>
                        <div class="col-6">
                            <div class="progress-wrapper pt-2">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="60"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="text-white">60</span>
                        </div>
                    </div>
                    <div class="d-flex mt-2">
                        <div class="col-5">
                            <span class="text-white">Sin jugar</span>
                        </div>
                        <div class="col-6">
                            <div class="progress-wrapper pt-2">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="60"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="text-white">10</span>
                        </div>
                    </div>
                    <div class="d-flex mt-2">
                        <div class="col-5">
                            <span class="text-white">Deseados</span>
                        </div>
                        <div class="col-6">
                            <div class="progress-wrapper pt-2">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="60"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="text-white">20</span>
                        </div>
                    </div>
                    <div class="d-flex mt-2">
                        <div class="col-5">
                            <span class="text-white">Jugando actualmente</span>
                        </div>
                        <div class="col-6">
                            <div class="progress-wrapper pt-2">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar"
                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 10%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="text-white">3</span>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <h4 class="text-white">34 reviews</h4>
                    <div class="d-flex mt-4" style="align-items: flex-end !important">
                        <div class="col-5">
                            <span class="text-white">Positivas</span>
                        </div>
                        <div class="col-6">
                            <div class="progress-wrapper pb-2">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar"
                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 90%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="text-white">30</span>
                        </div>
                    </div>
                    <div class="d-flex mt-2" style="align-items: flex-end !important">
                        <div class="col-5">
                            <span class="text-white">Negativas</span>
                        </div>
                        <div class="col-6">
                            <div class="progress-wrapper pb-2">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar"
                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 10%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="text-white">4</span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="collapse mt-5" id="library" data-bs-parent="#navParent">
                {{-- TODO: meter contenido a cada collapse--}}
                <div class="btn bg-gray-800 text-white w-100" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-check"></i> Completados <i class="fas fa-chevron-down"></i>
                </div>
                <div class="btn bg-gray-800 text-white w-100" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-gamepad"></i> Jugando actualmente <i class="fas fa-chevron-down"></i>
                </div>
                <div class="btn bg-gray-800 text-white w-100" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa-solid fa-clock"></i> Pendientes <i class="fas fa-chevron-down"></i>
                </div>
                <div class="btn bg-gray-800 text-white w-100" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa-solid fa-flask"></i> Probados <i class="fas fa-chevron-down"></i>
                </div>
                <div class="btn bg-gray-800 text-white w-100" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa-solid fa-circle-question"></i> Sin categoría <i class="fas fa-chevron-down"></i>
                </div>
            </article>
            <article class="collapse mt-5" id="wishlist">
                Favoritos
            </article>
            <article class="collapse mt-5" id="tracking">
                Lista de seguimiento
            </article>
            <article class="collapse mt-5" id="reviews">
                Reviews
            </article>
        </section>
        {{--  --}}
    </div>

    <script>
        // Se obtienen todos los enlaces con la clase dropdown-item
        const links = document.querySelectorAll('.dropdown-item');

        // Se añade un evento click a cada enlace
        links.forEach(link => {
            link.addEventListener('click', () => {
                // Obtener el id del collapse que se está abriendo
                const target = link.getAttribute('href');

                // Obtener los demás collapse menos el que se está abriendo
                const otherLinks = document.querySelectorAll('.collapse:not(' + target + ')');

                // Cerrar los collapse
                otherLinks.forEach(otherLink => {
                    if (otherLink.classList.contains('show')) {
                        otherLink.classList.remove('show');
                    }
                });
            });
        });
    </script>

</div>
