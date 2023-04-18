<div>
    {{-- Welcome and search --}}
    <div class="mb-4"
        style="background-image: url('/img/videogames/BF1.jpg');
    background-position: top; background-repeat: no-repeat;">
        <div class="container pt-7 pb-3"
            style="background-color: rgba(33, 37, 41, 0.8); box-shadow: inset 0px -10px 10px 0px rgba(33, 37, 41, 1);">
            <nav class="d-flex justify-content-center">
                <ol class="breadcrumb" style="background-color: rgba(33, 37, 41, 0.0);">
                    <li class="breadcrumb-item active" aria-current="page"><a href="/" class="text-white">Inicio</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Perfil</li>
                </ol>
            </nav>
            <h1 class="text-white text-center">
                BATTLEFIELD 1
            </h1>
            <h3 class="text-secondary">
                {{-- iconos plataformas --}}
            </h3>
            <h6 class="text-center text-white">
                Oct 21, 2016
            </h6>
            {{-- <input type="search" wire:model.debounce.500ms="search" placeholder="Buscar..."
                class="form-control mt-4 mb-2 text-white" style="background-color: rgba(52, 58, 64, 0.7);"> --}}
        </div>
    </div>
    {{-- --}}
    <div id="screenshotsCarousel" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#screenshotsCarousel" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#screenshotsCarousel" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#screenshotsCarousel" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/videogames/bf1_capture2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/videogames/bf1_capture.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/videogames/bf1_capture2.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#screenshotsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#screenshotsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        {{-- Action buttons --}}
        <section class="mt-4 d-flex gap-2">
            <div class="col-6 px-0">
                <button class="btn bg-gray-800 text-white w-100 px-2">
                    <i class="fa-solid fa-book text-lg"></i> <br> Añadir a biblioteca
                </button>
            </div>
            <div class="col-6 px-0">
                <button class="btn bg-gray-800 text-white w-100 px-2">
                    <i class="fa-solid fa-bookmark text-lg"></i> <br> Añadir a seguimiento
                </button>
            </div>
        </section>
        {{--  --}}
        {{-- Game info --}}
        <section class="d-flex mt-4">
            <article class="col-6">
                <h6 class="text-white">Plataformas</h6>
                <p>PC, Xbox, PS4</p>
            </article>
            <article class="col-6">
                <h6 class="text-white">Puntuación</h6>
                <p class="text-center border border-primary border-radius-md text-primary text-bold">
                    {{ $item->metacritic ?? 'N/A' }}
                </p>
            </article>
        </section>
        <section class="d-flex">
            <article class="col-6">
                <h6 class="text-white">Género</h6>
                <p>Acción, shooter</p>
            </article>
            <article class="col-6">
                <h6 class="text-white">Distribuidora</h6>
                <p>EA</p>
            </article>
        </section>
        <section class="d-flex">
            <article class="col-6">
                <h6 class="text-white">Desarrolladora</h6>
                <p>EA, DICE</p>
            </article>
            <article class="col-6">
                <h6 class="text-white">PEGI</h6>
                <p>N/A</p>
            </article>
        </section>
        <section class="d-flex">
            <article class="col-6">
                <h6 class="text-white">Página web</h6>
                <a href="http://www.battlefield.com" target="_blank">www.battlefield.com</a>
            </article>
            <article class="col-6">

            </article>
        </section>
        {{--  --}}
        {{-- PC REQUIREMENTS --}}
        <section class="mt-4">
            <h6 class="text-white">Requisitos para PC </h6>
            <ul>
                <h6 class="text-white">Mínimos:</h6>
                <li>64-bit processor and operating system</li>
                <li>OS: 64-bit Windows 7, Windows 8.1, Windows 10</li>
                <li>...</li>
            </ul>
        </section>
        {{--  --}}
        {{-- GAME DECRIPTION --}}
        <section class="mt-4">
            <h6 class="text-white">Decripción</h6>
            <p>
                Battlefield 1 is a first-person action shooter set in the historical period of the World War I. Although
                the game is a part of the Battlefield franchise, it has no references to the previous chapters. Players
                are able to experience both single and multiplayer mods to get in action and to feel the era better. As
                a single-player campaign, Battlefield 1 offers 6 sto<b>…Leer más</b>
            </p>
        </section>
        {{--  --}}
        {{-- GAME DLCs --}}
        <section class="mt-4">
            <h6 class="text-white mb-4">DLCs y ediciones</h6>
            <div class="mb-4">
                <div class="card bg-gray-800">
                    <div class="row g-0">
                        <div class="col-4 d-flex align-items-center">
                            <img src="/img/videogames/BF1_apocalypse.jpg" alt=""
                                class="img-fluid border-radius-top-start-lg border-radius-bottom-start-lg">
                        </div>
                        <div class="col-8">
                            <div class="card-body px-4 py-2 row">
                                <h6 class="text-white text-start">BATTLEFIELD 1: Apocalypse</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--  --}}
        {{-- GAME TAGS --}}
        <section class="mt-4">
            <h6 class="text-white">Etiquetas</h6>
            <p>
                Singleplayer, Steam Achievements, Multiplayer, Full controller support, Atmospheric, Great Soundtrack,
                Open World, First-Person, FPS, Gore, Violent, PvP, War, Mature, Historical, Physics, Military, Story,
                Online PvP, Steam Trading Cards, battle, Destruction, Tanks, history, Classes<b>…Leer más</b>
            </p>
        </section>
        {{--  --}}
        {{-- GAME TROPHIES --}}
        <section class="mt-4">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <h6 class="text-white">Trofeos de Battlefield 1</h6>
                </div>
                <div>
                    <i class="fa-solid fa-trophy"></i> 52 Trofeos
                </div>
            </div>
            <div class="card bg-gray-900 ps-2">
                <div class="row g-0">
                    <div class="col-2 d-flex align-items-center">
                        {{-- <img src="/img/videogames/BF1_apocalypse.jpg" alt=""
                            class="img-fluid border-radius-lg"> --}}
                        <div class="btn btn-secondary p-3">
                            <i class="fa-solid fa-trophy text-2xl"></i>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="card-body px-4 py-2">
                            <h6 class="text-white text-start">Naval Weapons Collection</h6>
                            <p>Perform a kill with all "Turning Tides" weapons variants</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--  --}}
    </div>
    {{-- REVIEWS HEADER --}}
    <div class="mb-4 mt-5"
        style="background-image: url('/img/videogames/bf1_capture.jpg'); background-position: top;">
        <div class="container pt-5 pb-3"
            style="background-color: rgba(33, 37, 41, 0.8);
            box-shadow: inset 0px 10px -10px 0px rgba(33, 37, 41, 1);">
            <h1 class="text-white text-center">
                BATTLEFIELD 1 REVIEWS
            </h1>
            <h3 class="text-secondary">
                {{-- iconos plataformas --}}
            </h3>
            <input type="search" wire:model.debounce.500ms="search" placeholder="Buscar..."
                class="form-control mt-4 mb-2 text-white" style="background-color: rgba(52, 58, 64, 0.7);">
        </div>
    </div>
    {{-- --}}
    <div class="container">
        {{-- REVIEWS --}}
        <section class="mb-4">
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
                <div class="card-footer pt-2 align-items-center">
                    <div class="d-flex">
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
                    <hr>
                    <div class="mt-2">
                        <input type="text" name="reply" id="replyReview"
                        class="form-control bg-gray-900 text-white"
                        placeholder="Contestar...">
                    </div>
                </div>
            </div>
        </section>
        {{--  --}}
    </div>
</div>
