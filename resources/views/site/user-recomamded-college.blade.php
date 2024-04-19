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
                            <li><a href="{{route('user.ShowInformation')}}"><i class="glyphicon glyphicon-pencil"></i> Profile</a></li>
                            <li><a href="{{route('user.ShowWishlist')}}" class="{{ ($_panel == 'Show Wishlist') ? 'active' : '' }}"><i class="glyphicon glyphicon-pencil"></i> My Wish List</a></li>
                            <li><a href="{{ route('user.RecommendedCollege')}}"  class="{{ ($_panel == 'Recomamded College') ? 'active' : '' }}"><i class="glyphicon glyphicon-tasks"></i>Recommended Colleges</a></li>
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

                                        <!-- User WIshlist College -->
                                        @if(isset($data['rows']) && $data['rows']->count() > 0)
                                        @foreach($data['rows'] as $row)
                                        <div class="col-md-12" style="background-color: rgba(175, 177, 179, 0.1);box-shadow: rgba(0, 0, 0, 0.29) 2px 0px 20px;margin-right:40px;margin-left: 25px;padding-left: 0px;margin-top: 27px;padding-right: 0px; id=" college-list'="">
                                            <div class="col-md-4" style="margin-top: 0px;margin-left: -10;margin-left: -15px;">
                                                @if($row->image_1 != null)
                                                <img src="{{ asset( $row->image_1 )}}" alt="pic" class="img-rounded" style="width:100%;height: 195px;border: rgba(255, 255, 255, 0.14) 7.9px solid;">
                                                @else
                                                <p>Images Not Found's !</p>
                                                @endif
                                            </div>
                                            <div class="col-md-8" style="padding-left: 0px;">
                                                <h3 style="font-size: 20px;">{{ $row->name }}</h3>
                                                <p style="margin-top: 10px;"><b style="color: #397adc;font-size: 18px;">Program</b> : {{$row->program_name }}</p>
                                                <p style="margin-top: 10px;"><b style="color: #397adc;font-size: 18px;">University</b> : {{ $row->university_name}}</p>
                                                <p style="margin-top: 5px;"><b style="color: #397adc;font-size: 18px;">Exams Required</b> {{ $row->examp_required}}</p>
                                                <p style="margin-top: 5px;"><b style="color: #397adc;font-size: 18px;">City</b> :{{$row->city_name }}</p>
                                            </div>

                                            <div class="col-md-12" style="background-color: #222222;height: 56px;margin-top: 0.5px;border-radius: 3px;">

                                                <form style="margin-top: -19px;">
                                                    <input type="hidden" name="college_id" value="{{ $row->id }}">
                                                    </button> <a class="btn btn-default btn-md" style="margin-left: 5px;margin-right: 10px;" id="1" href="{{ route('site.post.show', ['id' => $row->id]) }}">View College</a>
                                                </form>
                                                <!-- Remove Wish list -->
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <p>Data Not Found' s !</p>
                                        @endif
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
