<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
  public function branches()
  {
    return $this->belongsTo('App\Branch');
  }

  public function bills()
  {
    return $this->belongsToMany('App\Bill');
  }
}
