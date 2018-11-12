<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $dates = ['date'];

    protected $fillable = [
      'title',
      'img',
      'user_id',
      'date',
      'dtl',
    ];

    public function users() {
      return $this->belongsTo('App\User', 'user_id');
    }
}
