@extends('layout.app')

@section('title')
order form
@endsection

@section('content')
<div class="checkout">
    <h3 class="checkout-heading">CHECKOUT</h3>
    <hr>
    <div class="form-bill-container">
        <div class="checkout-form">
            <form action="{{ route('order.checkoutStore', ['user_id'=>Auth::user()->id])}}" method="POST">
                @csrf
                <label for="delivery_address">Delivery address</label> <br>
                <input class="input-field" type="text" id="delivery_address" name="delivery_address" placeholder="Add delivery address" required>
                <br>

                <label for="detailed_direction">Detailed address direction</label> <br>
                <input class="input-field" type="text" id="detailed_direction" name="detailed_direction" placeholder="Enter detailed direction" required>
                <br>

                <label for="phone">Phone number</label> <br>
                <input type="tel" class="input-field" id="phone" name="phone" placeholder="Add your phone number" required>
                <br>
                <p>Select payment type</p>
                <input type="radio" id="cash_on_delivery" name="payment_method" value="cash_on_delivery" checked>
                <label class="radio-text" for="cash_on_delivery">Cash on delivery</label> <br>
                <input type="radio" id="ESewa" name="payment_method" value="ESewa">
                <label class="radio-text" for="ESewa">ESewa</label> <br>
                <input type="radio" id="khalti_wallet" name="payment_method" value="khalti_wallet">
                <label class="radio-text" for="khalti_wallet">Khalti wallet</label> <br> <br>
                <a href="{{ route('home') }}"><button class="btn back-btn">Go Back</button></a>
                <input class="btn continue-btn" type="submit" value="Continue">
            </form>
        </div>
        <div class="bill">
            <div class="check-orders">
                <p class="title">My bag</p>
                <p class="title" style="color: black;">Your food items are listed below</p>
                <table>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->quantity }}x</td>
                        <td> <b>{{ $order->food_name }}</b></td>
                        <td>NRs.{{ $order->price * $order->quantity}}</td>
                        <td>
                            <a href="{{ route('order.checkout_delete',['id'=>$order->id]) }}">
                                <button> <i class="fa fa-minus-circle"></i> </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <hr>
            <div class="check-bill">
                <p class="title">Your bill (estimated)</p>
                <table>
                    <tr>
                        <td><b>SUB TOTAL</b></td>
                        <td>NRs. {{ $total }}</td>
                    </tr>
                    <tr>
                        <td><b>VAT</b></td>
                        <td>NRs. {{ $vat }}</td>
                    </tr>
                    <tr>
                        <td><b>DELIVERY CHARGE</b></td>
                        <td>NRs. {{ $delivery_fee }}</td>
                    </tr>
                    <tr>
                        <td><b>GRAND TOTAL</b></td>
                        <td><b> NRs. {{$total + $vat + $delivery_fee}}</b></td>
                    </tr>
                </table>
                <p class="message">
                ( Note: In the event that the restaurant price and the price 
                listed below are different, the restaurant price will 
                prevail in every case.)
            </p>
            </div>
        </div>
    </div>

</div>
@endsection