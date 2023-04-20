<div>
    <div class="mb-5">
        <h4 class="text-white">Lista de seguimiento</h4>
        <p>Se enviarán notificaciones de todos los juegos guardados en esta lista</p>
    </div>
    @if (count($user->videogames))
        @foreach ($user->videogames as $trackedGame)
            @if ($trackedGame->followed)
                <div class="mb-4">
                    <div class="card bg-gray-800">
                        <div class="row g-0">
                            <div class="col-4">
                                <img src="/img/videogames/BF1.jpg" alt=""
                                    class="img-fluid border-radius-top-start-lg border-radius-bottom-start-lg">
                            </div>
                            <div class="col-8 d-flex">
                                <div class="card-body px-4 py-2 row flex-grow-1">
                                    <h6 class="text-white text-start">{{ $trackedGame->title }}</h6>
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
            @else
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
            @endif
        @endforeach
    @else
        <p>
            @if ($user->id == Auth::user()->id)
                Aún no tienes juegos juegos añadidos
            @else
                <b>{{ $user->username }}</b> aun no tiene juegos añadidos
            @endif
        </p>
    @endif

</div>
