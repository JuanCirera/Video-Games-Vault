<div>
    <div class="mb-4 d-md-flex flex-md-wrap">
        @foreach ($user->videogames()->wherePivot('category', $category)->get() as $i => $categorizedGame)
            <article class="col-12 col-md-6 col-lg-4 px-md-2">
                <div class="card bg-gray-800 mb-4">
                    {{-- MOBILE --}}
                    <div class="row g-0 d-md-none">
                        <div class="col-4">
                            <img src="{{ $categorizedGame->image }}" alt=""
                                class="img-fluid border-radius-top-start-lg border-radius-bottom-end-lg">
                        </div>
                        <div class="col-8">
                            <div class="card-body px-4 py-2 row">
                                <h6 class="text-white text-start">{{ $categorizedGame->title }}</h6>
                                <div class="mt-4 text-start">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- DESKTOP --}}
                    <div class="d-none d-md-block">
                        <div>
                            <img src="{{ $categorizedGame->image }}" alt=""
                                class="img-fluid border-radius-top-start-md-lg border-radius-top-end-md-lg">
                        </div>
                        <div class="card-body">
                            <div>
                                <h4 class="card-title d-block text-white text-start px-0">
                                    <a href="{{ route('game.show', $categorizedGame->slug) }}"
                                        class="link-white">{{ $categorizedGame->title }}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->id == $user->id)
                        <div class="card-footer pt-2 pb-2 me-md-auto">
                            <div class="dropdown">
                                <button class="btn bg-gradient-primary dropdown-toggle w-100 w-md-auto" type="button"
                                    id="changeCategory" data-bs-toggle="dropdown" aria-expanded="false">
                                    Mover a...
                                </button>
                                <ul class="dropdown-menu w-100 w-md-auto text-center" aria-labelledby="changeCategory">
                                    @foreach ($categories as $cat)
                                        <li>
                                            <a class="dropdown-item"
                                                wire:click="update('{{ $categorizedGame->id }}','{{ $cat->id }}')">
                                                {{ ucfirst($cat->name) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </article>
        @endforeach
    </div>
</div>
