<?php
/**
 * Created by PhpStorm.
 * User: sean
 * Date: 20.10.18
 * Time: 16:33
 */

namespace App\Helpers;


use App\Reservation;
use App\Scooter;
use App\StationSlot;
use App\Trip;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ScooterFunctions
{
    public function reserve($pickup_station, $scooter_id, $pickup_time, $user_id = null)
    {
        $user_id =  1;
        $reservation = [
            'user_id' => $user_id,
            'status' => 'reserved',
            'pickup_station_id' => $pickup_station,
            'scooter_id' => $scooter_id,
            'pickup_time' => $pickup_time
        ];

        // reserve scooter
        $scooter = Scooter::find($scooter_id);

        $scooter->status = 'reserved';
        $scooter->save();

        return Reservation::create($reservation);
    }

    public function release($scooter, $reservation_id = null, $user_id = null)
    {

            // create trip
            $user_id = 1;

            $trip = [
                'user_id' => $user_id,
                'pickup_station_id' => $scooter->slot->cart->station->id,
                'scooter_id' => $scooter->id,
                'start_at' => Carbon::now(),
                'status' => 'in progress'
            ];

            $trip = Trip::create($trip);

            // if there is a reservation, close it
            if($reservation_id != null)
                $this->closeReservation($reservation_id, $trip->id);

            // set scooter to checked out
            $scooter->status = 'checked out';

        // send message to cart to release scooter.

        return $trip;
    }

    public function checkIn(Trip $trip, StationSlot $slot)
    {

        $scooter = $trip->scooter;
        $scooter->status = 'evaluating';
        $scooter->save();

        $slot->scooter_id = $scooter->id;
        $slot->status = 'evaluating';
        $slot->save();

        $trip->status = 'complete';
        $trip->dropoff_station_id = $slot->cart->station->id;
        $trip->end = Carbon::now();
        $trip->save();

        return 'done';
    }

    private function closeReservation($reservation_id, $trip_id)
    {
        $reservation = Reservation::find($reservation_id);
        $reservation->status = 'collected';
        $reservation_id->trip_id = $trip_id;
        $reservation->save();
    }
}