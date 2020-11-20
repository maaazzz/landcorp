<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $guarded = [];

    public function schedule()
    {
        return $this->hasMany('App\Model\Schedule');
    }

    public function properties()
    {
        return $this->hasMany('App\Model\Property');
    }
}