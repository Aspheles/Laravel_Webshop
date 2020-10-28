<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Session;
use App\Cart;

class CartController extends Controller
{
    
     /* 
    * Functie haalt de shoppingcart op en geeft deze mee aan de view
    */
    public function getShoppingCart() {
    	if (!Session::has('cart')) {
    		return view('shop.shopping-cart')->with('message', 'Error, geen shoppingcart gevonden !');
    	}
    	$oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        
    	return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);

    }

    public function updateQuantity(Request $request, $id){
        
        
        $cart = Session::get('cart');
        $product = Products::find($id);
        $cart->items[$id]['qty']++;
        // $cart->update($cart->items[$id], $product);
        $cart->items[$id]['price'] = $product->Price * $cart->items[$id]['qty'];
        $cart->totalQuantity++;
        $cart->totalPrice = 0;
        foreach($cart->items as $item){
            $cart->totalPrice = $cart->totalPrice += $item['price'];
        }
        
        return redirect()->route('product.getShoppingCart');

    
        

    }
   
    // public function deleteFromCart(Request $request, $id){
    //     if (!Session::has('cart')) {
    //         return view('shop.shopping-cart')->with('message', 'Error, geen shoppingcart gevonden !');
    //     }  
    //     $oldCart = Session::has('cart') ? Session::get('cart') : null;
    //     $cart = new Cart($oldCart); 
    //     $product = Product::find($id);

    //     foreach($cart->items as $item){
    //         if ($item['id'] == $id){               
    //             $cart->delete($item, $id);         
    //         }
    //     }

    //     return redirect()->route('shop.shopping-cart');         
    // }
}
