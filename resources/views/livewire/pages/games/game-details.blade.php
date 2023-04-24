<div>
    {{-- HEADER --}}
    <div class="mb-4"
        style="background-image: url('{{ $videogame->background_image }}');
    background-position: top; background-repeat: no-repeat;">
        <div class="pt-7 pb-3"
            style="background-color: rgba(33, 37, 41, 0.8); box-shadow: inset 0px -10px 10px 0px rgba(33, 37, 41, 1);">
            <div class="container">
                <nav class="d-flex justify-content-center">
                    <ol class="breadcrumb" style="background-color: rgba(33, 37, 41, 0.0);">
                        <li class="breadcrumb-item active" aria-current="page" class="text-body"><a href="/"
                                class="text-body">Inicio</a>
                        </li>
                        <li class="breadcrumb-item active text-body" aria-current="page"><a href="#"
                                class="text-white">{{ $videogame->name }}</a></li>
                    </ol>
                </nav>
                <h1 class="text-white text-center">
                    {{ $videogame->name }}
                </h1>
                <h5 class="text-center">
                    @php
                        $countPS = 0;
                        $countXB = 0;

                        if ($videogame->platforms) {
                            foreach ($videogame->platforms as $platform) {
                                switch ($platform->platform->id) {
                                    case 4:
                                        echo "<i class='fa-brands fa-windows text-white pe-2'></i>";
                                        break;
                                    case 187:
                                    case 18:
                                    case 16:
                                        echo $countPS == 0 ? '<i class="fa-brands fa-playstation text-white pe-2"></i>' : '';
                                        $countPS++;
                                        break;
                                    case 186:
                                    case 14:
                                    case 1:
                                        echo $countXB == 0 ? '<i class="fa-brands fa-xbox text-white pe-2"></i>' : '';
                                        $countXB++;
                                        break;
                                }
                            }
                        }
                    @endphp
                </h5>
                <h6 class="text-center text-white">
                    {{-- TODO: mover este codigo fuera de la vista --}}
                    @php
                        $newDate = date('d M, Y', strtotime($videogame->released));
                    @endphp
                    {{ $newDate }}
                </h6>
            </div>
        </div>
    </div>
    {{-- --}}
    {{-- CONTAINER --}}
    <div class="container">
        <div class="d-flex flex-wrap">
            {{-- CARRUSEL --}}
            <section class="col-12 col-md-6">
                @if (isset($screenshots) && count($screenshots) >= 3)
                    <div id="screenshotsCarousel" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#screenshotsCarousel" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#screenshotsCarousel" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#screenshotsCarousel" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner border-radius-lg">
                            <div class="carousel-item active">
                                <img @foreach (array_slice($screenshots, 0) as $screenshot)
                                src="{{ $screenshot->image }}" @endforeach
                                    class="d-block w-100 border-radius-lg" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img @foreach (array_slice($screenshots, 1) as $screenshot)
                                src="{{ $screenshot->image }}" @endforeach
                                    class="d-block w-100 border-radius-lg" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img @foreach (array_slice($screenshots, 2) as $screenshot)
                                src="{{ $screenshot->image }}" @endforeach
                                    class="d-block w-100 border-radius-lg" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#screenshotsCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#screenshotsCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @else
                    <div>
                        <img src="{{ $videogame->background_image }}" alt="" class="img-fluid">
                    </div>
                @endif
                {{--  --}}
            </section>
            <section class="col-12 col-md-6 ps-md-4">
                {{-- Action buttons --}}
                <article class="mt-2 d-flex">
                    <div class="col-6 col-md-4 px-0 pe-2">
                        @isset($user)
                            @if ($addedToLibrary)
                                <button class="btn btn-secondary text-white w-100 px-2"
                                    wire:click="addToLibrary('{{ $videogame->name }}', '{{ $videogame->slug }}')">
                                    <i class="fa-solid fa-check text-lg"></i> <br> En tu biblioteca
                                </button>
                            @else
                                <button class="btn bg-gray-800 text-white w-100 px-2"
                                    wire:click="addToLibrary('{{ $videogame->name }}', '{{ $videogame->slug }}')">
                                    <i class="fa-solid fa-book text-lg"></i> <br> Añadir a biblioteca
                                </button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn bg-gray-800 text-white w-100 px-2">
                                <i class="fa-solid fa-book text-lg"></i> <br> Añadir a biblioteca
                            </a>
                        @endisset
                    </div>
                    <div class="col-6 col-md-4 px-0 ps-2 ps-md-0">
                        @isset($user)
                            @if ($addedToTracking)
                                {{-- @if ($ug->title == $videogame->name) --}}
                                <button class="btn btn-secondary text-white w-100 px-2"
                                    wire:click="addToTracking('{{ $videogame->name }}', '{{ $videogame->slug }}')">
                                    <i class="fa-solid fa-check text-lg"></i> <br> Siguiendo
                                </button>
                            @else
                                <button class="btn bg-gray-800 text-white w-100 px-2"
                                    wire:click="addToTracking('{{ $videogame->name }}', '{{ $videogame->slug }}')">
                                    <i class="fa-solid fa-bookmark text-lg"></i> <br> Añadir a seguimiento
                                </button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn bg-gray-800 text-white w-100 px-2">
                                <i class="fa-solid fa-bookmark text-lg"></i> <br> Añadir a seguimiento
                            </a>
                        @endisset
                    </div>
                </article>
                {{--  --}}
                <article class="mt-4 d-none d-md-block">
                    <h5>Dónde comprar</h5>
                    @isset($stores)
                        @foreach ($gameStores as $gStore)
                            @foreach ($stores as $store)
                                @if ($store->id == $gStore->store_id)
                                    <a href="{{ $gStore->url }}" target="_blank"
                                        class="btn btn-primary bg-gray-800 text-body">
                                        {{ $store->name }}
                                    </a>
                                @endif
                            @endforeach
                        @endforeach
                    @else
                        <p>Las tiendas no están disponibles en este momento</p>
                    @endisset
                </article>
            </section>
        </div>
        {{-- Game info --}}
        <section class="d-flex mt-4">
            <article class="col-6">
                <h6 class="text-white">Plataformas</h6>
                <p>
                    @foreach ($videogame->platforms as $platform)
                        {{ $platform->platform->name }},
                    @endforeach
                </p>
            </article>
            <article class="col-6 ps-2">
                <h6 class="text-white">Puntuación</h6>
                <p class="text-center border border-primary border-radius-md text-primary text-bold w-25 w-md-6">
                    {{ $videogame->metacritic ?? 'N/A' }}
                </p>
            </article>
        </section>
        <section class="d-flex">
            <article class="col-6">
                <h6 class="text-white">Género</h6>
                <p>
                    @foreach ($videogame->genres as $genre)
                        {{ $genre->name }},
                    @endforeach
                </p>
            </article>
            <article class="col-6 ps-2">
                <h6 class="text-white">Distribuidora</h6>
                <p>
                    @foreach ($videogame->publishers as $publisher)
                        {{ $publisher->name ?? 'N/A' }}
                    @endforeach
                </p>
            </article>
        </section>
        <section class="d-flex">
            <article class="col-6">
                <h6 class="text-white">Desarrolladora</h6>
                <p>
                    @foreach ($videogame->developers as $developer)
                        {{ $developer->name ?? 'N/A' }},
                    @endforeach
                </p>
            </article>
            <article class="col-6 ps-2">
                <h6 class="text-white">PEGI</h6>
                <p>
                    {{ $videogame->esrb_rating->name ?? 'N/A' }}
                </p>
            </article>
        </section>
        <section>
            <article>
                <h6 class="text-white">Página web</h6>
                <a href="{{ $videogame->website }}" target="_blank">
                    {{ $videogame->website ?? 'N/A' }}
                </a>
            </article>
            {{-- <article class="col-6">

            </article> --}}
        </section>
        {{--  --}}
        {{-- PC REQUIREMENTS --}}
        <section class="py-4">
            <h6 class="text-white">Requisitos para PC </h6>
            <div>
                @isset($videogame->platforms)
                    @foreach ($videogame->platforms as $plat)
                        @if (!empty($plat->requirements) && isset($plat->requirements->minimum) && isset($plat->requirements->recommended))
                            <p>
                                {!! nl2br($plat->requirements->minimum) !!}
                            </p>
                            <p>
                                {!! nl2br($plat->requirements->recommended) !!}
                            </p>
                            @php
                                break;
                            @endphp
                        @else
                            <p>Los requisitos no están disponibles</p>
                            @php
                                break;
                            @endphp
                        @endif
                    @endforeach
                @endisset
            </div>
        </section>
        {{--  --}}
        {{-- GAME DESCRIPTION --}}
        <section class="py-4">
            <h6 class="text-white">Descripción</h6>
            <div class="text-truncate" id="gameDescription">
                <p>
                    {!! $videogame->description ??
                        // Str::substr($videogame->description, 0, (strlen($videogame->description) - strlen($videogame->description) / 2))."..."
                        'No hay descripción disponible' !!}
                </p>
            </div>
            <a class="badge bg-gray-800 text-body" id="showDescription">Leer más</a>
        </section>
        {{--  --}}
        {{-- GAME DLCs --}}
        <section class="row row-wrap py-4">
            <h6 class="text-white mb-4">DLCs y ediciones</h6>
            @if (isset($videogame->additions_count) && $videogame->additions_count > 0)
                @foreach ($additions as $addition)
                    <article class="mb-4 col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="card bg-gray-800 d-md-none">
                            <div class="row g-0">
                                <div class="col-4 d-flex align-items-center">
                                    <img src="{{ $addition->background_image }}" alt=""
                                        class="w-100 border-radius-top-start-lg border-radius-bottom-start-lg">
                                </div>
                                <div class="col-8">
                                    <div class="card-body px-4 py-2 row">
                                        <h6 class="text-white text-start">{{ $addition->name }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-gray-800 d-none d-md-block">
                            <div class="">
                                <img src="{{ $addition->background_image }}" alt=""
                                    class="w-100 border-radius-top-end-sm-lg border-radius-top-start-sm-lg">
                            </div>
                            <div class="card-body px-4 py-2 row">
                                <div class="row">
                                    <h4 class="col-9 card-title d-block text-white">
                                        {{ $addition->name }}
                                    </h4>
                                    <div class="col-3 px-0 d-flex justify-content-end align-items-baseline">
                                        <p
                                            class="text-center border border-primary border-radius-md text-primary text-bold
                                            w-50 w-md-50 w-lg-50">
                                            {{ $addition->metacritic ?? 'N/A' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            @else
                <p>Este juego no tiene expansiones ni ediciones especiales</p>
            @endif
        </section>
        {{--  --}}
        {{-- GAME TAGS --}}
        <section class="py-4">
            <h6 class="text-white">Etiquetas</h6>
            <p>
                @if (count($videogame->tags))
                    @foreach ($videogame->tags as $tag)
                        {{ $tag->name }},
                    @endforeach
                @else
                    <p>No hay etiquetas para este juego</p>
                @endif
            </p>
        </section>
        {{--  --}}
        {{-- GAME TROPHIES --}}
        <section class="py-4">
            <div class="d-flex mb-4">
                <div class="flex-grow-1">
                    <h6 class="text-white">Trofeos de {{ $videogame->name }}</h6>
                </div>
                <div>
                    <i class="fa-solid fa-trophy"></i> {{ $videogame->achievements_count ?? '0' }} Trofeos
                </div>
            </div>
            @isset($achievements)
                @foreach ($achievements as $achievement)
                    <div class="card bg-gray-900 ps-2 my-2 w-md-70 mx-auto">
                        <div class="row g-0">
                            <div class="col-3 col-md-2 d-flex align-items-center">
                                <div class="flex-grow-1">
                                    @isset($achievement->image)
                                        <img src="{{ $achievement->image }}" alt=""
                                            class="img-fluid w-90 w-sm-90 w-md-90 border-radius-lg p-0">
                                    @else
                                        <div class="btn bg-gray-800 p-3">
                                            <i class="fa-solid fa-trophy text-2xl"></i>
                                        </div>
                                    @endisset
                                </div>
                            </div>
                            <div class="col-9 col-md-10">
                                <div class="card-body ps-0 pe-2 py-2">
                                    <h6 class="text-white text-start">{{ $achievement->name }}</h6>
                                    <p>{{ $achievement->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="my-4 text-center">
                    <button class="btn btn-primary bg-gray-800 w-100 w-md-30">
                        Ver todos
                    </button>
                </div>
            @else
                <p>Los trofeos no están diponibles en este momento</p>
            @endisset
        </section>
        {{--  --}}
    </div>
    {{-- REVIEWS HEADER --}}
    <div class="mb-4 mt-5"
        style="background-image: url('{{ $videogame->background_image }}'); background-position: top;">
        <div class="pt-5 pb-3"
            style="background-color: rgba(33, 37, 41, 0.8);
            box-shadow: inset 0px 10px 10px 0px rgba(33, 37, 41, 1), inset 0px -10px 10px 0px rgba(33, 37, 41, 1);">
            <div class="container">
                <h1 class="text-white text-center">
                    {{ $videogame->name }} - RESEÑAS
                </h1>
                <div class="input-group w-md-70 mx-auto">
                    <span class="input-group-text text-white mt-4 mb-2 border-dark"
                        style="background-color: rgba(52, 58, 64, 0.7);">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </span>
                    <input type="search" wire:model.debounce.500ms="searchReview" placeholder="Buscar..."
                        class="form-control mt-4 mb-2 text-white" style="background-color: rgba(52, 58, 64, 0.7);">
                </div>
            </div>
        </div>
    </div>
    {{-- --}}
    <div class="container">
        {{-- REVIEWS --}}
        <section class="mb-4">
            <div class="card bg-gray-800 w-md-60 mx-auto">
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
                            {{-- <img src="{{ Auth::user()->avatar }}" alt="" class="rounded-circle w-70"> --}}
                        </div>
                        <div class="col-6" style="text-align: left;">
                            <p class="my-0">Antoñito</p>
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
                            class="form-control bg-gray-900 text-white" placeholder="Contestar..." disabled>
                    </div>
                </div>
            </div>
        </section>
        {{--  --}}
    </div>

    <script>
        document.getElementById('showDescription').addEventListener('click', (e) => {
            document.getElementById('gameDescription').classList.toggle('text-truncate');
            e.target.innerHTML = (e.target.textContent == "Leer más") ? "Leer menos" : "Leer más";
        });
    </script>

</div>
