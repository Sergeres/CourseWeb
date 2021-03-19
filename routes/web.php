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

//Route::get('test', function (){
//    \Cart::add(array(
//        'id' => 456, // inique row ID
//        'name' => 'Sample Item',
//        'price' => 67.99,
//        'quantity' => 4,
//        'attributes' => array()));
//});

Route::get('cart', function (){
    $data = Cart::getContent();
    return View('cart.index', compact('data'));
})->name('cart');

Route::get( '/clearCart', [App\Http\Controllers\CartController::class, 'clear'])->name('clearCart');

Route::get('/remove/{id}',[App\Http\Controllers\CartController::class, 'deleteItem'])->name('remove.item');

Route::get('/add/{id}',[App\Http\Controllers\CartController::class, 'addItem'])->name('add.item');

Route::get('/sub/{id}',[App\Http\Controllers\CartController::class, 'subItem'])->name('sub.item');

Route::get('/filterProd/{id}',[App\Http\Controllers\productController::class, 'filterProducts'])->name('filterProducts');

Route::resource('order', App\Http\Controllers\OrderController::class);
