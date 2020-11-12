<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Session;
use App\Cart;
use App\Order;
use Auth;
use App\ordersproducts;
use DB;

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
    	//$oldCart = Session::get('cart');
        $cart = new Cart();
        $cart->update($cart);

        if($cart->update($cart)) {
            return redirect()->route('categories.index')->with("error", "Your cart is empty");
        }
        
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
        //$oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart();
        $cart->add($product, $product->id, $request);
       
        
        
        //$request->session()->put('cart',$cart);
        return redirect()->back()->with('success',"$product->name has been added to your cart");

    }


    /**
     * Changes the quantity value of the product in shoppingcart
     * @param int {$id} this is the item id that is being sent trough the request
     * @param string {$action} this checks the quantity will be increased or deducted from the current quantity
     * @return \Illuminate\Http\Response
     */
    public function updateQuantity(Request $request, $id, $action){

        $cart  = new Cart();
        $cart->updateQuantity($id, $action);
       
        return redirect()->route('product.getShoppingCart');
    }
    /**
     * Removes the item from the shoppingcart
     * @param int {$id} this is the item id that is being sent trough the request
     * @return \Illuminate\Http\Response
     */
    public function removeFromCart(Request $request, $id){
      
        $product = Products::find($id);

        $cart = new Cart();
        $cart->removeFromCart($cart, $id);
        
        return redirect()->route('product.getShoppingCart');         
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
        $cart = new Cart();
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

        $cart = new Cart();

        $userId = 0;
        if(Auth::check()){
            $userId = Auth::user()->id;
        }
        //Create Order
        $order = Order::create([
            'name' => $request->input('name'),
            'address' =>  $request->input('address'),
            'email' => $request->input('email'),
            'totalquantity' =>  $cart->totalQuantity,
            'totalamount' => $cart->totalPrice,
            'user_id' => $userId
        ]);

      
        //foreach uit sessie
        foreach($cart->items as $product){
            $order->products()->attach([$product['item']['id']=>['quantity' => $product['qty']]]);
        }
        
        $order->save();

        
        //Empty the shoppingcart after purchase
        $cart->forgetSession();
        //session()->forget('cart');
        
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
        // dd($products);

        //Remove products that belonged to the order
        $products = ordersproducts::where("order_id", $id)->delete();
        
    
        
        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with('success', 'Your order has been successfully canceled');
    }
}
