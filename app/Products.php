<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
     
     // Table Name
     protected $table = 'product';
     // Primary Key
     public $primaryKey = "Product_ID";
     // Timestamps
     public $timestamps = true;

     //public $category_id = "category_id";
}
