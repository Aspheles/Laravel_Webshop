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
     * Display shoppingcart page
     * @return \Illuminate\Http\Response with the 2 given arguments (products, totalPrice) so it can be applied to the shoppingcart page
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


     /**
     * Add the item to the shoppingcart
     * @param int {$id} product id
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request, $id) {
        // $request->session()->flush();
        $product = Products::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        
        
        
        $request->session()->put('cart',$cart);
        return redirect()->back()->with('success',"$product->name has been added to your cart");

    }


    /**
     * Changes the quantity value of the product in shoppingcart
     * @param int {$id} this is the item id that is being sent trough the request
     * @param string {$action} this checks the quantity will be increased or deducted from the current quantity
     * @return \Illuminate\Http\Response
     */
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
    /**
     * Removes the item from the shoppingcart
     * @param int {$id} this is the item id that is being sent trough the request
     * @return \Illuminate\Http\Response
     */
    public function removeFromCart(Request $request, $id){
      
        $cart = Session::has('cart') ? Session::get('cart') : null;
        $product = Products::find($id);

        unset($cart->items[$id]);
        $this->updateCart($cart, $request);

        return redirect()->route('product.getShoppingCart');         
    }

    /**
     * Updates the cart values to the correct amount
     * @param object {$cart} this is the cart object so the values can be updated
     * @return \Illuminate\Http\Response
     */  
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

    /**
     * Displays the checkout page
     * @param {number} this is the item id that is being sent trough the request
     * @return \Illuminate\Http\Response with the 2 given arguments (products, totalPrice) so it can be applied to the checkout page
     */
    public function getCheckout(){
        if(!Session::has('cart')){
            return redirect()->route('categories.index');
        }
        $cart = Session::get('cart');
        return view('shop.checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQuantity' => $cart->totalQuantity]);
    }

     /**
     * Sends the order information in a from as a Post request to be saved into the database, 
     * when its done successfully cart session will be removed from the system
     * @return \Illuminate\Http\Response
     */
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

     /**
     * Removes an active order from the database for the logged in user
     * @param int {$id} the product id that was given so it can be compared
     * @return \Illuminate\Http\Response
     */
    public function cancelOrder($id){
        if(!Auth::check()){
            return redirect()->route('categories.index')->with('error', 'You are not logged in');
        }

        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with('success', 'Your order has been successfully canceled');
    }
}
