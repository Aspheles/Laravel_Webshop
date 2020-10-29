<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Products;
use DB;

class CategoryController extends Controller
{
    function index(){

        $categories = Category::all();
        $products = Products::all();
        return view("categories.index")->with('categories', $categories)->with('products', $products);
    }


     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();

        $currentCategory = Category::where("id", $id)->get();

        //$filteredproducts = Products::where('category_id', $id)->get();


        //$posts = DB::select('SELECT * FROM posts');

        //$filteredproducts = DB::select('SELECT * FROM `product` WHERE `category_id` = :id', ['id' => $id]);

        //$filteredproducts = Products::find('category_id', $id)->get();

        //$Allfilteredproducts = Products::all();
        // $filteredproducts = $Allfilteredproducts->category_id->get();

        // if($id == $filteredproducts){
        //     return view('categories/show')->with('categories', $categories)->with('filteredproducts', $filteredproducts);
        // }
        $filteredproducts = Products::where('categoryid', $id)->get();
        
        //return view('categories/show')->with(['products'=> $products, 'categories'=> $categories]);

        return view('categories/show')->with('categories', $categories)->with('filteredproducts', $filteredproducts)->with('currentCategory', $currentCategory);
    }
}
