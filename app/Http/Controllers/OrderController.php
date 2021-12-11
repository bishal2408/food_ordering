<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;


use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $orders = Order::all()->where('user_id', $user_id)->whereIn('on_order', 0);
        $total = 0;
        foreach ($orders as $order) {
            $total = $total + $order->price * $order->quantity;
        }
        $vat = 0.03 * $total;
        $ordercount = count($orders);
        if($ordercount == 0){
            $delivery_fee = 0;
        }
        else {
            $delivery_fee = 50; 
        }
        return view('order.mybag', compact('orders', 'total', 'vat', 'delivery_fee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $item = Admin::find($id);
        return view('order.orderform', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id, $food_id)
    {
        $order = new Order();
        $item = Admin::find($food_id);
        $order->user_id = $user_id;
        $order->food_id = $item->id;
        $order->food_name = $item->food_name;
        $order->price = $item->food_price;
        $order->quantity = $request->quantity;
        $order->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $food = Admin::find($order->food_id);
        return view('order.editorder', compact('order', 'food'));
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
        $order = Order::find($id);
        $order->quantity = $request->quantity;
        $order->save();
        return redirect()->route('order.mybag', ['user_id' => $order->user_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->destroy($id);
        return redirect()->route('order.mybag', ['user_id' => $order->user_id]);
    }
}
