<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Products;

use Session;

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


    public function addToCart(Request $request, $id) {
        // $request->session()->flush();
        $product = Products::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        
        
        
        $request->session()->put('cart',$cart);
        return redirect()->back()->with('success',"$product->name has been added to your cart");

    }

    
}
