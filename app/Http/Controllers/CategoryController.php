<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Products;
use DB;

class CategoryController extends Controller
{

     /**
     * Display the shop page with all available products from the database
     *
     * @param  int $id product is that is being filtered
     * @return \Illuminate\Http\Response
     */
    function index(){

        $categories = Category::all();
        $products = Products::all();
        return view("categories.index")->with('categories', $categories)->with('products', $products);
    }


     /**
     * Display the shop page with the all the products in the database with the active filter on
     *
     * @param  int $id product is that is being filtered
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $currentCategory = Category::where("id", $id)->get();

        $filteredproducts = Products::where('categoryid', $id)->get();
        
        return view('categories/show')->with('categories', $categories)->with('filteredproducts', $filteredproducts)->with('currentCategory', $currentCategory);
    }
}
