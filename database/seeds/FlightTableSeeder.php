<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Flight;

class FlightObj
{
    public $code_departure;
    public $code_arrival;

    public function __construct($code_departure, $code_arrival)
    {
        $this->code_departure = $code_departure;
        $this->code_arrival = $code_arrival;
    }
}
class FlightTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $flightList = [];

        //ROMA
        $flight1a = New FlightObj('FCO123', 'NAP123');
        $flightList[] = $flight1a;
        $flight1b = New FlightObj('FCO123', 'BRI123');
        $flightList[] = $flight1b;
        $flight1c = New FlightObj('FCO123', 'VRN123');
        $flightList[] = $flight1c;
        $flight1d = New FlightObj('FCO123', 'PMF123');
        $flightList[] = $flight1d;
        $flight1e = New FlightObj('FCO123', 'LIN123');
        $flightList[] = $flight1e;

        //MILANO
        $flight2a = New FlightObj('LIN623', 'NAP123');
        $flightList[] = $flight2a;
        $flight2b = New FlightObj('LIN123', 'BRI123');
        $flightList[] = $flight2b;
        $flight2c = New FlightObj('LIN123', 'VRN123');
        $flightList[] = $flight2c;
        $flight2d = New FlightObj('LIN123', 'PMF123');
        $flightList[] = $flight2d;
        $flight2e = New FlightObj('LIN123', 'FCO123');
        $flightList[] = $flight2e;

        //VERONA
        $flight3a = New FlightObj('VRN623', 'NAP123');
        $flightList[] = $flight3a;
        $flight3b = New FlightObj('VRN123', 'BRI123');
        $flightList[] = $flight3b;
        $flight3c = New FlightObj('VRN123', 'MIL123');
        $flightList[] = $flight3c;
        $flight3d = New FlightObj('VRN123', 'PMF123');
        $flightList[] = $flight3d;
        $flight3e = New FlightObj('VRN123', 'FCO123');
        $flightList[] = $flight3e;

        //NAPOLI
        $flight4a = New FlightObj('NAP623', 'VRN123');
        $flightList[] = $flight4a;
        $flight4b = New FlightObj('NAP123', 'BRI123');
        $flightList[] = $flight4b;
        $flight4c = New FlightObj('NAP123', 'MIL123');
        $flightList[] = $flight4c;
        $flight4d = New FlightObj('NAP123', 'PMF123');
        $flightList[] = $flight4d;
        $flight4e = New FlightObj('NAP123', 'FCO123');
        $flightList[] = $flight4e;

        //BARI
        $flight5a = New FlightObj('BRI623', 'VRN123');
        $flightList[] = $flight5a;
        $flight5b = New FlightObj('BRI123', 'NAP123');
        $flightList[] = $flight5b;
        $flight5c = New FlightObj('BRI123', 'MIL123');
        $flightList[] = $flight5c;
        $flight5d = New FlightObj('BRI123', 'PMF123');
        $flightList[] = $flight5d;
        $flight5e = New FlightObj('BRI123', 'FCO123');
        $flightList[] = $flight5e;

        //PARMA
        $flight6a = New FlightObj('PMF623', 'VRN123');
        $flightList[] = $flight6a;
        $flight6b = New FlightObj('PMF123', 'NAP123');
        $flightList[] = $flight6b;
        $flight6c = New FlightObj('PMF123', 'MIL123');
        $flightList[] = $flight6c;
        $flight6d = New FlightObj('PMF123', 'BRI123');
        $flightList[] = $flight6d;
        $flight6e = New FlightObj('PMF123', 'FCO123');
        $flightList[] = $flight6e;

        for($i = 0; $i < count($flightList); $i++) {
            $newflight = new Flight;
            $newflight->code_departure = $flightList[$i]->code_departure;
            $newflight->code_arrival = $flightList[$i]->code_arrival;
            $newflight->price = $faker->numberBetween(50, 300);
            $newflight->save();
        }
    }
}
