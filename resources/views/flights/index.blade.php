<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>I tuoi voli</title>
</head>
<body>
    <main>
        {{-- SEZIONE PREZZO MIGLIORE --}}
        <section>
            @if ($valuePartenza != $valueArrivo)
                {{-- SE IL PREZZO MIGLIORE E' UN DIRETTO --}}
                @if (!is_array($voloConveniente['voli']))
                    <div class="container">
                         <div class="mt-5 card w-50 m-3 text-center">
                            <h5 class="card-header">MIGLIOR PREZZO</h5>
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{$valuePartenza}} - {{$valueArrivo}}</h5>
                                <p class="card-text">{{$voloConveniente['voli']['code_departure']}} - {{$voloConveniente['voli']['code_arrival']}}<br>{{$voloConveniente['prezzo']}}€</p>
                                <a href="#" class="btn btn-primary">Acquista</a>
                            </div>
                        </div>
                    </div>
                @else
                {{-- SE IL PREZZO MIGLIORE E' UNO SCALO --}}
                <div class="container">
                    <div class="card w-50 m-3 text-center">
                        <h5 class="card-header">MIGLIOR PREZZO</h5>
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{$valuePartenza}} - {{$valueArrivo}} <br> {{$voloConveniente['prezzo']}}€</h5>
                            <div class="container-scalo">
                                @foreach($voloConveniente['voli'] as $voloConScalo)
                                    <p class="card-text">{{$voloConScalo->code_departure}} - {{$voloConScalo->code_arrival}}<br>{{$voloConScalo->price}}€</p>
                                @endforeach
                            </div>
                            <a href="#" class="btn btn-primary">Acquista</a>
                        </div>
                    </div>
                </div>
                @endif
        </section>
    {{--FINE SEZIONE PREZZO MIGLIORE --}}

    {{-- SEZIONE VOLO DIRETTO --}}
        <section>
        @foreach ($voli as $volo)
            @if (!is_array($volo['voli']))
                <div class="container">
                    <div class="mt-5 card w-50 m-3 text-center">
                        <h5 class="card-header">VOLO DIRETTO</h5>
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{$valuePartenza}} - {{$valueArrivo}}</h5>
                            <p class="card-text">{{$volo['voli']['code_departure']}} - {{$volo['voli']['code_arrival']}}<br>{{$volo['prezzo']}}€</p>
                            <a href="#" class="btn btn-primary">Acquista</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        </section>
        {{--FINE SEZIONE VOLO DIRETTO --}}

        {{--SEZIONE VOLO CON SCALO --}}
        <section class="d-flex justify-content-center">
            @foreach ($voli as $volo)
            @if (is_array($volo['voli']))
                <div class="">
                    <div class="mt-5 card m-3 text-center float-left ">
                        <h5 class="card-header">VOLO CON SCALO</h5>
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{$valuePartenza}} - {{$valueArrivo}} {{$volo['prezzo']}}€</h5>
                                @foreach($volo['voli'] as $voloConScalo)
                                <p class="card-text">{{$voloConScalo->code_departure}} - {{$voloConScalo->code_arrival}}<br>{{$voloConScalo->price}}€</p>
                                @endforeach
                            <a href="#" class="btn btn-primary">Acquista</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        </section>
        {{--FINE SEZIONE VOLO CON SCALO --}}

        @else
            <h3>Errore: La città di partenza non può corrispondere con la città di arrivo</h3>
        @endif
    </main>
</body>
</html>

