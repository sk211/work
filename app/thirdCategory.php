<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thirdCategory extends Model
{
     public  function subCategory()
   {
   return $this->hasOne('App\subCategory', 'id', 'sub_category_id');

   } 
   public  function category()
   {
   return $this->hasOne('App\category', 'id', 'category_id');

   }
}
