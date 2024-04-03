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
                        <li><a href="engineering.php">Engineering</a></li>
                        <li><a href="csit.php">CSIT</a></li>
                        <li><a href="career.php">Explore Career's</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="{{route('login')}}">Admin Login</a></li>
                    </ul>
                </nav>
                <div class="share">
                    <a href='login.php'><b>User Log In</b></a>
                    <a href='{{ route('register')}}'><b>Register</b></a>
                    >
                </div>
            </div>
        </header>
        <!-- header section ends -->
    </section>