<footer class="footer mt-7 py-4 bg-gray-800">
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center">
            <div class="col-12 col-sm-12 col-md-4 mb-4 text-center">
                <h6 class="text-white">Enlaces</h6>
                <ul class="nav nav-footer justify-content-center">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link">Sobre nosotros</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-sm-12 col-md-4 text-center">
                <div class="px-7 py-2">
                    <img src="{{ Storage::url('img/logos/vgv_white.svg') }}" alt="" class="img-fluid w-100 w-md-40">
                </div>
                <div class="copyright text-sm text-white mt-2">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>,
                    hecho por <b>Juan Fco Cirera Rosa</b> - Proyecto Integrado, <a href="https://iesalandalus.org/joomla/"
                        target="_blank" class="text-white">I.E.S Al-Ándalus</a>

                </div>
                <div id="version" class="text-center text-sm">
                    <small class="my-0 text-center">v0.1 alpha</small>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 text-center text-sm pt-4" id="license">
                <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img
                        alt="Creative Commons License" style="border-width:0"
                        src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br />This work is
                licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"
                    class="text-white">Creative
                    Commons Attribution-NonCommercial-NoDerivatives 4.0 International License</a>.
            </div>
        </div>
    </div>
</footer>
