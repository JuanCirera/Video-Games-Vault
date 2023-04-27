<div>
    <div class="mb-5">
        <h4 class="text-white">Reseñas</h4>
        <p>Todas las reseñas escritas por <b>{{ '@' . $user->username }}</b></p>
    </div>
    @if (count($userReviews))
        @foreach ($userReviews as $userReview)
            {{-- REVIEW --}}
            <div class="mb-4">
                <div class="card bg-gray-800 w-md-80 w-lg-60 mx-auto">
                    <div class="row g-0 border-radius-top-start-md-xl border-radius-top-end-md-xl"
                        style="background-image: url(
                        @foreach ($videogames as $game)
                            @if ($game->id == $userReview->videogame_id)
                                {{ $game->background_image }}
                            @endif @endforeach
                        );">
                        <div class="border-radius-top-start-md-xl border-radius-top-end-md-xl"
                        style="background-color: rgba(52,58,64, 0.9);
                                    box-shadow: inset 0px -10px 10px 0px rgba(52,58,64, 1);">

                            <div class="card-header pb-2 pt-4 d-flex"  style="background-color: rgba(0, 0, 0, 0);">
                                <div class="flex-grow-1">
                                    <h6 class="text-white text-start my-0">{{ $userReview->title }}</h6>
                                    <p class="text-start text-sm mb-0">{{ $userReview->created_at }}</p>
                                </div>
                                <div class="text-white">
                                    @if ($userReview->rating)
                                        Recomendado <i class="fa-solid fa-thumbs-up text-success text-3xl ms-2"></i>
                                    @else
                                        No recomendado <i class="fa-solid fa-thumbs-down text-danger text-3xl ms-2"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body px-4 py-2 text-white text-start">
                                <p>{{ $userReview->body }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex pt-2 align-items-center">
                        <div class="col-2 col-md-1">
                            @if (Str::contains(Auth::user()->avatar, 'ui-avatars'))
                                <img src="{{ $userReview->user->avatar }}" alt=""
                                    class="rounded-circle w-70 w-md-80">
                            @else
                                <img src="{{ Storage::url($userReview->user->avatar) }}" alt=""
                                    class="rounded-circle w-70 w-md-35">
                            @endif
                        </div>
                        <div class="col-6 col-md-7" style="text-align: left;">
                            <p class="my-0">{{ $userReview->user->username }}</p>
                        </div>
                        <div class="col-2" style="text-align: right;">
                            {{-- class="text-primary" --}}
                            <a name="{{ $userReview }}" id="like" class="text-body">
                                {{ $userReview->likes }} <i class="fa-solid fa-thumbs-up"></i>
                            </a>
                        </div>
                        <div class="col-2">
                            {{-- wire:click="dislike({{$userReview->id}})" --}}
                            <a name="{{ $userReview->id }}" id="dislike" class="text-body">
                                {{ $userReview->dislikes }} <i class="fa-solid fa-thumbs-down"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        @if ($user->id == Auth::user()->id)
            <p>
                Aún no tienes reseñas. Escribe la primera para ayudar
                a la comunidad con tu opinión.
            </p>
            <div>
                @livewire('create-review', ['user' => $user])
            </div>
        @else
            <p>
                <b>{{ $user->username }}</b> aun no ha escrito reseñas
            </p>
        @endif
    @endif
</div>
