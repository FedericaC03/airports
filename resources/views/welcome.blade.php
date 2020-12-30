<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Cerca volo</title>

    </head>
    <body>
        <div class="container ">
        <form class="w-25 m-5" action="{{route('Flights.store')}}" method="post">
            @csrf
            @method('POST')

            <div class="form-group">
              <label for="departure">Da</label>

              <input name="partenza" type="text" class="form-control text-center" id="departure" placeholder="Città aeroporto di partenza">
            </div>
            <div class="form-group">
                <label for="arrival">A</label>
                <input name="arrivo" type="text" class="form-control text-center" id="arrival" placeholder="Città aeroporto di arrivo">
              </div>
            <button type="submit" class="btn btn-primary">Cerca voli</button>
          </form>
        </div>
    </body>
</html>
