<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
      'status',
    ];

    public function team_task() {
      return $this->hasOne('App\Team_task');
    }

    public function appointment() {
      return $this->hasOne('App\Appointment');
    }
}
