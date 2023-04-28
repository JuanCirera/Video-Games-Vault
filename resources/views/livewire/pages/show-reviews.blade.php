<div>
    <div class="d-flex w-md-60 mx-auto align-items-center my-4">
        <div class="flex-grow-1 input-group">
            {{-- <span class="input-group-text text-white border-dark border-radius-2xl"
                style="background-color: rgba(52, 58, 64, 0.7);">
                <i class="fas fa-search" aria-hidden="true"></i>
            </span> --}}
            {{-- <input type="search" wire:model.debounce.500ms="searchReview" placeholder="Buscar..."
                class="form-control text-white border-radius-2xl"
                style="background-color: rgba(52, 58, 64, 0.7);"> --}}
            {{-- <select name="" id="">
                <option value="-1">Ordenar por:</option>
                <option value="0">Fecha</option>
            </select> --}}
            <h6>Ordenar por: </h6>
            {{-- <p class="ps-2"> fecha <i class="fa-solid fa-sort"></i></p> --}}
            <ul class="nav">
                <li class="nav-item ms-2 text-secondary cursor-pointer" wire:click="sort('title')">
                    Titulo <i class="fa-solid fa-sort"></i>
                </li>
                <li class="nav-item ms-2 text-secondary cursor-pointer" wire:click="sort('created_at')">
                    Fecha <i class="fa-solid fa-sort"></i>
                </li>
                <li class="nav-item ms-2 text-secondary cursor-pointer" wire:click="sort('rating')">
                    Valoración <i class="fa-solid fa-sort"></i>
                </li>
                <li class="nav-item ms-2 text-secondary cursor-pointer" wire:click="sort('likes')">
                    Votos <i class="fa-solid fa-sort"></i>
                </li>
            </ul>
        </div>
        <div class="ms-2">
            @livewire('create-review', ['game_id' => $videogame->id])
        </div>
    </div>
    @if (count($reviews))
        @foreach ($reviews as $review)
            <section class="mb-4">
                <div class="card w-md-60 mx-auto" style="background-color: rgba(52,58,64, 0.8);">
                    <div class="card-header pb-2 pt-4 d-flex" style="background-color: rgba(0, 0, 0, 0);">
                        <div class="flex-grow-1">
                            <h6 class="text-white text-start my-0">{{ $review->title }}</h6>
                            <p class="text-start text-sm mb-0">{{ date('d-m-Y, H:i', strtotime($review->created_at)) }}</p>
                        </div>
                        <div>
                            <div class="text-white">
                                @if ($review->rating)
                                    Recomendado <i class="fa-solid fa-thumbs-up text-success text-3xl ms-2"></i>
                                @else
                                    No recomendado <i class="fa-solid fa-thumbs-down text-danger text-3xl ms-2"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 py-2 text-white">
                        <p>{{ $review->body }}</p>
                    </div>
                    <div class="card-footer pt-2">
                        <div class="d-flex align-items-center">
                            <div class="col-2 col-md-1">
                                @if (isset($user) && Str::contains($user->avatar, 'ui-avatars'))
                                    <img src="{{ $review->user()->where('id', $review->user_id)->first()->avatar }}"
                                        alt="" class="rounded-circle w-70 w-md-80">
                                @else
                                    <img src="{{ Storage::url($review->user()->where('id', $review->user_id)->first()->avatar) }}"
                                        alt="" class="rounded-circle w-70 w-md-35">
                                @endif
                            </div>
                            <div class="col-6 col-md-7" style="text-align: left;">
                                <p class="my-0">
                                    {{ $review->user()->where('id', $review->user_id)->first()->username }}
                                </p>
                            </div>
                            <div class="col-2" style="text-align: right;">
                                {{ $review->likes }} <i class="fa-solid fa-thumbs-up"></i>
                            </div>
                            <div class="col-2">
                                {{ $review->dislikes }} <i class="fa-solid fa-thumbs-down"></i>
                            </div>
                        </div>
                        {{-- <hr> --}}
                        {{-- <div class="mt-2">
                                <input type="text" name="reply" id="replyReview"
                                    class="form-control bg-gray-900 text-white" placeholder="Contestar..." disabled>
                            </div> --}}
                    </div>
                </div>
            </section>
        @endforeach
    @else
        <h6 class="text-center">Este juego aún no tiene reseñas, sé el primero en dar tu opinión pulsando
            sobre el botón escribir</h6>
    @endif
</div>
