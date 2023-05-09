<div>
    <main class="main-content">
        <section>
            <div class="container mt-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-gray-900">
                        <li class="breadcrumb-item active text-white" aria-current="page"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page"><a href="/login">Login</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Resetear contraseña</li>
                    </ol>
                </nav>
                <div class="card card-plain mx-auto w-lg-50">
                    <div class="card-header pb-0 text-start bg-gray-900">
                        <h4 class="font-weight-bolder text-white">Resetea tu contraseña</h4>
                        <p class="mb-0">Introduce tu email y espera unos segundos</p>
                    </div>
                    <div class="card-body">
                        {{-- <form role="form" method="POST" action="{{ route('reset.perform') }}">
                                    @csrf
                                    @method('post') --}}
                        <div class="flex flex-col mb-3">
                            <input type="email" name="email"
                                class="form-control form-control-lg bg-gray-800 text-white" placeholder="Email"
                                value="{{ old('email') }}" aria-label="Email" wire:model="email">
                            @error('email')
                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button wire:click="send"
                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0 w-md-50 w-lg-55">
                                <span wire:loading.remove wire:target="send">Enviar correo</span><span wire:loading
                                    wire:target="send">Enviando...</span>
                            </button>
                        </div>
                        {{-- </form> --}}
                    </div>
                    <div id="alert">
                        @include('components.alert')
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
