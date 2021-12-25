@extends('layout.app')

@section('title')
Edit order
@endsection

@section('content')

<p class="order-heading">Your order form</p>
<div class="order-form">
    <img src="{{url($food->food_photo_path)}}" alt="food-image" width="300" height="400">
    <p class="food-name">{{$order->food_name}} </p>
    <p class="food-description">{{ $food->food_description }}</p>
    <p> <b>NRs. {{ $order->price }} per item</b> </p>
    <form action="{{route('order.update',['id'=>$order->id])}}"  method="POST">
        @method('PUT')
        @csrf
        <input class="quantity" type="number" name="quantity" placeholder="Enter quantity" required> <br>
        <input type="submit" value="Update your order" class="btn addbtn">
    </form>
</div>
@endsection