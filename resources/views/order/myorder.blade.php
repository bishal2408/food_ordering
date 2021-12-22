@extends('layout.app')

@section('title')
order form
@endsection

@section('content')
<div class="order-list">
    <h3 class="order-heading">Your Orders</h3>
    <hr style="margin-bottom: 15px;">
    <a href="{{ route('home') }}" > <button class="add-item">Add items to bag? <span>Click here!</span> </button> </a>
    <table>
        <tr>
            <th>Quantity</th>
            <th>Item</th>
            <th>Price per item</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
        @foreach($orders as $order)
        <tr class="table-data">
            <td>{{ $order->quantity }}x</td>
            <td>{{ $order->food_name }} </td>
            <td>{{ $order->price}}</td>
            <td>{{ $order->price * $order->quantity}}</td>
            <td>
                @if ($order->approve == 0)
                <a href="#" class="status"><button>Onprocess</button></a>
                <a href="{{ route('order.cancelOrder', ['order_id' => $order->id]) }}"><button class="btn cancel-btn">Cancel Order</button></a>
                @else
                <a href="#" class="delivered"><button>Delivered!</button></a>
                <a href="{{ route('order.cancelOrder', ['order_id' => $order->id]) }}"><button class="btn cancel-btn">Clear </button></a>
                @endif
                
            </td>
        </tr>
        @endforeach
        
    </table>
</div>
@endsection