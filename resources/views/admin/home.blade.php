<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="{{ url('css/admin-style.css') }}">
</head>

<body>
    <div class="navbar">
        <a href="{{url('/')}}">MERO KHAJAGHAR</a>
        <div class="nav-links">
            <a href="#">Hello {{ Auth::user()->name }}!</a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="logout">Logout</a>
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

</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ url('css/admin-style.css') }}">
    <link rel="stylesheet" href="{{ url('css/layout.css') }}">
    <link rel="stylesheet" href="{{ url('css/popupModel.css') }}">


    <!-- icon link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin page</title>

    <style>

    </style>
</head>

<body>
    <!-- Side bar container -->
    <div class="sidebar">
        <div class="logo">
            <span class="logo-name">Mero khajaghar</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="javascript::void(0)" class="tablinks" onclick="openTab(event, 'dashboard')" >
                    <i class='bx bx-grid-alt'></i>
                    <span class="links-name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="javascript::void(0)" class="tablinks" onclick="openTab(event, 'addfood')" id="defaultOpen">
                    <i class='bx bx-plus'></i>
                    <span class="links-name">Add food</span>
                </a>
            </li>
            <li>
                <a href="javascript::void(0)" class="tablinks" onclick="openTab(event, 'orderlist')">
                    <i class='bx bx-list-ul'></i>
                    <span class="links-name">Order list</span>
                </a>
            </li>

            <li class="logout">
                <a href="javascript::void(0)">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="logout"><i class='bx bx-log-out'></i>Logout</a>
                    </form>
                </a>
            </li>
        </ul>
    </div>

    <!-- main container -->
    <div class="main-container">
        <div class="navbar">
            <p>Dashboard</p>
            <div class="dropdown">
                <a href="javascript::void(0)" class="dropbtn user" onclick="myFunction()">
                    <span class="links-name">Hello {{ Auth::user()->name }}!<i class="bx bx-chevron-down" style="margin-left: 20px;"></i></span>
                </a>
                <div id="myDropdown" class="dropdown-content">
                    <div class="user-profile">
                        <img src="{{ url('images/user-profile.jpg') }}">
                        <div class="user-detail">
                            <p class="user-name">{{ strtoupper(Auth::user()->name) }}</p>
                            <p class="email">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <a href="{{ url('/user/profile') }}" class="edit-profile">Edit profile</a>
                </div>
            </div>

        </div>

        <!-- dashboard -->
        <div id="dashboard" class="tabcontent">
            dashboard content
        </div>

        <!-- add food division -->
        <div id="addfood" class="tabcontent add_food">
            <!-- <a href="{{ route('admin.addfood') }}" class="btn foodbtn">Click here to add food!</a> -->
            <a href="javascript::void(0)" id="myBtn" class="btn foodbtn">Click here to add food!</a>
            <!-- The Modal -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>Add food form</p>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label class="formLabel" for="fname">Enter Food name</label> <br>
                            <input class="formInput" type="text" id="fname" name="food_name" placeholder="Enter food name" required><br>

                            <label class="formLabel" for="fdescription">Enter description</label> <br>
                            <textarea class="formInput" id="fdescription" name="food_description" placeholder="Enter food description" required></textarea> <br>

                            <label class="formLabel" for="fimage">Select image</label> <br>
                            <input class="formInput" id="fimage" type="file" name="image" style="border: none;" required><br>

                            <label class="formLabel" for="fprice">Enter Food price</label> <br>
                            <input class="formInput" id="fprice" type="number" placeholder="Enter price" name="food_price" required><br>

                            <p class="formLabel">Select food type</p>
                            <input type="radio" name="food_type" id="normal" value="normal" style="margin-bottom: 6px;" checked>
                            <label for="normal">Normal item</label> <br>
                            <input type="radio" name="food_type" id="featured" value="featured" style="margin-bottom: 6px;">
                            <label for="featured">featured item</label> <br>

                            <button type="submit">Add now</button>
                        </form>
                    </div>
                </div>

            </div>

            <h3>Added Items</h3>
            <p class="food-title">Featured item</p>
            @foreach($items as $item)
            @if($item->food_type == 'featured')
            <div class="items">
                <img src="{{url($item->food_photo_path)}}" alt="food-image">
                <div class="food-info">
                    <p class="food-name">{{$item->food_name}}</p>
                    <p class="food-description">{{ $item->food_description }}</p>
                    <p class="food-price">NRs. {{ $item->food_price }}</p>
                </div>
                <div class="actions">
                    <a href="{{ route('admin.edit',['id'=>$item->id])}}" style="margin-right: 15px;color: green;">
                        Edit <i class='bx bx-edit-alt'></i>
                    </a>
                    <a href="{{ route('admin.delete',['id'=>$item->id])}}" style="color: red;">
                        Delete <i class='bx bx-trash'></i>
                    </a>
                </div>
            </div>
            @endif
            @endforeach

            <p class="food-title" style="margin-top: 60px;">Menu item</p>
            @foreach($items as $item)
            @if($item->food_type == 'normal')
            <div class="items">
                <img src="{{url($item->food_photo_path)}}" alt="food-image">
                <div class="food-info">
                    <p class="food-name">{{$item->food_name}}</p>
                    <p class="food-description">{{ $item->food_description }}</p>
                    <p class="food-price">NRs. {{ $item->food_price }}</p>
                </div>
                <div class="actions">
                    <a href="{{ route('admin.edit',['id'=>$item->id])}}" style="margin-right: 15px;color: green;">Edit <i class='bx bx-edit-alt'></i></a>
                    <a href="{{ route('admin.delete',['id'=>$item->id])}}" style="color: red;">Delete <i class='bx bx-trash'></i></a>
                </div>

            </div>
            @endif
            @endforeach
        </div>
        <!-- order-list -->
        <div id="orderlist" class="tabcontent order_list">
            <h3>Order list</h3>
            <table>
                <tr>
                    <th>Order id</th>
                    <th>Product name</th>
                    <th>User name</th>
                    <th>Location</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                @foreach ($details as $detail)
                @if($detail->approve == 0)
                <tr>
                    <td>{{$detail->order_id}}</td>
                    <td>{{ $detail->food_name }}</td>
                    <td>{{ $detail->name }}</td>
                    <td>
                        {{ $detail->delivery_address }} <br>
                        <span class="direction">({{ $detail->detailed_direction }})</span>
                    </td>
                    <td>{{ $detail->phone }}</td>
                    <td>
                        <a href="{{ route('admin.approveOrder', ['order_id'=>$detail->order_id]) }}" class="approve">Approve &#10003;</a>
                    </td>
                </tr>
                @endif
                @endforeach

            </table>
        </div>
    </div>

    <script src="{{ url('js/index.js') }}"></script>
</body>

</html>