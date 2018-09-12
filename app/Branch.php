<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
  protected $fillable = array('App\town');

  public function customers()
  {
    return $this->hasMany('App\Customer');
  }

  public function pharmacists()
  {
    return $this->hasMany('App\Pharmacist');
  }

  public function cashiers()
  {
    return $this->hasMany('App\Cashier');
  }
}
