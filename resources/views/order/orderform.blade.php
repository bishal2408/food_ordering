@extends('layout.app')

@section('title')
order form
@endsection

@section('content')
    <p>Order form</p>
    <img src="{{url($item->food_photo_path)}}" alt="food-image" width="200" height="200">
    <h3>{{$item->food_name}}</h3>
    <p>{{ $item->food_description }}</p>
    <p> <b>NRs. {{ $item->food_price }} per item</b> </p>
    <form action="{{route('order.store',['user_id'=>Auth::user()->id, 'food_id'=>$item->id])}}" method="POST">
        @csrf
        <input type="number" name="quantity" placeholder="Enter quantity" required>
        <input type="submit" value="Add to bag">
    </form>
@endsection