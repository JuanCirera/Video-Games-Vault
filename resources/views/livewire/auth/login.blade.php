<div>
    <main class="main-content mt-0">
        <section>
            <div class="container mt-8">
                <div class="row flex-row-reverse">
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                            style="background-image: url('{{ Storage::url('img/auth_background.jpg') }}');
              background-size: cover;">
                            <span class="mask bg-dark opacity-6"></span>
                            <img class="mb-10 z-index-1 img-fluid" style="max-width: 50em"
                                src="{{ Storage::url('img/logos/VGV_extended.svg') }}" alt="svg">
                            {{-- <h4 class="mb-15 text-white font-weight-bolder position-relative">"Gamers are awesome"</h4> --}}
                            {{-- TODO: Meter frase o eslogan --}}
                            {{-- <p class="text-white position-relative">The more effortless the writing looks, the more
                                    effort the writer actually put into the process.</p> --}}
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start bg-gray-900">
                                <h4 class="font-weight-bolder text-white">Inicia sesión</h4>
                                <div class="row px-xl-5 px-sm-4 px-3 pt-2">
                                    <div class="col-3 ms-auto px-1">
                                        <a class="btn btn-outline-light w-100" href="{{route('login-facebook')}}">
                                            <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(3.000000, 3.000000)" fill-rule="nonzero">
                                                        <circle fill="#3C5A9A" cx="29.5091719" cy="29.4927506"
                                                            r="29.4882047">
                                                        </circle>
                                                        <path
                                                            d="M39.0974944,9.05587273 L32.5651312,9.05587273 C28.6886088,9.05587273 24.3768224,10.6862851 24.3768224,16.3054653 C24.395747,18.2634019 24.3768224,20.1385313 24.3768224,22.2488655 L19.8922122,22.2488655 L19.8922122,29.3852113 L24.5156022,29.3852113 L24.5156022,49.9295284 L33.0113092,49.9295284 L33.0113092,29.2496356 L38.6187742,29.2496356 L39.1261316,22.2288395 L32.8649196,22.2288395 C32.8649196,22.2288395 32.8789377,19.1056932 32.8649196,18.1987181 C32.8649196,15.9781412 35.1755132,16.1053059 35.3144932,16.1053059 C36.4140178,16.1053059 38.5518876,16.1085101 39.1006986,16.1053059 L39.1006986,9.05587273 L39.0974944,9.05587273 L39.0974944,9.05587273 Z"
                                                            fill="#FFFFFF"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="col-3 me-auto px-1">
                                        <a class="btn btn-outline-light w-100" href="{{ route('login-google') }}">
                                            <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(3.000000, 2.000000)" fill-rule="nonzero">
                                                        <path
                                                            d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267"
                                                            fill="#4285F4"></path>
                                                        <path
                                                            d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667"
                                                            fill="#34A853"></path>
                                                        <path
                                                            d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782"
                                                            fill="#FBBC05"></path>
                                                        <path
                                                            d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769"
                                                            fill="#EB4335"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>

                                    <hr>

                                </div>
                                <p class="mb-0 text-secondary">O introduce tu email y contraseña</p>
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
                                        <label class="form-check-label text-secondary" for="rememberMe">Recuérdame</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Iniciar
                                            sesión</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-1 text-sm mx-auto text-secondary">
                                    ¿Has olvidad la contraseña? Resetea la contraseña
                                    <a href="{{ route('reset-password') }}"
                                        class="text-primary font-weight-bold">aquí</a>
                                </p>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto text-secondary">
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
