<div>
    <div class="container mt-7 min-vh-100">
        <nav class="d-flex justify-content-center">
            <ol class="breadcrumb bg-gray-900">
                <li class="breadcrumb-item active" aria-current="page"><a href="/" class="text-secondary">Inicio</a>
                </li>
                <li class="breadcrumb-item active text-secondary" aria-current="page"><a href="/{{ $user->username }}"
                        class="text-secondary">Perfil</a></li>
                <li class="breadcrumb-item active text-secondary" aria-current="page"><a href="#"
                        class="text-white">Ajustes</a></li>
            </ol>
        </nav>
        <section class="text-center">
            {{-- User data --}}
            <div class="px-7">
                @if (Str::contains(Auth::user()->avatar, 'ui-avatars'))
                    <img src="{{ Auth::user()->avatar }}" alt="avatar" class="rounded-circle img-fluid w-90 w-md-50">
                @else
                    <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="avatar" class="rounded-circle img-fluid w-90 w-md-25">
                @endif
            </div>
            <div>
                <h4 class="text-white text-bold">{{ $user->username }}</h4>
            </div>
            <div class="mt-2">
                @if (Auth::user()->id != $user->id)
                    @livewire('user-follow', ['user_id' => $user->id])
                @endif
            </div>
            <div class="mt-4">
                <div class="dropdown text-center mx-auto" id="navParent">
                    <a href="#" class="btn bg-gray-800 dropdown-toggle text-white w-100 w-md-50" data-bs-toggle="dropdown"
                        id="curLink">
                        <i class="fa-solid fa-list"></i> Mis datos
                    </a>
                    <ul class="dropdown-menu w-100 w-md-50 text-center bg-gray-800 blur mt-2" aria-labelledby="profile_nav">
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#overview"
                                id="profNav">
                                <i class="fa-solid fa-list"></i> Mis datos
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- Settings content --}}
            <article class="collapse mt-4 show" id="userData" data-bs-parent="#navParent">
                {{-- @livewire('user-update', ['user'=> $user]) --}}
                <div class="text-end">
                    <button class="btn btn-primary my-0" wire:click="update">
                        Guardar
                    </button>
                </div>
                <hr>
                <div class="d-flex flex-wrap">
                    <div class="col-12 col-sm-12 col-md-6 pe-md-2">
                        <div class="form-group text-start">
                            <label for="username" class="text-white">Nombre de usuario</label>
                            <input type="text" class="form-control bg-gray-800 text-white" id="username"
                                wire:model="user.username">
                            @error('user.username')
                                <p class="text-warning">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 ps-md-2">
                        <div class="form-group text-start">
                            <label for="email" class="text-white">Correo electrónico</label>
                            <input type="email" class="form-control bg-gray-800 text-white" id="email"
                                wire:model="user.email">
                            @error('user.email')
                                <p class="text-warning">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="text-secondary">Cambiar contraseña</h6>
                <div class="d-flex flex-wrap">
                    <div class="col-12 col-sm-12 col-md-6 pe-md-2">
                        <div class="form-group text-start">
                            <label for="pwd" class="text-white">Contraseña</label>
                            <input type="password" class="form-control bg-gray-800 text-white" id="pwd"
                            />
                            @error('user.password')
                                <p class="text-warning">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 ps-md-2">
                        <div class="form-group text-start">
                            <label for="chpwd" class="text-white">Repite la contraseña</label>
                            <input type="password" class="form-control bg-gray-800 text-white" id="chpwd">
                            @error('user.password')
                                <p class="text-warning">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="form-group text-start mb-0">
                        <label for="img" class="text-white">Cambiar imagen de perfil</label>
                        <input type="file" class="form-control bg-gray-800 text-white" id="img" hidden
                            wire:model.defer="img">
                    </div>
                    <div class="px-7 py-4">
                        @if ($img)
                            <img src="{{ $img->temporaryUrl() }}" alt="" class="rounded-circle w-90 w-md-30">
                        @else
                            @if (Str::contains(Auth::user()->avatar, 'ui-avatars'))
                                <img src="{{ Auth::user()->avatar }}" alt="avatar" class="rounded-circle w-90 w-md-30">
                            @else
                                <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="avatar"
                                    class="rounded-circle w-90 w-md-30">
                            @endif
                        @endif
                    </div>
                    @error('avatar')
                        <p class="text-warning">{{ $message }}</p>
                    @enderror
                    <label class="btn btn-primary" for="img">
                        <i class="fas fa-upload"></i> Subir imagen
                    </label>
                </div>
            </article>
        </section>
    </div>
    @include('layouts.footers.auth.footer')
</div>
