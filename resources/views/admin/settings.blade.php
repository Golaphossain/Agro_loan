@extends('layouts.backend.app')
@section('title','settings')
@push('css')
    @endpush
@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            SETTINGS
                        </h2>
{{--                        <ul class="header-dropdown m-r--5">--}}
{{--                            <li class="dropdown">--}}
{{--                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i class="material-icons">more_vert</i>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu pull-right">--}}
{{--                                    <li><a href="javascript:void(0);">Action</a></li>--}}
{{--                                    <li><a href="javascript:void(0);">Another action</a></li>--}}
{{--                                    <li><a href="javascript:void(0);">Something else here</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#prfile_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">face</i> UPDATE PROFILE
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#change_password_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">change_history</i>CHANGE PASSWORD
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="prfile_with_icon_title">
                                <form class="form-horizontal" method="POST" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
{{--                                    <div class="row clearfix">--}}
{{--                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">--}}
{{--                                            <label for="name">Name :</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div class="form-line">--}}
{{--                                                    <input type="text" id="name" class="form-control" placeholder="Enter your name" value="{{Auth::guard('admin')->user()->name}}" name="name">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="username">Username :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="username" class="form-control" placeholder="Enter your name" value="{{Auth::guard('admin')->user()->username}}" name="username">
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
                                                    <input type="text" id="email_address_2" class="form-control"  name="email" value="{{Auth::guard('admin')->user()->email}}" placeholder="Enter your email address">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

{{--                                    <div class="row clearfix">--}}
{{--                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">--}}
{{--                                            <label for="email_address_2">About :</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div class="form-line">--}}
{{--                                                    <textarea name="about"class="form-control">{{Auth::user()->about}}</textarea>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="change_password_with_icon_title">
                                <form class="form-horizontal" method="POST" action="{{route('admin.password.update')}}">
                                    @csrf
                                    @method('PUT')
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
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('js')
    @endpush
