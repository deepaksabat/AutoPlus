<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_modal extends Model
{
    protected $fillable = [
      'vehicle_company_id',
      'vehicle_modal',
    ];

    public function vehicle_company(){
      return $this->belongsTo('App\Vehicle_company');
    }

    public function appointment() {
      return $this->hasOne('App\Appointment');
    }
}
