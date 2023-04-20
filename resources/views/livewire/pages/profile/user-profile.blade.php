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
            <div class="mb-2">
                @if (Str::contains($user->avatar, 'ui-avatars'))
                    <img src="{{ $user->avatar }}" alt="avatar" class="rounded-circle img-fluid">
                @else
                    <img src="{{ Storage::url($user->avatar) }}" alt="avatar" class="rounded-circle img-fluid">
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
                <div class="dropdown" id="navParent">
                    <a href="#" class="btn bg-gray-800 dropdown-toggle text-white w-100" data-bs-toggle="dropdown"
                        id="curLink">
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
        // Obtener el enlace principal
        const curLink = document.getElementById('curLink');

        // Obtener todos los elementos del menú
        const menuItems = document.querySelectorAll('.dropdown-item');

        // Escuchar los eventos de clic en cada elemento del menú
        menuItems.forEach(item => {
            item.addEventListener('click', (event) => {
                // event.preventDefault(); // Evitar que el enlace se abra automáticamente
                curLink.href = event.target
                    .href; // Actualizar el enlace principal con el valor del atributo href del elemento clicado
            });
        });

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

        document.getElementById("like").addEventListener("click", (e) => {
            if (!e.target.classList.contains("text-primary")) {
                e.target.classList.remove("text-body");
                e.target.classList.add("text-primary");
            } else {
                e.target.classList.remove("text-primary");
                e.target.classList.add("text-body");
            }
            // Livewire.emit('like', e.target.getAttribute('name'));
        });

        document.getElementById("dislike").addEventListener("click", (e) => {
            if (!e.target.classList.contains("text-primary")) {
                e.target.classList.remove("text-body");
                e.target.classList.add("text-primary");
            } else {
                e.target.classList.remove("text-primary");
                e.target.classList.add("text-body");
            }
            // Livewire.emit('dislike',e.target.getAttribute('name'));
        });
    </script>
    @include('layouts.footers.auth.footer')
</div>
