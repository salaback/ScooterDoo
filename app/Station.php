<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = ['lat', 'log', 'name'];

    /**
     * All carts in a station
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carts()
    {
        return $this->hasMany(StationCart::class);
    }

    public function getAvailableScootersAttribute($eta = null)
    {
        // add now as eta, if no offered
        if($eta == null)
        {
            $eta = Carbon::now();
        }

        // search for carts which will be available
        $carts =  $this->carts;

        // initialize scooters
        $scooters = [];

        // grab all available scooter ids
        foreach($carts as $cart) {
            $ids = $cart->slots->where('status', 'available')->pluck('scooter_id');
            $scooters = array_merge($scooters, $ids->toArray());
        }

        // return scooters as objects
        return Scooter::findMany($scooters);
    }
}
