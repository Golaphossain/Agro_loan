@extends('layouts.frontend.app')
@section('title','Profile')
@push('css')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/profile/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/profile/responsive.css')}}">
    <link href="{{asset('assets/frontend/css/home/styles.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/home/responsive.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <style>
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .container {
            margin-right: auto;
            margin-left: auto;
            padding-left: 15px;
            padding-right: 15px;
        }
        /* @media all and (min-width:768px) */
        .container {
            width: 750px;
        }
        section .container {
            background: #ffffff;
        }
        article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
            display: block;
        }
        section {
            background-color: #ffffff;
            /*background-image: url("/images/background.png?95767ede6a7aff25bf176166a78a7957");*/
            background-repeat: repeat;
            background-size: 250px auto;
        }
        body {
            margin: 0;
        }
        body {
            /*font-family: "Raleway",sans-serif;*/
            /*font-size: 16px;*/
            /*line-height: 1.6;*/
            /*color: #000000;*/
            background-color: #522972;
        }
        body {
            font-family: "Bangla",Hind Siliguri,kiron,SolaimanLipi,Arial,Vrinda,FallbackBengaliFont,Helvetica,sans-serif;
            background-color: #522972;
        }
        html {
            font-family: sans-serif;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        html {
            font-size: 10px;
            -webkit-tap-highlight-color: transparent;
        }
        .row {
            margin-left: -15px;
            margin-right: -15px;
        }
        .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
            position: relative;
            min-height: 1px;
            padding-left: 15px;
            padding-right: 15px;
        }
        .panel {
            margin-bottom: 25px;
            background-color: #e2ffa4;
            border: 1px solid transparent;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow: 0px 1px 1px rgba(0,0,0,0.05);
        }
        .panel-default {
            border-color: #e6e5e5;
        }
        .panel {
            margin-top: 20px;
        }
        .panel-heading {
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
        }
        .panel-default > .panel-heading {
            color: #333333;
            background-color: #5f7af5;
            border-color: #e6e5e5;
        }
        .panel-body {
            padding: 15px;
        }
        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
            font-family: inherit;
            font-weight: 500;
            line-height: 1.1;
            color: inherit;
        }
        h4, .h4, h5, .h5, h6, .h6 {
            margin-top: 12.5px;
            margin-bottom: 12.5px;
        }
        h4, .h4 {
            font-size: 20px;
        }
        b, strong {
            font-weight: bold;
        }
        .thumbnail {
            display: block;
            padding: 4px;
            margin-bottom: 25px;
            line-height: 1.6;
            background-color: #522972;
            border: 1px solid #ddd;
            border-radius: 4px;
            -webkit-transition: border 0.2s ease-in-out;
            transition: border 0.2s ease-in-out;
        }
        .thumbnail {
            background: none;
        }
        img {
            border: 0;
        }
        img {
            vertical-align: middle;
        }
        .thumbnail > img, .thumbnail a > img {
            display: block;
            max-width: 100%;
            height: auto;
            margin-left: auto;
            margin-right: auto;
        }
        a {
            background-color: transparent;
        }
        a {
            color: #522972;
            text-decoration: none;
        }
        .btn {
            display: inline-block;
            margin-bottom: 0px;
            font-weight: normal;
            text-align: center;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            white-space: nowrap;
            padding: 6px 12px;
            font-size: 16px;
            line-height: 1.6;
            border-radius: 4px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .btn-primary {
            color: #fff;
            background-color: #522972;
            border-color: #45225f;
        }
        .pull-right {
            float: right !important;
        }
        ul, ol {
            margin-top: 0px;
            margin-bottom: 12.5px;
        }
        .nav {
            margin-bottom: 0px;
            padding-left: 0px;
            list-style: none;
        }
        .nav > li {
            position: relative;
            display: block;
        }
        .nav > li > a {
            position: relative;
            display: block;
            padding: 10px 15px;
        }

    </style>
@endpush
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-default ">
                        <div class="panel-heading"><strong>মেনু</strong></div>
                        <div class="panel-body">
                            <ul>
                                <li><a href="{{route('user.profile')}}"><p v-text>প্রোফাইল</p></a></li>
                                <br>
                                <br>
                                <li><a href="{{route('user.applist')}}"><p v-text>আবেদনসমুহ</p></a></li>
                                <br>
                                <br>
                                <li><a href="#"><p v-text>মাসিক কিস্তি</p></a></li>
                                <br>
                                <br>
                                <li><a href="{{route('user.password')}}"><p v-text>পাসওয়ার্ডপরিবর্তন</p></a></li>
                                <br>
                                <br>
                                {{--                                <li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="https://www.onlinekrishi.gov.bd/logout">লগ আউট</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>পাসওয়ার্ড পরিবর্তন</strong>
                        </div>
                        <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{route('password.update')}}">
                            @csrf
                            @method('PUT')
{{--                            <input type="hidden" name="_token" value="RAs4R8sLWLyYCecfnekHNdfpA6HVCghPSla1SEGi">--}}

                            <div class="form-group">
                                <label for="old_password" class="col-md-4 control-label">বর্তমান পাসওয়ার্ড</label>

                                <div class="col-md-6">
                                    <input id="old_password" type="password" class="form-control" name="old_password" required="" autofocus="">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">নতুন পাসওয়ার্ড</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required="" autofocus="">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="confirm_password" class="col-md-4 control-label">কনফার্ম পাসওয়ার্ড</label>

                                <div class="col-md-6">
                                    <input id="confirm_password" type="password" class="form-control" name="password_confirmation" required="" autofocus="">

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        পরিবর্তন
                                    </button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

            </div>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{--                                   <i class="material-icons">input</i>--}}
                    <span class="btn btn-primary m-t-15 waves-effect">Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            <a class="btn btn-danger" href="{{route('user.profile')}}">
                BACK
            </a>
        </div>
    </section>
@endsection

@push('js')
@endpush
