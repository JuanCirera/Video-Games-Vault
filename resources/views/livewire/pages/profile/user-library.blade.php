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
                    @foreach ($user->videogames()->wherePivot('category', 'completado')->get() as $finishedGame)
                        <div class="col-md-4 px-md-2">
                            <div class="card bg-gray-800">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="/img/videogames/BF1.jpg" alt=""
                                            class="img-fluid border-radius-top-start-lg border-radius-bottom-start-lg">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body px-4 py-2 row">
                                            <h6 class="text-white text-start">{{ $finishedGame->title }}</h6>
                                            <div class="mt-4 text-start">
                                                <label for="categories" class="text-white px-0">Cambiar
                                                    categoría</label>
                                                <select name="categories" id="categories"
                                                    class="form-control bg-gray-700 text-white" wire:model="category">
                                                    @foreach ($categories as $cat)
                                                        <option value="{{ $cat->name }}"
                                                            @selected($finishedGame->categories[0]->name == $cat->name)>
                                                            {{ $cat->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
            <div class="mb-4 d-md-flex flex-md-wrap">
                @if (count(
                        $user->videogames()->wherePivot('category', 'jugando')->get()))
                    @foreach ($user->videogames()->wherePivot('category', 'jugando')->get() as $playingGame)
                        <div class="col-md-4 px-md-2">
                            <div class="card bg-gray-800">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="/img/videogames/BF1.jpg" alt=""
                                            class="img-fluid border-radius-top-start-lg border-radius-bottom-start-lg">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body px-4 py-2 row">
                                            <h6 class="text-white text-start">{{ $playingGame->title }}</h6>
                                            <div class="mt-4 text-start">
                                                <label for="categories" class="text-white px-0">Cambiar
                                                    categoría</label>
                                                <select name="categories" id="categories"
                                                    class="form-control bg-gray-700 text-white">
                                                    @foreach ($categories as $cat)
                                                        <option value="{{ $cat->name }}"
                                                            @selected($playingGame->categories[0]->name == $cat->name)>
                                                            {{ $cat->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-white mt-2 col-md-12">
                        ¡Relájate y juega un poco!
                    </p>
                @endif
            </div>
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
                    @foreach ($user->videogames()->wherePivot('category', 'pendiente')->get() as $waitingGame)
                        <div class="col-md-4 px-md-2">
                            <div class="card bg-gray-800">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="/img/videogames/BF1.jpg" alt=""
                                            class="img-fluid border-radius-top-start-lg border-radius-bottom-start-lg">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body px-4 py-2 row">
                                            <h6 class="text-white text-start">{{ $waitingGame->title }}</h6>
                                            <div class="mt-4 text-start">
                                                <label for="categories" class="text-white px-0">Cambiar
                                                    categoría</label>
                                                <select name="categories" id="categories"
                                                    class="form-control bg-gray-700 text-white">
                                                    @foreach ($categories as $cat)
                                                        <option value="{{ $cat->name }}"
                                                            @selected($waitingGame->categories[0]->name == $cat->name)>
                                                            {{ $cat->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
            <div class="mb-4 d-md-flex flex-md-wrap">
                @if (count($user->videogames()->wherePivot('category', 'probado')->get()))
                    @foreach ($user->videogames()->wherePivot('category', 'probado')->get() as $testedGame)
                        <div class="col-md-4 px-md-2">
                            <div class="card bg-gray-800">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="/img/videogames/BF1.jpg" alt=""
                                            class="img-fluid border-radius-top-start-lg border-radius-bottom-start-lg">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body px-4 py-2 row">
                                            <h6 class="text-white text-start">{{ $testedGame->title }}</h6>
                                            <div class="mt-4 text-start">
                                                <label for="categories" class="text-white px-0">Cambiar
                                                    categoría</label>
                                                <select name="categories" id="categories"
                                                    class="form-control bg-gray-700 text-white">
                                                    @foreach ($categories as $cat)
                                                        <option value="{{ $cat->name }}"
                                                            @selected($testedGame->categories[0]->name == $cat->name)>
                                                            {{ $cat->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                @if (count(
                        $user->videogames()->wherePivot('category', 'sin categoria')->get()))
                    @foreach ($user->videogames()->wherePivot('category', 'sin categoria')->get() as $noCatGame)
                        <article class="col-md-4 px-md-2">
                            <div class="card bg-gray-800 mb-4">
                                <div class="row g-0 d-md-none">
                                    <div class="col-4">
                                        <img src="{{ $noCatGame->image }}" alt=""
                                            class="img-fluid border-radius-top-start-lg border-radius-bottom-end-lg">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body px-4 py-2 row">
                                            <h6 class="text-white text-start">{{ $noCatGame->title }}</h6>
                                            <div class="mt-4 text-start">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-none d-md-block">
                                    <div>
                                        <img src="{{ $noCatGame->image }}" alt=""
                                            class="img-fluid border-radius-top-start-md-lg border-radius-top-end-md-lg">
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <h4 class="card-title d-block text-white text-start px-0">
                                                {{ $noCatGame->title }}
                                            </h4>
                                            {{-- <div class="col-3 ps-5 pe-0">
                                                <p
                                                    class="text-center border border-primary border-radius-md text-primary text-bold">
                                                    {{ $item->metacritic ?? 'N/A' }}
                                                </p>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer pt-2 pb-2">
                                    <select name="categories" id="categories"
                                        class="form-control bg-gray-700 text-white w-100">
                                        @foreach ($categories as $cat)
                                            {{-- @selected($noCatGame->categories[0]->name == $cat->name) --}}
                                            <option value="{{ $cat->id }}" @selected($noCatGame) wire:click="update('{{ $noCatGame->id }}')">
                                                {{-- wire:click="update('{{ $noCatGame->id }}')" --}}
                                                {{ ucfirst($cat->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </article>
                    @endforeach
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

    <script>
        // let selected=document.getElementById("categories").addEventListener("click", (e) => (
        //     @this.update(e.target.value)
        // ));
        // let selected = document.getElementById("categories").addEventListener("click", (e) => (

        //     console.log(e.target.value)
        // ));
    </script>
</div>
