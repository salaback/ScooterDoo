<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Http\Request;

class PickUpController extends Controller
{
    public function checkOutNow()
    {
        $stations = Station::all();
        return view('pickup.checkout', compact('stations'));
    }

    public function chooseLocation()
    {

    }


    public function createReservation(Request $request)
    {

    }

}
