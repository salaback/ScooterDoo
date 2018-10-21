<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scooter extends Model
{
    protected $fillable = ['status'];

    public function slot()
    {
        return $this->hasOne(StationSlot::class);
    }

}
