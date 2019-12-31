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
        {{--.slider {--}}
        {{--    height: 400px;--}}
        {{--    width: 100%;--}}
        {{--    background-size: cover;--}}
        {{--    margin: 0;--}}
        {{--    background-image: url({{Storage::url('post/'.'vgi.jpg')}});--}}
        {{--}--}}
        {{--.favorite_posts{--}}
        {{--    color: green;--}}
        {{--}--}}

    </style>
@endpush
@section('content')
{{--    <div class="slider display-table center-text">--}}
{{--        <h1 class="title display-table-cell"><b>{{\Illuminate\Support\Facades\Auth::user()->name}}</b></h1>--}}
{{--    </div><!-- slider -->--}}

    <section class="blog-area section">
        <div class="container">

                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
{{--                                <div class="header">--}}

                                <div class="avatar-area">
                                    <img  class="rounded" src="{{Storage::url('profile/'.
                                  Auth::user()->image)}}" height="350" width="100" alt="image not show">
                                </div>
{{--                                    <ul class="header-dropdown m-r--5">--}}
{{--                                        <li class="dropdown">--}}
{{--                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                <i class="material-icons">more_vert</i>--}}
{{--                                            </a>--}}
{{--                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                <li><a href="javascript:void(0);">Action</a></li>--}}
{{--                                                <li><a href="javascript:void(0);">Another action</a></li>--}}
{{--                                                <li><a href="javascript:void(0);">Something else here</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
                                <div class="body">
                                    <!-- Nav tabs -->
{{--                                    <ul class="nav nav-tabs" role="tablist">--}}
{{--                                        <li role="presentation" class="active">--}}
{{--                                            <a href="#prfile_with_icon_title" data-toggle="tab">--}}
{{--                                                <i class="material-icons">face</i> UPDATE PROFILE--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li role="presentation">--}}
{{--                                            <a href="#change_password_with_icon_title" data-toggle="tab">--}}
{{--                                                <i class="material-icons">change_history</i>CHANGE PASSWORD--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}

                                    <!-- Tab panes -->
                                    <div class="tab-content">
{{--                                        <div role="tabpanel" class="tab-pane fade in active" id="prfile_with_icon_title">--}}
{{--                                            <form class="form-horizontal" method="POST" action="{{route('author.profile.update')}}" enctype="multipart/form-data">--}}
{{--                                                @csrf--}}
{{--                                                @method('PUT')--}}
                                                <div class="row clearfix">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                        <label for="name">Name :</label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" id="name" class="form-control" placeholder="Enter your name" value="{{Auth::user()->name}}" name="name" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                        <label for="email_address_2">Email Address:</label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" id="email_address_2" class="form-control"  name="email" value="{{Auth::user()->email}}" placeholder="Enter your email address" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                        <label for="email_address_2">Mobile :</label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="image" class="form-control" value="{{Auth::user()->phone}}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
{{--                                                <div class="row clearfix">--}}
{{--                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">--}}
{{--                                                        <label for="email_address_2">About :</label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <div class="form-line">--}}
{{--                                                                <textarea name="about"class="form-control">{{Auth::user()->about}}</textarea>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="row clearfix">--}}
{{--                                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">--}}
{{--                                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}

{{--                                        </div>--}}
{{--                                        <div role="tabpanel" class="tab-pane fade" id="change_password_with_icon_title">--}}
                                            <form class="form-horizontal" method="POST" action="{{route('password.update')}}">
                                                @csrf
                                                @method('PUT')
                                                <h4 class="primary">Change Password</h4>
                                                <div class="row clearfix">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                        <label for="old_password">Old Password :</label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="password" id="old_password" class="form-control" placeholder="Enter your old password" name="old_password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                        <label for="password">New Password :</label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="password" id="password" class="form-control" placeholder="Enter your password" name="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                        <label for="confirm_password">Confirm Password : </label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="password" id="confirm_password" class="form-control" placeholder="Enter your confirm password" name="password_confirmation">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                                                    </div>
                                                </div>
                                            </form>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

        </div><!-- container -->
    </section><!-- section -->
@endsection

@push('js')
@endpush
