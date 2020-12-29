<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use App\Airport;
class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        //
        $valuePartenza = $data['partenza'];
        $valueArrivo = $data['arrivo'];

        $code_departure = Airport::where("name", $valuePartenza)->first();
        $code_arrival = Airport::where("name", $valueArrivo)->first();

        $codicePartenza = $code_departure->code;
        $codiceArrivo = $code_arrival->code;

        // dd($code_departure);
        $partenze = Flight::where("code_departure", $codicePartenza)->get();
        $arrivo = Flight::where("code_arrival", $codiceArrivo)->get();

        $voli = [];

        $flights = Flight::all();
        $airports = Airport::all();

        foreach ($flights as $flight) {
            if ($flight->code_departure == $codicePartenza)  {
                $voli[] = $flight;
            } else if($flight->code_arrival == $codiceArrivo) {
                $voli[] = $flight;
            }
        }

        // $prova = [];
        // foreach ($voli as $volo) {
        //     if ($code_departure->name == $valuePartenza && $code_departure->code == $volo->code_departure) {
        //         $prova[] = $volo;
        //     }
        // }

        // $prova2 = [];

        // foreach ($voli as $volo) {
        //     if ($code_arrival->name == $valueArrivo && $code_arrival->code == $volo->code_arrival) {
        //         $prova2[] = $volo;
        //     }
        // }

        return view('flights.index', compact('voli', 'valuePartenza', 'valueArrivo', 'airports', 'code_departure', 'code_arrival'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        return view('flights.show', compact('flight'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
