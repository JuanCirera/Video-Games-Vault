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
                    <img src="{{ Auth::user()->avatar }}" alt="avatar" class="rounded-circle img-fluid w-90 w-md-20">
                @else
                    <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="avatar"
                        class="rounded-circle img-fluid w-90 w-md-25">
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
                <div class="dropdown text-center mx-auto d-md-none" id="navParent">
                    <a href="#" class="btn bg-gray-800 dropdown-toggle text-white w-100 w-md-50"
                        data-bs-toggle="dropdown" id="curLink">
                        <i class="fa-solid fa-list"></i> Opciones
                    </a>
                    <ul class="dropdown-menu w-100 w-md-50 text-center bg-gray-800 blur mt-2"
                        aria-labelledby="profile_nav">
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#userData"
                                id="profNav">
                                <i class="fas fa-user-edit"></i> Mis datos
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#notifications"
                                id="profNav">
                                <i class="fas fa-bell fa-list"></i> Notificaciones
                            </a>
                        </li>
                    </ul>
                </div>
                {{-- PC NAV --}}
                <div class="nav-wrapper position-relative end-0 d-none d-md-block w-md-70 mx-auto">
                    <ul class="nav nav-pills nav-fill p-1 bg-gray-800" role="tablist">
                        <li class="nav-item" id="pc_profNav">
                            <a class="nav-link mb-0 px-0 py-1 text-white active" data-bs-toggle="collapse"
                                href="#userData" role="tab" aria-controls="preview" aria-selected="true"
                                id="profNav">
                                <i class="fas fa-user-edit text-sm me-2"></i> Mis datos
                            </a>
                        </li>
                        <li class="nav-item" id="pc_profNav">
                            <a class="nav-link mb-0 px-0 py-1 text-white active" data-bs-toggle="collapse"
                                href="#notifications" role="tab" aria-controls="preview" aria-selected="true"
                                id="profNav">
                                <i class="fas fa-bell text-sm me-2"></i> Notificaciones
                            </a>
                        </li>
                        <div class="moving-tab position-absolute nav-link"
                            style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 0px;">
                            <a class="nav-link mb-0 px-0 py-1 bg-primary active" data-bs-toggle="collapse"
                                href="#overview" role="tab" aria-controls="code" aria-selected="true">&nbsp;</a>
                        </div>
                    </ul>
                </div>
                {{--  --}}
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
                            <input type="password" class="form-control bg-gray-800 text-white" id="pwd" />
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
                                <img src="{{ Auth::user()->avatar }}" alt="avatar"
                                    class="rounded-circle w-90 w-md-30">
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
            {{-- NOTIFY --}}
            <article class="collapse mt-4" id="notifications" data-bs-parent="#navParent">
                <div>
                    NOTIFY
                </div>
            </article>
            {{--  --}}
        </section>
    </div>

    @include('layouts.footers.auth.footer')

    <script>

        //NAV
        const links = document.querySelectorAll('#profNav');

        links.forEach(link => {
            link.addEventListener('click', () => {
                // Obtener el id del collapse que se está abriendo
                const target = link.getAttribute('href');

                // Obtener los demás collapse menos el que se está abriendo
                const otherLinks = document.querySelectorAll('.collapse:not(' + target + ')');

                // Cerrar los collapse
                otherLinks.forEach(otherLink => {
                    if (otherLink.classList.contains('show')) {
                        otherLink.classList.remove('show');
                    }
                });
            });
        });

        // ANIMACION PROFILE NAV - Tablet/PC VIEWPORT

        // Enlaces de la barra de navegación
        const pc_navLinks = document.querySelectorAll('#pc_profNav');
        const movingTab = document.querySelector('.moving-tab');

        pc_navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                // Posición y ancho del enlace
                const navPosition = link.offsetLeft;
                const navWidth = link.offsetWidth;
                // Ahora se asigna la posición y el ancho al .moving-tab
                movingTab.style.transform = `translate3d(${navPosition}px, 0px, 0px)`;
                movingTab.style.width = `${navWidth}px`;
            });
        });
        // --
    </script>

</div>
