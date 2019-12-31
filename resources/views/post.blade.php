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
                               <a  class="btn btn-danger m-t-15 waves-effect" href="{{route('home')}}">BACK</a>
                               <a  class="btn btn-primary m-t-15 waves-effect" href="{{route('applyforLoan',$post->id)}}">APPLY</a>
                            </ul>
                        </div><!-- blog-post-inner -->

{{--                        <div class="post-icons-area">--}}
{{--                            <ul class="post-icons">--}}
{{--                                <li>--}}
{{--                                    @guest--}}
{{--                                        <a href="javascript:void(0);" onclick="toastr.info('To add favorite list.You need login first.','Info',{--}}
{{--                                                closeButton:true,--}}
{{--                                                progressBar:true,--}}
{{--                                            })"><i class="ion-heart"></i>{{$post->favorite_to_users->count()}}</a>--}}

{{--                                    @else--}}
{{--                                        <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{$post->id}}').submit();"--}}
{{--                                           class="{{!Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()== 0 ? 'favorite_posts' : ''}}">--}}
{{--                                            <i class="ion-heart"></i>{{$post->favorite_to_users->count()}}--}}
{{--                                        </a>--}}
{{--                                        <form id="favorite-form-{{$post->id}}" method="POST" action="{{route('post.favorite',$post->id)}}" style="display: none;">--}}
{{--                                            @csrf--}}
{{--                                        </form>--}}

{{--                                    @endguest--}}
{{--                                </li>--}}
{{--                                <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>--}}
{{--                                <li><a href="#"><i class="ion-eye"></i>{{$post->view_count}}</a></li>--}}
{{--                            </ul>--}}

{{--                            <ul class="icons">--}}
{{--                                <li>SHARE : </li>--}}
{{--                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>--}}
{{--                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>--}}
{{--                                <li><a href="#"><i class="ion-social-pinterest"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}

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

                        <div class="tag-area">

                            <h4 class="title"><b>CATEGORIES</b></h4>
                            <ul>
                                @foreach($post->categories as $category)
                                <li><a href="{{route('category.posts',$category->slug)}}">{{$category->name}}</a></li>
                                 @endforeach
                            </ul>

                        </div><!-- subscribe-area -->

                    </div><!-- info-area -->

                </div><!-- col-lg-4 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- post-area -->


    <section class="recomended-area section">
        <div class="container">
            <div class="row">
{{--                @foreach($randomPost as $randompost)--}}
{{--                    <div class="col-lg-4 col-md-6">--}}
{{--                        <div class="card h-100">--}}
{{--                            <div class="single-post post-style-1">--}}

{{--                                <div class="blog-image"><img src="{{Storage::url('post/'.$randompost->image)}}" alt="{{$randompost->title}}"></div>--}}

{{--                                <a class="avatar" href="#"><img src="{{Storage::url('profile/'.$randompost->user->image)}}" alt="Profile Image"></a>--}}

{{--                                <div class="blog-info">--}}

{{--                                    <h4 class="title"><a href="{{route('post.details',$randompost->id)}}"><b>{{$randompost->title}}</b></a></h4>--}}

{{--                                    <ul class="post-footer">--}}
{{--                                        <li>--}}
{{--                                            @guest--}}
{{--                                                <a href="javascript:void(0);" onclick="toastr.info('To add favorite list.You need login first.','Info',{--}}
{{--                                                closeButton:true,--}}
{{--                                                progressBar:true,--}}
{{--                                            })"><i class="ion-heart"></i>{{$randompost->favorite_to_users->count()}}</a>--}}

{{--                                            @else--}}
{{--                                                <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{$randompost->id}}').submit();"--}}
{{--                                                   class="{{!Auth::user()->favorite_posts->where('pivot.post_id',$randompost->id)->count()== 0 ? 'favorite_posts' : ''}}"><i class="ion-heart"></i>{{$randompost->favorite_to_users->count()}}--}}
{{--                                                </a>--}}
{{--                                                <form id="favorite-form-{{$randompost->id}}" method="POST" action="{{route('post.favorite',$randompost->id)}}" style="display: none;">--}}
{{--                                                    @csrf--}}
{{--                                                </form>--}}

{{--                                            @endguest--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>--}}
{{--                                        <li><a href="#"><i class="ion-eye"></i>{{$randompost->view_count}}</a></li>--}}
{{--                                    </ul>--}}

{{--                                </div><!-- blog-info -->--}}
{{--                            </div><!-- single-post -->--}}
{{--                        </div><!-- card -->--}}
{{--                    </div><!-- col-lg-4 col-md-6 -->--}}
{{--                @endforeach--}}
            </div><!-- row -->

        </div><!-- container -->
    </section>

    <section class="comment-section">
        <div class="container">
{{--            <h4><b>POST COMMENT</b></h4>--}}
            <div class="row">

                <div class="col-lg-8 col-md-12">
{{--                    <div class="comment-form">--}}
{{--                        @guest--}}
{{--                        <p>For comment to the post, you need to login first.<a href="{{route('login')}}"></a></p>--}}
{{--                         @else--}}
{{--                        <form method="post" action="{{route('comment.store',$post->id)}}">--}}
{{--                            @csrf--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-12">--}}
{{--									<textarea name="comment" rows="2" class="text-area-messge form-control"--}}
{{--                                              placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >--}}
{{--                                </div><!-- col-sm-12 -->--}}
{{--                                <div class="col-sm-12">--}}
{{--                                    <button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>--}}
{{--                                </div><!-- col-sm-12 -->--}}

{{--                            </div><!-- row -->--}}
{{--                        </form>--}}
{{--                 @endguest--}}
{{--                    </div><!-- comment-form -->--}}

{{--                    <h4><b>COMMENTS({{$post->comments()->count()}})</b></h4>--}}
{{--                        @if($post->comments->count()>0)--}}
{{--                        @foreach($post->comments as $comment)--}}
{{--                            <div class="commnets-area">--}}

{{--                                <div class="comment">--}}

{{--                                    <div class="post-info">--}}

{{--                                        <div class="left-area">--}}
{{--                                            <a class="avatar" href="#"><img src="{{Storage::url('profile/'.$comment->user->image)}}" alt="Profile Image"></a>--}}
{{--                                        </div>--}}

{{--                                        <div class="middle-area">--}}
{{--                                            <a class="name" href="#"><b>{{$comment->user->name}}</b></a>--}}
{{--                                            <h6 class="date">on {{$comment->created_at->diffForHumans()}}</h6>--}}
{{--                                        </div>--}}
{{--                                    </div><!-- post-info -->--}}
{{--                                    <p>{{$comment->comment}}</p>--}}
{{--                                </div>--}}
{{--                            </div><!-- commnets-area -->--}}
{{--                        @endforeach--}}
{{--                        @else--}}

{{--                        <div class="commnets-area">--}}

{{--                            <div class="comment">--}}
{{--                                <p>No Comment Yet.Be the first</p>--}}
{{--                            </div>--}}
{{--                        </div><!-- commnets-area -->--}}
{{--                      @endif--}}
                </div><!-- col-lg-8 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section>
    @endsection

@push('js')
    @endpush
