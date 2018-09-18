<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
  public function cashiers()
  {
    return $this->hasOne('App\Cashier');
  }

  public function pharmacists()
  {
    return $this->hasOne('App\Pharmacist');
  }

  public function products()
  {
    return $this->belongsToMany('App\Product');
  }

  public function customers()
  {
    return $this->hasOne('App\Customer');
  }
}
