<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Inspector extends Model
{
    protected $guarded = [];

    public function schedule()
    {
        return $this->hasMany('App\Model\Schedule');
    }
}