<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
      'user_id',
      'vehicle_company_id',
      'vehicle_modal_id',
      'vehicle_types_id',
      'washing_plan_id',
      'status_id',
      'appointment_date',
      'vehicle_no',
      'time_frame',
      'appx_hour',
      'remark',
    ];

    public function user() {
      return $this->belongsTo('App\User');
    }

    public function vehicle_company() {
      return $this->belongsTo('App\Vehicle_company');
    }

    public function vehicle_modal() {
      return $this->belongsTo('App\Vehicle_modal');
    }

    public function vehicle_type() {
      return $this->belongsTo('App\Vehicle_type', 'vehicle_types_id');
    }

    public function washing_plan() {
      return $this->belongsTo('App\Washing_plan');
    }

    public function status() {
      return $this->belongsTo('App\Status');
    }

    public function payment(){
      return $this->hasOne('App\Payment');
    }
    
}
