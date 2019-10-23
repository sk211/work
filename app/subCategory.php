<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
   // public function subCategory()
   //  {
   //      return $this->hasOne('App\category');
   //  }

  public  function category()
   {
   return $this->hasOne('App\category', 'id', 'category_id');

   }

     public function thirdCategory()
    {
        return $this->hasMany('App\thirdCategory');
    }

        public function products()
    {
        return $this->hasMany('App\product');
    }

}
