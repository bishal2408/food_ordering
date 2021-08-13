@extends('layout.app')

@section('title')
order form
@endsection

@section('content')
<div class="checkout">
    <div class="checkout-form">
        <h3>CHECKOUT</h3>
        <form action="{{ route('order.checkoutStore', ['user_id'=>Auth::user()->id])}}" method="POST">
            @csrf
            <label for="delivery_address">Delivery address</label> <br>
            <input type="text" id="delivery_address" name="delivery_address" placeholder="Add delivery address" required>
            <br>

            <label for="detailed_direction">Detailed address direction</label> <br>
            <input type="description" id="detailed_direction" name="detailed_direction" placeholder="Enter detailed direction" required>
            <br>

            <label for="phone">Phone number</label> <br>
            <input type="tel" id="phone" name="phone" placeholder="Add your phone number" required>
            <br>
            <p>Select payment type</p>
            <input type="radio" id="cash_on_delivery" name="payment_method" value="cash_on_delivery" checked>
            <label for="cash_on_delivery">Cash on delivery</label> <br>
            <input type="radio" id="ESewa" name="payment_method" value="ESewa">
            <label for="ESewa">ESewa</label> <br>
            <input type="radio" id="khalti_wallet" name="payment_method" value="khalti_wallet">
            <label for="khalti_wallet">Khalti wallet</label> <br> <br>
            <a href="{{ route('home') }}"><button>Go Back</button></a>
            <input type="submit" value="Continue">
        </form>
    </div>
</div>
@endsection