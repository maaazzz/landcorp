<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    protected $guarded = [];

    // relation with brand
    public function brands()
    {
        return $this->hasMany('App\Model\Brand');
    }

    // relation with buildings
    public function buildings()
    {
        return $this->hasMany('App\Model\PropertyBuilding');
    }

    // relation with services
    public function services()
    {
        return $this->hasMany('App\Model\Service');
    }

    // relation with attendants
    public function attendants()
    {
        return $this->hasMany('App\Model\Attendant');
    }

    // relation with rooms
    public function rooms()
    {
        return $this->hasMany('App\Model\Room');
    }

    // relation with supervisors
    public function supervisors()
    {
        return $this->hasMany('App\Model\SuperVisor');
    }

    // relation with brand
    public function houseman()
    {
        return $this->hasMany('App\Model\Houseman');
    }
}