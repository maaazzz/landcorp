<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $guarded = [];

    public function schedule()
    {
        return $this->hasMany('App\Model\Schedule');
    }

    public function rooms()
    {
        return $this->hasMany('App\Model\RoomType');
    }


    public function transactions()
    {
        return $this->hasMany('App\Model\Transaction');
    }
}