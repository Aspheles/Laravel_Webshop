<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Order;
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
        $order = Auth::user()->orders;
        $order->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('user.profile', ['orders' => $order]);
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
