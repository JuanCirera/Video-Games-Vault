<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <title>
        Video Games Vault
    </title>
    <!--  Fonts and icons  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet" />
    {{-- FA --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- BS ICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    @livewireStyles

</head>

<body class="{{ $class ?? 'g-sidenav-show' }}">

    @guest
        @include('livewire.navbar')
        <main class="main-content">
            {{ $slot }}
        </main>
    @endguest

    @auth
        @role('user|external_user')
            @include('livewire.navbar')
            <main class="main-content">
                {{ $slot }}
            </main>
        @endrole
        @role('admin')
            @if (Route::getCurrentRoute()->getName()=="dashboard")
                @include('layouts.navbars.auth.sidenav')
            @else
                @include('livewire.navbar')
            @endif
            <main class="main-content">
                {{ $slot }}
            </main>
        @endrole
    @endauth

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/argon-dashboard.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    {{-- SA CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('error_msg'))
        <script>
            let timerInterval
            Swal.fire({
                icon: 'error',
                iconColor: 'white',
                title: '{{ session('error_msg') }}',
                position: 'top-end',
                timer: 2500,
                timerProgressBar: true,
                toast: true,
                showConfirmButton: false,
                willClose: () => {
                    clearInterval(timerInterval)
                },
                customClass: {
                    popup: 'colored-toast'
                },
            })
        </script>
    @endif

    @if (session('success_msg'))
        <script>
            let timerInterval
            Swal.fire({
                icon: 'success',
                iconColor: 'white',
                title: '{{ session('success_msg') }}',
                position: 'top-end',
                timer: 2500,
                timerProgressBar: true,
                toast: true,
                showConfirmButton: false,
                willClose: () => {
                    clearInterval(timerInterval)
                },
                customClass: {
                    popup: 'colored-toast'
                },
            })
        </script>
    @endif

    @if (session('warning_msg'))
        <script>
            let timerInterval
            Swal.fire({
                icon: 'warning',
                iconColor: 'white',
                title: '{{ session('warning_msg') }}',
                position: 'top-end',
                timer: 2500,
                timerProgressBar: true,
                toast: true,
                showConfirmButton: false,
                willClose: () => {
                    clearInterval(timerInterval)
                },
                customClass: {
                    popup: 'colored-toast'
                },
            })
        </script>
    @endif

    @if (session('info_msg'))
        <script>
            let timerInterval
            Swal.fire({
                icon: 'info',
                iconColor: 'white',
                title: '{{ session('info_msg') }}',
                position: 'top-end',
                timer: 2500,
                timerProgressBar: true,
                toast: true,
                showConfirmButton: false,
                willClose: () => {
                    clearInterval(timerInterval)
                },
                customClass: {
                    popup: 'colored-toast'
                },
            })
        </script>
    @endif

    @stack('js')

    @livewireScripts

</body>

</html>
