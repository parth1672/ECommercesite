<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddcartController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SingupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;




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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/','index');

Route::view('about','about');

Route::view('product','product');

Route::view('testimonial','testimonial');

Route::view('why','why');

Route::view('cart','cart');

Route::view('cart_d','cart_d');



Route::post('singup',[SingupController::class,'singup'])->name('singupcontroller');

Route::post('login',[SingupController::class,'login']);

Route::get('/',[ProductController::class,'get_product']);

Route::get('/product',[ProductController::class,'get_product']);

Route::view('/product-info/{productid}','product-info');

// Route::view('/product-info','product-info');

Route::get('/product-info/{productid}',[ProductController::class,'productdetail']);

// Logout --------------------------------------------------

Route::get('/logout',function()//logout function
{
   if(session()->has('user'))
   {
       session()->pull('user');
       session()->pull('email');
   }
   
   return redirect('/');

});

//Cart routes -----------------------------------------------

Route::get('/cart',[CartController::class,'getcart']);

// Route::get('/addcart/{productid}',[AddcartController::class,'AddCart']);

Route::post('/addtocart',[AddcartController::class,'AddCart']);

Route::get("/removecart/{productis}",[AddcartController::class,'removecart']);

// Admin panel route-----------------------------------------
Route::get('/admin/product_admin',[ProductController::class,'currency_type']); //for product price(currency) type and catgory type

Route::view('/admin/dashboard','admin-panel/deshboard');

Route::post('/addproduct',[ProductController::class,'addproduct']);//add product in products table

// check out route for

Route::post('/quantity',[CheckoutController::class,'checkout']);//add product quantity in cart table

Route::post('/checkoutuser',[CheckoutController::class,'userdetail']);

Route::get('/checkout',[CheckoutController::class,'user']);

Route::post('/checkoutpayment',[CheckoutController::class,'payment']);

Route::view('/payment','payment');



