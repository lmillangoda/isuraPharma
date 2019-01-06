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
      return $this->belongsToMany('App\Supplier');
    }

    public function branches()
    {
      return $this->belongsToMany('App\Branch', 'stock')
      ->withPivot('expDate', 'amount')
      ->withTimeStamps();
    }

    public function main_branches()
    {
      return $this->branches()
        ->wherePivot('batch', 1);
    }

    public function backup_branches()
    {
      return $this->branches()
        ->wherePivot('batch', 2);
    }
}
