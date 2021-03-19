<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = DB::table('orders')
            ->select(DB::raw('orders.user_id, orders.amount, users.id, product_orders.quantity'))
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->leftJoin('product_orders', 'orders.id', '=', 'product_orders.order_id')
            ->leftJoin('products', 'product_orders.product_id', '=', 'products.id')
            ->where('users.id','=', Auth::user()->id)
            ->get();
        return view('home', compact('data'));
    }
}
