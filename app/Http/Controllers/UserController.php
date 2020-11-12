<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Order;
use App\ordersproducts;
use App\Products;

class UserController extends Controller
{
    /**
     * Display register page
     * @return \Illuminate\Http\Response
     */
    public function getSignup(){
        return view('user.signup');
    }
     /**
     * Checks validations on the inputs given in the form and registers user into the database
     * @return \Illuminate\Http\Response
     */
    public function postSignup(Request $request){
        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = new User([
            'email'=> $request->input('email'),
            'password'=> bcrypt($request->input('password'))
        ]);
        $user->save();

        Auth::Login($user);

        return redirect()->route('user.profile')->with('success', 'Account has been Created');
    }

    /**
     * Display login page
     * @return \Illuminate\Http\Response
     */
    public function getSignin(){
        return view('user.signin');
    }

     /**
     * Checks validations on the inputs given in the form and attempts to login
     * @return \Illuminate\Http\Response
     */
    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);
            if(Auth::attempt(['email' => $request->input('email'),'password'=> $request->input('password')]))
            {
                return redirect()->route('user.profile');
            }
            return redirect()->back()->with("error", "Username or Password is incorrect");
    }

     /**
     * Display profile page if user is logged in
     * @return \Illuminate\Http\Response
     */
    public function getProfile(){
        $id = Auth::user()->id;
        
        $item = Order::where("user_id", $id)->get();
        //$products = Order::where('')
        $orders = ordersproducts::all();
        $products = Order::all();

        $itemProducts = Products::all();
        $foundProducts = [];
        $data = [];
        $itemFound = [];

       
       //Looping trough orders
        for($i = 0; $i < count($orders); $i++){
            //Looping trough products
            for($z = 0; $z < count($products); $z++){
                //Checking if product id matches the order id and checking if its belongs to that user
                if($products[$z]->id == $orders[$i]->order_id && $id == $products[$z]->user_id){
                    //Save the data into a list so it can be passed to the view
                    array_push($foundProducts, $orders[$i]);
                }
            }
        }
         
        //dd($foundProducts);

        for($i = 0; $i < count($foundProducts); $i++){
            for($z = 0; $z < count($itemProducts); $z++){
                if($itemProducts[$z]->id == $foundProducts[$i]->product_id){
                   
                    $itemFound['name'] = $itemProducts[$z]->name;
                    $itemFound['qty'] = $foundProducts[$i]->quantity;
                    $itemFound['price'] = $itemProducts[$z]->price;
                    
                    array_push($data, $itemFound);
                    
                }
            }
            
        }
    
       
        return view('user.profile', ['orders' => $item, 'items' => $data]);
    }

     /**
     * Logs user out
     * @return \Illuminate\Http\Response
     */
    public function getLogout(){
        Auth::logout();
        return redirect('/')->with("success", "You have successfully logged out");
    }
}
