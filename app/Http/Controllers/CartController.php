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

    public function updateQuantity(Request $request, $id, $action){

        
        $cart = Session::get('cart');

        if($cart != null){
            $product = Products::find($id);

            if($action == "add"){
                $cart->items[$id]['qty']++;
            }else{
                $cart->items[$id]['qty']--;
            }
    
            if($cart->items[$id]['qty'] <= 0){
               unset($cart->items[$id]);
            }else{
                $cart->items[$id]['price'] = $product->Price * $cart->items[$id]['qty'];
            }
            
            // $cart->update($cart->items[$id], $product);
            
           
            $this->updateCart($cart, $request);
    
            
    
            
            
            
        }
        return redirect()->route('product.getShoppingCart');

    
        

    }
   
    public function removeFromCart(Request $request, $id){
      
        $cart = Session::has('cart') ? Session::get('cart') : null;
        $product = Products::find($id);

        //$cart->totalPrice -= $cart->items[$id]

        unset($cart->items[$id]);
        $this->updateCart($cart, $request);

        // foreach($cart->items as $item){
        //     if ($item[$id] == $id){               
        //         $cart->delete($item, $id);         
        //     }
        // }

        return redirect()->route('product.getShoppingCart');         
    }


    public function updateCart($cart, $request){
        $cart->totalPrice = 0;
        $cart->totalQuantity = 0;

        foreach($cart->items as $item){
            $cart->totalPrice = $cart->totalPrice += $item['price'];
            $cart->totalQuantity = $cart->totalQuantity + $item['qty'];

        }

        if($cart->totalQuantity <= 0){
            $request->session()->flush();
            return redirect()->route('categories.index');
        }
    }
}
