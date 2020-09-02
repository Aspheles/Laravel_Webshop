<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{
    public function index()
    {
        //Fetching all data from Posts and order it by latest added
        // Take shows the amount of posts you give in as param
        // $posts = Post::orderBy('created_at', 'desc')->get();

        //fetching all
        //$posts = Post::all();
        $customers = Customer::all();

        // Getting a single post
        //return $post = Post::where('title', 'Post Two')->get();

        // Can also fetch from database, with a query
        //$posts = DB::select('SELECT * FROM posts');


        //  Setting amount of how many posts can be show for each page
        //$posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('customers.index')->with('customers', $customers);
    }

}
