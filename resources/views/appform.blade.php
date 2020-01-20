@extends('layouts.frontend.app')
@section('title')
    {{$post->title}}
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/single-post/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/single-post/responsive.css')}}">
    <style>
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
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
            font-family: "Raleway",sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #000000;
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
        .row {
            margin-left: -15px;
            margin-right: -15px;
        }
        label {
            display: inline-block;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12,.col-md-16 {
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
        button, input, optgroup, select, textarea {
            color: inherit;
            font: inherit;
            margin: 0;
        }
        input {
            line-height: normal;
        }
        button, select {
            text-transform: none;
        }
        button, html input[type='button'], input[type='reset'], input[type='submit'] {
            -webkit-appearance: button;
            cursor: pointer;
        }
        button {
            overflow: visible;
        }
        textarea {
            overflow: auto;
        }
        input, button, select, textarea {
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-horizontal .form-group {
            margin-left: -15px;
            margin-right: -15px;
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
        [role='button'] {
            cursor: pointer;
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
        /* @media all and (min-width:768px) */
        .form-horizontal .control-label {
            text-align: right;
            margin-bottom: 0px;
            padding-top: 7px;
        }
        .form-control {
            display: block;
            width: 100%;
            height: 39px;
            padding: 6px 12px;
            font-size: 16px;
            line-height: 1.6;
            color: #555555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #666666;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0px 1px 1px rgba(0,0,0,0.075);
            -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            -webkit-transition: border-color ease-in-out 0.15s, -webkit-box-shadow ease-in-out 0.15s;
            transition: border-color ease-in-out 0.15s, -webkit-box-shadow ease-in-out 0.15s;
            transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s, -webkit-box-shadow ease-in-out 0.15s;
        }
        input[type='file'] {
            display: block;
        }
        .help-block {
            display: block;
            margin-top: 5px;
            margin-bottom: 10px;
            color: #404040;
        }
        b, strong {
            font-weight: bold;
        }
        .form-control:focus {
            border-color: #9458c3;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(148, 88, 195, 0.6);
            box-shadow: inset 0px 1px 1px rgba(0,0,0,0.075), 0px 0px 8px rgba(148,88,195,0.6);
        }
        input[type='file']:focus, input[type='radio']:focus, input[type='checkbox']:focus {
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px;
        }
        textarea.form-control {
            height: auto;
        }
        .number {
            text-align: left !important;
        }
        .datepicker {
            border-radius: 4px;
            direction: ltr;
        }
        input[type='checkbox'], input[type='radio'] {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0;
        }
        input[type='radio'], input[type='checkbox'] {
            margin: 4px 0 0;
            margin-top: 1px \9;
            line-height: normal;
        }
        .btn-group, .btn-group-vertical {
            position: relative;
            display: inline-block;
            vertical-align: middle;
        }
        .bootstrap-select {
            width: 220px \0;
        }
        .bootstrap-select.form-control {
            margin-bottom: 0px;
            padding: 0;
            border: none;
        }
        :not([class*='col-']).bootstrap-select.form-control {
            width: 100%;
        }
        :not(.input-group-btn).bootstrap-select.btn-group, [class*='col-'].bootstrap-select.btn-group {
            float: none;
            display: inline-block;
            margin-left: 0px;
        }
        .form-inline .bootstrap-select.btn-group, .form-horizontal .bootstrap-select.btn-group, .form-group .bootstrap-select.btn-group {
            margin-bottom: 0px;
        }
        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }
        .btn-group > .btn, .btn-group-vertical > .btn {
            position: relative;
            float: left;
        }
        .bootstrap-select > .dropdown-toggle {
            width: 100%;
            padding-right: 25px;
            z-index: 1;
        }
        .btn-group > :first-child.btn {
            margin-left: 0px;
        }
        .bootstrap-select > .dropdown-toggle.bs-placeholder, .bootstrap-select > .dropdown-toggle.bs-placeholder:hover, .bootstrap-select > .dropdown-toggle.bs-placeholder:focus, .bootstrap-select > .dropdown-toggle.bs-placeholder:active {
            color: #999;
        }
        ul, ol {
            margin-top: 0px;
            margin-bottom: 12.5px;
        }
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0px;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 160px;
            padding: 5px 0;
            margin: 2px 0 0;
            list-style: none;
            font-size: 16px;
            text-align: left;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 4px;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
            box-shadow: 0px 6px 12px rgba(0,0,0,0.175);
            background-clip: padding-box;
        }
        .open > .dropdown-menu {
            display: block;
        }
        .bootstrap-select.btn-group .dropdown-menu {
            min-width: 100%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        select.bs-select-hidden, select.selectpicker {
            display: none !important;
        }
        .bootstrap-select > select {
            position: absolute !important;
            bottom: 0px;
            left: 50%;
            display: block !important;
            width: 0.5px !important;
            height: 100% !important;
            padding: 0 !important;
            opacity: 0 !important;
            border: none;
        }
        .bs-searchbox, .bs-actionsbox, .bs-donebutton {
            padding: 4px 8px;
        }
        .bootstrap-select.btn-group .dropdown-menu.inner {
            position: static;
            float: none;
            border: 0;
            padding: 0;
            margin: 0;
            border-radius: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        .bootstrap-select.btn-group .dropdown-menu li {
            position: relative;
        }
        a {
            background-color: transparent;
        }
        .dropdown-menu > li > a {
            display: block;
            padding: 3px 20px;
            clear: both;
            font-weight: normal;
            line-height: 1.6;
            color: #333333;
            white-space: nowrap;
        }
        .bootstrap-select.btn-group .dropdown-menu li a {
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .bootstrap-select.btn-group .dropdown-menu li a span.text {
            display: inline-block;
        }
        .glyphicon {
            position: relative;
            top: 1px;
            display: inline-block;
            font-family: "Glyphicons Halflings";
            font-style: normal;
            font-weight: normal;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .bootstrap-select.btn-group .dropdown-menu li a span.check-mark {
            display: none;
        }
        .bs-searchbox .form-control {
            margin-bottom: 0px;
            width: 100%;
            float: none;
        }
        .pull-left {
            float: left !important;
        }
        .bootstrap-select.btn-group .dropdown-toggle .filter-option {
            display: inline-block;
            overflow: hidden;
            width: 100%;
            text-align: left;
        }
        .caret {
            display: inline-block;
            width: 0px;
            height: 0px;
            margin-left: 2px;
            vertical-align: middle;
            border-top: 4px dashed;
            border-top: 4px solid \9;
            border-right: 4px solid transparent;
            border-left: 4px solid transparent;
        }
        .btn .caret {
            margin-left: 0px;
        }
        .bootstrap-select.btn-group .dropdown-toggle .caret {
            position: absolute;
            top: 50%;
            right: 12px;
            margin-top: -2px;
            vertical-align: middle;
        }
        .pull-right {
            float: right !important;
        }
    </style>
@endpush
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>Application Form</b></div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="{{route('applyforLoan',$post->id)}}" enctype="multipart/form-data" method="POST">
                                @csrf
{{--                                <div class="form-group">--}}
{{--                                    <label class="col-md-3 control-label" for="farmerName">কৃষকের নাম </label>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <input name="farmerName" class="form-control number" id="farmerName" style="text-align: right;" required="" type="text" value="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label class="col-md-3 control-label" for="farmerType">কৃষকের ধরন</label>--}}
{{--                                    <div class="col-md-6 my-1">--}}
{{--                                        <!--<input id="farmer_type" type="text" class="form-control" name="farmer_type" value="" required>-->--}}

{{--                                        <select name="farmerType" class="form-control show-tick" id="farmerType" data-live-search="true">--}}
{{--                                            <option selected="selected" value="">Select</option>--}}
{{--                                            <option value="own_land">নিজ জমি</option>--}}
{{--                                            <option value="lease_land">ইজারা জমি</option>--}}
{{--                                            <option value="tenant_farmers">বর্গা চাষি</option>--}}
{{--                                            <option value="other_farmers">অন্যান্য চাষি</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                    <div class="form-group">
                                    <label class="col-md-3 control-label" for="landAmount">কৃষিজমি(শতাংশ)</label>
                                    <div class="col-md-6">
                                        <input name="landAmount" class="form-control number" id="landAmount" style="text-align: right;" type="text" value="">
                                    </div>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label class="col-md-3 control-label" for="nidNo">জাতীয় পরিচয়পত্র নং</label>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <input name="nidNo" class="form-control number" id="nidNo" style="text-align: right;" type="text" value="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="nidImage">কৃষকের এনআইডি ছবি</label>
                                    <div class="col-md-6">
                                        <input name="nidImage" class="form-control" id="nidImage" onchange="check_image(this);" type="file">
                                        <span class="help-block">
{{--                                          <strong>Image/File type must be jpeg, png, gif only</strong>--}}
                                        </span>
                                    </div>
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label class="col-md-3 control-label" for="phone">ফোন নম্বর</label>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <input name="phone" class="form-control" id="phone" type="text" value="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="col-md-3 control-label" for="district">জেলা</label>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <select name="district" class="form-control show-tick" id="district" data-live-search="true">--}}
{{--                                            <option selected="selected" value="">Select</option>--}}
{{--                                            <option value="Bagerhat">Bagerhat</option>--}}
{{--                                            <option value="Bandarban">Bandarban</option>--}}
{{--                                            <option value="Barguna">Barguna</option>--}}
{{--                                            <option value="Barisal">Barisal</option>--}}
{{--                                            <option value="Bhola">Bhola</option>--}}
{{--                                            <option value="Bogra">Bogra</option>--}}
{{--                                            <option value="Brahmanbaria">Brahmanbaria</option>--}}
{{--                                            <option value="Chandpur">Chandpur</option>--}}
{{--                                            <option value="Chittagong">Chittagong</option>--}}
{{--                                            <option value="Chuadanga">Chuadanga</option>--}}
{{--                                            <option value="Comilla">Comilla</option>--}}
{{--                                            <option value="Cox'sBazar">Cox'sBazar</option>--}}
{{--                                            <option value="Dhaka">Dhaka</option>--}}
{{--                                            <option value="Dinajpur">Dinajpur</option>--}}
{{--                                            <option value="Faridpur">Faridpur</option>--}}
{{--                                            <option value="Feni">Feni</option>--}}
{{--                                            <option value="Gaibandha">Gaibandha</option>--}}
{{--                                            <option value="Gazipur">Gazipur</option>--}}
{{--                                            <option value="Gopalganj">Gopalganj</option>--}}
{{--                                            <option value="Habiganj">Habiganj</option>--}}
{{--                                            <option value="Jaipurhat">Jaipurhat</option>--}}
{{--                                            <option value="Jamalpur">Jamalpur</option>--}}
{{--                                            <option value="Jessore">Jessore</option>--}}
{{--                                            <option value="Jhalokati">Jhalokati</option>--}}
{{--                                            <option value="Jhenaidah">Jhenaidah</option>--}}
{{--                                            <option value="Khagrachari">Khagrachari</option>--}}
{{--                                            <option value="Khulna">Khulna</option>--}}
{{--                                            <option value="Kishoreganj">Kishoreganj</option>--}}
{{--                                            <option value="Kurigram">Kurigram</option>--}}
{{--                                            <option value="Kushtia">Kushtia</option>--}}
{{--                                            <option value="Lakshmipur">Lakshmipur</option>--}}
{{--                                            <option value="Lalmonirhat">Lalmonirhat</option>--}}
{{--                                            <option value="Madaripur">Madaripur</option>--}}
{{--                                            <option value="Magura">Magura</option>--}}
{{--                                            <option value="Manikganj">Manikganj</option>--}}
{{--                                            <option value="Maulvibazar">Maulvibazar</option>--}}
{{--                                            <option value="Meherpur">Meherpur</option>--}}
{{--                                            <option value="Munshiganj">Munshiganj</option>--}}
{{--                                            <option value="Mymensingh">Mymensingh</option>--}}
{{--                                            <option value="Naogaon">Naogaon</option>--}}
{{--                                            <option value="Narail">Narail</option>--}}
{{--                                            <option value="Narayanganj">Narayanganj</option>--}}
{{--                                            <option value="Narsingdi">Narsingdi</option>--}}
{{--                                            <option value="Natore">Natore</option>--}}
{{--                                            <option value="Nawabganj">Nawabganj</option>--}}
{{--                                            <option value="Netrokona">Netrokona</option>--}}
{{--                                            <option value="Nilphamari">Nilphamari</option>--}}
{{--                                            <option value="Noakhali">Noakhali</option>--}}
{{--                                            <option value="Pabna">Pabna</option>--}}
{{--                                            <option value="Panchagarh">Panchagarh</option>--}}
{{--                                            <option value="Patuakhali">Patuakhali</option>--}}
{{--                                            <option value="Pirojpur">Pirojpur</option>--}}
{{--                                            <option value="Rajbari">Rajbari</option>--}}
{{--                                            <option value="Rajshahi">Rajshahi</option>--}}
{{--                                            <option value="Rangamati">Rangamati</option>--}}
{{--                                            <option value="Rangpur">Rangpur</option>--}}
{{--                                            <option value="Satkhira">Satkhira</option>--}}
{{--                                            <option value="Shariatpur">Shariatpur</option>--}}
{{--                                            <option value="Sherpur">Sherpur</option>--}}
{{--                                            <option value="Sirajganj">Sirajganj</option>--}}
{{--                                            <option value="Sunamganj">Sunamganj</option>--}}
{{--                                            <option value="Sylhet">Sylhet</option>--}}
{{--                                            <option value="Tangail">Tangail</option>--}}
{{--                                            <option value="Thakurgaon">Thakurgaon</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="address">ঠিকানা</label>
                                    <div class="col-md-6">
                                        <textarea name="address" class="form-control" id="address"></textarea>
                                    </div>
                                </div>
                                <br>
                                <h3>জামিনদাতা</h3>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="nomineeName">নাম</label>
                                    <div class="col-md-6">
                                        <input name="nomineeName" class="form-control" id="nomineeName" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="nRelation">সম্পর্ক</label>
                                    <div class="col-md-6">
                                        <input name="nRelation" class="form-control" id="nRelation" type="text" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="nAddress">ঠিকানা</label>
                                    <div class="col-md-6">
                                        <textarea name="nAddress" class="form-control" id="nAddress"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="nNid">এনআইডি নং</label>
                                    <div class="col-md-6">
                                        <input name="nNid" class="form-control number" id="nNid" style="text-align: right;" type="text" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="nNidImage">এনআইডির ছবি</label>
                                    <div class="col-md-6">
                                        <input name="nNidImage" class="form-control" id="nNidImage" onchange="check_image(this);" type="file">
                                        <span class="help-block">
{{--                                          <strong>Image/File type must be jpeg, png, gif only</strong>--}}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="nomineeImage">জামিনদাতার ছবি</label>
                                    <div class="col-md-6">
                                        <input name="nomineeImage" class="form-control" id="nomineeImage" onchange="check_image(this);" type="file">
                                        <span class="help-block">
{{--                                            <strong>Image/File type must be jpeg, png, gif only</strong>--}}
                                        </span>
                                    </div>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label class="col-md-3 control-label" for="attachments">সংযু্ক্তি সমূহ</label>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <input name="attachments[]" class="form-control" id="attachments[]" type="file" multiple="">--}}
{{--                                        <span class="help-block">--}}
{{--                              <strong>Image/File type must be jpeg, png, gif only</strong>--}}
{{--                          </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-2">
                                        <button class="btn btn-primary" type="submit">
                                            SUBMIT
                                        </button>
                                        <a class="btn btn-danger pull-right" href="{{route('post.details',$post->id)}}">
                                            BACK
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
@endpush
