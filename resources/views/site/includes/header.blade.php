<section>
    <!-- header section starts -->
    <header>
        <div class="header-1">
            <a href="{{route('site.index')}}" class="logo"><i class="fas fa-school"></i> COLLEGE COMPASS</a>
            <h3 class="call"><i class="fas fa-phone"></i>Counselor call now: +977-9840424550</h3>
        </div>
        <div class="header-2">
            <div id="menu" class="fas fa-university"></div>
            <nav class="navbar">
                <ul>
                    <li><a class="active" href="{{route('site.index')}}">Home</a></li>
                    <li><a href="{{route('site.allcollege')}}">All Colleges</a></li>
                    <!-- Program get  -->
                    @if(isset($all_view['program']) && !empty($all_view['program']))
                    @foreach($all_view['program']->slice(0,3) as $row)
                    <li><a href="{{ route('site.program.category', ['id' => $row->id]) }}">{{ $row->name }}</a></li>
                    @endforeach
                    @endif
                    <li><a href="{{route('site.career')}}">Explore Career's</a></li>
                    <li><a href="{{route('site.contact')}}">Contact Us</a></li>

                    @auth
                    @if(auth()->user()->role == 'admin')
                    <li><a href="{{route('admin.index')}}">Admin Dashboard</a></li>
                    @endif
                    @else
                    <li><a href="{{route('login')}}">Admin Login</a></li>
                    @endauth
                </ul>
            </nav>
            <div class="share">
                @auth
                @if(auth()->user()->role == 'user')
                <a href="{{route('user.detail-information')}}"><b>Hello ! {{ auth()->user()->name}}</b></a>
                @endif
                @else
                <a href="{{route('login')}}"><b>User Log In</b></a>
                <a href='{{ route('register')}}'><b>Register</b></a>
                @endauth
            </div>
        </div>
    </header>
    <!-- header section ends -->
</section>