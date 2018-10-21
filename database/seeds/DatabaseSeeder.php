<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $cart_name = 1;
        // Create 10 stations
        for($s = 0; $s <= 10; $s++)
        {
            $station = factory(\App\Station::class)->create();

            // create 5 carts per station
            for($c = 0; $c <= 5; $c++)
            {
                $cart = \App\StationCart::create([
                        'name' => $cart_name,
                        'station_id' => $station->id,
                        'eta' => \Carbon\Carbon::yesterday()
                ]);

                // create 9 slots in the cart
                for($i = 1; $i <= 10; $i++)
                {

                    \App\StationSlot::create([
                        'name' => 'Slot ' . $i,
                        'station_cart_id' => $cart->id,
                        'status' => 'empty'
                    ]);
                }
            }

        }

        // get empty slots
        $emptySlots = \App\StationSlot::where('status', 'empty')->pluck('id')->toArray();

        // create scooter and place in 100 random slots
        for($s = 0; $s <= 100; $s++)
        {

            $slot_key = rand(0, count($emptySlots));

            $slot_id = $emptySlots[$slot_key];

            $scooter = \App\Scooter::create([
                'status' => 'available'
            ]);

            $slot = \App\StationSlot::find($slot_id);

            $slot->scooter_id = $scooter->id;
            $slot->status = 'available';

            $slot->save();

        }

    }
}
