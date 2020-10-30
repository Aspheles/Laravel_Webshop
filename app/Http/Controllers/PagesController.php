<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
     /**
     * Display the home page
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $title = "Welcome to my website";
        return redirect()->route('categories.index');
    }

     /**
     * Display the about page
     *
     * @return \Illuminate\Http\Response
     */
    public function about(){
        $title = "About Us";
        return view('pages.about')->with('title', $title);
    }

    
}
