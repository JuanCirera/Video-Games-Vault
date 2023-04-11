<div>
    <div class="container mt-7 min-vh-100">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark bg-gray-900">
                <li class="breadcrumb-item active text-white" aria-current="page"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Perfil</li>
            </ol>
        </nav>
        <section class="text-center">
            <div class="mb-2">
                <img src="{{ $user->avatar }}" alt="avatar" class="rounded-circle">
            </div>
            <div>
                <h4 class="text-white text-bold">{{ $user->username }}</h4>
            </div>
            <div class="mt-4">
                <ul class="list-inline text-white">
                    <li class="list-inline-item">Siguiendo <sup class="text-secondary">43</sup></li>
                    <li class="list-inline-item">Seguidores <sup class="text-secondary">230</sup></li>
                    <li class="list-inline-item"><a href="" class="text-white">Ajustes</a></li>
                </ul>
            </div>
            <div class="mt-4">
                {{-- <div class="dropdown">
                    <a href="profile" class="btn bg-gray-800 dropdown-toggle text-white" data-bs-toggle="dropdown"
                        id="profile_nav">
                        <i class="fas fa-chart-simple"></i> Overview
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profile_nav">
                        <li>
                            <a class="dropdown-item" href="{{route('profile.games',$user->username)}}">
                                <i class="fas fa-book"></i> Biblioteca
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-bookmark"></i> Favoritos
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-location-crosshairs"></i> Lista de seguimiento
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-star"></i> Reviews
                            </a>
                        </li>
                    </ul>
                </div> --}}
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1 flex-column on-resize bg-gray-800" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 text-white" data-bs-toggle="tab" href="#dashboard-tabs-icons"
                                role="tab" aria-controls="code" aria-selected="false">
                                <i class="fas fa-chart-simple text-sm me-2"></i> Overview
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 text-white active" data-bs-toggle="tab" href="#profile-tabs-icons"
                                role="tab" aria-controls="preview" aria-selected="true">
                                <i class="fas fa-book text-sm me-2"></i> Biblioteca
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 text-white" data-bs-toggle="tab" href="#dashboard-tabs-icons"
                                role="tab" aria-controls="code" aria-selected="false">
                                <i class="fas fa-bookmark text-sm me-2"></i> Favoritos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 text-white" data-bs-toggle="tab" href="#dashboard-tabs-icons"
                                role="tab" aria-controls="code" aria-selected="false">
                                <i class="fas fa-star text-sm me-2"></i> Reviews
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="mt-5">
                {{-- NOTE: Esto son los desplegables de contenido --}}
                {{-- <div class="btn bg-gray-800 text-white w-100" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-check"></i> Completados <i class="fas fa-chevron-down"></i>
                </div>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        PRUEBA DE CONTENIDO OCULTO
                    </div>
                </div> --}}
                <div class="tab-content">
                    <h4 class="text-white">120 videojuegos</h4>
                    <div class="d-flex mt-4">
                        <div class="col-5">
                            <span class="text-white">Completados</span>
                        </div>
                        <div class="col-6">
                            <div class="progress-wrapper pt-2">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="60"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="text-white">60</span>
                        </div>
                    </div>
                    <div class="d-flex mt-2">
                        <div class="col-5">
                            <span class="text-white">Sin jugar</span>
                        </div>
                        <div class="col-6">
                            <div class="progress-wrapper pt-2">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="60"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="text-white">10</span>
                        </div>
                    </div>
                    <div class="d-flex mt-2">
                        <div class="col-5">
                            <span class="text-white">Deseados</span>
                        </div>
                        <div class="col-6">
                            <div class="progress-wrapper pt-2">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="60"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="text-white">20</span>
                        </div>
                    </div>
                    <div class="d-flex mt-2">
                        <div class="col-5">
                            <span class="text-white">Jugando actualmente</span>
                        </div>
                        <div class="col-6">
                            <div class="progress-wrapper pt-2">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="60"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <span class="text-white">3</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h4 class="text-white">34 reviews</h4>
                <div class="d-flex mt-4" style="align-items: flex-end !important">
                    <div class="col-5">
                        <span class="text-white">Positivas</span>
                    </div>
                    <div class="col-6">
                        <div class="progress-wrapper pb-2">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-secondary" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <span class="text-white">30</span>
                    </div>
                </div>
                <div class="d-flex mt-2" style="align-items: flex-end !important">
                    <div class="col-5">
                        <span class="text-white">Negativas</span>
                    </div>
                    <div class="col-6">
                        <div class="progress-wrapper pb-2">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-secondary" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <span class="text-white">4</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
