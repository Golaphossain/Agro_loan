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
    </style>
    @endpush
@section('content')
{{--    <div class="slider">--}}

{{--    </div><!-- slider -->--}}
<div>

</div>
    <section class="post-area section">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-12 no-right-padding">

                    <div class="main-post">

                        <div class="blog-post-inner">

                            <div class="post-info">

                                <div class="left-area">
                                    <a class="avatar" href="#"><img src="{{Storage::url('profile/'.$post->organization->image)}}" height="70" width="50" alt="Profile Image"></a>
                                </div>

                                <div class="middle-area">
                                    <a class="name" href="#"><b>{{$post->organization->name}}</b></a>
                                    <h6 class="date">on {{$post->created_at->diffForHumans()}}</h6>
                                </div>

                            </div><!-- post-info -->

                            <h3 class="title"><a href="#"><b>{{$post->title}}</b></a></h3>

                            <div class="para">
                                <p>
                                    <strong>Interest Rate :</strong>{{$post->interest_rate}}
                                    <br>
                                    <strong>Loan Amount :</strong>{{$post->loanSize}}
                                    <br>
                                    <strong>Loan Period :</strong>{{$post->loanPeriod}}
                                    <br>
                                </p>
                                {!! html_entity_decode($post->body) !!}
                            </div>
                            <ul>
                                <li>
                               <a  class="btn btn-danger m-t-15 waves-effect" href="{{route('home')}}">BACK</a>
                                </li>
                                <li>
                               <a  class="btn btn-primary m-t-15 waves-effect" href="{{route('applyforLoan',$post->id)}}">APPLY</a>
                                </li>
                            </ul>
                        </div><!-- blog-post-inner -->

                    </div><!-- main-post -->
                </div><!-- col-lg-8 col-md-12 -->

                <div class="col-lg-4 col-md-12 no-left-padding">

                    <div class="single-post info-area">

                        <div class="sidebar-area about-area">
                            <h4 class="title"><b>About Banks</b></h4>
                            <p><strong>Phone :</strong>{{$post->organization->phone}}</p>
                            <p><strong>Email :</strong>{{$post->organization->email}}</p>
                            <p><strong>Type :</strong>{{$post->organization->status}}</p>
                            <p><strong>Website :</strong><a href="https://www.primebank.com.bd/">https://www.primebank.com.bd/</a></p>
                        </div>

{{--                        <div class="tag-area">--}}

{{--                            <h4 class="title"><b>CATEGORIES</b></h4>--}}
{{--                            <ul>--}}
{{--                                @foreach($post->categories as $category)--}}
{{--                                <li><a href="{{route('category.posts',$category->slug)}}">{{$category->name}}</a></li>--}}
{{--                                 @endforeach--}}
{{--                            </ul>--}}

{{--                        </div><!-- subscribe-area -->--}}

                    </div><!-- info-area -->

                </div><!-- col-lg-4 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- post-area -->
    @endsection

@push('js')
    @endpush
