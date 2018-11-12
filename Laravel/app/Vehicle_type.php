<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_type extends Model
{
    protected $fillable = [
      'icon',
      'type',
    ];

    public function washing_price(){
      return $this->hasOne('App\Washing_price');
    }

    public function appointment() {
      return $this->hasOne('App\Appointment');
    }
}
