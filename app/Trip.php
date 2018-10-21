<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['user_id', 'pickup_station_id', 'dropoff_station_id', 'scooter_id', 'start_at', 'end_at', 'status', 'meta'];

    /**
     *
     * Trip owner
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scooter used for trip
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function scooter()
    {
        return $this->hasOne(Scooter::class);
    }
}
