@extends('layout.app')

@section('title')
order form
@endsection

@section('content')
<p class="order-heading">Your order form</p>
<div class="order-form">
    <img src="{{url($item->food_photo_path)}}" alt="food-image" width="300" height="400">
    <p class="food-name">{{$item->food_name}} </p>
    <p class="food-description">{{ $item->food_description }}</p>
    <p> <b>NRs. {{ $item->food_price }} per item</b> </p>
    <form action="{{route('order.store',['user_id'=>Auth::user()->id, 'food_id'=>$item->id])}}" method="POST">
        @csrf
        <input class="quantity" type="number" name="quantity" placeholder="Enter quantity" required> <br>
        <input type="submit" value="Add to bag" class="btn addbtn">
    </form>
</div>

@endsection