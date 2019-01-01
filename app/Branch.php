<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
  protected $fillable = array('App\town');

  public function users()
  {
    return $this->hasMany('App\User');
  }

  public function products()
  {
    return $this->belongsToMany('App\Product', 'stock')
      ->withPivot('expDate', 'amount')
      ->withTimeStamps();
  }
}
