<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 20.10.18
 * Time: 19:54
 */

namespace App\Helpers;


use App\Scooter;
use App\Station;
use App\StationCart;

class CartDistributor
{
    public function redistribute()
    {
        // Create array of scooter levels per station
        $stationCounts = $this->getScooterLevels();

        // Create array of reservations per station in next 15 minutes

        // Move scooters to fill forth coming reservations

        // Move scooters with less than 2 scooters

        // Move from over saturation to under saturation

    }


    private function getScooterLevels()
    {
        // Load station cart information

        $carts = StationCart::all();
        $carts->loat('slots');

        $stations = [];

        foreach($carts as $cart)
        {
            if(notset($stations[$cart->station->id] ))
                $stations[$cart->station->id] = $cart->slots->count();
            else
                $stations[$cart->station->id] += $cart->slots->count();
        }

        return $stations;

    }

}