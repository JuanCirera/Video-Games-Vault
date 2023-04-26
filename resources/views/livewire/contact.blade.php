<div>
    <div class="container mt-7">
        <nav class="d-flex justify-content-center">
            <ol class="breadcrumb bg-gray-900">
                <li class="breadcrumb-item active" aria-current="page"><a href="/" class="text-secondary">Inicio</a>
                </li>
                <li class="breadcrumb-item active text-secondary" aria-current="page"><a href="#"
                        class="text-white">Contacto</a></li>
            </ol>
        </nav>
        <div class="text-start">
            <h4 class="text-white">Contacto</h4>
        </div>
        <hr>
        <div class="d-flex flex-wrap">
            <div class="col-12 col-sm-12 col-md-6">
                <div class="form-group text-start">
                    <label for="email" class="text-white">Email</label>
                    <input type="email" class="form-control bg-gray-800 text-white" id="email" wire:model="email"
                    placeholder="Introduce tu email">
                    @error('email')
                        <p class="text-warning">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <div class="form-group text-start">
                    <label for="content" class="text-white">Motivo del contacto</label>
                    <textarea class="form-control bg-gray-800 text-white" wire:model="content"></textarea>
                    @error('content')
                        <p class="text-warning">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary my-0" wire:click="send">
                <i class="fas fa-paper-plane"></i> Enviar
            </button>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
</div>
