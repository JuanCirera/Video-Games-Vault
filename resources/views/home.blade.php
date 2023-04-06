{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-8 mb-5">
            <h2 class="text-white">Novedades y más populares</h2>
            <form class="row mt-4 ml-2 mr-2">
                <div class="col-6">
                    <label for="order" class="text-gray">Ordenar por: </label>
                    <select class="form-control bg-gray-800 text-white" id="order">
                        <option>Popularidad</option>
                        <option>Fecha lanzamiento</option>
                        <option>Nombre</option>
                        <option>Ultimos añadidos</option>
                        <option>Nota media</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="paginate" class="text-gray">Viendo: </label>
                    <select class="form-control bg-gray-800 text-white" id="paginate">
                            <option>5</option>
                            <option>10</option>
                            <option>20</option>
                            <option>25</option>                     
                    </select>
                </div>
            </form>
        </div>

        @for ($i = 0; $i < 5; $i++)
            <div class="card bg-gray-800 mx-auto mb-4">
                <div class="card-header p-0 bg-gray-800">
                    <img src="/img/videogames/BF1.jpg" class="img-fluid border-radius-lg"
                        style="border-bottom-right-radius: 0;border-bottom-left-radius: 0">
                </div>

                <div class="card-body pt-2">
                    <div class="row">
                        <h4 class="col-10 card-title d-block text-white">
                            Battlefield 1
                        </h4>
                        <div class="col-2">
                            <p class="text-center border border-primary border-radius-md text-primary text-bold">85</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <i class="fa-brands fa-windows text-white"></i>
                        <i class="fa-brands fa-xbox text-white"></i>
                        <i class="fa-brands fa-playstation text-white"></i>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-secondary">
                            <i class="fas fa-plus"></i> Seguir
                        </button>
    
                        <button class="btn btn-secondary">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection

