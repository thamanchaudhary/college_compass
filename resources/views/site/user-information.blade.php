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
                            <li class="current"><a href="{{ route('user.detail-information')}}" class="{{ ($_panel == 'Dashboard') ? 'active' : '' }}"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                            <li><a href="{{route('user.ShowInformation')}}"><i class="glyphicon glyphicon-pencil"></i> Profile</a></li>
                            <li><a href="{{route('user.ShowWishlist')}}"><i class="glyphicon glyphicon-list"></i>My Wish List</a></li>
                            <li><a href="{{ route('user.RecommendedCollege')}}" class="{{ ($_panel == 'Recomamded College') ? 'active' : '' }}"><i class="glyphicon glyphicon-tasks"></i>Recommended Colleges</a></li>
                            <li class="nav-item"><a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">Log Out</a> </li>
                            <form action="{{ route('logout')}}" method="post" id="logout-form" class="d-none">
                                @csrf
                            </form>

                        </ul>
                    </div>
                </div>
                <div class="col-md-10" style="width:70%">
                    <div class="row" style="padding:0px;">
                        <div class="col-md-5">
                            <div class="row" style="display: block;background-color:aliceblue;padding:0px;">
                                <div class="col-md-12">
                                    <a href="{{route('user.ShowInformation')}}">
                                        <div class="content-box-header">
                                            <div class="panel-title">User Detail</div>
                                        </div>
                                        <div class="content-box-large box-with-header">
                                            <p><img src="{{ asset('assets/site/images/fr-05.jpg')}}" class="img-circle" width="80"></p>
                                            <p><b></b></p>
                                            <div class="row" style="padding:0px;">
                                                <div class="col-md-12">
                                                    <p class="small mt" style="font-size: 15px;">Name : {{ $data['user']->name }} <br>
                                                        Intrested City :@if(isset($data['user']->inrestedCity)) {{ $data['user']->inrestedCity->name}} @endif <br>
                                                        Email : {{ $data['user']->email }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div> <br>

                        </div>
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-5">
                            <div class="row" style="display: block;background-color:aliceblue;padding:0px;">
                                <div class="col-md-12">
                                    <a href="{{route('user.ShowWishlist')}}">
                                        <div class="content-box-header">
                                            <div class="panel-title">My wish List</div>
                                        </div>
                                        <div class="content-box-large box-with-header">
                                            <p><img src="{{ asset('assets/site/images/icons/wishlist.png')}}" class="img-circle" width="80"></p>
                                            <p><b></b></p>
                                            <div class="row" style="padding:0px;">
                                                <div class="col-md-12">
                                                    <p class="small mt">Total wish List College </p>
                                                    <p>
                                                        @if(isset($data['wish_count']))
                                                        {{ $data['wish_count'] }}
                                                        @endif
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div> <br>

                        </div>
                    </div>
                    <div class="row" style="padding:0px;">
                        <div class="col-md-5">
                            <div class="row" style="display: block;background-color:aliceblue;padding:0px;">
                                <div class="col-md-12">
                                    <div class="content-box-header">
                                        <div class="panel-title">Program Instrested</div>
                                    </div>
                                    <div class="content-box-large box-with-header">
                                        <p><img src="{{ asset('assets/site/images/icons/wish.png')}}" class="img-circle" width="80"></p>
                                        <p><b></b></p>
                                        <div class="row" style="padding:0px;">
                                            <div class="col-md-12">
                                                <p>
                                                    <?php $featuredArray = json_decode($data['user']->program_id); ?>
                                                    @if(isset($featuredArray))
                                                    @foreach($featuredArray as $row)
                                                    @if(isset($all_view['program']))
                                                    @foreach($all_view['program'] as $program)
                                                    @if($program->id == $row)
                                                    {{ $program->name }}
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div> <br>

                        </div>
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-5">
                            <div class="row" style="display: block;background-color:aliceblue;padding:0px;">
                                <div class="col-md-12">
                                    <a href="{{ route('user.RecommendedCollege')}}">
                                        <div class="content-box-header">
                                            <div class="panel-title">Recommended College</div>
                                        </div>
                                        <div class="content-box-large box-with-header">
                                            <p><img src="{{ asset('assets/site/images/icons/recom.png')}}" class="img-circle" width="80"></p>
                                            <p><b></b></p>
                                            <div class="row" style="padding:0px;">
                                                <div class="col-md-6">
                                                    <p class="small mt">Total College</p>
                                                    <p>
                                                        @if(isset($data['recommended_college']))
                                                        {{ $data['recommended_college'] }}
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </a>
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