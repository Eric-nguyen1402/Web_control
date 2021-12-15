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

            title {
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

    </head>
    <body>
            <div class = "top">
            <td><input type='text' value='{{$user}}' name="teamname"></td>
            </div>
    </body>
</html>
