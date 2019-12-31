<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('css')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('Home') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if(\Illuminate\Support\Facades\Request::is('register')||\Illuminate\Support\Facades\Request::is('author/register'))
                            <li class="nav-item">
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif
                            @if (\Illuminate\Support\Facades\Request::is('login'))
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
                                <li class="nav-item dropdown">
                                    <a data-toggle="dropdown" href="#">{{ __('Register') }}</a>
                                    <div class="dropdown-menu btn-outline-info">
                                        <a href="{{route('author.register')}}" class="dropdown-item">Organization</a>
                                        <a href="{{route('register')}}" class="dropdown-item">Farmer</a>
                                    </div>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu btn-outline-info" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
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
{{--</body>--}}
</html>
