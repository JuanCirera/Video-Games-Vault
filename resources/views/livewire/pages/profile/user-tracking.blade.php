<div>
    <div class="mb-5">
        <h4 class="text-white">Lista de seguimiento</h4>
        <p>Se enviarán notificaciones de todos los juegos guardados en esta lista</p>
    </div>
    @if (count($videogames))
        <section class="d-md-flex">
            @foreach ($videogames as $trackedGame)
                {{-- @if ($trackedGame->followed) --}}
                <div class="mb-4 col-md-4 px-2">
                    <div class="card bg-gray-800">
                        <div class="row g-0 d-md-none">
                            <div class="col-4">
                                <img src="{{ $trackedGame->image }}" alt=""
                                    class="img-fluid border-radius-top-start-lg border-radius-bottom-start-lg">
                            </div>
                            <div class="col-8">
                                <div class="card-body px-4 py-2 row flex-grow-1">
                                    <h5 class="text-white text-start">{{ $trackedGame->title }}</h5>
                                </div>
                                <div>
                                    {{-- TODO: wire:click --}}
                                    <a class="mt-n-10">
                                        <i class="fas fa-bookmark text-primary text-2xl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-none d-md-block">
                            <div class="">
                                <img src="{{ $trackedGame->image }}" alt=""
                                    class="img-fluid border-radius-top-start-md-lg border-radius-top-end-md-lg">
                            </div>
                            <div class="">
                                <div class="card-body px-4 py-2 row flex-grow-1">
                                    <h5 class="text-white text-start">{{ $trackedGame->title }}</h5>
                                    <div class="mt-2">
                                        <button class="btn bg-gray-700 text-white"
                                            wire:click="stopTracking('{{ $trackedGame->id }}')">
                                            <i class="fas fa-bookmark"></i> Dejar de seguir
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @else
                    <div class="mx-auto">
                        <p>
                            @if ($user->id == Auth::user()->id)
                                Aún no tienes juegos juegos en seguimiento
                                @php
                                    break;
                                @endphp
                            @else
                                <b>{{ $user->username }}</b> aun no tiene juegos en seguimiento
                                @php
                                    break;
                                @endphp
                            @endif
                        </p>
                    </div>
                @endif --}}
            @endforeach
        </section>
    @else
        <p>
            @if ($user->id == Auth::user()->id)
                Aún no tienes juegos juegos en seguimiento
            @else
                <b>{{ $user->username }}</b> aun no tiene juegos en seguimiento
            @endif
        </p>
    @endif

</div>
