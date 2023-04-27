<div>
    <button class="btn btn-primary bg-gradient-primary btn-round my-0 text-nowrap" data-bs-toggle="modal" data-bs-target="#create-modal">
        <i class="fa-solid fa-pen-nib"></i> Escribir
    </button>

    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="create-modal" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content bg-gray-800">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left bg-gray-800 text-center">
                            <h3 class="font-weight-bolder text-primary">Nueva reseña</h3>
                        </div>
                        <div class="card-body">
                            <form role="form">
                                {{-- <div class="form-group mb-3 text-start">
                                    <label for="game_id" class="text-white">Elige uno de estos juegos</label>
                                    <select class="form-control bg-gray-700 text-white" aria-label="game_id"
                                        aria-describedby="game_id" wire:model="game_id">
                                        @foreach ($videogames as $game)
                                            <option value="{{ $game->id }}">{{ $game->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('game_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div> --}}
                                <div class="form-group mb-3 text-start">
                                    <label for="title" class="text-white">Título</label>
                                    <input type="text" class="form-control bg-gray-700 text-white" aria-label="title"
                                        aria-describedby="title" wire:model="title">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 text-start">
                                    <label for="body" class="text-white">Reseña</label>
                                    <textarea type="text" class="form-control bg-gray-700 text-white" placeholder="Escribe aquí tu reseña..."
                                    rows="7"
                                        aria-label="body" aria-describedby="body" wire:model="body"></textarea>
                                    @error('body')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div id="rating" class="form-group text-start">
                                    <label for="rating" class="text-white">¿Recomiendas este juego?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input bg-gray-700" type="radio" name="rating" id="positive"
                                            wire:model="rating">
                                            <label class="custom-control-label" for="positive">
                                                <i class="fa-solid fa-thumbs-up text-primary text-lg"></i>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input bg-gray-700" type="radio" name="rating" id="negative"
                                                wire:model="rating">
                                            <label class="custom-control-label" for="negative">
                                                <i class="fa-solid fa-thumbs-down text-danger text-lg"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @error('rating')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="button"
                                        class="btn btn-round bg-gradient-primary w-100 mt-4 mb-0 w-md-40"
                                        wire:click="store">
                                        Publicar
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
</div>
