<div class="header">
{{--    <a href="#default" class="logo">CompanyLogo</a>--}}
{{--    <form class="navbar-form navbar-left" action="/action_page.php">--}}
{{--        <div class="input-group">--}}
{{--            <input type="text" class="form-control" placeholder="Search" name="search">--}}
{{--            <div class="input-group-btn">--}}
{{--                <button class="btn btn-success" type="submit">--}}
{{--                    <i class="glyphicon glyphicon-search"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}

    <div class="header-right">
{{--        <a href="#home">Home</a>--}}
{{--        <a href="#contact">Contact</a>--}}
{{--        <a href="#about">About</a>--}}
{{--    </div>--}}

    <ul class="main-menu visible-on-click" id="main-menu">

{{--        <li><a href="#"><i class="fa fa-bell"></i></a></li>--}}{{--aria-haspopup="true"--}}
{{--        <li class="dropdown">--}}
{{--            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"  aria-expanded="false">--}}
{{--            <i class="fa fa-bell"></i>--}}{{--Notifications--}}
{{--                <span class="badge">4</span>--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu">--}}
{{--                <li>--}}
{{--                    <a href="#">Notify</a>--}}
{{--                    <a href="#">Notify</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
        <li><a href="{{route('home')}}">Home</a></li>
{{--                <li><a href="#">About</a></li>--}}
{{--               @guest--}}
{{--                   <li><a href="{{route('login')}}">Login</a></li>--}}
{{--                @else--}}
                   @if(\Illuminate\Support\Facades\Auth::guard('admin')->user())
                        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                       <li>
                       <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{--                                   <i class="material-icons">input</i>--}}
                        <span>Logout</span>
                       </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                     </li>
{{--                    @endif--}}
                    @elseif(\Illuminate\Support\Facades\Auth::guard('organization')->user())
                        <li><a href="{{route('author.dashboard')}}">Dashboard</a></li>
                           <li>
                               <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                   {{--                                   <i class="material-icons">input</i>--}}
                                   <span>Logout</span>
                               </a>

                               <form id="logout-form" action="{{ route('author.logout') }}" method="POST" style="display: none;">
                                   @csrf
                               </form>
                           </li>
{{--                       @endif--}}
                   @elseif(\Illuminate\Support\Facades\Auth::user())
                          <li>
                              <a href="{{route('notify')}}">
                                      Notifications
                                     @if(auth()->user()->unreadNotifications->count())
                                      <span class="badg badge-danger rounded-circle">{{auth()->user()->unreadNotifications->count()}}</span>
                                       @endif
                                  </a>
                              </li>
                       @if(!\Illuminate\Support\Facades\Request::is('profile'))
                           <li>
{{--                           <a href="{{route('user.profile')}}">{{\Illuminate\Support\Str::limit(\Illuminate\Support\Facades\Auth::user()->name,'6')}}</a>--}}
                           <a href="{{route('user.profile')}}">{{ __('Profile') }}</a>
                           </li>
                           <li>
                               <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
{{--                                   <i class="material-icons">input</i>--}}
                                   <span>Logout</span>
                               </a>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                   @csrf
                               </form>
                           </li>
                           @endif

{{--                       @endif--}}
{{--                @endguest--}}
                @else
                 <li><a href="#">About</a></li>
                 <li><a href="{{route('login')}}">Login</a></li>
                @endif
        </ul>
    </div>
</div>




