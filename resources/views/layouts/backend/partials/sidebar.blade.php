<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            @if(\Illuminate\Support\Facades\Request::is('author*'))
            <img src="{{Storage::url('profile/'.Auth::guard('organization')->user()->image)}}" width="54" height="54" alt="User" />
            @endif
            @if(\Illuminate\Support\Facades\Request::is('admin*'))
                    <img src="{{Storage::url('profile/agroni-bank-limited-2019-11-01-5dbc429c26041.jpg')}}" width="54" height="54" alt="User" />
            @endif
        </div>
        <div class="info-container">
            @if(\Illuminate\Support\Facades\Request::is('author*'))
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::guard('organization')->user()->name}}</div>
                    <div class="email">{{Auth::guard('organization')->user()->email}}</div>
            @endif
            @if(\Illuminate\Support\Facades\Request::is('admin*'))
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::guard('admin')->user()->username}}</div>
                    <div class="email">{{Auth::guard('admin')->user()->email}}</div>
            @endif
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons bg-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="{{Auth::guard('organization')->user()? route('author.settings') : route('admin.settings')}}">
                            <i class="material-icons">settings</i>
                            Settings
                        </a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{Auth::guard('organization')->user()? route('author.logout') : route('admin.logout')}}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out
                        </a>

                        <form id="logout-form" action="{{Auth::guard('organization')->user()? route('author.logout') : route('admin.logout')}}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header"></li>
            @if(\Illuminate\Support\Facades\Request::is('admin*'))
                <li class="{{\Illuminate\Support\Facades\Request::is('admin/dashboard') ? 'active' :''}}">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{\Illuminate\Support\Facades\Request::is('admin/tag*') ? 'active' :''}}">
                    <a href="{{route('admin.tag.index')}}">
                        <i class="material-icons">label</i>
                        <span>Tag</span>
                    </a>
                </li>
                <li class="{{\Illuminate\Support\Facades\Request::is('admin/category*') ? 'active' :''}}">
                    <a href="{{route('admin.category.index')}}">
                        <i class="material-icons">apps</i>
                        <span>Category</span>
                    </a>
                </li>
                <li class="{{\Illuminate\Support\Facades\Request::is('admin/post*') ? 'active' :''}}">
                    <a href="{{route('admin.post.index')}}">
{{--                    <a href="#">--}}
                        <i class="material-icons">library_books</i>
                        <span>Offers</span>
                    </a>
                </li>
                <li class="{{\Illuminate\Support\Facades\Request::is('admin/pending/post') ? 'active' :''}}">
                    <a href="{{route('admin.post.pending')}}">
{{--                    <a href="#">--}}
                        <i class="material-icons">library_books</i>
                        <span>Pending Offers</span>
                    </a>
                </li>
{{--                <li class="{{\Illuminate\Support\Facades\Request::is('admin/favorite') ? 'active' :''}}">--}}
{{--                    <a href="{{route('admin.favorite.index')}}">--}}
{{--                        <i class="material-icons">favorite</i>--}}
{{--                        <span>Favorite Posts</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="{{\Illuminate\Support\Facades\Request::is('admin/authors') ? 'active' :''}}">
                    <a href="{{route('admin.author.index')}}">
{{--                    <a href="#">--}}
                        <i class="material-icons">account_circle</i>
                        <span>Authors</span>
                    </a>
                </li>

                <li class="{{\Illuminate\Support\Facades\Request::is('admin/subscriber') ? 'active' :''}}">
{{--                    <a href="{{route('admin.subscriber.index')}}">--}}
                    <a href="#">
                    <i class="material-icons">subscriptions</i>
                        <span>Subscribers</span>
                    </a>
                </li>
            <li class="header">System</li>
                <li class="{{\Illuminate\Support\Facades\Request::is('admin/settings') ? 'active' :''}}">
                    <a href="{{route('admin.settings')}}">
{{--                    <a href="#">--}}
                    <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endif
            @if(\Illuminate\Support\Facades\Request::is('author*'))
                <li class="{{\Illuminate\Support\Facades\Request::is('author/dashboard') ? 'active' :''}}">
                    <a href="{{route('author.dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{\Illuminate\Support\Facades\Request::is('author/post*') ? 'active' :''}}">
                    <a href="{{route('author.post.index')}}">
                        <i class="material-icons">library_books</i>
                        <span>Offers</span>
                    </a>
                </li>
                <li class="{{\Illuminate\Support\Facades\Request::is('author/loanApplications') ? 'active' :''}}">
                    <a href="{{route('author.application.index')}}">
                        <i class="material-icons">person</i>
                        <span>Loan Application</span>
                    </a>
                </li>
{{--                <li class="{{\Illuminate\Support\Facades\Request::is('author/favorite') ? 'active' :''}}">--}}
{{--                    <a href="{{route('author.favorite.index')}}">--}}
{{--                    <a href="#">--}}
{{--                        <i class="material-icons">favorite</i>--}}
{{--                        <span>Favorite Offers</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="header">System</li>
                <li class="{{\Illuminate\Support\Facades\Request::is('author/settings') ? 'active' :''}}">
                    <a href="{{route('author.settings')}}">
{{--                    <a href="#">--}}
                    <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('author.logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('author.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif

        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2019 - 2020 <a href="javascript:void(0);">Loan Management system</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
