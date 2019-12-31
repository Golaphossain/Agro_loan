@extends('layouts.frontend.app')
@section('title')
    {{$post->title}}
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/single-post/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/single-post/responsive.css')}}">
    <style>
        .slider {
            height: 400px;
            width: 100%;
            background-size: cover;
            margin: 0;
            background-image: url({{Storage::url('post/'.$post->image)}});
        }
        .favorite_posts{
            color: green;
        }
        * {
                    -webkit-box-sizing: border-box;
                    box-sizing: border-box;
                }
                article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
                    display: block;
                }
                section {
                    background-color: #ffffff;
                    background-image: url("/images/background.png?95767ede6a7aff25bf176166a78a7957");
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
                .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
                    position: relative;
                    min-height: 1px;
                    padding-left: 15px;
                    padding-right: 15px;
                }
                .panel {
                    margin-bottom: 25px;
                    background-color: #fff;
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
                    background-color: #f5f5f5;
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
                        <a class="btn btn-primary" href="https://www.onlinekrishi.gov.bd/user/loans">পিছনে দেখতে</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--<div class="col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">Menu</div>
                    <div class="panel-body">
                      <ul class="nav">
                        <li><a href="https://www.onlinekrishi.gov.bd/user/loans">View All</a></li>
                      </ul>
                    </div>
                  </div>
                </div>-->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">ঋণের অাবেদন</div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="https://www.onlinekrishi.gov.bd/user/add_loan" enctype="multipart/form-data" method="POST">
                                <input name="_token" type="hidden" value="PgBNyZ9RjbpxHFpnISqzQp4lorH7nELHbWIvJ4b0">

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="bank_id">ব্যাংকের/এন,জি,ও/সরকারী অফিসের নাম *</label>
                                    <div class="col-md-6">
                                        <div class="btn-group bootstrap-select form-control m-bot15"><button title="-Select-" class="btn dropdown-toggle bs-placeholder btn-default" role="button" type="button" data-id="bank_id" data-toggle="dropdown"><span class="filter-option pull-left">-Select-</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><div class="bs-searchbox"><input class="form-control" role="textbox" aria-label="Search" type="text" autocomplete="off"></div><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li class="selected" data-original-index="0"><a tabindex="0" role="option" aria-disabled="false" aria-selected="true" data-tokens="null"><span class="text">-Select-</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" role="option" aria-disabled="false" aria-selected="false" data-tokens="null"><span class="text">Agrani Bank Limited,AIR BASE </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" role="option" aria-disabled="false" aria-selected="false" data-tokens="null"><span class="text">UPAZILA KRISHI OFFICE,PATENGA OFFICE </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" role="option" aria-disabled="false" aria-selected="false" data-tokens="null"><span class="text">agrani bank limited,steel mills ltd </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select name="bank_id" tabindex="-98" class="form-control selectpicker m-bot15" id="bank_id" onchange="getLoan_type(this.value);" data-live-search="true">
                                            <option value="">-Select-</option>
                                            <option value="128">Agrani Bank Limited,AIR BASE </option>
                                            <option value="689">UPAZILA KRISHI OFFICE,PATENGA OFFICE </option>
                                            <option value="772">agrani bank limited,steel mills ltd </option>
                                        </select></div>

                                    </div>
                                </div>

                                <div id="loantypes"></div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="loan_payment_time">ঋণ পরিশোধের সময় *</label>
                                    <div class="col-md-6">
                                        <select name="loan_payment_time" class="form-control m-bot15" id="loan_payment_time">
                                            <option value="">-Select-</option>
                                            <option value="6">6 Month</option>
                                            <option value="12">12 Month</option>
                                            <option value="18">18 Month</option>
                                            <option value="24">24 Month</option>
                                            <option value="30">30 Month</option>
                                            <option value="36">36 Month</option>
                                            <option value="42">42 Month</option>
                                            <option value="48">48 Month</option>
                                            <option value="54">54 Month</option>
                                            <option value="60">60 Month</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="amount">ঋণের পরিমাণ *</label>
                                    <div class="col-md-6">
                                        <input name="amount" class="form-control number" id="amount" style="text-align: right;" required="" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="farmer_type">কৃষকের ধরন *</label>
                                    <div class="col-md-6">
                                        <!--<input id="farmer_type" type="text" class="form-control" name="farmer_type" value="" required>-->

                                        <select name="farmer_type" class="form-control m-bot15" id="farmer_type">
                                            <option value="">-Select-</option>
                                            <option value="own_land">নিজ জমি</option>
                                            <option value="lease_land">ইজারা জমি</option>
                                            <option value="tenant_farmers">বর্গা চাষি</option>
                                            <option value="other_farmers">অন্যান্য চাষি</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="mouza_name">মৌজার নাম</label>
                                    <div class="col-md-6">
                                        <input name="mouza_name" class="form-control" id="mouza_name" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="khotain_no">খতিয়ান নং</label>
                                    <div class="col-md-6">
                                        <input name="khotain_no" class="form-control number" id="khotain_no" style="text-align: right;" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="khotain_type">থতিয়ানের ধরন</label>
                                    <div class="col-md-6">
                                        <select name="khotain_type" class="form-control m-bot15" id="khotain_type">
                                            <option value="">-Select-</option>
                                            <option value="rs">আর এস</option>
                                            <option value="bs">বি এস</option>
                                            <option value="ct">সিটি</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="landmark_no">দাগ নং</label>
                                    <div class="col-md-6">
                                        <input name="landmark_no" class="form-control" id="landmark_no" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="land_amount">কৃষকের জমির পরিমাণ</label>
                                    <div class="col-md-6">
                                        <input name="land_amount" class="form-control number" id="land_amount" style="text-align: right;" type="text" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <select name="land_amount_format" class="form-control">
                                            <option value="decimal">ডেসিমেল</option>
                                            <option value="gonda">গন্ডা</option>
                                            <option value="biga">বিঘা</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="crop_name">ফসলের নাম</label>
                                    <div class="col-md-6">
                                        <input name="crop_name" class="form-control" id="crop_name" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="investment_amount">বিনিয়োগের পরিমাণ</label>
                                    <div class="col-md-6">
                                        <input name="investment_amount" class="form-control number" id="investment_amount" style="text-align: right;" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="col-md-3 control-label" for="slug">&nbsp;</label>
                                    <div class="col-md-6">
                                        <input name="already_take_loan" id="already_take_loan" onclick="getClickAlreadyTakeLoan();" type="checkbox" value="1"> Already take loan form other bank?
                                    </div>
                                </div>
                                <div class="showhide_already_take_loan form-group" style="display:none;">
                                    <label class="col-md-3 control-label" for="already_take_loan_bank">Bank/NGO *</label>
                                    <div class="col-md-6">
                                        <input name="already_take_loan_bank" class="form-control" id="already_take_loan_bank" type="text" value="">
                                    </div>
                                </div>
                                <div class="showhide_already_take_loan form-group" style="display:none;">
                                    <label class="col-md-3 control-label" for="already_take_loan_address">Address *</label>
                                    <div class="col-md-6">
                                        <input name="already_take_loan_address" class="form-control" id="already_take_loan_address" type="text" value="">
                                    </div>
                                </div>
                                <div class="showhide_already_take_loan form-group" style="display:none;">
                                    <label class="col-md-3 control-label" for="already_take_loan_amount">Amount *</label>
                                    <div class="col-md-6">
                                        <input name="already_take_loan_amount" class="form-control number" id="already_take_loan_amount" style="text-align: right;" type="text" value="">
                                    </div>
                                </div>
                                <div class="showhide_already_take_loan form-group" style="display:none;">
                                    <label class="col-md-3 control-label" for="already_take_loan_date">Date *</label>
                                    <div class="col-md-6">
                                        <input name="already_take_loan_date" class="form-control datepicker" id="already_take_loan_date" type="text" placeholder="dd/mm/yyyy" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="farmer_id">কৃষি কার্ড নং</label>
                                    <div class="col-md-6">
                                        <input name="farmer_id" class="form-control" id="farmer_id" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="farmer_id_attchment">কৃষি কার্ডের  স্ক্যান কপি</label>
                                    <div class="col-md-6">
                                        <input name="farmer_id_attchment" class="form-control" id="farmer_id_attchment" onchange="check_image(this);" type="file">
                                        <span class="help-block">
                        <strong>Image/File type must be jpeg, png, gif,  only</strong>
                      </span>
                                    </div>
                                </div>


                                <h4>জামিনদাতা -১</h4>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref1_name">নাম</label>
                                    <div class="col-md-6">
                                        <input name="ref1_name" class="form-control" id="ref1_name" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref1_relation">সম্পর্ক</label>
                                    <div class="col-md-6">
                                        <input name="ref1_relation" class="form-control" id="ref1_relation" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref1_national_id">স্মার্ট কার্ড/জাতীয় পরিচয়পত্র নং</label>
                                    <div class="col-md-6">
                                        <input name="ref1_national_id" class="form-control number" id="ref1_national_id" style="text-align: right;" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref1_address">ঠিকানা/বাড়ীর নাম</label>
                                    <div class="col-md-6">
                                        <textarea name="ref1_address" class="form-control" id="ref1_address"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref1_countryID">দেশ</label>
                                    <div class="col-md-6">
                                        <select name="ref1_countryID" class="form-control m-bot15" id="ref1_countryID" onchange="getDivision(this.value,'ref1_');">
                                            <option value="">-Select-</option>
                                            <option value="1">Bangladesh(বাংলাদেশ)</option>
                                        </select>

                                    </div>
                                </div>
                                <div id="ref1_divisions"></div>
                                <div id="ref1_districts"></div>
                                <div id="ref1_subdistricts"></div>
                                <div id="ref1_unions"></div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref1_national_id_doc">জাতীয় পরিচয়পত্র/স্মার্ট কার্ডের স্ক্যান কপি</label>
                                    <div class="col-md-6">
                                        <input name="ref1_national_id_doc" class="form-control" id="ref1_national_id_doc" onchange="check_image(this);" type="file">
                                        <span class="help-block">
                              <strong>Image/File type must be jpeg, png, gif,  only</strong>
                          </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref1_image">জামিনদাতার ছবি</label>
                                    <div class="col-md-6">
                                        <input name="ref1_image" class="form-control" id="ref1_image" onchange="check_image(this);" type="file">
                                        <span class="help-block">
                              <strong>Image/File type must be jpeg, png, gif only</strong>
                          </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref1_signature">স্বাক্ষর/টিপসহি</label>
                                    <div class="col-md-6">
                                        <input name="ref1_signature" class="form-control" id="ref1_signature" onchange="check_image(this);" type="file">
                                        <span class="help-block">
                              <strong>Image/File type must be jpeg, png, gif only</strong>
                          </span>
                                    </div>
                                </div>

                                <h4>জামিনদাতা -২</h4>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref2_name">নাম</label>
                                    <div class="col-md-6">
                                        <input name="ref2_name" class="form-control" id="ref2_name" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref2_relation">সম্পর্ক</label>
                                    <div class="col-md-6">
                                        <input name="ref2_relation" class="form-control" id="ref2_relation" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref2_national_id">স্মার্ট কার্ড/জাতীয় পরিচয়পত্র নং</label>
                                    <div class="col-md-6">
                                        <input name="ref2_national_id" class="form-control number" id="ref2_national_id" style="text-align: right;" type="text" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref2_address">ঠিকানা/বাড়ীর নাম</label>
                                    <div class="col-md-6">
                                        <textarea name="ref2_address" class="form-control" id="ref2_address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref2_countryID">দেশ</label>
                                    <div class="col-md-6">
                                        <select name="ref2_countryID" class="form-control m-bot15" id="ref2_countryID" onchange="getDivision(this.value,'ref2_');">
                                            <option value="">-Select-</option>
                                            <option value="1">Bangladesh(বাংলাদেশ)</option>
                                        </select>

                                    </div>
                                </div>
                                <div id="ref2_divisions"></div>
                                <div id="ref2_districts"></div>
                                <div id="ref2_subdistricts"></div>
                                <div id="ref2_unions"></div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref2_national_id_doc">জাতীয় পরিচয়পত্র/স্মার্ট কার্ডের স্ক্যান কপি</label>
                                    <div class="col-md-6">
                                        <input name="ref2_national_id_doc" class="form-control" id="ref2_national_id_doc" onchange="check_image(this);" type="file">
                                        <span class="help-block">
                              <strong>Image/File type must be jpeg, png, gif only</strong>
                          </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref2_image">জামিনদাতার ছবি </label>
                                    <div class="col-md-6">
                                        <input name="ref2_image" class="form-control" id="ref2_image" onchange="check_image(this);" type="file">
                                        <span class="help-block">
                              <strong>Image/File type must be jpeg, png, gif only</strong>
                          </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ref2_signature">স্বাক্ষর/টিপসহি </label>
                                    <div class="col-md-6">
                                        <input name="ref2_signature" class="form-control" id="ref2_signature" onchange="check_image(this);" type="file">
                                        <span class="help-block">
                              <strong>Image/File type must be jpeg, png, gif only</strong>
                          </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="attachments">সংযু্ক্তি সমূহ</label>
                                    <div class="col-md-6">
                                        <input name="attachments[]" class="form-control" id="attachments[]" type="file" multiple="">
                                        <span class="help-block">
                              <strong>Image/File type must be jpeg, png, gif only</strong>
                          </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-2">
                                        <button class="btn btn-primary" type="submit">
                                            আবেদন পাঠিয়ে দিন
                                        </button>
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
