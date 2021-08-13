<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>App Name - @yield('title')</title>
    <!-- css import -->
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/layout.css') }}">
    <link rel="stylesheet" href="{{ url('css/navbar.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- custom font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

</head>

<body>
    <div class="navbar">
        <a href="{{url('/')}}" class="logo">MERO KHAJAGHAR</a>
        <div class="nav-links">
            @if(Route::has('login'))
            @auth
            <!-- <a href="{{ url('/dashboard') }}">Dashbord</a> -->
            <div class="dropdown">
                <div class="user-wrap">
                    <img src="{{ url('images/user-profile.jpg') }}" class="user-photo">
                    <a href="javascript::void(0)" class="dropbtn user" onclick="myFunction()"> {{ Auth::user()->name   }}</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a class="user logout" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                    </form>
                </div>
                <div id="myDropdown" class="dropdown-content">
                    <p><b>My profile</b></p>
                    <div class="user-profile">
                        <img src="{{ url('images/user-profile.jpg') }}">
                        <p>{{ strtoupper(Auth::user()->name) }}</p>
                        <p class="email">{{ Auth::user()->email }}</p>

                        <a href="{{ url('/user/profile') }}">Edit profile</a>
                    </div>
                    <a href="{{ route('order.mybag',['user_id'=>Auth::user()->id]) }}">My bag</a>
                    <a href="{{ route('order.orderlist', ['user_id'=>Auth::user()->id]) }}">My Order</a>
                </div>
            </div>
            <!-- <a href="{{ route('order.mybag',['user_id'=>Auth::user()->id]) }}" >My bag</a>
            <a href="{{ route('order.orderlist', ['user_id'=>Auth::user()->id]) }}" >My Order</a> -->
            @else
            <a href="{{ route('login') }}" class="login"> Login </a>
            @if(Route::has('register'))
            <a href="{{ route('register') }}" class="register"> Register</a>
            @endif
            @endauth
            @endif
        </div>
    </div>
    <div class="main-container">
        @yield('content')
    </div>
    
    
    <div class="footer">
        <div class="footer-content">
            <div class="home-card">
                <h3 class="footer-title">Mero Khajaghar</h3>
                <p>
                    Khajaghar is the fastest, easiest and most convenient way to enjoy the best food of your
                    favourite restaurants wherever you want to. <a href="" style="color: #0275d8;">Click here!</a> to know more
                </p>
            </div>
            <div class="help-card">
                <h3 class="footer-title">Get Help</h3>
                <div class="footer-link">
                    <a href="" class="link">How to order?</a>
                    <a href="" class="link">FAQs</a>
                    <a href="" class="link">Contact us</a>
                </div>
            </div>
            <div class="useful-card">
                <h3 class="footer-title">Useful links</h3>
                <div class="footer-link">
                    <a href="" class="link">About Us</a>
                    <a href="" class="link">Available Areas</a>
                    <a href="" class="link">Delivery Charges</a>
                </div>
            </div>
            <div class="contact-card">
                <h3 class="footer-title">Contact</h3>
                <p><i class="fa fa-home"> </i>Kathmandu, Nepal</p>
                <p><i class="fa fa-phone"></i> 014201394, 9873792892</p>
                <p><i class="fa fa-envelope"></i> info@gmail.com</p>
                <p >
                    Contact us at:
                   <a href=""> <i class="fa fa-facebook" style="margin-left: .5rem;"></i></a>
                   <a href=""> <i class="fa fa-instagram"></i></a>
                   <a href=""> <i class="fa fa-twitter"></i></a>
                </p>
            </div>
        </div>
        <div id="copyright">
            <p><i class="fa fa-copyright"></i> 2021 Copyright MeroKhajaghar.com</p>
        </div>
    </div>
    <script src="{{ url('js/index.js') }}"></script>
</body>

</html>