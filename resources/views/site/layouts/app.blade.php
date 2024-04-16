<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="{{ csrf_token() }}" />
    <title>College Compass</title>
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <link href="{{ asset('assets/site/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/site/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/site/css/collegecompass.css')}}">
    @yield('css')
</head>

<body>
    <!-- Header -->

    @include('site.includes.header')
    @yield('content')
    @include('site.includes.footer')


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        var jq = jQuery.noConflict();

        jq.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jq('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('js')
    <script>
        jq(document).ready(function() {
            jq('#menu').click(function() {
                jq(this).toggleClass('fa-times');
                jq('.navbar').toggleClass('nav-toggle');
            });
            jq(window).on('scroll load', function() {
                jq('#menu').removeClass('fa-times');
                jq('.navbar').removeClass('nav-toggle');
            });
        });

        function addToWish(e) {
            var college_id = jq(e).data('college_id');
            jq.ajax({
                url: "{{ route('user.wishlist-store') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    college_id: college_id
                },
                success: function(response) {
                    if (typeof(response) != 'object') {
                        response = $.parseJSON(response);
                    }
                    if (response.status) {
                        alert(response.msg);
                        location.reload();
                           
                    } else {
                        alert(response.msg);
                    }
                }
            });
        }
    </script>
</body>

</html>