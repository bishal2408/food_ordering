@extends('layout.app')

@section('title')
order form
@endsection

@section('content')
    <h4>Edit {{ $order->food_name }}</h4>
    <img src="{{url($food->food_photo_path)}}" alt="food-image" width="200" height="200">
    <h3>{{$order->food_name}}</h3>
    <p>{{ $food->food_description }}</p>
    <p> <b>NRs. {{ $order->price }} per item</b> </p>
    <form action="{{route('order.update',['id'=>$order->id])}}" method="POST">
        @method('PUT')
        @csrf
        <input type="number" name="quantity" placeholder="Enter quantity" required>
        <input type="submit" value="Update your order">
    </form>
@endsection