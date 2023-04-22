<div>
    <h5 class="text-center text-white mb-4">Siguiendo</h5>

    <div class="input-group mb-4 w-md-70 mx-auto">
        <span class="input-group-text text-white border-dark bg-gray-800">
            <i class="fas fa-search" aria-hidden="true"></i>
        </span>
        <input type="search" class="form-control text-white bg-gray-800"
        placeholder="Buscar usuario..." wire:model="search">
    </div>

    @foreach ($followings as $following)
        <div class="card bg-gray-800 mb-4 py-2 w-md-50 mx-auto" wire:click="profile({{$following->id}})">
            <div class="card-body px-4 py-2 text-white d-flex" style="text-align: left; align-items: center;">
                <div class="col-2">
                    @if (Str::contains($following->avatar, 'ui-avatars'))
                        <img src="{{ $following->avatar }}" alt="avatar" class="rounded-circle img-fluid">
                    @else
                        <img src="{{ Storage::url($following->avatar) }}" alt="avatar" class="rounded-circle img-fluid">
                    @endif
                </div>
                <div class="col-10" style="text-align: left;">
                    <p class="ms-3 my-0">{{$following->username}}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
