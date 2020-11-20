<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function room()
    {
        return $this->belongsTo('App\Model\Room');
    }

    public function property()
    {
        return $this->belongsTo('App\Model\Property');
    }

    public function roomType()
    {
        return $this->belongsTo('App\Model\RoomType', 'room_type');
    }

    public function service()
    {
        return $this->belongsTo('App\Model\Service');
    }
}