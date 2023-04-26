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
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div>
                                                        @if (Str::contains($user->avatar, 'ui-avatars'))
                                                            <img src="{{ $user->avatar }}" alt="profile_img"
                                                                class="avatar avatar-sm rounded-circle me-2">
                                                        @else
                                                            <img src="{{ Storage::url($user->avatar) }}"
                                                                alt="profile_img"
                                                                class="avatar avatar-sm rounded-circle me-2">
                                                        @endif
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xs">{{ $user->username }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-white">{{ $user->email }}
                                                </p>
                                            </td>
                                            <td class="align-middle">
                                                <button class="btn btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-primary">
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
                <hr>
                <section>
                    <h6>API</h6>
                    <div class="card min-height-300 max-height-300 bg-gray-900 p-2">
                        @php
                            $output=[];
                            $state;
                            // exec("tail -f storage/logs/laravel.log",$output, $state);
                            exec("whoami",$output, $state);
                            print_r($output);
                        @endphp
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
