<h1>Elenco Voli:</h1>

<h3>Diretti:</h3>
<ul>
    @foreach ($voli as $volo)
    @if (($code_arrival->name == $valueArrivo && $code_arrival->code == $volo->code_arrival) && ($code_departure->name == $valuePartenza && $code_departure->code == $volo->code_departure))
    <li>
        {{$volo->code_departure}}
    </li>
    <li>{{$volo->code_arrival}}</li>
    <li>{{$volo->price}}</li>
    <hr>
    @endif
    @endforeach
</ul>

<h3>Con scalo:</h3>

<ul>
    @foreach ($voli as $volo)
    @if ($code_departure->code != $volo->code_departure)
    @if ($code_arrival->name == $valueArrivo && $code_arrival->code == $volo->code_arrival)
    <li>{{$code_departure->code}}</li>
    <li>
        {{$volo->code_departure}}
    </li>
    <li>{{$volo->code_arrival}}</li>
    <li>{{$volo->price}}</li>
    <hr>
    @endif
    @endif
    @endforeach
</ul>


<h3>Prezzo migliore:</h3>

    @foreach ($voli as $volo)

    <?php
        $minprice[] = $volo->price
    ?>
    @if ($volo->price == min($minprice))
    <li>{{$code_departure->code}}</li>
    <li>
        {{$volo->code_departure}}
    </li>
    <li>{{$volo->code_arrival}}</li>
    <li>{{$volo->price}}</li>
    <hr>

    @endif

    @endforeach
