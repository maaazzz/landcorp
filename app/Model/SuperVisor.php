<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class SuperVisor extends Model
{
    protected $guarded = [];

    public function schedule()
    {
        return $this->hasMany('App\Model\Schedule');
    }
}