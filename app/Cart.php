<?php

namespace App;
use Session;

use Illuminate\Database\Eloquent\Model;

class Cart {

	public $items = null;
	public $totalQuantity = 0;
	public $totalPrice = 0;

	public function __construct(){
        $oldCart = Session::get('cart');

		if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
        
        session()->put('cart',$this);
	}
    
     /**
     * Pushes the item into a object with the properties
     *
     * @param object {$item} product object
     * @param int {$id} product id
     * @return \Illuminate\Http\Response
     */
	public function add($item, $id, $request) {

		$storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
                //$this->updateTotalPrice();
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQuantity++;
        $this->totalPrice += $item->price;
       
        
       
    }
    
    /**
     * Updates the cart values to the correct amount
     * @param object {$cart} this is the cart object so the values can be updated
     * @return \Illuminate\Http\Response
     */  
    public function update($cart){
        
        $cart->totalPrice = 0;
        $cart->totalQuantity = 0;

        foreach($cart->items as $item){
            $cart->totalPrice = $cart->totalPrice += $item['price'];
            $cart->totalQuantity = $cart->totalQuantity + $item['qty'];

        }
        
        if($cart->totalQuantity <= 0){
            session()->forget('cart');
            return true;
        }

        //session()->put('cart',$this);
        
    }

    public function updateQuantity($id, $action){
            $product = Products::find($id);
           
            if($action == "add"){
                $this->items[$id]['qty']++;
                //dd($this->items);
            }else{
                $this->items[$id]['qty']--;
            }
    
            if($this->items[$id]['qty'] <= 0){
               unset($this->items[$id]);
            }else{
                $this->items[$id]['price'] = $product->price * $this->items[$id]['qty'];
            }

            
    }

    public function removeFromCart($cart, $id){
        unset($cart->items[$id]);
    }

    public function forgetSession(){
        session()->forget('cart');
    }

    
}