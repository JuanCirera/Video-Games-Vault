<div>
    @include('layouts.navbars.auth.topnav')
    <div class="row mt-4 px-lg-4">
        <div class="col-12">
            <div class="card mb-4 p-4 bg-gray-800">
                <section>
                    <h6>Gestión de usuarios</h6>
                    <div class="card bg-gray-700">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-white">
                                            Username</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-white">
                                            Email</th>
                                        {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-white">
                                        Status</th> --}}
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-white">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $u)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div>
                                                        @if (Str::contains($u->avatar, 'ui-avatars') || Str::contains($u->avatar, 'lh3.googleusercontent'))
                                                            <img src="{{ $u->avatar }}" alt="profile_img"
                                                                class="avatar rounded-circle me-2" width="45"
                                                                height="45" style="object-fit: cover;">
                                                        @else
                                                            <img src="{{ Storage::url($u->avatar) }}" alt="profile_img"
                                                                class="avatar rounded-circle me-2" width="45"
                                                                height="45" style="object-fit: cover;">
                                                        @endif
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xs">{{ $u->username }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-white">{{ $u->email }}
                                                </p>
                                            </td>
                                            <td class="align-middle">
                                                <button class="btn btn-primary"
                                                    wire:click="editUser({{ $u->id }})" data-bs-toggle="modal"
                                                    data-bs-target="#editUser-modal">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-primary"
                                                    wire:click="destroyUser({{ $u->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editUser-modal" role="dialog" aria-labelledby="editUser-modal" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content bg-gray-800">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Editar usuario</h6>
                </div>
                <div class="modal-body px-4">
                    @isset($user)
                        <div class="form-group text-start">
                            <label for="username" class="text-white">Nombre de usuario</label>
                            <input type="text" class="form-control bg-gray-700 text-white" id="username"
                                name="user.username" wire:model="user.username" />
                            @error('user.username')
                                <p class="text-warning">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group text-start">
                            <label for="pwd" class="text-white">Nueva contraseña</label>
                            <input type="password" class="form-control bg-gray-700 text-white" id="pwd"
                                name="password" wire:model="password" />
                            @error('password')
                                <p class="text-warning">{{ $message }}</p>
                            @enderror
                            <p class="text-sm mt-2">Debe contener mínimo 1 letra minúscula, 1 mayúscula y 1 número
                                con
                                una logitud mínima de 6 caracteres</p>
                        </div>
                        <div class="form-group text-start">
                            <label for="repeat-pwd" class="text-white">Repite la contraseña</label>
                            <input type="password" class="form-control bg-gray-700 text-white" id="repeat-pwd"
                                wire:model="repeat_password">
                            @error('repeat_password')
                                <p class="text-warning">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary my-4" wire:click="updateUser({{ $user->id }})">
                                <span class="spinner-border spinner-border-sm text-white" role="status" wire:loading
                                    wire:target="updateUser">
                                    <span class="visually-hidden">Loading...</span>
                                </span>
                                Guardar
                            </button>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
