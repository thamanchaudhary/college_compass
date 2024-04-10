<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <i class="fa fa-bars"></i>
    </div>
    <!--logo start-->

    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <h5> Hello !!  {{ auth()->user()->name}}</h5>
        <ul class="nav top-menu">
     
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-nav ">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
          



            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="{{ asset('assets/cms/img/profile-avatar.jpg')}}" class="img img-responsive img-rounded" width="29" height="29">
                    <span class="username">{{ auth()->user()->name}}</span>

                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout dropdown-menu-right">
                    <div class="log-arrow-up"></div>
                    <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>Log Out
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