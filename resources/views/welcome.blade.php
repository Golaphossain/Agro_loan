@extends('layouts.frontend.app')

    @section('title','Home')

@push('css')
        <link href="{{asset('assets/frontend/css/home/styles.css')}}" rel="stylesheet">
        <link href="{{asset('assets/frontend/css/home/responsive.css')}}" rel="stylesheet">

        <style>
            .favorite_posts{
                color: green;
            }
            /** {box-sizing: border-box;}*/

            /*body {*/
            /*    margin: 0;*/
            /*    font-family: Arial, Helvetica, sans-serif;*/
            /*}*/

            /*.header {*/
            /*    overflow: hidden;*/
            /*    background-color: #f1f1f1;*/
            /*    padding: 20px 10px;*/
            /*}*/

            /*.header a {*/
            /*    float: left;*/
            /*    color: black;*/
            /*    text-align: center;*/
            /*    padding: 12px;*/
            /*    text-decoration: none;*/
            /*    font-size: 16px;*/
            /*    line-height: 25px;*/
            /*    border-radius: 4px;*/
            /*}*/

            /*.header a.logo {*/
            /*    font-size: 25px;*/
            /*    font-weight: bold;*/
            /*}*/

            /*.header a:hover {*/
            /*    background-color: dodgerblue;*/
            /*    color: white;*/
            /*}*/

            /*.header a.active {*/
            /*    background-color: dodgerblue;*/
            /*    color: white;*/
            /*}*/

            /*.header-right {*/
            /*    float: right;*/
            /*}*/

            /*@media screen and (max-width: 500px) {*/
            /*    .header a {*/
            /*        float: none;*/
            /*        display: block;*/
            /*        text-align: left;*/
            /*    }*/

            /*    .header-right {*/
            /*        float: none;*/
            /*    }*/
            /*}*/
            /*#search-box {*/
            /*    position: relative;*/
            /*    width: 50%;*/
            /*    margin: 0;*/
            /*}*/

            /*#search-form*/
            /*{*/
            /*    height: 40px;*/
            /*    border: 1px solid #999;*/
            /*    -webkit-border-radius: 5px;*/
            /*    -moz-border-radius: 5px;*/
            /*    border-radius: 5px;*/
            /*    background-color: #fff;*/
            /*    overflow: hidden;*/
            /*}*/

            /*#search-text*/
            /*{*/
            /*    font-size: 14px;*/
            /*    color: #ddd;*/
            /*    border-width: 0;*/
            /*    background: transparent;*/
            /*}*/

            /*#search-box input[type="text"]*/
            /*{*/
            /*    width: 50%;*/
            /*    padding: 11px 0 12px 1em;*/
            /*    color: #333;*/
            /*    outline: none;*/
            /*}*/

            /*#search-button {*/
            /*    position: absolute;*/
            /*    top: 0;*/
            /*    right: 0;*/
            /*    height: 42px;*/
            /*    width: 80px;*/
            /*    font-size: 14px;*/
            /*    color: #fff;*/
            /*    text-align: center;*/
            /*    line-height: 42px;*/
            /*    border-width: 0;*/
            /*    background-color:dodgerblue;*/
            /*    -webkit-border-radius: 0px 5px 5px 0px;*/
            /*    -moz-border-radius: 0px 5px 5px 0px;*/
            /*    border-radius: 0px 5px 5px 0px;*/
            /*}*/
        </style>
@endpush
@section('content')
        <div class="main-slider">
            <div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
                 data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
                 data-swiper-breakpoints="true" data-swiper-loop="true" >
                <div class="swiper-wrapper">
                    @foreach($categories as $category)
                        <div class="swiper-slide">
{{--                            <a class="slider-category" href="{{route('category.posts',$category->slug)}}">--}}
                                <div class="blog-image"><img src="{{Storage::url('category/slider/'.$category->image)}}" alt="{{$category->name}}"></div>
                                <div class="category">
                                    <div class="display-table center-text">
                                        <div class="display-table-cell">
{{--                                            <h3><b>{{$category->name}}</b></h3>--}}
                                        </div>
                                    </div>
                                </div>
{{--                            </a>--}}
                        </div>
                        <!-- swiper-slide -->
                    @endforeach
                </div>
                <!-- swiper-wrapper -->
            </div>
            <!-- swiper-container -->

        </div>
        <!-- slider -->

        <section class="blog-area section">
            <div class="container">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100">
                                <div class="single-post post-style-1">
{{--                                    <a href="{{route('post.details',$post->id)}}">--}}
                                    <div class="blog-image">
                                        <a href="{{route('post.details',$post->id)}}">
                                        <img src="{{Storage::url('post/'.$post->image)}}" alt="{{$post->title}}" width="250" height="150">
                                        </a>
                                    </div>
{{--                                    </a>--}}
                                    <div class="blog-info">
                                        <div>
                                            @guest
                                                <h4 class="title">
                                                <a href="javascript:void(0);" onclick="toastr.info('Your are not permitted to see the offer.','Info',{
                                                closeButton:true,
                                                progressBar:true,
                                            })">
                                                    <b>{{$post->title}}</b>
                                                </a>
                                                </h4>
                                            @else
                                                <h4 class="title">
                                                    <a href="{{route('post.details',$post->id)}}"><b>{{$post->title}}</b></a>
                                                </h4>
                                            @endguest
                                                <a href="{{route('post.details',$post->id)}}">
                                          <p>
                                              <strong>Interest Rate :</strong>{{$post->interest_rate}}
                                              <br>
                                              <strong>Loan Amount :</strong>{{$post->loanSize}}
                                              <br>
                                              <strong>Loan Period :</strong>{{$post->loanPeriod}}
                                              <br>
                                              {!! \Illuminate\Support\Str::limit($post->body,'130') !!}
                                          </p>
                                                </a>
                                        </div>
                                    </div>
                                        <!-- blog-info -->
                                </div><!-- single-post -->
{{--                                </a>--}}
                            </div><!-- card -->
                        </div><!-- col-lg-4 col-md-6 -->
{{--                        </a>--}}
                    @endforeach

                </div><!-- row -->

                <a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

            </div><!-- container -->
        </section><!-- section -->
    @endsection

    @push('js')

    @endpush

