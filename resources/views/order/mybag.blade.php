@extends('layout.app')

@section('title')
order form
@endsection

@section('content')
<div class="mybag">
    <div class="mybag-orders">
        <h3>MY BAG ITEMS</h3>
        <table>
            <tr>
                <th style="text-align: left; padding: 8px;">Quantity</th>
                <th style="text-align: left; padding: 8px;">Item</th>
                <th style="text-align: left; padding: 8px;">Price per item</th>
                <th style="text-align: left; padding: 8px;">Price</th>
                <th style="text-align: left; padding: 8px;">Action</th>
            </tr>
            @foreach($orders as $order)
            <tr class="table-data">
                <td style="text-align: left; padding: 15px;">{{ $order->quantity }}x</td>
                <td style="text-align: left; padding: 15px;">{{ $order->food_name }} </td>
                <td style="text-align: left; padding: 15px;">{{ $order->price}}</td>
                <td style="text-align: left; padding: 15px;">{{ $order->price * $order->quantity}}</td>
                <td style="text-align: left; padding: 15px;">
                    <a href="{{ route('order.editorder',['id'=>$order->id]) }}"><button class="btn edit-btn">Edit</button></a>
                    <a href="{{ route('order.delete',['id'=>$order->id]) }}"><button class="btn delete-btn"> Delete</button></a>
                </td>
                <hr>
            </tr>
            @endforeach
        </table>
        <a href="{{ route('home') }}"> <button class="add-item">ADD MORE ITEMS + </button> </a>
    </div>
    <div class="mybag-bill" >
        <p>YOUR BILL</p>
        <hr style="margin-bottom: .5rem;">
        <table>
            <tr>
                <td style="text-align: left; padding: 15px;"><b>SUB TOTAL</b></td>
                <td style="text-align: left; padding: 15px;">NRs. {{ $total }}</td>
            </tr>
            <tr>
                <td style="text-align: left; padding: 15px;"><b>VAT</b></td>
                <td style="text-align: left; padding: 15px;">NRs. {{ $vat }}</td>
            </tr>
            <tr>
                <td style="text-align: left; padding: 15px;"><b>DELIVERY CHARGE</b></td>
                <td style="text-align: left; padding: 15px;">NRs. {{ $delivery_fee }}</td>
            </tr>
            <tr>
                <td style="text-align: left; padding: 15px;"><b>GRAND TOTAL</b></td>
                <td style="text-align: left; padding: 15px;">NRs. {{$total + $vat + $delivery_fee}}</td>
            </tr>
        </table>
        <a href="{{ route('order.checkoutform') }}" ><button class="btn checkout-btn">Proceed to Checkout</button></a>
    </div>
</div>

@endsection