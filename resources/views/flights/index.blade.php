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

    @if ($valuePartenza != $valueArrivo)
        {{-- SE IL PREZZO MIGLIORE E' UN DIRETTO --}}
        @if (!is_array($voli['voli']))
       <div class="container">
          <div class="mt-5 card w-50 m-3 text-center">
              <h5 class="card-header">MIGLIOR PREZZO</h5>
              <div class="card-body">
                  <h5 class="card-title font-weight-bold">{{$valuePartenza}} - {{$valueArrivo}}</h5>
                  <p class="card-text">{{$voli['voli']['code_departure']}} - {{$voli['voli']['code_arrival']}}<br>{{$voli['prezzo']}}€</p>
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
                    <h5 class="card-title font-weight-bold">{{$valuePartenza}} - {{$valueArrivo}} <br> {{$voli['prezzo']}}€</h5>
                    <div class="container-scalo">
                    @foreach($voli['voli'] as $volo)
                        <p class="card-text">{{$volo->code_departure}} - {{$volo->code_arrival}}<br>{{$volo->price}}€</p>
                        @endforeach
                    </div>
                        <a href="#" class="btn btn-primary">Acquista</a>
                  </div>
              </div>
        @endif
    @else
    <h3>Errore: La città di partenza non può corrispondere con la città di arrivo</h3>
   @endif
</body>
</html>

