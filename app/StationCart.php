<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StationCart extends Model
{
    protected $fillable = ['station_id', 'eta', 'name', 'status'];

    /**
     * All slots in a cart
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function slots()
    {
        return $this->hasMany(StationSlot::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
