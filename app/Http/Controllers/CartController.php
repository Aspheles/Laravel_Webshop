<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Session;
use App\Cart;
use App\Order;
use Auth;

class CartController extends Controller
{
        
    /**
     *
     * Opens the shoppingcart
     *
     * 
     * @return shoppingcart view
     *
     */
    
    public function getShoppingCart() {
    	if (!Session::has('cart')) {
            //return view('shop.shopping-cart')->with('error', 'Error, geen shoppingcart gevonden !');
            return redirect()->route("categories.index")->with("error", "Your cart is empty");
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
                $cart->items[$id]['price'] = $product->price * $cart->items[$id]['qty'];
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


    public function getCheckout(){
        if(!Session::has('cart')){
            return redirect()->route('categories.index');
        }
        $cart = Session::get('cart');
        return view('shop.checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQuantity' => $cart->totalQuantity]);
    }


    public function postCheckout(Request $request){
        //Checking if cart exist so the purchase can be stored into the database
        if(!Session::has('cart')){
            return redirect()->route('categories.index');
        }

        $cart = Session::get('cart');

        //Create Order
        $order = new Order();
        $order->cart = serialize($cart);
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        $order->email = $request->input('email');

        if(Auth::check()){
            Auth::user()->orders()->save($order);
        }else{
            $order->user_id = 0;
        }
        $order->save();

        //Empty the shoppingcart after purchase
        session()->forget('cart');
        
        return redirect()->route('categories.index')->with('success', 'Successfully purchased products!');
    }


    public function cancelOrder($id){
        if(!Auth::check()){
            return redirect()->route('categories.index')->with('error', 'You are not logged in');
        }
        // $orders = Auth::user()->orders;
        // //$order = $orders->find($id);
        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with('success', 'Your order has been successfully canceled');
    }
}
