<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = [];

    public function schedule()
    {
        return $this->hasMany('App\Model\Schedule');
    }


    public function propertyBuilding()
    {
        return $this->belongsTo('App\Model\PropertyBuilding');
    }

    public function propertyType()
    {
        return $this->belongsTo('App\Model\PropertyType');
    }

    public function transactions()
    {
        return $this->hasMany('App\Model\Transaction');
    }

    public function rooms()
    {
        return $this->hasMany('App\Model\Room');
    }
}