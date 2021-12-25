@extends('layout.app')

@section('title')
Home page
@endsection

@section('content')
<div class="image-wrap">
    <img src="{{ url('images/food.jpg') }}" class="home-image">
    <div class="search-bar">
        <h3>Order food from the widest range of restaurants.</h3>
        <form action="">
            <input type="text" placeholder="Search resturants or cuisines" name="search">
            <button type="submit" class="search-btn"> <i class="fa fa-search"></i> </button>
        </form>
    </div>
</div>


<div class="food-container">
    <h2 class="food-title">Featured Items</h2>
    <div class="added-items">
        @foreach($items as $item)
        @if($item->food_type == 'featured')
        <div class="product">
            <img src="{{url($item->food_photo_path)}}" alt="food-image" class="product-image">
            <h3>{{$item->food_name}}</h3>
            <p class="food-description">{{ $item->food_description }}</p>

            <p class="food-price"> <b>NRs. {{ $item->food_price }}</b> </p>
            <a href="{{route('order.orderform',['id'=>$item->id])}}"><button class="btn addbtn">Add to your bag</button></a>
        </div>
        @endif
        @endforeach
    </div>

    <h2 class="food-title">Menu</h2>
    <div class="added-items">
        @foreach($items as $item)
        @if($item->food_type == 'normal')
        <div class="product">
            <img src="{{url($item->food_photo_path)}}" alt="food-image" class="product-image">
            <h3>{{$item->food_name}}</h3>
            <p class="food-description">{{ $item->food_description }}</p>
            <p class="food-price"> <b>NRs. {{ $item->food_price }}</b> </p>
            <a href="{{route('order.orderform',['id'=>$item->id])}}"><button class="btn addbtn">Add to your bag</button></a>
        </div>
        @endif
        @endforeach
    </div>
</div>

<div class="about">
    <div class="aboutimage-wrap">
        <img src="{{ url('images/about-image.jpeg') }}" class="about-image">
    </div>
    <div class="about-description">
        <h1>About Us</h1>
        <p>
            Khajaghar is the fastest, easiest and most convenient way to enjoy the best food of your favourite restaurants at home, at the office or wherever you want to.
        </p>
        <p>
            We know that your time is valuable and sometimes every minute in the day counts. That's why we deliver! So you can spend more time doing the things you love.
        </p>
        <a href="{{ route('user.aboutUs') }}" class="btn aboutbtn">Learn more</a>
    </div>
</div>
@endsection