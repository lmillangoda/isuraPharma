<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
  public function cashier()
  {
    return $this->belongsTo('App\User');
  }

  public function pharmacist()
  {
    return $this->belongsTo('App\User');
  }

  public function products()
  {
    return $this->belongsToMany('App\Product')->withPivot('amount','cost')->withTimestamps();
  }

}
