<div>
    <div class="container mt-7 min-vh-100">
        <nav class="d-flex justify-content-center">
            <ol class="breadcrumb bg-gray-900">
                <li class="breadcrumb-item active text-secondary" aria-current="page"><a href="/"
                        class="text-secondary">Inicio</a></li>
                <li class="breadcrumb-item active text-secondary" aria-current="page"><a href="#"
                        class="text-white">Perfil</a></li>
            </ol>
        </nav>
        <section class="text-center">
            {{-- User data --}}
            <div class="px-7 py-2">
                @if (Str::contains($user->avatar, 'ui-avatars'))
                    <img src="{{ $user->avatar }}" alt="avatar" class="rounded-circle w-90 w-md-20">
                @else
                    <img src="{{ Storage::url($user->avatar) }}" alt="avatar" class="rounded-circle w-90 w-md-25">
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
            <div class="mt-2">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#following" data-bs-toggle="collapse" id="profNav" class="text-white">
                            Siguiendo
                        </a><sup class="text-secondary">{{ count($user->followings) }}</sup>
                    </li>
                    <li class="list-inline-item">
                        <a href="#followers" data-bs-toggle="collapse" id="profNav" class="text-white">
                            Seguidores</a>
                        <sup class="text-secondary">{{ count($user->followers) }}</sup>
                    </li>
                    <li class="list-inline-item">
                        @if (Auth::user()->id == $user->id)
                            <a href="{{ route('profile.settings', $user->username) }}" class="text-white">
                                Ajustes
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
            {{--  --}}
            {{-- Profile internal nav --}}
            <div class="mt-4">
                {{-- MOBILE NAV --}}
                <div class="dropdown d-md-none" id="navParent">
                    <a href="#" class="btn bg-gray-800 dropdown-toggle text-white w-100 w-md-50"
                        data-bs-toggle="dropdown" id="curLink">
                        <i class=""></i>
                        @if ($user->id == Auth::user()->id)
                            Mi contenido
                        @else
                            Contenido
                        @endif
                    </a>
                    <ul class="dropdown-menu w-100 text-center bg-gray-800 blur mt-2" aria-labelledby="profile_nav">
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#overview"
                                id="profNav">
                                <i class="fas fa-chart-simple"></i> Resumen
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#library"
                                id="profNav">
                                <i class="fas fa-book"></i> Biblioteca
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#tracking"
                                id="profNav">
                                <i class="fas fa-location-crosshairs"></i> Lista de seguimiento
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white" data-bs-toggle="collapse" href="#reviews"
                                id="profNav">
                                <i class="fas fa-star"></i> Reseñas
                            </a>
                        </li>
                    </ul>
                </div>
                {{--  --}}
                {{-- PC NAV --}}
                <div class="nav-wrapper position-relative end-0 d-none d-md-block w-md-70 mx-auto">
                    <ul class="nav nav-pills nav-fill p-1 bg-gray-800" role="tablist">
                        <li class="nav-item" id="pc_profNav">
                            <a class="nav-link mb-0 px-0 py-1 text-white active" data-bs-toggle="collapse"
                                href="#overview" role="tab" aria-controls="preview" aria-selected="true"
                                id="profNav">
                                <i class="fas fa-chart-simple text-sm me-2"></i> Resumen
                            </a>
                        </li>
                        <li class="nav-item" id="pc_profNav">
                            <a class="nav-link mb-0 px-0 py-1 text-white" data-bs-toggle="collapse" href="#library"
                                role="tab" aria-controls="code" aria-selected="false" id="profNav">
                                <i class="fas fa-book text-sm me-2"></i> Biblioteca
                            </a>
                        </li>
                        <li class="nav-item" id="pc_profNav">
                            <a class="nav-link mb-0 px-0 py-1 text-white" data-bs-toggle="collapse" href="#tracking"
                                role="tab" aria-controls="code" aria-selected="false" id="profNav">
                                <i class="fas fa-location-crosshairs text-sm me-2"></i> Lista de seguimiento
                            </a>
                        </li>
                        <li class="nav-item" id="pc_profNav">
                            <a class="nav-link mb-0 px-0 py-1 text-white" data-bs-toggle="collapse" href="#reviews"
                                role="tab" aria-controls="code" aria-selected="false" id="profNav">
                                <i class="fas fa-star text-sm me-2"></i> Reseñas
                            </a>
                        </li>
                        <div class="moving-tab position-absolute nav-link"
                            style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 200px;">
                            <a class="nav-link mb-0 px-0 py-1 bg-primary active" data-bs-toggle="collapse"
                                href="#overview" role="tab" aria-controls="code"
                                aria-selected="true">&nbsp;</a>
                        </div>
                    </ul>
                </div>
                {{--  --}}
            </div>
            {{--  --}}
            {{-- Profile content --}}
            <article class="collapse mt-5 show" id="overview" data-bs-parent="#navParent">
                @livewire('user-overview', ['user' => $user])
            </article>
            <article class="collapse mt-4" id="library" data-bs-parent="#navParent">
                @livewire('user-library', ['user' => $user])
            </article>
            <article class="collapse mt-4" id="tracking">
                @livewire('user-tracking', ['user' => $user])
            </article>
            <article class="collapse mt-5" id="reviews">
                @livewire('user-reviews', ['user' => $user])
            </article>
        </section>
        {{--  --}}
        <section class="mt-4 collapse" id="followers">
            @livewire('user-followers', ['user' => $user])
        </section>
        <section class="mt-4 collapse" id="following">
            @livewire('user-following', ['user' => $user])
        </section>
    </div>

    <script>
        // Invento para hacer una navegacion del perfil sin recargas y sin 20 vistas muy similares entre ellas

        // Se obtienen todos los enlaces con el id profileNavigation
        const links = document.querySelectorAll('#profNav');

        // Se añade un evento click a cada enlace
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

        // document.getElementById("like").addEventListener("click", (e) => {
        //     if (!e.target.classList.contains("text-primary")) {
        //         e.target.classList.remove("text-body");
        //         e.target.classList.add("text-primary");
        //     } else {
        //         e.target.classList.remove("text-primary");
        //         e.target.classList.add("text-body");
        //     }
        //     // Livewire.emit('like', e.target.getAttribute('name'));
        // });

        // document.getElementById("dislike").addEventListener("click", (e) => {
        //     if (!e.target.classList.contains("text-primary")) {
        //         e.target.classList.remove("text-body");
        //         e.target.classList.add("text-primary");
        //     } else {
        //         e.target.classList.remove("text-primary");
        //         e.target.classList.add("text-body");
        //     }
        //     // Livewire.emit('dislike',e.target.getAttribute('name'));
        // });

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

    @include('layouts.footers.auth.footer')

</div>
