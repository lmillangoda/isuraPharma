<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacist extends Model
{
  protected $fillable = [
    'id','fName','mName','lName','hNo','add1','add2','town','tel','dob','nic','branch_id',
   ];

  public function branch()
  {
    return $this->belongsTo('App\Branch');
  }

  function bills()
  {
    return $this->belongsToMany('App\Bill');
  }
}
