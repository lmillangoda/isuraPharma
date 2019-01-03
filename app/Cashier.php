<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{

  protected $fillable = [
    'id','fName','mName','lName','hNo','add1','add2','town','tel','dob','nic','branch_id',
   ];
   
  public function branches()
  {
    return $this->belongsTo('App\Branch');
  }

  public function bills()
  {
    return $this->belongsToMany('App\Bill');
  }
}
