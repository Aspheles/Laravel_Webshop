<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Products;

class ProductsController extends Controller
{
     public function show($id){
        $product = Products::find($id);
        return view('products/show')->with('product', $product);
     }

    
}
