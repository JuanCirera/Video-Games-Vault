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
        <div class="collapse" id="finishedGames">
            @foreach ($user->videogames as $finishedGame)
                @if (count($finishedGame->categories) && $finishedGame->categories[0]->name == 'en espera')
                    <div class="mb-4">
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
                                                    <option value="{{ $cat->name }}" @selected($finishedGame->categories[0]->name == $cat->name)>
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
                @else
                    <p class="text-white mt-2">
                        ¿Te da pereza terminar los juegos?
                    </p>
                    @php
                        break;
                    @endphp
                @endif
            @endforeach
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
        <div class="collapse" id="currentGames">
            @foreach ($user->videogames as $playingGame)
                @if (count($playingGame->categories) && $playingGame->categories[0]->name == 'en espera')
                    <div class="mb-4">
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
                                                    <option value="{{ $cat->name }}" @selected($playingGame->categories[0]->name == $cat->name)>
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
                @else
                    <p class="text-white mt-2">
                        ¡Relájate y juega un poco!
                    </p>
                    @php
                        break;
                    @endphp
                @endif
            @endforeach
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
        <div class="collapse" id="waitingGames">
            @foreach ($user->videogames as $waitingGame)
                @if (count($waitingGame->categories) && $waitingGame->categories[0]->name == 'en espera')
                    <div class="mb-4">
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
                                                    <option value="{{ $cat->name }}" @selected($waitingGame->categories[0]->name == $cat->name)>
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
                @else
                    <p class="text-white mt-2">
                        ¡Que envidia, parece que tienes tiempo para jugar a todo!
                    </p>
                    @php
                        break;
                    @endphp
                @endif
            @endforeach
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
        <div class="collapse" id="testedGames">
            @foreach ($user->videogames as $testedGame)
                @if (count($testedGame->categories) && $testedGame->categories[0]->name == 'probados')
                    <div class="mb-4">
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
                                                    <option value="{{ $cat->name }}" @selected($testedGame->categories[0]->name == $cat->name)>
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
                @else
                    <p class="text-white mt-2">
                        ¡Vaya, parece que no te gusta probar juegos nuevos!
                    </p>
                    @php
                        break;
                    @endphp
                @endif
            @endforeach
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
        <div class="collapse" id="uncategorizedGames">
            @foreach ($user->videogames as $noCatGame)
                @if (count($noCatGame->categories))
                    <div class="mb-4">
                        <div class="card bg-gray-800">
                            <div class="row g-0">
                                <div class="col-4">
                                    <img src="/img/videogames/BF1.jpg" alt=""
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
                            <div class="card-footer pt-2 pb-2">
                                {{-- <label for="categories" class="text-white px-0">Cambiar
                                categoría</label> --}}
                                <select name="categories" id="categories"
                                    class="form-control bg-gray-700 text-white w-100">
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->name }}" @selected($noCatGame->categories[0]->name == $cat->name)>
                                            {{ ucfirst($cat->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="text-white mt-2">
                        ¡Buen trabajo, no tienes juegos sin categoría!
                    </p>
                    @php
                        break;
                    @endphp
                @endif
            @endforeach
        </div>
    @else
        <p class="text-white">
            @if ($user->id==Auth::user()->id)
                Aún no tienes juegos en tu biblioteca
            @else
                <b>{{$user->username}}</b> aun no tiene juegos añadidos
            @endif
        </p>
    @endif
</div>
