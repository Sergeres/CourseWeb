<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('category', App\Http\Controllers\categoryController::class);

Route::resource('product', App\Http\Controllers\productController::class);

Route::get('/products', [App\Http\Controllers\productController::class, 'allProducts']);

Route::get('test', function (){
    \Cart::add(array(
        'id' => 456, // inique row ID
        'name' => 'Sample Item',
        'price' => 67.99,
        'quantity' => 4,
        'attributes' => array()));
});

Route::get('cart', function (){
    return \Cart::getContent();
});
