{{-- NOTE: este div NO tocarlo ni poner nada a este nivel --}}
<div>
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
            <div class="input-group">
                <span class="input-group-text text-white mt-4 mb-2 border-dark" style="background-color: rgba(52, 58, 64, 0.7);">
                    <i class="fas fa-search" aria-hidden="true"></i>
                </span>
                <input type="search" wire:model.debounce.500ms="search" placeholder="Buscar..."
                    class="form-control mt-4 mb-2 text-white" style="background-color: rgba(52, 58, 64, 0.7);">
            </div>
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
            <div class="card bg-gray-800 mx-auto mb-4" wire:key="{{ $item->id }}">
                <div class="card-header p-0 bg-gray-800">
                    <img src="{{ $item->background_image }}" class="img-fluid border-radius-lg"
                        style="border-bottom-right-radius: 0;border-bottom-left-radius: 0">
                </div>

                <div class="card-body pt-2">
                    <div class="row">
                        <h4 class="col-9 card-title d-block text-white">
                            {{ $item->name }}
                        </h4>
                        <div class="col-3 ps-5 pe-0">
                            <p class="text-center border border-primary border-radius-md text-primary text-bold">
                                {{ $item->metacritic ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex gap-2">

                        @php
                            $countPS = 0;
                            $countXB = 0;

                            if ($item->platforms) {
                                foreach ($item->platforms as $platform) {
                                    switch ($platform->platform->id) {
                                        case 4:
                                            echo "<i class='fa-brands fa-windows text-white'></i>";
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
                    <div class="mt-4">
                        <button class="btn btn-secondary bg-gray-800">
                            <i class="fas fa-plus"></i> Seguir
                        </button>

                        <button class="btn btn-secondary bg-gray-800">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="my-4">
            <button class="btn btn-primary w-100" wire:click="">
                Ver más
            </button>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
</div>
