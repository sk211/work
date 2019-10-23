<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class billing_detail extends Model
{
   public function products()
    {
        return $this->hasOne('App\product', 'id', 'product_id');
    }
}
