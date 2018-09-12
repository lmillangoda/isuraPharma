<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacist extends Model
{
  public function branch()
  {
    return $this->belongsTo('App\Branch');
  }

  function bills()
  {
    return $this->belongsToMany('App\Bill');
  }
}
