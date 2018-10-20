<?php

namespace Tests\Feature;

use App\Scooter;
use App\Station;
use App\StationCart;
use App\StationSlot;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StationModelTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAvailableScooters()
    {
        // create fake station, 9 slots, and three scooters
        $station = factory(Station::class)->create();


        $cart = StationCart::create([
            'station_id' => $station->id,
            'eta' => Carbon::yesterday(),
            'name' => 'Test Cart',
            'status' => 'parked'
        ]);

        for($i = 1; $i <= 10; $i++)
        {
            $slot = StationSlot::create([
                'station_cart_id' => $cart->id,
                'name' => 'Slot ' . $i,
            ]);

            if($i < 4)
            {
                $scooter = Scooter::create([
                    'status' => 'docked'
                ]);

                $slot->scooter_id = $scooter->id;
                $slot->status = "available";
                $slot->save();
            }
        }

        $results = $station->availableScooters;

        $this->assertEquals($results->count(), 3, 'Three available scooters found');

    }
}
