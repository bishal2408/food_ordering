@extends('layout.app')

@section('title')
order form
@endsection

@section('content')
<div class="mybag-orders">
    <h3>YOUR BAG ITEMS</h3>
    <a href="{{ route('home') }}"> <button>Add more items</button> </a>
    <table style="width: 50%;">
        <tr>
            <th style="text-align: left; padding: 8px;">Quantity</th>
            <th style="text-align: left; padding: 8px;">Item</th>
            <th style="text-align: left; padding: 8px;">Price per item</th>
            <th style="text-align: left; padding: 8px;">Price</th>
            <th style="text-align: left; padding: 8px;">Action</th>


        </tr>
        @foreach($orders as $order)
        <tr>
            <td style="text-align: left; padding: 8px;">{{ $order->quantity }}x</td>
            <td style="text-align: left; padding: 8px;">{{ $order->food_name }} </td>
            <td style="text-align: left; padding: 8px;">{{ $order->price}}</td>
            <td style="text-align: left; padding: 8px;">{{ $order->price * $order->quantity}}</td>
            <td style="text-align: left; padding: 8px;">
                <a href="{{ route('order.editorder',['id'=>$order->id]) }}"><button>Edit</button></a>
                <a href="{{ route('order.delete',['id'=>$order->id]) }}"><button>Delete</button></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
<div class="mybag-bill" style="margin-top: 50px;">
    <table style=" width:40%;">
        <tr>
            <td style="text-align: left; padding: 8px;"><b>SUB TOTAL</b></td>
            <td style="text-align: left; padding: 8px;">NRs. {{ $total }}</td>
        </tr>
        <tr>
            <td style="text-align: left; padding: 8px;"><b>VAT</b></td>
            <td style="text-align: left; padding: 8px;">NRs. {{ $vat }}</td>
        </tr>
        <tr>
            <td style="text-align: left; padding: 8px;"><b>Delivery charge</b></td>
            <td style="text-align: left; padding: 8px;">NRs. {{ $delivery_fee }}</td>
        </tr>
        <tr>
            <td style="text-align: left; padding: 8px;"><b>Grand total</b></td>
            <td style="text-align: left; padding: 8px;">NRs. {{$total + $vat + $delivery_fee}}</td>
        </tr>
    </table>
    <a href="{{ route('order.checkoutform') }}" style="margin-left: 290px;"><button>Proceed to Checkout</button></a>
</div>
@endsection