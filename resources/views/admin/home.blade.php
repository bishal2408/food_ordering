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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
        <ul class="navCustom-links">
            <li>
                <a href="javascript::void(0)" class="tablinks" onclick="openTab(event, 'Dashboard')">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links-name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="javascript::void(0)" class="tablinks" onclick="openTab(event, 'Addfood')" id="defaultOpen">
                    <i class='bx bx-plus'></i>
                    <span class="links-name">Add food</span>
                </a>
            </li>
            <li>
                <a href="javascript::void(0)" class="tablinks" onclick="openTab(event, 'Orderlist')">
                    <i class='bx bx-list-ul'></i>
                    <span class="links-name">Order list</span>
                </a>
            </li>
            <li>
                <a href="javascript::void(0)" class="tablinks" onclick="openTab(event, 'FAQs')">
                    <i class='bx bx-message-alt-dots'></i>
                    <span class="links-name">FAQs</span>
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
        <div class="navbarCustom">
            <p id="navbar-title">Dashboard</p>
            <div class="dropDown">
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
        <div id="Dashboard" class="tabcontent">
            dashboard content
        </div>

        <!-- add food division -->
        <div id="Addfood" class="tabcontent add_food">
            <!-- <a href="{{ route('admin.addfood') }}" class="btn foodbtn">Click here to add food!</a> -->
            <a href="javascript::void(0)" id="myBtn" class="btnCustom foodbtn">Click here to add food!</a>
            @include('admin.create')

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
                    <!-- <a href="{{ route('admin.edit',['id'=>$item->id])}}" style="margin-right: 15px;color: green;">
                        Edit <i class='bx bx-edit-alt'></i>
                    </a> -->
                    <a href="#" data-bs-toggle="modal" data-bs-target="#ModalEdit{{$item->id}}" style="margin-right: 15px;color: green;">
                        Edit <i class='bx bx-edit-alt'></i>
                    </a>
                    @include('admin.edit')
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
                    <!-- <a href="{{ route('admin.edit',['id'=>$item->id])}}" style="margin-right: 15px;color: green;">Edit <i class='bx bx-edit-alt'></i></a> -->
                    <a href="#" data-bs-toggle="modal" data-bs-target="#ModalEdit{{$item->id}}" style="margin-right: 15px;color: green;">
                        Edit <i class='bx bx-edit-alt'></i>
                    </a>
                    @include('admin.edit')
                    <a href="{{ route('admin.delete',['id'=>$item->id])}}" style="color: red;">Delete <i class='bx bx-trash'></i></a>
                </div>

            </div>
            @endif
            @endforeach
        </div>
        <!-- order-list -->
        <div id="Orderlist" class="tabcontent order_list">
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
        <!-- FAQ -->
        <div id="FAQs" class="tabcontent faq-container">
            <a href="javascript::void(0)" id="myBtn2" class="btnCustom foodbtn"> Add FAQs</a> <br>
            <!-- The Modal -->
            <div id="myModal2" class="mmodal">
                <div class="mmodal-content">
                    <div class="mmodal-header">
                        <p>Add FAQ form</p>
                        <span class="close2">&times;</span>
                    </div>
                    <div class="mmodal-body">
                        <form action="{{ route('faq.store') }}" method="post">
                            @csrf
                            <label class="formLabel" for="question">Enter Question</label><br>
                            <input class="formInput" type="text" name="faq_question" id="question" placeholder="Enter the question here" required><br>

                            <label class="formLabel" for="answer">Enter answer</label> <br>
                            <textarea class="formInput" name="faq_answer" id="answer" required></textarea>
                            <button type="submit">Add FAQ</button>
                        </form>
                    </div>
                </div>
            </div>
            @foreach ($faqs as $faq)
            <div class="faq-content">
                <button class="ccollapse"> <p>{{ $faq->faq_question }} </p> <a href="{{ route('faq.delete', ['id'=>$faq->id]) }}" class="bx bx-trash"></a></button>
                <div class="collapse-content">
                    <p> {{ $faq->faq_answer }} </p>
                </div>
            </div>
            @endforeach
        </div>

    </div>

    <script src="{{ url('js/admin-index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>