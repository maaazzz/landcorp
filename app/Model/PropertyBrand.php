<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PropertyBrand extends Model
{
    protected $guarded = [];

    public function schedule()
    {
        return $this->hasMany('App\Model\Schedule', 'property_brand_id');
    }

    public function properties()
    {
        return $this->hasMany('App\Model\Property', 'property_brand_id');
    }
}