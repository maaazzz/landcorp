<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [];

    // property relation
    public function property()
    {
        return $this->belongsTo('App\Model\Property');
    }

    // property type relation

    public function propertyType()
    {
        return $this->belongsTo('App\Model\PropertyType');
    }

    // property relation
    public function propertyBrand()
    {
        return $this->belongsTo('App\Model\PropertyBrand');
    }

    // room relation
    public function room()
    {
        return $this->belongsTo('App\Model\Room');
    }

    // room type relation
    public function roomType()
    {
        return $this->belongsTo('App\Model\RoomType');
    }

    // relation with service
    public function service()
    {
        return $this->belongsTo('App\Model\Service');
    }

    // relation with attendant
    public function attendant()
    {
        return $this->belongsTo('App\Model\Attendant');
    }

    // relation with inspector
    public function inspector()
    {
        return $this->belongsTo('App\Model\Inspector');
    }

    // relation with supervisor
    public function supervisor()
    {
        return $this->belongsTo('App\Model\SuperVisor');
    }

    // relation with houseman
    public function houseman()
    {
        return $this->belongsTo('App\Model\Houseman');
    }

    public function propertyBuilding()
    {
        return $this->belongsTo('App\Model\PropertyBuilding');
    }
}