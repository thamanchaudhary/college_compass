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
    
@include('site.includes.header')
    @yield('content')
@include('site.includes.footer')


    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/site/js/collegecompass.js')}}"></script>
    <script src="{{ asset('assets/site/js/bootstrap.min.js')}}"></script>
    <script>
        $('.carousel').carousel({
            interval: 3500,
            pause: 'none'
        });
    </script>
</body>

</html>