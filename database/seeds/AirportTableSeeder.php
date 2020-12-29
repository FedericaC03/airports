<?php

use Illuminate\Database\Seeder;
use App\Airport;


class AirportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {
        $airportsNames = [
            "Roma",
            "Verona",
            "Milano",
            "Napoli",
            "Bari",
            "Parma"
        ];

        $airportsCodes = [
            "FCO",
            "VRN",
            "LIN",
            "NAP",
            "BRI",
            "PMF"
        ];

        $airportsLat = [
            "41.623805",
            "43.961956",
            "45.557099",
            "40.874096",
            "41.358058",
            "44.221742"
        ];

        $airportsLon = [
            "12.678939",
            "18.877628",
            "97.267397",
            "14.285857",
            "17.679779",
            "12.987095"
        ];

        for($i = 0; $i < count($airportsNames); $i++) {
            $newAirport = new Airport;
            $newAirport->name = $airportsNames[$i];
            $newAirport->code = $airportsCodes[$i];
            $newAirport->lat = $airportsLat[$i];
            $newAirport->lon = $airportsLon[$i];
            $newAirport->save();
        }
    }
}
