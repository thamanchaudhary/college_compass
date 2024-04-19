@extends('site.layouts.app')
@section('title')
@endsection
@section('content')
<!-- Home Section -->
<section class="home" id="home" style="background:url({{ asset('assets/site/images/grad.jpg')}}) no-repeat; background-size: cover; background-position: center;">
    <!-- Content -->
    <div class="content">
        <h1>Find & <span>Apply</span> for your <span>Perfect</span> College</h1>

        <!-- search filter -->


        <h4>A <span>Family</span> Of Learning</h4>
        <p>We are a community of learners. <br>Our mission is to engage all students in partnership with family and community to become informed, compassionate & global citizens.</p>
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
            <a href="{{ route('site.career')}}"><button class="btn">Learn More</button></a>
        </div>

        <div class="image">
            <img src="images/khoja0.png" alt="">
        </div>
    </div>
</section>
@endsection