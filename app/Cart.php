<?php

namespace App;
use Session;

use Illuminate\Database\Eloquent\Model;

class Cart {

	public $items = null;
	public $totalQuantity = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){

		if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
	}
    
	public function add($item, $id) {

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
  
	public function update($itemInShoppingcart, $product) {

    	
        //$this->item[$id]['price'] = $item[$id] * $item->Price;
        $itemInShoppingcart['price'] = $product->price * $itemInShoppingcart['qty'];
        
        

    	// if ($this->items[$id]['quantity'] == 0) {
    	// 	unset($this->items[$id]);
        //     $this->totalQuantity--;
    	// }    	

    	// $this->totalPrice = 0;
    	// 	foreach($this->items as $item) {
    	// 		$this->totalPrice += $item['price'];    			
    	// 	}

        session()->put('cart', $this);
    }

    // public function updateTotalPrice($cart){
    //     if($cart != null){

    //     }
    //     foreach ($this->items as $item) {
    //         $this->totalPrice = 0;
    //         $this->totalPrice +=  $item['price'];
    //      }
    // }

    
    

}