<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment_user extends Model
{

    protected $fillable = [
      'user_id',
      'appointment_id',
      'discount',
      'advance',
      'payment_mode_id',
      'remark',
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function appointment(){
      return $this->belongsTo('App\Appointment');
    }

    public function payment_mode(){
      return $this->belongsTo('App\Payment_mode');
    }
}
