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

    <h1 class="text-center m-2">Elenco Voli</h1>


    @foreach ($voli as $volo)

    <?php
        $minprice[] = $volo->price->first()
    ?>

    @if ($volo->price == min($minprice))
    <div class="container">
    <div class="card w-50 m-3 text-center">
        <h5 class="card-header">MIGLIOR PREZZO</h5>
        <div class="card-body">
          <h5 class="card-title font-weight-bold">{{$valuePartenza}} - {{$valueArrivo}}</h5>
          <p class="card-text ">{{$code_departure->code}} - {{$volo->code_departure}} - {{$volo->code_arrival}} {{$volo->price}}€</p>
          <a href="#" class="btn btn-primary">Acquista</a>
        </div>
    </div>
</div>
    @endif
    @endforeach


    <div class="container">
        @foreach ($voli as $volo)
        @if (($code_arrival->name == $valueArrivo && $code_arrival->code == $volo->code_arrival) && ($code_departure->name == $valuePartenza && $code_departure->code == $volo->code_departure))
        <div class="card w-50 m-3 text-center">
            <h5 class="card-header">DIRETTO</h5>
            <div class="card-body">
              <h5 class="card-title font-weight-bold">{{$valuePartenza}} - {{$valueArrivo}}</h5>
              <p class="card-text">{{$volo->code_departure}} - {{$volo->code_arrival}} {{$volo->price}}€</p>
              <a href="#" class="btn btn-primary">Acquista</a>
            </div>
          </div>
        @endif
        @endforeach
    </div>

    <div class="container w-100">
        @foreach ($voli as $volo)
        @if ($code_arrival->name == $valueArrivo && $code_arrival->code == $volo->code_arrival)
        <div class="card w-100 m-3 text-center">
            <h5 class="card-header">SCALO</h5>
            <div class="card-body">
              <h5 class="card-title font-weight-bold">{{$valuePartenza}} - {{$valueArrivo}}</h5>
              <p class="card-text ">{{$code_departure->code}} - {{$volo->code_departure}} - {{$volo->code_arrival}} {{$volo->price}}€</p>
              <a href="#" class="btn btn-primary">Acquista</a>
            </div>
        </div>
        @endif
        @endforeach
    </div>


</body>
</html>

