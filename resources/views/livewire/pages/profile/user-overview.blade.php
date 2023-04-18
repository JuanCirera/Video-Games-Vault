<div>
    <h4 class="text-white">{{ count($user->videogames) }} videojuegos</h4>
    <div class="d-flex mt-4">
        <div class="col-5">
            <span class="text-white">Completados</span>
        </div>
        <div class="col-6">
            <div class="progress-wrapper pt-2">
                <div class="progress">
                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100" style="width: 50%;"></div>
                </div>
            </div>
        </div>
        <div class="col-1">
            <span class="text-white">
                {{-- TODO: arreglar la chapuza esta, tiene que haber otra forma --}}
                @php
                    $i = 0;
                @endphp
                @foreach ($user->videogames as $v)
                    @foreach ($v->categories as $cat)
                        @if ($cat->name == 'completados')
                            @php
                                $i++;
                            @endphp
                        @endif
                    @endforeach
                @endforeach
                {{ $i }}
            </span>
        </div>
    </div>
    <div class="d-flex mt-2">
        <div class="col-5">
            <span class="text-white">Sin jugar</span>
        </div>
        <div class="col-6">
            <div class="progress-wrapper pt-2">
                <div class="progress">
                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="60"
                        aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                </div>
            </div>
        </div>
        <div class="col-1">
            <span class="text-white">
                @php
                    $i = 0;
                @endphp
                @foreach ($user->videogames as $v)
                    @foreach ($v->categories as $cat)
                        @if ($cat->name == 'pendientes')
                            @php
                                $i++;
                            @endphp
                        @endif
                    @endforeach
                @endforeach
                {{ $i }}
            </span>
        </div>
    </div>
    <div class="d-flex mt-2">
        <div class="col-5">
            <span class="text-white">Probados</span>
        </div>
        <div class="col-6">
            <div class="progress-wrapper pt-2">
                <div class="progress">
                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="60"
                        aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                </div>
            </div>
        </div>
        <div class="col-1">
            <span class="text-white">
                @php
                    $i = 0;
                @endphp
                @foreach ($user->videogames as $v)
                    @foreach ($v->categories as $cat)
                        @if ($cat->name == 'probados')
                            @php
                                $i++;
                            @endphp
                        @endif
                    @endforeach
                @endforeach
                {{ $i }}
            </span>
        </div>
    </div>
    <div class="d-flex mt-2">
        <div class="col-5">
            <span class="text-white">Jugando actualmente</span>
        </div>
        <div class="col-6">
            <div class="progress-wrapper pt-2">
                <div class="progress">
                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="60"
                        aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                </div>
            </div>
        </div>
        <div class="col-1">
            <span class="text-white">
                @php
                    $i = 0;
                @endphp
                @foreach ($user->videogames as $v)
                    @foreach ($v->categories as $cat)
                        @if ($cat->name == 'jugando actualmente')
                            @php
                                $i++;
                            @endphp
                        @endif
                    @endforeach
                @endforeach
                {{ $i }}
            </span>
        </div>
    </div>
</div>
<div class="mt-5">
    <h4 class="text-white">{{ count($user->reviews) }} reseñas</h4>
    <div class="d-flex mt-4" style="align-items: flex-end !important">
        <div class="col-5">
            <span class="text-white">Positivas</span>
        </div>
        <div class="col-6">
            <div class="progress-wrapper pb-2">
                <div class="progress">
                    <div class="progress-bar bg-gradient-secondary" role="progressbar" aria-valuenow="60"
                        aria-valuemin="0" aria-valuemax="100"
                        @empty($user->reviews)
                            style="width: {{ (count($positiveReviews) / count($user->reviews)) * 100 }}%;"
                        @else
                            style="width: 0%;"
                        @endempty>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1">
            <span class="text-white">{{ count($positiveReviews) }}</span>
        </div>
    </div>
    <div class="d-flex mt-2" style="align-items: flex-end !important">
        <div class="col-5">
            <span class="text-white">Negativas</span>
        </div>
        <div class="col-6">
            <div class="progress-wrapper pb-2">
                <div class="progress">
                    <div class="progress-bar bg-gradient-secondary" role="progressbar" aria-valuenow="60"
                        aria-valuemin="0" aria-valuemax="100"
                        @empty($user->reviews)
                            style="width: {{ (count($negativeReviews) / count($user->reviews)) * 100 }}%;"
                        @else
                            style="width: 0%;"
                        @endempty>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1">
            <span class="text-white">{{ count($negativeReviews) }}</span>
        </div>
    </div>
</div>
