<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Table Name
    protected $table = 'customers';
    // Primary Key
    public $primaryKey = "Customer_ID";
    // Timestamps
    public $timestamps = true;
    
}
