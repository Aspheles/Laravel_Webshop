<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserController extends Controller
{
    public function getSignup(){
        return view('user.signup');
    }

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

    public function getSignin(){
        return view('user.signin');
    }

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


    public function getProfile(){
        return view('user.profile');
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/')->with("success", "You have successfully logged out");
    }
}
