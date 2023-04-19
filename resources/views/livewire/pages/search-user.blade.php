<div>
    <div class="container mt-7">
        <h5 class="text-white text-center">Encuentra otros jugadores</h5>
        <div class="input-group mb-4 mt-4">
            <span class="input-group-text text-white border-dark bg-gray-800">
                <i class="fas fa-search" aria-hidden="true"></i>
            </span>
            <input type="search" class="form-control text-white bg-gray-800" placeholder="Buscar jugador..."
                wire:model="search">
        </div>

        @foreach ($users as $user)
            <div class="card bg-gray-800 mb-4 py-2" wire:click="profile({{ $user->id }})">
                <div class="card-body px-4 py-2 text-white d-flex" style="text-align: left; align-items: center;">
                    <div class="col-2">
                        <img src="{{ $user->avatar }}" alt="" class="img-fluid rounded-circle ">
                    </div>
                    <div class="col-10" style="text-align: left;">
                        <p class="ms-3 my-0">{{ $user->username }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
