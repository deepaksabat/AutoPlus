<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password', 'photo', 'sex', 'dob', 'mobile', 'phone', 'address', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function team_task() {
      return $this->hasOne('App\Team_task');
    }

    public function blogs() {
      return $this->hasOne('App\Blog');
    }

    public function appointment() {
      return $this->belongsToMany('App\Appointment', 'appointment_users');
    }

    public function is_admin(){

      if (Auth::check()) {

        $user = Auth::user();

        if ($user->role == 'A') {

          return true;

        }

        return false;

      }

      return false;
    }

    public function is_common(){

      if (Auth::check()) {

        $user = Auth::user();

        if ($user->role == 'S' OR $user->role == 'A') {

          return true;

        }

        return false;

      }

      return false;
    }
}
