<?php

use App\Http\Controllers\cartController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\landingController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\orderplaceController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
});

Route::get('/registration', [registerController::class, 'index']);
Route::post('/registration', [registerController::class, 'register']);

Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'login']);

Route::get('/logout', [loginController::class, 'logout']);

Route::resource('add-category', categoryController::class);
Route::resource('view-category', categoryController::class);

Route::resource('add-product', productController::class);
Route::resource('view-products', productController::class);

Route::get('inwards', [productController::class, 'productIn']);
Route::post('productsin',[productController::class, 'productInward']);
//============================================Landing Page Start==================================

// Route::get('/', function(){
//     return view('landing/index');
// });

Route::resource('/', landingController::class);

Route::post('search-prods', [landingController::class, 'searchProducts']);

Route::get('add-to-cart/{id}', [cartController::class, 'addToCart']);
Route::get('view-product/{id}', [cartController::class, 'viewProduct']);

Route::post('addtocart/{id}', [cartController::class, 'productAdd']);

Route::get('my-cart', function(){
    return view('landing/my-cart');
});

Route::get('delete/{id}', [cartController::class, 'deleteCart']);

Route::get('category/{id}', [landingController::class, 'viewCategory']);

//==================================================================================

Route::get('clear-cart', [cartController::class, 'clearCart']);

Route::get('sign-in', function(){
    return view('landing/login');
});

Route::post('/sign-in', [loginController::class, 'c_login']);

Route::get('/sign-out', [loginController::class, 'c_logout']);

Route::get('sign-up', function(){
    return view('landing/register');
});
Route::post('/sign-up', [registerController::class, 'c_register']);

Route::get('add-to-wishlist/{id}', [customerController::class, 'whishlist']);

Route::get('wishlist', [customerController::class, 'viewWishlist'])->middleware('loginCheck');

Route::get('remove-wishlist/{id}', [customerController::class, 'removeWishlist']);

// Route::get('checkout', function(){
//     return view('landing/checkout');
// });

Route::get('checkout', [customerController::class, 'checkout'])->middleware('loginCheck');

Route::resource('orderplace', orderplaceController::class);

Route::resource('my-order', orderplaceController::class)->middleware('loginCheck');