<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function bills()
    {
      return $this->belongsToMany('App\Bill');
    }

    public function suppliers()
    {
      return $this->belongsTo('App\Supplier');
    }
}
