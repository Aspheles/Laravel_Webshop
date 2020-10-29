<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/hello', function () {
//     //return view('welcome');
//     return ( 
//     "<div class=header>
//         <h1>How you doing!</h1>
//     </div>");
// });

// Route::get('/users/{id}/{name}', function($id, $name){
//     return  "User: ".$id. "and name: ". $name;
// });

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::resource("posts", "PostsController");
Route::resource("customers", "CustomersController");
Route::resource("products", "ProductsController");
Route::resource("categories", "CategoryController");
//Route::resource("users", "UsersController");


Route::get('/shopping-cart', [
    'uses' => 'CartController@getShoppingCart',
	'as' => 'product.getShoppingCart'
]);

Route::get('/checkout', [
    'uses' => 'CartController@getCheckout',
	'as' => 'product.getCheckout'
]);

Route::post('/checkout', [
    'uses' => 'CartController@postCheckout',
	'as' => 'product.postCheckout'
]);



Route::get('/removeFromCart/{id}', [
	'uses' => 'CartController@removeFromCart',
	'as' => 'product.removeFromCart'	
]);

// Route::post('/saveOrder', [
// 	'uses' => 'CartController@saveOrder',
// 	'as' => 'shop.saveOrder'		
// ]);

Route::get('/addToCart/{id}', [
	'uses' => 'ProductsController@addToCart',
	'as' => 'product.addToCart'
]);

Route::get('/updateQuantity/{item}/{action}', [
    'uses' => 'CartController@updateQuantity',
	'as' => 'product.updateQuantity'
]);

Route::group(['prefix'=> 'user'], function(){
    Route::group(['middleware'=> 'guest'], function(){
        // Signing up
        Route::get('/signup', [
            'uses'=> 'UserController@getSignup',
            'as'=> 'user.signup'
        ]);

        Route::post('/signup', [
            'uses'=> 'UserController@postSignup',
            'as'=> 'user.signup'
        ]);
        
        // Signin in
        Route::get('/signin', [
            'uses'=> 'UserController@getSignin',
            'as'=> 'user.signin'
        ]);
        
        Route::post('/signin', [
            'uses'=> 'UserController@postSignin',
            'as'=> 'user.signin'
        ]);
    });

    Route::group(['middleware'=> 'auth'], function(){
        // Profile
        Route::get('/profile', [
            'uses'=> 'UserController@getProfile',
            'as'=> 'user.profile'
        ]);
        
        //Logout
        Route::get('/logout', [
            'uses'=> 'UserController@getLogout',
            'as'=> 'user.logout'
        ]);
    });
    
});



