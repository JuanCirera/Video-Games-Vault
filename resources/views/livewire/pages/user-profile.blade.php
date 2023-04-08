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
                <img src="{{ auth()->user()->avatar }}" alt="avatar" class="rounded-circle">
            </div>
            <div>
                <h4 class="text-white text-bold">{{ auth()->user()->username }}</h4>
            </div>
            <div class="mt-4">
                <ul class="list-inline text-white">
                    <li class="list-inline-item">Siguiendo <sup class="text-secondary">43</sup></li>
                    <li class="list-inline-item">Seguidores <sup class="text-secondary">230</sup></li>
                    <li class="list-inline-item"><a href="" class="text-white">Ajustes</a></li>
                </ul>
            </div>
            <div class="mt-4">
                <div class="dropdown">
                    <a href="#" class="btn bg-gray-800 dropdown-toggle text-white" data-bs-toggle="dropdown"
                        id="profile_nav">
                        <i class="fas fa-chart-simple"></i> Overview
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profile_nav">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-heart"></i> Favoritos
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
                </div>
            </div>
            <div class="mt-5">
                <h4 class="text-white">120 videojuegos</h4>
                <div class="d-flex mt-4">
                    <div class="col-5">
                        <span class="text-white">Completados</span> 
                    </div>
                    <div class="col-6">
                        <div class="progress-wrapper pt-2">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 50%;"></div>
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
                                <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 10%;"></div>
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
                                <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 40%;"></div>
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
                                <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 10%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <span class="text-white">3</span>
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
                                <div class="progress-bar bg-gradient-secondary" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 90%;"></div>
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
                                <div class="progress-bar bg-gradient-secondary" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 10%;"></div>
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
