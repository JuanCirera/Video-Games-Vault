<div>
    <div class="container mt-7">
        <h5 class="text-white text-center">Encuentra otros jugadores</h5>
        <div class="input-group mb-4 mt-4 w-md-70 mx-auto">
            <span class="input-group-text text-white border-dark bg-gray-800">
                <i class="fas fa-search" aria-hidden="true"></i>
            </span>
            <input type="search" class="form-control text-white bg-gray-800" placeholder="Buscar jugador..."
                wire:model="search">
        </div>

        @foreach ($users as $user)
            <a href="{{route('profile', $user->username)}}" class="card bg-gray-800 mb-4 py-2 w-md-50 mx-auto">
                <div class="card-body px-4 py-2 text-white d-flex" style="text-align: left; align-items: center;">
                    <div class="col-1">
                        @if (Str::contains($user->avatar, 'ui-avatars'))
                            <img src="{{ $user->avatar }}" alt="avatar" class="rounded-circle w-100">
                        @else
                            <img src="{{ Storage::url($user->avatar) }}" alt="avatar"
                                class="rounded-circle w-100">
                        @endif
                    </div>
                    <div class="col-11" style="text-align: left;">
                        <p class="ms-3 my-0">{{ $user->username }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
