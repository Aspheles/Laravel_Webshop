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

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['FirstName' => 'required', 'LastName' => 'required', 'Street' => 'required', 'City' => 'required', 'Zip' => 'required', 'Phone' => 'required']);

        // Create post
        $customer = new Customer;
        $customer->FirstName = $request->input('FirstName');
        $customer->LastName = $request->input('LastName');
        $customer->Street = $request->input('Street');
        $customer->City = $request->input('City');
        $customer->Zip = $request->input('Zip');
        $customer->Phone = $request->input('Phone');
        $customer->save();

        return redirect('/customers')->with('success', 'Customer Created');

    }
}
