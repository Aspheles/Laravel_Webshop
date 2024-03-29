<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
     
     // Table Name
     protected $table = 'products';
     // Primary Key
     public $primaryKey = "id";
     // Timestamps
     public $timestamps = true;

     //public $category_id = "category_id";


     protected $fillable = ['name', 'description', 'price', 'image', 'brand', 'categoryid'];

     public function orders(){
          return $this->belongsToMany('App\Order', 'ordersproducts', 'product_id', 'order_id')->withPivot('quantity');
     }

}
