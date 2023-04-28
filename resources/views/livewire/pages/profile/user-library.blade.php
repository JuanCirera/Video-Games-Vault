<div>
    <div class="mb-5">
        <h4 class="text-white">Biblioteca</h4>
        <p>Todos tus juegos ordenados por categorías</p>
    </div>
    @if (count($user->videogames))
        {{-- FINISHED GAMES --}}
        <div class="btn btn-collapse bg-gray-800 w-100 text-white d-flex " type="button" data-bs-toggle="collapse"
            data-bs-target="#finishedGames" aria-expanded="false" aria-controls="collapseExample">
            <div class="flex-grow-1">
                <i class="fas fa-check"></i> Completados
            </div>
            <div class="">
                <i class="fas fa-chevron-down text-secondary"></i>
            </div>
        </div>
        <div class="collapse" id="finishedGames" wire:ignore>
            <div class="mb-4 d-md-flex flex-md-wrap">
                @if (count(
                        $user->videogames()->wherePivot('category', 'completado')->get()))
                    @livewire('show-user-games-by-category', ['user' => $user, 'category' => "completado", "categories" => $categories])
                @else
                    <p class="text-white mt-2 col-md-12">
                        ¿Te da pereza terminar los juegos?
                    </p>
                @endif
            </div>
        </div>
        {{-- PLAYING NOW --}}
        <div class="btn btn-collapse bg-gray-800 text-white w-100 d-flex" type="button" data-bs-toggle="collapse"
            data-bs-target="#currentGames" aria-expanded="false" aria-controls="collapseExample">
            <div class="flex-grow-1">
                <i class="fas fa-gamepad"></i> Jugando actualmente
            </div>
            <div class="">
                <i class="fas fa-chevron-down text-secondary"></i>
            </div>
        </div>
        <div class="collapse" id="currentGames" wire:ignore>
            {{-- <div class="mb-4 d-flex"> --}}
                @if (count(
                        $user->videogames()->wherePivot('category', 'jugando')->get()))
                    @livewire('show-user-games-by-category', ['user' => $user, 'category' => "jugando", "categories" => $categories])
                @else
                    <p class="text-white mt-2 col-md-12">
                        ¡Relájate y juega un poco!
                    </p>
                @endif
            {{-- </div> --}}
        </div>
        {{-- WAITING GAMES --}}
        <div class="btn btn-collapse bg-gray-800 text-white w-100 d-flex" type="button" data-bs-toggle="collapse"
            data-bs-target="#waitingGames" aria-expanded="false" aria-controls="collapseExample">
            <div class="flex-grow-1">
                <i class="fa-solid fa-clock"></i> Pendientes
            </div>
            <div class="">
                <i class="fas fa-chevron-down text-secondary"></i>
            </div>
        </div>
        <div class="collapse" id="waitingGames" wire:ignore>
            <div class="mb-4 d-md-flex flex-md-wrap">
                @if (count(
                        $user->videogames()->wherePivot('category', 'pendiente')->get()))
                    @livewire('show-user-games-by-category', ['user' => $user, 'category' => "pendiente", "categories" => $categories])
                @else
                    <p class="text-white mt-2 col-md-12">
                        ¡Que envidia, parece que tienes tiempo para jugar a todo!
                    </p>
                @endif
            </div>
        </div>
        {{-- TESTED GAMES --}}
        <div class="btn btn-collapse bg-gray-800 text-white w-100 d-flex" type="button" data-bs-toggle="collapse"
            data-bs-target="#testedGames" aria-expanded="false" aria-controls="collapseExample">
            <div class="flex-grow-1">
                <i class="fa-solid fa-flask"></i> Probados
            </div>
            <div class="">
                <i class="fas fa-chevron-down text-secondary"></i>
            </div>
        </div>
        <div class="collapse" id="testedGames" wire:ignore>
            <div class="mb-4 d-md-flex">
                @if (count($user->videogames()->wherePivot('category', 'probado')->get()))
                    @livewire('show-user-games-by-category', ['user' => $user, 'category' => "probado", "categories" => $categories])
                @else
                    <p class="text-white mt-2 col-md-12">
                        ¡Vaya, parece que no te gusta probar juegos nuevos!
                    </p>
                @endif
            </div>
        </div>
        {{-- NO CATEGORY --}}
        <div class="btn btn-collapse bg-gray-800 text-white w-100 d-flex" type="button" data-bs-toggle="collapse"
            data-bs-target="#uncategorizedGames" aria-expanded="false" aria-controls="collapseExample">
            <div class="flex-grow-1">
                <i class="fa-solid fa-circle-question"></i> Sin categoría
            </div>
            <div class="">
                <i class="fas fa-chevron-down text-secondary"></i>
            </div>
        </div>
        <div class="collapse" id="uncategorizedGames" wire:ignore>
            <div class="mb-4 d-md-flex flex-md-wrap">
                @if (count($user->videogames()->wherePivot('category', 'sin categoria')->get()))
                    @livewire('show-user-games-by-category', ['user' => $user, 'category' => "sin categoria", "categories" => $categories])
                @else
                    <p class="text-white mt-2 col-md-12">
                        ¡Buen trabajo, no tienes juegos sin categoría!
                    </p>
                @endif
            </div>
        </div>
    @else
        <p class="text-white">
            @if ($user->id == Auth::user()->id)
                Aún no tienes juegos en tu biblioteca
            @else
                <b>{{ $user->username }}</b> aun no tiene juegos añadidos
            @endif
        </p>
    @endif

</div>
