<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcome to my website";
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = "About Us";
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title'  => "Services",
            'services' => ['Web design', "Programming", 'seo']
        );
        return view('pages.services')->with($data);
    }
}
