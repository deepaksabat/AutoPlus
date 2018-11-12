<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
      'c_name',
      'logo',
      'logo_two',
      'mobile',
      'phone',
      'address',
      'email',
      'website'
    ];
}
