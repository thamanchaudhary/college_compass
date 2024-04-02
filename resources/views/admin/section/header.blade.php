<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <i class="fa fa-bars"></i>
    </div>
    <!--logo start-->
    @if(Route::has('admin.index'))
    <a href="{{ URL::route('admin.index') }}" style="font-weight: bold;font-size:25px;color:#008b8b;" class="logo">@if(isset($all_view['setting']->site_name)) {{ $all_view['setting']->site_name }} @endif </span></a>
    @endif
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">

        </ul>
        <!--  notification end -->
    </div>
    <div class="top-nav ">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
           

          
            <!-- notification dropdown end -->
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="username">{{ auth()->user()->name}}</span>

                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout dropdown-menu-right">
                    <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>Login Out
                        </a></li>
                    <form action="{{ route('logout')}}" method="post" id="logout-form" class="d-none">
                        @csrf
                    </form>
                </ul>
            </li>

            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
</header>