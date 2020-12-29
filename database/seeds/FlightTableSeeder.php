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
        $flight1a = New FlightObj('FCO', 'NAP');
        $flightList[] = $flight1a;
        $flight1b = New FlightObj('FCO', 'BRI');
        $flightList[] = $flight1b;
        $flight1c = New FlightObj('FCO', 'VRN');
        $flightList[] = $flight1c;
        $flight1d = New FlightObj('FCO', 'PMF');
        $flightList[] = $flight1d;
        $flight1e = New FlightObj('FCO', 'LIN');
        $flightList[] = $flight1e;

        //MILANO
        $flight2a = New FlightObj('LIN', 'NAP');
        $flightList[] = $flight2a;
        $flight2b = New FlightObj('LIN', 'BRI');
        $flightList[] = $flight2b;
        $flight2c = New FlightObj('LIN', 'VRN');
        $flightList[] = $flight2c;
        $flight2d = New FlightObj('LIN', 'PMF');
        $flightList[] = $flight2d;
        $flight2e = New FlightObj('LIN', 'FCO');
        $flightList[] = $flight2e;

        //VERONA
        $flight3a = New FlightObj('VRN', 'NAP');
        $flightList[] = $flight3a;
        $flight3b = New FlightObj('VRN', 'BRI');
        $flightList[] = $flight3b;
        $flight3c = New FlightObj('VRN', 'LIN');
        $flightList[] = $flight3c;
        $flight3d = New FlightObj('VRN', 'PMF');
        $flightList[] = $flight3d;
        $flight3e = New FlightObj('VRN', 'FCO');
        $flightList[] = $flight3e;

        //NAPOLI
        $flight4a = New FlightObj('NAP', 'VRN');
        $flightList[] = $flight4a;
        $flight4b = New FlightObj('NAP', 'BRI');
        $flightList[] = $flight4b;
        $flight4c = New FlightObj('NAP', 'MIL');
        $flightList[] = $flight4c;
        $flight4d = New FlightObj('NAP', 'PMF');
        $flightList[] = $flight4d;
        $flight4e = New FlightObj('NAP', 'FCO');
        $flightList[] = $flight4e;

        //BARI
        $flight5a = New FlightObj('BRI', 'VRN');
        $flightList[] = $flight5a;
        $flight5b = New FlightObj('BRI', 'NAP');
        $flightList[] = $flight5b;
        $flight5c = New FlightObj('BRI', 'MIL');
        $flightList[] = $flight5c;
        $flight5d = New FlightObj('BRI', 'PMF');
        $flightList[] = $flight5d;
        $flight5e = New FlightObj('BRI', 'FCO');
        $flightList[] = $flight5e;

        //PARMA
        $flight6a = New FlightObj('PMF', 'VRN');
        $flightList[] = $flight6a;
        $flight6b = New FlightObj('PMF', 'NAP');
        $flightList[] = $flight6b;
        $flight6c = New FlightObj('PMF', 'MIL');
        $flightList[] = $flight6c;
        $flight6d = New FlightObj('PMF', 'BRI');
        $flightList[] = $flight6d;
        $flight6e = New FlightObj('PMF', 'FCO');
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
