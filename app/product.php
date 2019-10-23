<?php

namespace App;
use Nicolaslopezj\Searchable\SearchableTrait;
// use Nicolaslopezj\Searchable\SearchableTrait as SearchableTrait;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{

	 /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.product_name' => 10,
            'products.details' => 10
        ]
    ];



     public  function category()
   {
   return $this->hasOne('App\category', 'id', 'category_id');

   } 
    public  function cart()
   {
   return $this->hasMany('App\cart');

   } 

}
