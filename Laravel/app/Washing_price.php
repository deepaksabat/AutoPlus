<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Washing_price extends Model
{
    protected $fillable = [
      'washing_plan_id',
      'vehicle_type_id',
      'price',
      'duration',
    ];

    public function washing_plan() {
      return $this->belongsTo('App\Washing_plan');
    }

    public function vehicle_type() {
      return $this->belongsTo('App\Vehicle_type');
    }

}
