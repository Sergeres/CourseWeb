<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countOrders = DB::table('orders')
            ->select(DB::raw('count(*)'))
            ->where('orders.user_id','=', Auth::user()->id)
            ->get();
        if ($countOrders[0]->count != 0){
            $order = Order::create(['user_id'=>Auth::user()->id, 'amount'=>\Cart::getTotal() - \Cart::getTotal()/100*$countOrders[0]->count]);
        }elseif ($countOrders[0]->count*0.2 > 20){
            $order = Order::create(['user_id'=>Auth::user()->id, 'amount'=>\Cart::getTotal() - \Cart::getTotal()/100*20]);
        }else{
            $order = Order::create(['user_id'=>Auth::user()->id, 'amount'=>\Cart::getTotal()]);
        }

       $goods = \Cart::getContent();

       foreach ($goods as $good ){
           if ($countOrders[0]->count != 0){
               ProductOrder::create(['order_id'=>$order->id, 'product_id'=>$good->id, 'quantity'=>$good->quantity, 'price'=>$good->price - $good->price/100*$countOrders[0]->count]);
           }elseif ($countOrders[0]->count*0.2 > 20){
               ProductOrder::create(['order_id'=>$order->id, 'product_id'=>$good->id, 'quantity'=>$good->quantity, 'price'=>$good->price - $good->price/100*20]);
           }else{
               ProductOrder::create(['order_id'=>$order->id, 'product_id'=>$good->id, 'quantity'=>$good->quantity, 'price'=>$good->price]);
           }

       }

       \Cart::clear();
       return Redirect('cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return View('order.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
