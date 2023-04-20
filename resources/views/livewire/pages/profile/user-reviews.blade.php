<div>
    <div class="mb-5">
        <h4 class="text-white">Reseñas</h4>
        <p>Todas las reseñas escritas por {{ '@' . Auth::user()->username }}</p>
    </div>
    @if (count($userReviews))
        @foreach ($userReviews as $userReview)
            {{-- REVIEW --}}
            <div class="mb-4">
                <div class="card bg-gray-800">
                    <div class="card-header bg-gray-800 pb-2 pt-4 d-flex">
                        <div class="flex-grow-1">
                            <h6 class="text-white text-start my-0">{{ $userReview->title }}</h6>
                            <p class="text-start text-sm mb-0">{{ $userReview->created_at }}</p>
                        </div>
                        <div>
                            <i
                                @if ($userReview->rating) class="fa-solid fa-thumbs-up text-success text-3xl"
                            @else
                                class="fa-solid fa-thumbs-down text-danger text-3xl" @endif>
                            </i>
                        </div>
                    </div>
                    <div class="card-body px-4 py-2 text-white text-start">
                        <p>{{ $userReview->body }}</p>
                    </div>
                    <div class="card-footer d-flex pt-2 align-items-center">
                        <div class="col-2">
                            @if (Str::contains(Auth::user()->avatar, 'ui-avatars'))
                                <img src="{{ $userReview->user->avatar }}" alt="" class="rounded-circle w-70">
                            @else
                                <img src="{{ Storage::url($userReview->user->avatar) }}" alt="" class="rounded-circle w-70">
                            @endif
                        </div>
                        <div class="col-6" style="text-align: left;">
                            <p class="my-0">{{ $userReview->user->username }}</p>
                        </div>
                        <div class="col-2 " style="text-align: right;">
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
        <p>
            @if ($user->id == Auth::user()->id)
                Aún no tienes reseñas. Escribe la primera para ayudar
                a la comunidad con tu opinión.
            @else
                <b>{{ $user->username }}</b> aun no ha escrito reseñas
            @endif
        </p>
    @endif
</div>
