<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StationSlot extends Model
{
    protected $fillable = ['name', 'station_cart_id', 'scooter_id', 'status'];

    /**
     * the parent cart of the slot
     */
    public function cart()
    {
        return $this->belongsTo(Station::class);
    }
}
