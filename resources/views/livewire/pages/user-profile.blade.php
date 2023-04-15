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
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#following" data-bs-toggle="collapse" id="profNav" class="text-white">
                            Siguiendo
                        </a><sup class="text-secondary">43</sup>
                    </li>
                    <li class="list-inline-item">
                        <a href="#followers" data-bs-toggle="collapse" id="profNav" class="text-white">
                            Seguidores</a>
                        <sup class="text-secondary">230</sup>
                    </li>
                    <li class="list-inline-item">
                        <a href="" class="text-white">
                            Ajustes
                        </a>
                    </li>
                </ul>
            </div>
            {{--  --}}
            {{-- Profile internal nav --}}
            <div class="mt-4">
                <div class="dropdown" id="navParent">
                    <a href="#" class="btn bg-gray-800 dropdown-toggle text-white w-100" data-bs-toggle="dropdown"
                        id="curLink">
                        <i class="fas fa-chart-simple"></i> Resumen
                    </a>
                    <ul class="dropdown-menu w-100 text-center bg-gray-800 blur mt-2" aria-labelledby="profile_nav">
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#overview"
                                id="profNav">
                                <i class="fas fa-chart-simple"></i> Resumen
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#library"
                                id="profNav">
                                <i class="fas fa-book"></i> Biblioteca
                            </a>
                        </li>
                        {{-- <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#wishlist"  id="profNav">
                                <i class="fas fa-bookmark"></i> Favoritos
                            </a>
                        </li> --}}
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#tracking"
                                id="profNav">
                                <i class="fas fa-location-crosshairs"></i> Lista de seguimiento
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#reviews"
                                id="profNav">
                                <i class="fas fa-star"></i> Reseñas
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
            <article class="collapse mt-4" id="library" data-bs-parent="#navParent">
                <div class="mb-5">
                    <h4 class="text-white">Biblioteca</h4>
                    <p>Todos tus juegos ordenados por categorías</p>
                </div>
                {{-- FINISHED GAMES --}}
                <div class="btn btn-collapse bg-gray-800 w-100 text-white d-flex " type="button"
                    data-bs-toggle="collapse" data-bs-target="#finishedGames" aria-expanded="false"
                    aria-controls="collapseExample">
                    <div class="flex-grow-1">
                        <i class="fas fa-check"></i> Completados
                    </div>
                    <div class="">
                        <i class="fas fa-chevron-down text-secondary"></i>
                    </div>
                </div>
                <div class="collapse" id="finishedGames">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="mb-4">
                            <div class="card bg-gray-800">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="/img/videogames/BF1.jpg" alt=""
                                            class="img-fluid border-radius-top-start-lg border-radius-bottom-start-lg">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body px-4 py-2 row">
                                            <h6 class="text-white text-start">BATTLEFIELD 1</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                {{-- PLAYING NOW --}}
                <div class="btn btn-collapse bg-gray-800 text-white w-100 d-flex" type="button"
                    data-bs-toggle="collapse" data-bs-target="#currentGames" aria-expanded="false"
                    aria-controls="collapseExample">
                    <div class="flex-grow-1">
                        <i class="fas fa-gamepad"></i> Jugando actualmente
                    </div>
                    <div class="">
                        <i class="fas fa-chevron-down text-secondary"></i>
                    </div>
                </div>
                <div class="collapse" id="currentGames">
                    @for ($i = 0; $i < 2; $i++)
                        <div class="mb-4">
                            <div class="card bg-gray-800">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="/img/videogames/BF1.jpg" alt=""
                                            class="img-fluid border-radius-top-start-lg border-radius-bottom-start-lg">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body px-4 py-2 row">
                                            <h6 class="text-white text-start">BATTLEFIELD 1</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                {{-- WAITING GAMES --}}
                <div class="btn btn-collapse bg-gray-800 text-white w-100 d-flex" type="button"
                    data-bs-toggle="collapse" data-bs-target="#waitingGames" aria-expanded="false"
                    aria-controls="collapseExample">
                    <div class="flex-grow-1">
                        <i class="fa-solid fa-clock"></i> Pendientes
                    </div>
                    <div class="">
                        <i class="fas fa-chevron-down text-secondary"></i>
                    </div>
                </div>
                <div class="collapse" id="waitingGames">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="mb-4">
                            <div class="card bg-gray-800">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="/img/videogames/BF1.jpg" alt=""
                                            class="img-fluid border-radius-top-start-lg border-radius-bottom-start-lg">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body px-4 py-2 row">
                                            <h6 class="text-white text-start">BATTLEFIELD 1</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                {{-- TESTED GAMES --}}
                <div class="btn btn-collapse bg-gray-800 text-white w-100 d-flex" type="button"
                    data-bs-toggle="collapse" data-bs-target="#testedGames" aria-expanded="false"
                    aria-controls="collapseExample">
                    <div class="flex-grow-1">
                        <i class="fa-solid fa-flask"></i> Probados
                    </div>
                    <div class="">
                        <i class="fas fa-chevron-down text-secondary"></i>
                    </div>
                </div>
                <div class="collapse" id="testedGames">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="mb-4">
                            <div class="card bg-gray-800">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="/img/videogames/BF1.jpg" alt=""
                                            class="img-fluid border-radius-top-start-lg border-radius-bottom-start-lg">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body px-4 py-2 row">
                                            <h6 class="text-white text-start">BATTLEFIELD 1</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                {{-- NO CATEGORY --}}
                <div class="btn btn-collapse bg-gray-800 text-white w-100 d-flex" type="button"
                    data-bs-toggle="collapse" data-bs-target="#uncategorizedGames" aria-expanded="false"
                    aria-controls="collapseExample">
                    <div class="flex-grow-1">
                        <i class="fa-solid fa-circle-question"></i> Sin categoría
                    </div>
                    <div class="">
                        <i class="fas fa-chevron-down text-secondary"></i>
                    </div>
                </div>
                <div class="collapse" id="uncategorizedGames">
                    @for ($i = 0; $i < 1; $i++)
                        <div class="mb-4">
                            <div class="card bg-gray-800">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="/img/videogames/BF1.jpg" alt=""
                                            class="img-fluid border-radius-top-start-lg border-radius-bottom-start-lg">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body px-4 py-2 row">
                                            <h6 class="text-white text-start">BATTLEFIELD 1</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </article>
            <article class="collapse mt-4" id="tracking">
                <div class="mb-5">
                    <h4 class="text-white">Lista de seguimiento</h4>
                    <p>Se enviarán notificaciones de todos los juegos guardados en esta lista</p>
                </div>
                @for ($i = 0; $i < 10; $i++)
                    <div class="mb-4">
                        <div class="card bg-gray-800">
                            <div class="row g-0">
                                <div class="col-4">
                                    <img src="/img/videogames/BF1.jpg" alt=""
                                        class="img-fluid border-radius-top-start-lg border-radius-bottom-start-lg">
                                </div>
                                <div class="col-8 d-flex">
                                    <div class="card-body px-4 py-2 row flex-grow-1">
                                        <h6 class="text-white text-start">BATTLEFIELD 1</h6>
                                    </div>
                                    <div>
                                        {{-- TODO: wire:click --}}
                                        <a class="mt-n-10">
                                            <i class="fas fa-bookmark text-primary text-2xl"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endfor
            </article>
            <article class="collapse mt-5" id="reviews">
                <div class="mb-5">
                    <h4 class="text-white">Reseñas</h4>
                    <p>Todas las reseñas escritas por {{ '@' . Auth::user()->username }}</p>
                </div>

                {{-- REVIEW --}}
                <div class="mb-4">
                    <div class="card bg-gray-800">
                        <div class="card-header bg-gray-800 pb-2 pt-4 d-flex">
                            <div class="flex-grow-1">
                                <h6 class="text-white text-start my-0">BATTLEPAY 204$</h6>
                                <p class="text-start text-sm mb-0">16/03/2023</p>
                            </div>
                            <div>
                                <i class="fa-solid fa-thumbs-down text-danger text-3xl"></i>
                            </div>
                        </div>
                        <div class="card-body px-4 py-2 text-white">
                            <p>Este juego no deja jugar a la gente humilde</p>
                        </div>
                        <div class="card-footer d-flex pt-2 align-items-center">
                            <div class="col-2">
                                <img src="{{ Auth::user()->avatar }}" alt="" class="rounded-circle w-70">
                            </div>
                            <div class="col-6" style="text-align: left;">
                                <p class="my-0">{{ Auth::user()->username }}</p>
                            </div>
                            <div class="col-2 " style="text-align: right;">
                                3 <i class="fa-solid fa-thumbs-up"></i>
                            </div>
                            <div class="col-2">
                                0 <i class="fa-solid fa-thumbs-down"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- REVIEW --}}
                <div class="mb-4">
                    <div class="card bg-gray-800">
                        <div class="card-header bg-gray-800 pb-2 pt-4 d-flex">
                            <div class="flex-grow-1">
                                <h6 class="text-white text-start my-0">CYBERPAIN 2077</h6>
                                <p class="text-start text-sm mb-0">05/01/2020</p>
                            </div>
                            <div>
                                <i class="fa-solid fa-thumbs-down text-danger text-3xl"></i>
                            </div>
                        </div>
                        <div class="card-body px-4 py-2 text-white" style="text-align: left;">
                            <p>
                                Dicen que los errores te hacen más fuerte.
                                Luego de preordenar este juego, me volví fisicoculturista.
                            </p>
                        </div>
                        <div class="card-footer d-flex pt-2 align-items-center">
                            <div class="col-2">
                                <img src="{{ Auth::user()->avatar }}" alt="" class="rounded-circle w-70">
                            </div>
                            <div class="col-6" style="text-align: left;">
                                <p class="my-0">{{ Auth::user()->username }}</p>
                            </div>
                            <div class="col-2 " style="text-align: right;">
                                30 <i class="fa-solid fa-thumbs-up"></i>
                            </div>
                            <div class="col-2">
                                0 <i class="fa-solid fa-thumbs-down"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </article>
        </section>
        {{--  --}}
        <section class="mt-4 collapse" id="followers">
            @livewire('user-followers')
        </section>
        <section class="mt-4 collapse" id="following">
            @livewire('user-following')
        </section>
    </div>

    <script>
        // // Obtener el enlace principal
        // const curLink = document.getElementById('curLink');

        // // Obtener todos los elementos del menú
        // const menuItems = document.querySelectorAll('.dropdown-item');

        // // Escuchar los eventos de clic en cada elemento del menú
        // menuItems.forEach(item => {
        //     item.addEventListener('click', (event) => {
        //         // event.preventDefault(); // Evitar que el enlace se abra automáticamente
        //         curLink.href = event.target
        //         .href; // Actualizar el enlace principal con el valor del atributo href del elemento clicado
        //     });
        // });

        // Invento para hacer una navegacion del perfil sin recargas y sin 20 vistas muy similares entre ellas

        // Se obtienen todos los enlaces con el id profileNavigation
        const links = document.querySelectorAll('#profNav');

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
