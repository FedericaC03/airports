<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use App\Airport;
class FlightController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->all();

        //VALORI INPUT
        $valuePartenza = $data['partenza'];
        $valueArrivo = $data['arrivo'];

        $code_departure = Airport::where("name", $valuePartenza)->first();
        $code_arrival = Airport::where("name", $valueArrivo)->first();

        //CODICI AEROPORTO PARTENZA E ARRIVO DELLA INPUT
        $codicePartenza = $code_departure->code;
        $codiceArrivo = $code_arrival->code;

        $arrivo = Flight::where("code_arrival", $codiceArrivo)->get();

        $voli = [];

        //CERCO IL VOLO DIRETTO E UNISCO IN UN ARRAY SE CI SONO SCALI
        foreach ( $arrivo as $volo ) {
            if ( $volo->code_departure == $codicePartenza ) {
                $voli[] = [
                    'voli' => $volo,
                    'prezzo' => $volo->price
                ];
            } else {
                $scali = Flight::where("code_departure", $codicePartenza)->where("code_arrival", $volo->code_departure)->get();
                if ( $scali ) {
                    foreach ( $scali as $scalo) {
                        $voli[] = [
                            'voli' =>  [$scalo, $volo],
                            'prezzo' => $scalo->price + $volo->price
                        ];
                    }
                }
            }
        }

        //PRENDO IL PREZZO PIU' BASSO
        $voli = collect($voli)->sortBy('prezzo')->first();
        return view('flights.index', compact('voli', 'valuePartenza', 'valueArrivo','code_departure', 'code_arrival'));
    }
}
