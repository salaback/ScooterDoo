<?php

namespace App\Http\Controllers;

use App\Scooter;
use App\Station;
use Illuminate\Http\Request;

class ScooterController extends Controller
{

    /**
     * Return all available scooters at station
     * @param Station $station
     */
    public function find($station_id)
    {
        $station = Station::find($station_id);

        $scooter =  $station->availableScooters->first();

        if($scooter != null)
        {
            return $scooter->id;
        }
        else
            return null;

    }

    public function reserve(Request $request)
    {

    }

    public function checkOut(Scooter $scooter)
    {

    }

    public function release(Scooter $scooter)
    {

    }

    public function checkIn(Scooter $scooter)
    {

    }
}
