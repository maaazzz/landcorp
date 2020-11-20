<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    public function schedule()
    {
        return $this->hasMany('App\Model\Schedule');
    }

    public function roomType()
    {
        return $this->belongsTo('App\Model\RoomType');
    }

    public function transactions()
    {
        return $this->hasMany('App\Model\Transaction');
    }

    public function property()
    {
        return $this->belongsTo('App\Model\Property');
    }
}