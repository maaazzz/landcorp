<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PropertyBuilding extends Model
{
    protected $guarded = [];

    public function schedule()
    {
        return $this->hasMany('App\Model\Schedule');
    }

    public function property()
    {
        return $this->hasOne('App\Model\Property');
    }
}