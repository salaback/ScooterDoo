<?php

namespace App\Http\Controllers;

use App\Helpers\ScooterFunctions;
use App\Scooter;
use App\Station;
use App\StationCart;
use App\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PickUpController extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new ScooterFunctions();
    }

    public function chooseLocation()
    {
        $stations = Station::all();
        return view('pickup.choose-location', compact('stations'));
    }

    public function checkOutNow(Request $request)
    {
        $scooter = Scooter::find($request->get('scooter_id'));

        return view('pickup.checkout', compact('scooter'));
    }

    public function unlock($scooter_id)
    {
        $scooter = Scooter::find($scooter_id);

        $trip = $this->helper->release($scooter);

        return redirect(route('tripInProgress', [$trip->id]));
    }

    public function tripInProgress(Trip $trip)
    {
        $stations = Station::all();
        return view('pickup.tripInProgress', compact('trip', 'stations'));
    }

    public function return(Request $request)
    {

        return 'Checked In';

    }

    public function createReservation()
    {
        $stations = Station::all();
        return view('pickup.reserve', compact('stations'));
    }

    public function storeReservation(Request $request)
    {

        $station = Station::find($request->get('pickup_station_id'));

        $scooter_id = $station->availableScooters->first()->id;

        $this->helper->reserve($station, $scooter_id, $request->get('pickup_time'));

        return redirect('/');
    }

}
