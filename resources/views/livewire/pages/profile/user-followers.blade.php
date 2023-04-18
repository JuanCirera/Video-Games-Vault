<div>
    <h5 class="text-center text-white mb-4">Seguidores</h5>

    <div class="input-group mb-4">
        <span class="input-group-text text-white border-dark bg-gray-800">
            <i class="fas fa-search" aria-hidden="true"></i>
        </span>
        <input type="search" class="form-control text-white bg-gray-800"
        placeholder="Buscar usuario...">
    </div>

    @foreach ($user->followings as $follower)
        {{-- TODO: al hacer click enviar al user-profile pero con los datos del otro usuario --}}
        <div class="card bg-gray-800 mb-4 py-2" wire:click="">
            <div class="card-body px-4 py-2 text-white d-flex" style="text-align: left; align-items: center;">
                <div class="col-2">
                    <img src="{{ $follower->avatar }}" alt="" class="img-fluid rounded-circle ">
                </div>
                <div class="col-10" style="text-align: left;">
                    <p class="ms-3 my-0">{{$follower->username}}</p>
                </div>
            </div>
        </div>
    @endforeach

</div>
