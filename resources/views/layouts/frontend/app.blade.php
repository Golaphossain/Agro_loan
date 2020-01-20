<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--new header-->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <!-- Font -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


    <!-- Stylesheets -->

    <link href= "{{ asset('assets/frontend/css/bootstrap.css')}}"rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/swiper.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/ionicons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        * {box-sizing: border-box;}

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            overflow: hidden;
            /*background-color: #604af5;*/
            background-color: #5caff5;
            /*padding: 10px 5px;*/
            /*padding-top: 10px;*/
            padding-right: 5px;
            padding-bottom: 10px;
            padding-left: 5px;
        }

        .header a {
            float: left;
            /*color: rgba(255, 255, 255, 0.88);*/
            color:white;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            line-height: 25px;
            border-radius: 4px;
        }

        .header a.logo {
            font-size: 25px;
            font-weight: bold;
        }

        .header a:hover {
            background-color: #000000;
            color: #ff3f4e;
        }

        .header a.active {
            background-color: dodgerblue;
            color: white;
        }

        .header-right {
            float: right;
        }

        @media screen and (max-width: 500px) {
            .header a {
                float: none;
                display: block;
                text-align: left;
            }

            .header-right {
                float: none;
            }
        }
        #search-box {
            position: relative;
            width: 50%;
            margin: 0;
        }

        #search-form
        {
            height: 40px;
            border: 1px solid #999;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            background-color: #fff;
            overflow: hidden;
        }

        #search-text
        {
            font-size: 14px;
            color: #ddd;
            border-width: 0;
            background: transparent;
        }

        #search-box input[type="text"]
        {
            width: 50%;
            padding: 11px 0 12px 1em;
            color: #333;
            outline: none;
        }

        #search-button {
            position: absolute;
            top: 0;
            right: 0;
            height: 42px;
            width: 80px;
            font-size: 14px;
            color: #fff;
            text-align: center;
            line-height: 42px;
            border-width: 0;
            background-color:dodgerblue;
            -webkit-border-radius: 0px 5px 5px 0px;
            -moz-border-radius: 0px 5px 5px 0px;
            border-radius: 0px 5px 5px 0px;
        }
        /*new style*/
        .view {
            background: url("https://mdbootstrap.com/img/Photos/Others/img (51).jpg")no-repeat center center;
            background-size: cover;
        }
        @media (min-width: 768px) {
            .view {
                overflow: visible;
                margin-top: -56px;
            }
        }
        .navbar {
            z-index: 1;
        }

        html,
        body,
        header,
        .view {
            height: 100%;
        }
    </style>

    @stack('css')
</head>
<body>

@include('layouts.frontend.partials.header')

@yield('content')
@include('layouts.frontend.partials.footer')
<!-- SCIPTS -->

<script src="{{asset('assets/frontend/js/jquery-3.1.1.min.js')}}"></script>

<script src="{{asset('assets/frontend/js/tether.min.js')}}"></script>

<script src="{{asset('assets/frontend/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/frontend/js/swiper.js')}}"></script>
<script src="{{asset('assets/frontend/js/scripts.js')}}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{$error}}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif
</script>
@stack('js')
</body>
</html>
