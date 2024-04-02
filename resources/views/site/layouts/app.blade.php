<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>College Compass</title>
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <link href="{{ asset('assets/site/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/site/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/site/css/collegecompass.css')}}">
</head>
<body>
    <!-- Header -->
    <section>
    <!-- header section starts -->
    <header>
        <div class="header-1">
            <a href="index.php" class="logo"><i class="fas fa-school"></i> COLLEGE COMPASS</a>
            <h3 class="call"><i class="fas fa-phone"></i>Counselor call now: +977-9840424550</h3>
        </div>
        <div class="header-2">
            <div id="menu" class="fas fa-university"></div>
            <nav class="navbar">
                <ul>
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a href="allcolleges.php">All Colleges</a></li>
                    <li><a href="engineering.php">Engineering</a></li>
                    <li><a href="csit.php">CSIT</a></li>
                    <li><a href="career.php">Explore Career's</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="admin/admin.php">Admin Login</a></li>
                </ul>
            </nav>
            <div class="share">
                <?php
                if(isset($f_name)) {
                    echo "<li class='dropdown'>";
                    echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>Hi,$f_name </a>";
                    echo "<ul class='dropdown-menu'>";
                    echo "<li><a href='profile_demo.php'>My Dashboard</a></li>";
                    echo "<li><a href='profile_details.php'>Profile</a></li>";
                    echo "<li><a href='my_wishlist.php'>My Wishlist</a></li>";
                    echo "<li><a href='logout.php'>Logout</a></li>";
                    echo "</ul>";
                    echo "</li>";
                } else {
                    echo "<a href='login.php'><b>Log In</b></a>";
                    echo "<a href='register.php'><b>Register</b></a>";
                }
                ?>
            </div>
        </div>
    </header>
    <!-- header section ends -->
</section>

    <!-- Home Section -->
    <section class="home" id="home" style="background:url(images/grad.jpg) no-repeat; background-size: cover; background-position: center;">
        <!-- Content -->
        <div class="content">
        <h1>Find & <span>Apply</span> for your <span>Perfect</span> College</h1>

<!-- search filter -->


        <h4>A <span>Family</span> Of Learning</h4>
        <p>We are a community of learners. <br>Our mission is to engage all students in partnership with family and community to become informed, compassionate & global citizens.</p>
        <a href="allcolleges.php"><button class="btn">Explore Yourself</button></a>
        </div>  

    <div class="shape"> </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <!-- Content -->
        <h1 class="heading"> <span> About Us </span> </h1>

    <div class="row">
        
        <div class="content">
            
            <h3>A Message from Administration.</h3>
            <br>
            <p>Dear Parents, Guardians & Students. Welcome to the 2024 school year.</p>
            <p>College Compass is a community of learners including students, parents and staff who are dedicated to creating an academically rigorous, culturally caring and inclusive learning environment. We are Reaching Excellence in Academics and Changing History! Together, we are champions of knowledge, our communities, the environment and of our futures. APPROACH Achievers are goal-oriented, critical thinkers and community leaders who are dedicated to achieving the highest level of integrity and academic success.</p>
            <a href="career.php"><button class="btn">Learn More</button></a>
        </div>

        <div class="image">
            <img src="images/khoja0.png" alt="">
        </div>
    </div>
    </section>


    <!-- Footer -->
    <section class="footer">
	<img src="images/yu.jpg">
	
	<div class="box-container">
		
		<div class="box">
			<h3 class="heading"> <span>Why Choose Us?</span> </h3>
			<ul>
				<li>Get complete overview & depth knowledge about colleges</li>
				<li>Get guidance from faculty & industry professionals</li>
				<li>Career counseling at zero cost</li>
				<li>Admission processes with minimum formalities</li>
				<li>Personalized admission assistance</li>
			</ul>
		</div>

		<div class="box">
			<h3 class="heading"> <span>Quick Lists</span> </h3>
			<a href="#">Home</a>
			<a href="#">About</a>
			<a href="#">Contact</a>
		</div>

		<div class="box">
			<h3 class="heading"> <span>Contact Us</span> </h3>
			<p><i class="fas fa-map-marker-alt"></i>Kathmandu, Nepal 30021</p>
			<p><i class="fas fa-envelope"></i>collegecompass@gmail.com</p>
			<p><i class="fas fa-globe"></i>http://www.collegecompass.com</p>
		</div>
	</div>

	<h1 class="credit">Created by<span> Aashish, Utsab & Ujjwal</span> All Rights Reserved !</h1>	

</section>


    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/collegekhojaamna.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $('.carousel').carousel({
            interval: 3500,
            pause: 'none'
        });
    </script>
</body>
</html>
