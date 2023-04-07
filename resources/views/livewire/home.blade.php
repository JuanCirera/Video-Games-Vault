{{-- Welcome and search --}}
<div class="mb-4" style="background-image: url('{{ $welcome_img }}'); background-position: top;">
    <div class="container pt-7 pb-3"
        style="background-color: rgba(33, 37, 41, 0.8); box-shadow: inset 0px -10px 10px 0px rgba(33, 37, 41, 1);">
        <h1 class="text-white">
            ¡Bienvenido jugador!
        </h1>
        <h3 class="text-secondary">
            Miles de videojuegos
            por explorar a tu disposición
        </h3>
        <input type="search" wire:model.debounce.500ms="search" placeholder="Buscar..." class="form-control mt-4 mb-2 text-white"
            style="background-color: rgba(52, 58, 64, 0.7);">
    </div>
</div>
{{-- --}}
<div class="container">
    <div class="mb-5">
        <h4 class="text-white">Novedades y más populares</h4>
        <form class="row mt-2 ml-2 mr-2">
            <div class="col-6">
                <label for="order" class="text-gray">Ordenar por: </label>
                <select class="form-control bg-gray-800 text-white" id="order">
                    <option>Popularidad</option>
                    <option>Fecha lanzamiento</option>
                    <option>Nombre</option>
                    <option>Ultimos añadidos</option>
                    <option>Nota media</option>
                </select>
            </div>
            <div class="col-6">
                <label for="paginate" class="text-gray">Viendo: </label>
                <select class="form-control bg-gray-800 text-white" id="paginate">
                    <option>5</option>
                    <option>10</option>
                    <option>20</option>
                    <option>25</option>
                </select>
            </div>
        </form>
    </div>
    @foreach ($games as $item)
        <div class="card bg-gray-800 mx-auto mb-4">
            <div class="card-header p-0 bg-gray-800">
                <img src="{{ $item->background_image }}" class="img-fluid border-radius-lg"
                    style="border-bottom-right-radius: 0;border-bottom-left-radius: 0">
            </div>

            <div class="card-body pt-2">
                <div class="row">
                    <h4 class="col-10 card-title d-block text-white">
                        {{ $item->name }}
                    </h4>
                    <div class="col-2">
                        <p class="text-center border border-primary border-radius-md text-primary text-bold">
                            {{ $item->metacritic }}
                        </p>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    {{-- Game platforms --}}
                    @php
                        $countPS = 0;
                        $countXB = 0;
                    @endphp

                    @foreach ($item->platforms as $platform)  
                        @switch($platform->platform->id)
                            @case(4)
                                <i class="fa-brands fa-windows text-white"></i>
                            @break

                            @case(187)
                            @case(18)

                            @case(16)
                                @php
                                    echo $countPS == 0 ? '<i class="fa-brands fa-playstation text-white"></i>' : '';
                                    $countPS++;
                                @endphp
                            @break

                            @case(186)
                            @case(14)

                            @case(1)
                                @php
                                    echo $countXB == 0 ? '<i class="fa-brands fa-xbox text-white"></i>' : '';
                                    $countXB++;
                                @endphp
                            @break

                            @default
                        @endswitch
                    @endforeach
                </div>
                <div class="mt-4">
                    <button class="btn btn-secondary">
                        <i class="fas fa-plus"></i> Seguir
                    </button>

                    <button class="btn btn-secondary">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                </div>
            </div>
        </div>
    @endforeach


    {{-- <div class="mt-5">
        {{$api->getVideogames()->links}}
    </div> --}}

</div>
