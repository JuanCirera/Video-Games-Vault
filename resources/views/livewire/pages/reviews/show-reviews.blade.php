<div>
    <div class="d-flex flex-wrap flex-lg-nowrap w-md-60 mx-auto align-items-center my-4">
        <div class="col-12 flex-lg-grow-1 input-group">
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
        <div class="col-12 col-lg-0 ms-lg-2 mt-4 mt-lg-0 text-center">
            @if (isset($user) && count($user->reviews()->where("videogame_id",$videogame->id)->get()))
                <button class="btn btn-primary bg-gradient-primary btn-round my-0 text-nowrap" data-bs-toggle="modal"
                data-bs-target="#create-modal" disabled>
                Ya has escrito una reseña
                </button>
            @else
                @livewire('create-review', ['game_id' => $videogame->id])
            @endif
        </div>
    </div>
    @if (count($reviews))
        @foreach ($reviews as $review)
            <section class="mb-4">
                <div class="card w-lg-60 mx-auto" style="background-color: rgba(52,58,64, 0.8);">
                    <div class="card-header pb-2 pt-4 d-flex flex-wrap flex-md-nowrap" style="background-color: rgba(0, 0, 0, 0);">
                        <div class="flex-grow-1">
                            <h6 class="text-white text-start my-0">{{ $review->title }}</h6>
                            <p class="text-start text-sm mb-0">{{ date('d-m-Y, H:i', strtotime($review->created_at)) }}</p>
                        </div>
                        <div>
                            <div class="text-white">
                                @if ($review->rating)
                                    <span class="text-success">Recomendado</span> <i class="fa-solid fa-thumbs-up text-success text-3xl ms-2"></i>
                                @else
                                    <span class="text-danger">No recomendado</span> <i class="fa-solid fa-thumbs-down text-danger text-3xl ms-2"></i>
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
                                @if (Str::contains($review->user()->where('id', $review->user_id)->first()->avatar, 'ui-avatars') || Str::contains($review->user()->where('id', $review->user_id)->first()->avatar, 'lh3.googleusercontent'))
                                    <img src="{{ $review->user()->where('id', $review->user_id)->first()->avatar }}"
                                        alt="" class="rounded-circle" width="50" height="50" style="object-fit: cover;">
                                @else
                                    <img src="{{ Storage::url($review->user()->where('id', $review->user_id)->first()->avatar) }}"
                                        alt="" class="rounded-circle" width="50" height="50" style="object-fit: cover;">
                                @endif
                            </div>
                            <div class="col-6 col-md-7 ps-2" style="text-align: left;">
                                <p class="my-0 text-secondary">
                                    {{ $review->user()->where('id', $review->user_id)->first()->username }}
                                </p>
                            </div>
                            <div class="col-2 px-2" style="text-align: right;">
                                <a id="like"
                                @if (isset($user) && count($user->reviewsLiked()->get()) && count($user->reviewsLiked()->wherePivot("review_id",$review->id)->get()))
                                    class="cursor-pointer text-primary"
                                @else
                                    class="cursor-pointer text-secondary"
                                @endif
                                    wire:click="like({{$review->id}})">
                                    <i class="fa-solid fa-thumbs-up"></i> {{ $review->likes }}
                                </a>
                            </div>
                            <div class="col-2 px-2">
                                <a id="dislike"
                                @if (isset($user) && count($user->reviewsDisliked()->get()) && count($user->reviewsDisliked()->wherePivot("review_id",$review->id)->get()))
                                    class="cursor-pointer text-danger"
                                @else
                                    class="cursor-pointer text-secondary"
                                @endif
                                    wire:click="dislike({{$review->id}})">
                                    <i class="fa-solid fa-thumbs-down"></i> {{ $review->dislikes }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    @else
        <h6 class="text-center">Este juego aún no tiene reseñas, sé el primero en dar tu opinión pulsando
            sobre el botón escribir</h6>
    @endif
</div>
