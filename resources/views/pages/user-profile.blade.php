@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ auth()->user()->profile_photo_path }}" alt="profile_image"
                            class="w-100 border-radius-2xl shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->username }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ auth()->user()->email }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <form role="form" method="POST" action={{ route('profile.update') }} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Editar perfil</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">información del usuario</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nombre de usuario</label>
                                        <input class="form-control" type="text" name="username"
                                            value="{{ old('username', auth()->user()->username) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Dirección de
                                            correo</label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="image" for="profile_photo">
                                        Imagen
                                    </label>
                                    <div class="form-group">
                                        <div>
                                            <img src="{{ auth()->user()->profile_photo_path }}" alt=""
                                                id="image" class="mx-auto d-block w-40">
                                        </div>
                                        <input name="file"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded cursor-pointer bg-gray-50 focus:outline-none"
                                            id="profile_photo" type="file" hidden>
                                        <div class="text-center">
                                            <label for="profile_photo" class="btn btn-secondary">
                                                <i class="fas fa-upload"></i> Subir imagen
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Seguridad</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="new_pwd" class="form-control-label">Nueva contraseña</label>
                                        <input class="form-control" type="password" name="new_pwd"
                                            value="{{ old('pwd') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="repeat_new_pwd" class="form-control-label">Repite la contraseña</label>
                                        <input class="form-control" type="password" name="repeat_new_pwd"
                                            value="{{ old('pwd') }}">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-5">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
