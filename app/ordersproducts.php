<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordersproducts extends Model
{
    // Table Name
    protected $table = 'ordersproducts';
    // Primary Key
    public $primaryKey = "id";
    // Timestamps
    public $timestamps = true;
}
