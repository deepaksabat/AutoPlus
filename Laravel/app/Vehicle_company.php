<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_company extends Model
{
    protected $fillable = [
      'vehicle_company',
    ];

    public function vehicle_modal(){
      return $this->hasOne('App\Vehicle_modal');
    }

    public function appointment() {
      return $this->hasOne('App\Appointment');
    }

}
