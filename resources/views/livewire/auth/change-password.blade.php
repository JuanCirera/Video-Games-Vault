<div>
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row flex-row-reverse">
                <div
                    class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                    <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                        style="background-image: url('{{ Storage::url('img/auth_background.jpg') }}');
              background-size: cover;">
                        <span class="mask bg-dark opacity-6"></span>
                        <img class="mb-10 z-index-1 img-fluid" style="max-width: 50em"
                            src="{{ Storage::url('img/logos/VGV_extended.svg') }}" alt="svg">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-start bg-gray-900">
                            <h4 class="font-weight-bolder">Resetear contraseña</h4>
                            <p class="mb-0 text-secondary">Introduce tu correo y la nueva contraseña</p>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('change.perform') }}">
                                @csrf

                                <div class="flex flex-col mb-3">
                                    <input type="email" name="email"
                                        class="form-control form-control-lg bg-gray-800 text-white" placeholder="Email"
                                        value="{{ old('email') }}" aria-label="Email">
                                    @error('email')
                                        <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="password" name="password"
                                        class="form-control form-control-lg bg-gray-800 text-white"
                                        placeholder="Nueva contraseña" aria-label="Password">
                                    @error('password')
                                        <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="password" name="confirm-password"
                                        class="form-control form-control-lg bg-gray-800 text-white"
                                        placeholder="Repite la contraseña" aria-label="Password">
                                    @error('confirm-password')
                                        <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <input type="hidden" hidden value="{{$user_id}}" name="u_id">
                                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">
                                        <span wire:loading.remove>Enviar</span><span wire:loading>Enviando...</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div id="alert">
                            @include('components.alert')
                        </div>
                    </div>
                </div>
                {{-- <div
                    class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                    <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                        style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
              background-size: cover;">
                        <span class="mask bg-gradient-primary opacity-6"></span>
                        <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new
                            currency"</h4>
                        <p class="text-white position-relative">The more effortless the writing looks, the more
                            effort the writer actually put into the process.</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
