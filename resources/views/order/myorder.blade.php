@extends('layout.app')

@section('title')
order form
@endsection

@section('content')
<div class="orders-list">
    <h3>Your Orders</h3>
    <a href="{{ route('home') }}"> <button>Add items to bag? Click here!</button> </a>
    <table style="width: 50%;">
        <tr>
            <th style="text-align: left; padding: 8px;">Quantity</th>
            <th style="text-align: left; padding: 8px;">Item</th>
            <th style="text-align: left; padding: 8px;">Price per item</th>
            <th style="text-align: left; padding: 8px;">Price</th>
            <th style="text-align: left; padding: 8px;">Status</th>


        </tr>
        @foreach($orders as $order)
        <tr>
            <td style="text-align: left; padding: 8px;">{{ $order->quantity }}x</td>
            <td style="text-align: left; padding: 8px;">{{ $order->food_name }} </td>
            <td style="text-align: left; padding: 8px;">{{ $order->price}}</td>
            <td style="text-align: left; padding: 8px;">{{ $order->price * $order->quantity}}</td>
            <td style="text-align: left; padding: 8px;">
                <a href="#"><button>Onprocess</button></a>
                <a href="{{ route('order.cancelOrder', ['order_id' => $order->id]) }}"><button>Cancel Order</button></a>
            </td>
        </tr>
        @endforeach
        
    </table>
</div>
@endsection