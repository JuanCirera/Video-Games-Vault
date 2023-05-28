<div>
    <div class="mb-5">
        <h4 class="text-white">Reseñas</h4>
        <p class="text-secondary">Todas las reseñas escritas por <b>{{ '@' . $user->username }}</b></p>
    </div>
    @if (count($userReviews))
        @foreach ($userReviews as $userReview)
            {{-- REVIEW --}}
            <div class="mb-4">
                <div class="card bg-gray-800 w-md-90 w-lg-60 mx-auto">
                    <div class="row g-0 border-radius-top-start-md-xl border-radius-top-end-md-xl"
                        style="background-image: url(
                        @foreach ($videogames as $game)
                            @if ($game->id == $userReview->videogame_id)
                                {{ $game->background_image }}
                            @endif
                        @endforeach
                        );">
                        <div class="border-radius-top-start-md-xl border-radius-top-end-md-xl"
                            style="background-color: rgba(52,58,64, 0.9);
                                    box-shadow: inset 0px -10px 10px 0px rgba(52,58,64, 1);">
                            {{-- CARD HEADER --}}
                            <div class="card-header pb-2 pt-4 d-flex flex-wrap flex-lg-nowrap" style="background-color: rgba(0, 0, 0, 0);">
                                <div class="col-12 col-lg-8">
                                    @foreach ($videogames as $game)
                                        @if ($game->id == $userReview->videogame_id)
                                            <p class="text-secondary text-start">{{$game->name}}</p>
                                        @endif
                                    @endforeach
                                    <h6 class="text-white text-start my-0 wrap">
                                        @if ($user->id == Auth::user()->id)
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit-modal"
                                                wire:click="edit({{ $userReview->id }})">
                                                {{ $userReview->title }} <i class="fas fa-edit ms-2"></i>
                                            </a>
                                        @else
                                            {{ $userReview->title }}
                                        @endif
                                    </h6>
                                    <p class="text-start text-sm mb-0">
                                        {{ date('d-m-Y, H:i', strtotime($userReview->created_at)) }}</p>
                                </div>
                                <div class="col-12 col-lg-4 text-start">
                                    <div>
                                        @if ($userReview->rating)
                                            <span class="text-success">Recomendado</span> <i class="fa-solid fa-thumbs-up text-success text-3xl ms-2"></i>
                                        @else
                                            <span class="text-danger">No recomendado</span> <i class="fa-solid fa-thumbs-down text-danger text-3xl ms-2"></i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- CARD BODY --}}
                            <div class="card-body px-4 py-2 text-white text-start">
                                <p>{{ $userReview->body }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- CARD FOOTER --}}
                    <div class="card-footer d-flex pt-2 align-items-center">
                        <div class="col-2 col-lg-1">
                            @if (Str::contains($user->avatar, 'ui-avatars') || Str::contains($user->avatar, 'lh3.googleusercontent') || Str::contains(Auth::user()->avatar, 'graph.facebook'))
                                <img src="{{ $userReview->user->avatar }}" alt="" class="rounded-circle"
                                    width="50" height="50" style="object-fit: cover;">
                            @else
                                <img src="{{ Storage::url($userReview->user->avatar) }}" alt=""
                                    class="rounded-circle" width="50" height="50" style="object-fit: cover;">
                            @endif
                        </div>
                        <div class="col-6 col-lg-7" style="text-align: left;">
                            <p class="my-0 text-secondary">{{ $userReview->user->username }}</p>
                        </div>
                        <div class="col-2 px-2" style="text-align: right;">
                            <a id="like"
                            @if (isset($user) && count($user->reviewsLiked()->get()) && count($user->reviewsLiked()->wherePivot("review_id",$userReview->id)->get()))
                                class="text-primary"
                                {{-- cursor-pointer --}}
                            @else
                                class="text-secondary"
                            @endif
                            {{-- wire:click="like({{$userReview->id}})" --}}
                                >
                                <i class="fa-solid fa-thumbs-up"></i> {{ $userReview->likes }}
                            </a>
                        </div>
                        <div class="col-2 px-2">
                            <a id="dislike"
                            @if (isset($user) && count($user->reviewsDisliked()->get()) && count($user->reviewsDisliked()->wherePivot("review_id",$userReview->id)->get()))
                                class="text-danger"
                            @else
                                class="text-secondary"
                            @endif
                            {{-- wire:click="dislike({{$userReview->id}})" --}}
                                >
                                <i class="fa-solid fa-thumbs-down"></i> {{ $userReview->dislikes }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal"
            aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content bg-gray-800">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left bg-gray-800 text-center">
                                <h3 class="font-weight-bolder text-primary">Editar reseña</h3>
                            </div>
                            <div class="card-body">
                                <form role="form">
                                    <div class="form-group mb-3 text-start">
                                        <label for="title" class="text-white">Título</label>
                                        <input type="text" class="form-control bg-gray-700 text-white"
                                            aria-label="title" aria-describedby="title" name="review.title"
                                            wire:model="review.title">
                                        @error('review.title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3 text-start">
                                        <label for="body" class="text-white">Reseña</label>
                                        <textarea type="text" class="form-control bg-gray-700 text-white" placeholder="Escribe aquí tu reseña..."
                                            rows="7" aria-label="body" aria-describedby="body" name="review.body" wire:model="review.body"></textarea>
                                        @error('review.body')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div id="rating" class="form-group text-start">
                                        <label for="rating" class="text-white">¿Recomiendas este juego?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input bg-gray-700" type="radio"
                                                    name="review.rating" id="positive" value="1" wire:model="review.rating">
                                                <label class="custom-control-label" for="positive">
                                                    <i class="fa-solid fa-thumbs-up text-primary text-lg"></i>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input bg-gray-700" type="radio"
                                                    name="review.rating" id="negative" value="0" wire:model="review.rating">
                                                <label class="custom-control-label" for="negative">
                                                    <i class="fa-solid fa-thumbs-down text-danger text-lg"></i>
                                                </label>
                                            </div>
                                        </div>
                                        @error('review.rating')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="text-center ">
                                        <button type="button"
                                            class="btn btn-round btn-outline-danger w-100 mt-4 mb-0 w-md-40"
                                            wire:click="destroy({{$review->id}})">
                                            Eliminar
                                        </button>
                                        <button type="button"
                                            class="btn btn-round bg-primary w-100 mt-4 mb-0 w-md-40 text-white"
                                            wire:click="update">
                                            Guardar
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                {{--  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if ($user->id == Auth::user()->id)
            <p>
                Aún no tienes reseñas. Escribe la primera para ayudar
                a la comunidad con tu opinión.
            </p>
            <div>
                <a href="{{route('home')}}" class="btn btn-round bg-gradient-primary">
                    <i class="fas fa-search"></i> Buscar juegos
                </a>
            </div>
        @else
            <p>
                <b>{{ $user->username }}</b> aun no ha escrito reseñas
            </p>
        @endif
    @endif
</div>
