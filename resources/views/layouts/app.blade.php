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
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/css/argon-dashboard.css')}}" rel="stylesheet" />
    {{-- FA --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles

</head>

<body class="{{ $class ?? '' }}">

    @guest
        @include('livewire.navbar')
        <main class="main-content">
            {{-- NOTE: El yield que traia ARGON no funciona con livewire, hay que meter un slot --}}
            {{-- @yield('content') --}}
            {{ $slot }}
        </main>
    @endguest

    @auth
        @include('livewire.navbar')
        <main class="main-content">
            {{ $slot }}
        </main>
        {{-- NOTE: Esto no sirve pa na de momento --}}
        {{-- @include('components.fixed-plugin') --}}
    @endauth

    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('assets/js/argon-dashboard.js')}}"></script>
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
    {{-- SA --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('js')

    @if (session('error_msg'))
        <script>
            let timerInterval
            Swal.fire({
                icon: 'error',
                title: '{{ session('error_msg') }}',
                position: 'top-end',
                timer: 2000,
                timerProgressBar: true,
                toast: true,
                showConfirmButton = false,
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
        </script>
    @endif

    @if (session('success_msg'))
        <script>
            let timerInterval
            Swal.fire({
                icon: 'success',
                title: '{{ session('success_msg') }}',
                position: 'top-end',
                timer: 2000,
                timerProgressBar: true,
                toast: true,
                showConfirmButton = false,
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('Alert closed by the timer')
                }
            })
        </script>
    @endif

    @if (session('warning_msg'))
        <script>
            let timerInterval
            Swal.fire({
                icon: 'warning',
                title: '{{ session('warning_msg') }}',
                position: 'top-end',
                timer: 2000,
                timerProgressBar: true,
                toast: true,
                showConfirmButton = false,
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('Alert closed by the timer')
                }
            })
        </script>
    @endif

    @if (session('info_msg'))
        <script>
            let timerInterval
            Swal.fire({
                icon: 'info',
                title: '{{ session('info_msg') }}',
                position: 'top-end',
                timer: 2000,
                timerProgressBar: true,
                toast: true,
                showConfirmButton = false,
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('Alert closed by the timer')
                }
            })
        </script>
    @endif

    @livewireScripts

</body>

</html>
