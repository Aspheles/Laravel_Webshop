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
    
     /**
     * Pushes the item into a object with the properties
     *
     * @param object {$item} product object
     * @param int {$id} product id
     * @return \Illuminate\Http\Response
     */
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
}