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

    <!-- icon link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin page</title>
</head>

<body>
    <!-- Side bar container -->
    <div class="sidebar">
        <div class="logo">
            <span class="logo-name">Mero khajaghar</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="javascript::void(0)" class="tablinks" onclick="openTab(event, 'dashboard')" id="defaultOpen">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links-name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="javascript::void(0)" class="tablinks" onclick="openTab(event, 'addfood')">
                    <i class='bx bx-plus'></i>
                    <span class="links-name">Add food</span>
                </a>
            </li>
            <li>
                <a href="javascript::void(0)"  class="tablinks" onclick="openTab(event, 'orderlist')">
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
            <a href="#">
                <span class="links-name">Hello {{ Auth::user()->name }}!<i class="bx bx-chevron-down" style="margin-left: 20px;"></i></span>
            </a>
        </div>
        <!-- dashboard -->
        <div id="dashboard" class="tabcontent">
            dashboard content
        </div>

        <!-- add food division -->
        <div id="addfood" class="tabcontent add_food">
            <a href="{{ route('admin.addfood') }}" class="btn foodbtn">Click here to add food!</a>
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
            <!-- <table>
                <tr>
                    <td><img src="{{url($item->food_photo_path)}}" alt="food-image" width="90" height="90"></td>
                    <td>{{$item->food_name}} <br> <span>{{ $item->food_description }}</span></td>
                    <td>
                        <p> <b>NRs. {{ $item->food_price }}</b> </p>
                    </td>
                    <td>
                        <a href="{{ route('admin.edit',['id'=>$item->id])}}"><button>Edit</button></a>
                        <a href="{{ route('admin.delete',['id'=>$item->id])}}"><button>Delete</button></a>
                    </td>
                </tr>
            </table> -->
        </div>
        <!-- order-list -->
        <div id="orderlist" class="tabcontent order_list">
            <p>Approve the following orders: </p>
        </div>
    </div>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
</body>

</html>