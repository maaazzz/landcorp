<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public function schedule()
    {
        return $this->hasMany('App\Model\Schedule');
    }

    public function transactions()
    {
        return $this->hasMany('App\Model\Transaction');
    }
}