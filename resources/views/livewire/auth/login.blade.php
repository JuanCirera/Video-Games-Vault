<div>
    <main class="main-content mt-0">
        <section>
            <div class="container mt-8">
                <div class="row flex-row-reverse">
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                            style="background-image: url('/img/fondo_registro.jpg');
              background-size: cover;">
                            <span class="mask bg-dark opacity-6"></span>
                            <img class="mb-10 z-index-1 img-fluid" style="max-width: 50em"
                                src="/img/logos/VGV_completo.svg" alt="svg">
                            {{-- <h4 class="mb-15 text-white font-weight-bolder position-relative">"Gamers are awesome"</h4> --}}
                            {{-- TODO: Meter frase o eslogan --}}
                            {{-- <p class="text-white position-relative">The more effortless the writing looks, the more
                                    effort the writer actually put into the process.</p> --}}
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start bg-gray-900">
                                <h4 class="font-weight-bolder text-white">Iniciar sesión</h4>
                                <p class="mb-0">Introduce tu email y contraseña para entrar</p>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="{{ route('login.perform') }}">
                                    @csrf
                                    @method('post')

                                    <div class="flex flex-col mb-3">
                                        <input type="email" name="email"
                                            class="form-control form-control-lg bg-gray-700 text-white"
                                            value="{{ old('email') }}" aria-label="Email" placeholder="Email">
                                        @error('email')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col mb-3">
                                        <input type="password" name="password"
                                            class="form-control form-control-lg bg-gray-700 text-white"
                                            aria-label="Password" placeholder="Contraseña">
                                        @error('password')
                                            <p class="text-danger text-xs pt-1 mb-0"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Recuérdame</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Iniciar
                                            sesión</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-1 text-sm mx-auto">
                                    ¿Has olvidad la contraseña? Resetea la contraseña
                                    <a href="{{ route('reset-password') }}"
                                        class="text-primary font-weight-bold">aquí</a>
                                </p>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    ¿Aún no estas registrado?
                                    <a href="{{ route('register') }}" class="text-primary font-weight-bold">Crear
                                        cuenta</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
