<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['pickup_station_id', 'user_id', 'trip_id', 'status'];

    protected $dateFormat = ['pickup_time', 'created_at', 'updated_at'];

    /**
     * Return owner of reservation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Pick up station
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pickupStation()
    {
        return $this->belongsTo(Station::class);
    }
}
