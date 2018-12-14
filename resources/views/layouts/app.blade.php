{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--<meta charset="utf-8">--}}
{{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--<!-- CSRF Token -->--}}
{{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--<title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--<!-- Scripts -->--}}
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

{{--<!-- Fonts -->--}}
{{--<link rel="dns-prefetch" href="https://fonts.gstatic.com">--}}
{{--<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">--}}

{{--<!-- Styles -->--}}
{{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--</head>--}}
{{--<body>--}}
{{--<div id="app">--}}
{{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">--}}
{{--<div class="container">--}}
{{--<a class="navbar-brand" href="{{ url('/') }}">--}}
{{--{{ config('app.name', 'Laravel') }}--}}
{{--</a>--}}
{{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--<span class="navbar-toggler-icon"></span>--}}
{{--</button>--}}

{{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--<!-- Left Side Of Navbar -->--}}
{{--<ul class="navbar-nav mr-auto">--}}

{{--</ul>--}}

{{--<!-- Right Side Of Navbar -->--}}
{{--<ul class="navbar-nav ml-auto">--}}
{{--<!-- Authentication Links -->--}}
{{--@guest--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--</li>--}}
{{--@else--}}
{{--<li class="nav-item dropdown">--}}
{{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--{{ Auth::user()->name }} <span class="caret"></span>--}}
{{--</a>--}}

{{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--onclick="event.preventDefault();--}}
{{--document.getElementById('logout-form').submit();">--}}
{{--{{ __('Logout') }}--}}
{{--</a>--}}

{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--@csrf--}}
{{--</form>--}}
{{--</div>--}}
{{--</li>--}}
{{--@endguest--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</nav>--}}

{{--<main class="py-4">--}}
{{--@yield('content')--}}
{{--</main>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}

        <!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('plugins/images/favicon.png')}}">
<title>labMan</title>
<!-- ===== Bootstrap CSS ===== -->
<link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- ===== Plugin CSS ===== -->
<link href="{{asset('plugins/components/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
<link href="{{asset('plugins/components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">

<!-- ===== Animation CSS ===== -->
<link href="{{asset('css/animate.css')}}" rel="stylesheet">
<!-- ===== Custom CSS ===== -->
<link href="{{asset('css/style-normal.css')}}" rel="stylesheet">
<!-- ===== Color CSS ===== -->
<link href="{{asset('css/colors/red.css')}}" id="theme" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@stack('css')
</head>
<body class="fix-header">
<!-- ===== Main-Wrapper ===== -->
@yield('content')

<!-- ===== Main-Wrapper-End ===== -->
<!-- ==============================
    Required JS Files
=============================== -->
<!-- ===== jQuery ===== -->
<script src="{{asset('plugins/components/jquery/dist/jquery.min.js')}}"></script>
<!-- ===== Bootstrap JavaScript ===== -->
<script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- ===== Slimscroll JavaScript ===== -->
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<!-- ===== Wave Effects JavaScript ===== -->
<script src="{{asset('js/waves.js')}}"></script>
<!-- ===== Menu Plugin JavaScript ===== -->
<script src="{{asset('js/sidebarmenu.js')}}"></script>
<!-- ===== Custom JavaScript ===== -->
<script src="{{asset('js/custom-normal.js')}}"></script>
<!-- ===== Plugin JS ===== -->
<script src="{{asset('plugins/components/chartist-js/dist/chartist.min.js')}}"></script>
<script src="{{asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('plugins/components/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('plugins/components/sparkline/jquery.charts-sparkline.js')}}"></script>
<script src="{{asset('plugins/components/knob/jquery.knob.js')}}"></script>
<script src="{{asset('plugins/components/easypiechart/dist/jquery.easypiechart.min.js')}}"></script>
<!-- ===== Style Switcher JS ===== -->
<script src="{{asset('plugins/components/styleswitcher/jQuery.style.switcher.js')}}"></script>
@stack('js')
</body>

</html>
