<div>
    <h5 class="text-center text-white mb-4">Seguidores</h5>

    <div class="mb-4">
        <input type="search" class="form-control text-white bg-gray-800"
        placeholder="Buscar usuario...">
    </div>

    @for ($i = 0; $i < 5; $i++)
        <div class="card bg-gray-800 mb-4 py-2">
            <div class="card-body px-4 py-2 text-white d-flex" style="text-align: left; align-items: center;">
                <div class="col-2">
                    <img src="{{ Auth::user()->avatar }}" alt="" class="img-fluid rounded-circle ">
                </div>
                <div class="col-10" style="text-align: left;">
                    <p class="ms-3 my-0">Seguidor {{ $i }}</p>
                </div>
            </div>
        </div>
    @endfor

</div>
