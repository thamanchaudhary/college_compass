@extends('site.layouts.app')
@section('title')
@endsection
@section('css')
<style>
    .active {
        background-color: #008B8B !important;
    }
</style>
@endsection
@section('content')
<section class="main__middle__container">

    <div class="row icons__blocks three__blocks text-center" style="padding: 10px 0 0px;">
        <div class="page-content">
            <div class="row" style="padding:0px">
                <div class="col-md-2" style="width: 25%">
                    <div class="sidebar content-box" style="display: block;background-color:aliceblue">
                        <ul class="nav" style="text-align: -webkit-left;">
                            <!-- Main menu -->
                            <li class="current"><a href="{{ route('user.detail-information')}}"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                            <li><a href="{{route('user.ShowInformation')}}" class="{{ ($_panel == 'Show Information') ? 'active' : '' }}"><i class="glyphicon glyphicon-pencil"></i> Profile</a></li>
                            <li><a href="{{route('user.ShowWishlist')}}"><i class="glyphicon glyphicon-list"></i>My Wish List</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-stats"></i>My Careers</a></li>
                            <li><a href="recommended_list.php"><i class="glyphicon glyphicon-tasks"></i>Recommended Colleges</a></li>
                            <li class="nav-item"><a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">Log Out</a> </li>
                            <form action="{{ route('logout')}}" method="post" id="logout-form" class="d-none">
                                @csrf
                            </form>

                        </ul>
                    </div>
                </div>
                <div class="col-md-10" style="width:70%">
                    <div class="row" style="padding:0px;">
                        <div class="col-md-12">
                            <div class="row" style="display: block;background-color:aliceblue;padding:0px;">
                                <div class="col-md-12">
                                    <div class="content-box-header">
                                        <div class="panel-title">{{ $_panel }}</div>
                                    </div>
                                    <div class="content-box-large box-with-header">

                                        <div class="row" style="padding:0px;">
                                            <div class="col-md-12">
                                                <p>Full Name : {{ $data['user']->name }}</p>
                                                <p>Email : {{ $data['user']->email  }}</p>
                                                <p>User Name : {{ $data['user']->username }}</p>
                                                <p>Created At : {{ $data['user']->created_at }}</p>
                                                <p>Carrers Option</p>:

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div> <br>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Start work gallery
        $('#Grid').mixitup();
    });
    $('.gallery').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
</script>
@endsection