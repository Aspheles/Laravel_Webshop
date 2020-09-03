<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
class ProductsController extends Controller
{
    function index(){

        $products = Products::all();
        return view("products.index")->with('products', $products);
    }


     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::find($id);
        return view('products/show')->with('product', $product);
    }
}
