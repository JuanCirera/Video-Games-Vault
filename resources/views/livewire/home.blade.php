{{-- NOTE: este div NO tocarlo ni poner nada a este nivel --}}
<div>
    {{-- @dd($games) --}}
    {{-- Welcome and search --}}
    <div class="mb-4" style="background-image: url('{{ $welcome_img }}'); background-position: top;">
        <div class="pt-7 pb-3"
            style="background-color: rgba(33, 37, 41, 0.8); box-shadow: inset 0px -10px 10px 0px rgba(33, 37, 41, 1);">
            <div class="container">
                <h1 class="text-white">
                    ¡Bienvenido jugador!
                </h1>
                <h3 class="text-secondary">
                    Miles de videojuegos
                    por explorar a tu disposición
                </h3>
                <div class="input-group">
                    <span class="input-group-text text-white mt-4 mb-2 border-dark border-radius-2xl"
                        style="background-color: rgba(52, 58, 64, 0.7);">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </span>
                    <input type="search" wire:model.debounce.900ms="search" placeholder="Buscar..."
                        class="form-control mt-4 mb-2 text-white border-radius-2xl"
                        style="background-color: rgba(52, 58, 64, 0.7);">
                </div>
            </div>
        </div>
    </div>
    {{-- --}}
    <div class="container">
        <div class="mb-5">
            <h4 class="text-white">Novedades y más populares</h4>
            <article class="row mt-2 ml-2 mr-2 align-items-center">
                <div class="col-6 col-md-4">
                    <div class="dropdown mt-2">
                        <button class="btn bg-gradient-primary dropdown-toggle w-100 w-md-auto" type="button"
                            id="changeCategory" data-bs-toggle="dropdown" aria-expanded="false">
                            Ordenar por...
                        </button>
                        <ul class="dropdown-menu w-100 w-md-auto">
                            <li>
                                <a class="dropdown-item" wire:click.defer="order()">
                                    Popularidad
                                </a>
                            </li>
                            {{-- TODO: reventada al ordenar --}}
                            {{-- <li>
                                <a class="dropdown-item" wire:click.defer="order('released')">
                                    Fecha lanzamiento
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" wire:click.defer.500ms="order('name')">
                                    Nombre
                                </a>
                            </li> --}}
                            <li>
                                <a class="dropdown-item" wire:click.defer="order('metacritic')">
                                    Nota media
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" wire:click.defer="order('added')">
                                    Últimos añadidos
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-md-4 mx-auto">
                    <div class="spinner-border text-primary my-0" role="status" wire:loading wire:target="order">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </article>
        </div>
        <section class="row">
            @foreach ($games as $item)
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="card bg-gray-800 mx-auto mb-4 min-height-490 max-height-490">
                        <div class="card-header p-0 bg-gray-800">
                            <a href="{{ route('game.show', $item->slug) }}">
                                @isset($item->background_image)
                                    <img src="{{ $item->background_image }}"
                                        class="img-fluid border-radius-lg min-height-250 max-height-250 w-100"
                                        style="border-bottom-right-radius: 0;border-bottom-left-radius: 0; object-fit: cover;">
                                @else
                                    <div class="min-height-250 max-height-250 text-center d-flex align-items-center">
                                        <span class="text-lg text-secondary col-12">
                                            Imagen no disponible <br>
                                            <i class="fa-regular fa-image text-5xl mt-4"></i>
                                        </span>
                                    </div>
                                @endisset
                            </a>
                        </div>

                        <div class="card-body pt-2">
                            <div class="d-flex align-items-center mb-1">
                                <div class="col-10 d-flex gap-2 align-items-center">

                                    @php
                                        $countPS = 0;
                                        $countXB = 0;

                                        if ($item->platforms) {
                                            foreach ($item->platforms as $platform) {
                                                switch ($platform->platform->id) {
                                                    case 4:
                                                        echo "<i class='fa-brands fa-windows text-white'></i>";
                                                        break;
                                                    case 7:
                                                        echo "<i class='bi bi-nintendo-switch text-white'></i>";
                                                        break;
                                                    case 187:
                                                    case 18:
                                                    case 16:
                                                        echo $countPS == 0 ? '<i class="fa-brands fa-playstation text-white"></i>' : '';
                                                        $countPS++;
                                                        break;
                                                    case 186:
                                                    case 14:
                                                    case 1:
                                                        echo $countXB == 0 ? '<i class="fa-brands fa-xbox text-white"></i>' : '';
                                                        $countXB++;
                                                        break;
                                                }
                                            }
                                        }
                                    @endphp

                                </div>

                                <div class="col-2 ps-2 ps-sm-2 ps-md-2 ps-lg-2 p-0 m-0">
                                    <div
                                        class="text-center border border-primary border-radius-md text-primary text-bold m-0">
                                        {{ $item->metacritic ?? 'N/A' }}
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <h4 class="col-12 card-title d-block pe-0">
                                    <a href="{{ route('game.show', $item->slug) }}"
                                        class="link-white">{{ $item->name }}</a>
                                </h4>
                            </div>

                            <div class="mt-4">
                                @isset($user)
                                    @php
                                        $v = $user
                                            ->videogames()
                                            ->where('title', $item->name)
                                            ->first();
                                    @endphp
                                    @if (isset($v) &&
                                            $user->videogames()->wherePivot('videogame_id', $v->id)->pluck('videogame_id')->first())
                                        <button class="btn bg-gray-700 text-primary"
                                            wire:click="addToLibrary('{{ $item->name }}', '{{ $item->slug }}')">
                                            <i class="fa-solid fa-check text-primary"></i> Añadido
                                        </button>
                                    @else
                                        <button class="btn bg-gray-700 text-white"
                                            wire:click="addToLibrary('{{ $item->name }}', '{{ $item->slug }}')">
                                            <i class="fa-solid fa-plus"></i> Añadir
                                        </button>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="btn bg-gray-700 text-white">
                                        <i class="fa-solid fa-plus"></i> Añadir
                                    </a>
                                @endisset

                                @isset($user)
                                    @if (isset($v) &&
                                            $user->videogames()->wherePivot('videogame_id', $v->id)->wherePivot('tracked', 1)->pluck('videogame_id')->first())
                                        <button class="btn bg-gray-700 text-white"
                                            wire:click="addToTracking('{{ $item->name }}', '{{ $item->slug }}')">
                                            <i class="fa-solid fa-bookmark text-primary"></i>
                                        </button>
                                    @else
                                        <button class="btn bg-gray-700 text-white"
                                            wire:click="addToTracking('{{ $item->name }}', '{{ $item->slug }}')">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </button>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="btn bg-gray-700 text-white">
                                        <i class="fa-solid fa-bookmark"></i>
                                    </a>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
        <div class="my-4 text-center">
            <button class="btn btn-primary w-100 w-sm-30 w-md-30" wire:click="loadMore">
                <span wire:loading.remove wire:target="loadMore"><i class="fas fa-eye"></i> Ver más </span>
                <span wire:loading wire:target="loadMore">Cargando...</span>
            </button>
        </div>
    </div>
    @include('layouts.footer')
</div>
