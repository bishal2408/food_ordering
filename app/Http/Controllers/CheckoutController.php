<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Checkout;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function to display ordered items in my order tab
    public function index($user_id)
    {
        $orders = Order::all()->where('user_id', $user_id)->whereIn('on_order', 1);
        return view('order.myorder', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.checkoutform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        // $checkout = new Checkout();
        $orders = Order::all()->where('user_id',$user_id)->whereIn('on_order',0);

        foreach ($orders as $order) {
            $checkout = new Checkout();
            $checkout->order_id = $order->id; 
            $checkout->delivery_address = $request->delivery_address;
            $checkout->phone = $request->phone;
            $checkout->detailed_direction = $request->detailed_direction;
            $checkout->user_id = $request->user_id;
            $checkout->payment_method = $request->payment_method;
            $order->on_order = true;
            $checkout->save();
            $order->save();
        }
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
        //
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
    public function destroy($order_id)
    {
        $order = Order::find($order_id);
        $user_id = $order->user_id;
        $checkout = Checkout::where('order_id', $order_id);
        $checkout->delete();
        Order::destroy($order_id);
        return redirect()->route('order.orderlist',['user_id'=>$user_id]);
    }
}
