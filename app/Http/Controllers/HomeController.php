<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductOrder;
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
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('orders')
            ->select(DB::raw('orders.id, orders.user_id, orders.amount, orders.created_at'))
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
//            ->leftJoin('product_orders', 'orders.id', '=', 'product_orders.order_id')
//            ->leftJoin('products', 'product_orders.product_id', '=', 'products.id')
            ->where('orders.user_id','=', Auth::user()->id)
            ->orderBy('orders.created_at', 'asc')
            ->get();

        $products = DB::table('product_orders')
            ->select(DB::raw('product_orders.order_id, product_orders.product_id, product_orders.quantity, products.name, products.price'))
            ->leftJoin('products','product_orders.product_id','=','products.id')
            ->get();
        return view('home', compact('data'), compact('products'));
    }

    public function topSells()
    {
        $topSells = DB::select(
            'select count(*) as topSels, po.product_id, p.name, p.description, p.picture, p.price
            from public.product_orders po
                left join public.products p ON po.product_id = p.id
            group by(po.product_id, p.name, p.description, p.picture, p.price)
            order by topSels desc
            limit 5'
        );

        $newProducts = DB::select(
            'select p.id, p.name, p.description, p.picture, p.price, p.created_at
            from public.products p
                where p.created_at::date > now()::date - 7
            limit 5'
        );
        return view('welcome', compact('topSells'), compact('newProducts'));
    }
}
