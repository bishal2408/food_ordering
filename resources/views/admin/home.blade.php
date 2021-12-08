<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <style>
        .added-items {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 2rem;
        }
    </style>
</head>

<body>
    <!-- admin page navbar -->
    <div class="navbar">
        <div>
            <a href="{{url('/')}}">MERO KHAJAGHAR</a>
        </div>
        <div>
            <p>ADMIN PAGE</p>
        </div>
        <div class="nav-links">
            <a href="#">{{ Auth::user()->name }}</a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
            </form>
        </div>
    </div>

    <a href="{{ route('admin.addfood') }}">add food</a>
    <br>
    <br>
    <br>
    <h2>Featured items</h2>
    <div class="added-items">
        @foreach($items as $item)
        @if($item->food_type == 'featured')
        <div class="product">
            <img src="{{url($item->food_photo_path)}}" alt="food-image" width="200" height="200">
            <!-- <img src="/images/featured/fbakery.jpg" alt="food-image" width="200" height="200"> -->

            <h3>{{$item->food_name}}</h3>
            <p>{{ $item->food_description }}</p>
            <p> <b>NRs. {{ $item->food_price }}</b> </p>
            <a href="{{ route('admin.edit',['id'=>$item->id])}}"><button>Edit</button></a>
            <a href="{{ route('admin.delete',['id'=>$item->id])}}"><button>Delete</button></a>
        </div>
        @endif
        @endforeach
    </div>
    <h2>Added items</h2>
    <div class="added-items">
        @foreach($items as $item)
        @if($item->food_type == 'normal')
        <div class="product">
            <img src="{{url($item->food_photo_path)}}" alt="food-image" width="200" height="200">
            <h3>{{$item->food_name}}</h3>
            <p>{{ $item->food_description }}</p>
            <p> <b>NRs. {{ $item->food_price }}</b> </p>
            <a href="{{ route('admin.edit',['id'=>$item->id])}}"><button>Edit</button></a>
            <a href="{{ route('admin.delete',['id'=>$item->id])}}"><button>Delete</button></a>
        </div>
        @endif
        @endforeach
    </div>
</body>

</html>