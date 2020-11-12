<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'user_id',
        'totalquantity',
        'totalamount'
    ];

   public function user(){
       return $this->belongsTo('App\User');
   }

   public function products(){
    return $this->belongsToMany('App\Products', 'ordersproducts', 'order_id', 'product_id')->withPivot('quantity');
   }

}
