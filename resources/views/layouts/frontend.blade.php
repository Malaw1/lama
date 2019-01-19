<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cubic Admin Theme</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/frontend.css')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('plugins/images/favicon.png')}}">
    <style>
        .label {
            font-size: 15px;
            font-weight: normal;
            margin-bottom: 10px;
        }
        @media screen and (max-width: 768px){
            .label {
                display: inline-block;
            }
        }

    </style>
    @stack('css')
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">{{env('APP_NAME')}}</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                        <li><a href="{{ url('dashboard') }}">Demo</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @endauth
                        @endif
                        <li><a href="{{ url('blogs') }}">Blogs</a></li>

            </ul>
        </div>
    </div>
</nav>


@yield('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@stack('js')
</body>
</html>
