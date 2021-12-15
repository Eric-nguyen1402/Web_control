<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        <title>MPF Drive</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

        <!-- Styles -->
        <style>
           html, body {
                background-color: #F3FFFF;
                color: #718096	;
                font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-weight: 200;
                height: 100vh;
                margin: 0;

            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: #00b8ff;
                font-family:  Arial, Helvetica, sans-serif ;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .dropdown {
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                color: #636b6f;
                position: relative;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                min-width: 160px;
            }

            .dropdown-content a {
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                color: #636b6f;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropbtn {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .dropdown-content a:hover {background-color: #83d1f7;}

            .dropdown:hover .dropdown-content {display: block;}

            .dropdown:hover .dropbtn {background-color: #fff;}
</style>

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <div class="dropdown">
                            <a class="dropbtn">HOME</a>
                            <div class="dropdown-content">
                                <a href="{{ url('/home') }}">Controller</a>
                                <a href="{{ url('/maps') }}">Maps</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            @if (Route::has('login'))
                @auth
                    <div class="content">
                        <div class="title m-b-md">
                            Hello {{ Auth::user()->name }}
                        </div>
                        <div class="links">
                            <!-- <a href="https://www.mpfinside.com.tw/news">News</a> -->
                            <a href="{{ url('/home') }}">坦克</a>
                        </div>
                    </div>
                @else
                    <div class="content">
                        <div class="title m-b-md">
                            MPF Drive
                        </div>
                        <!-- <div class="links">
                            <a href="https://www.mpfinside.com.tw/">Home</a>
                            <a href="https://www.mpfinside.com.tw/news">News</a>
                            <a href="https://www.mpfinside.com.tw/product">Product</a>
                            <a href="https://www.mpfinside.com.tw/contact">Contact</a>
                            <a href="https://www.mpfinside.com.tw/partner">Partner</a>
                            <a href="https://www.mpfinside.com.tw/tech">Technical Support</a>
                            <a href="https://www.mpfinside.com.tw/service">Customer Service</a>
                            <a href="https://www.mpfinside.com.tw/series">MPF Inside</a>
                        </div> -->
                    </div>
                @endauth
            @endif
        </div>
    </body>
</html>
