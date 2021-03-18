<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function clear()
    {
        $data = Cart::getContent();
        $data::clear();
//        return \Ajax::redirect(route('cart'));
    }

    public function deleteItem($id)
    {
        \Cart::remove($id);
        return \Ajax::redirect(route('cart'));
    }

    public function addItem($id)
    {
        $product = Product::find($id);
        \Cart::add(array(
            'id' => $product->id, // inique row ID
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array()));
        return \Ajax::redirect(route('cart'));
    }
}
