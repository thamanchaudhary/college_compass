@extends('site.layouts.app')
@section('title')
@endsection
@section('content')
<section class="main__middle__container">
    <div style="width:100%;height:100%">
        <div class="container">
            <div class="col-md-12">
                <div class="page-header">
                </div>
                <!-- Gallery Colleges -->
                <div class="page-header">
                    <h3 style="color:#368dc5">Photos Of Institute</h3>
                </div>

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @if(isset($data['single']->image_1) && !empty($data['single']->image_1))
                        <div class="item active">
                            <img src="{{ asset($data['single']->image_1)}}" alt="Los Angeles" style="width:100%;">
                        </div>
                        @endif
                        @if(isset($data['single']->image_2) && !empty($data['single']->image_2))
                        <div class="item">
                            <img src="{{ asset($data['single']->image_2)}}" alt="Chicago" style="width:100%;">
                        </div>
                        @endif
                        @if(isset($data['single']->image_3) && !empty($data['single']->image_3))
                        <div class="item">
                            <img src="{{ asset($data['single']->image_3)}}" alt="New york" style="width:100%;">
                        </div>
                        @endif
                        @if(isset($data['single']->image_4) && !empty($data['single']->image_4))
                        <div class="item">
                            <img src="{{ asset($data['single']->image_4)}}" alt="New york" style="width:100%;">
                        </div>
                        @endif


                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!-- star rating -->
                <h3 style="color:#368dc5">About College</h3>

                <p style="color: #3e3e3e;font-weight: 400;font-size: large;">{{ $data['single']->description }}</p>





               
                <p style="color: #3e3e3e;font-weight: 400;font-size: large;"></p>

                <div class="page-header">
                    <h3 style="color:#368dc5">College Affiliations</h3>
                </div>
                <p style="color: #3e3e3e;font-weight: 400;font-size: large;">@if(isset($data['single']->University)) {{ $data['single']->University->name  }} @endif</p>


                <div class="page-header">
                    <h3 style="color:#368dc5">Exams Required</h3>
                </div>
                <p style="color: #3e3e3e;font-weight: 400;font-size: large;"></p>


                <div class="page-header">
                    <h3 style="color:#368dc5">Admission Procedure</h3>
                </div>
                <p style="color: #3e3e3e;font-weight: 400;font-size: large;"></p>

                <div class="page-header">
                    <h3 style="color:#368dc5">Courses Offered</h3>
                </div>
                <p style="color: #3e3e3e;font-weight: 400;font-size: large;"></p>



                <div class="page-header">
                    <h3 style="color:#368dc5">Contact Information of </h3>
                </div>
                <p style="color: #3e3e3e;font-weight: 400;font-size: large;"><span style="color:#2f2e2e;font-weight:bolder;font-size:24px;">Address:</span>
                </p>
                <p style="color: #3e3e3e;font-weight: 400;font-size: large;"><span style="color:#2f2e2e;font-weight:bolder;font-size:24px;">Website:</span><a href="" target="_blank"></a></p>
                <p style="color: #3e3e3e;font-weight: 400;font-size: large;"><span style="color:#2f2e2e;font-weight:bolder;font-size:24px;">E-mail:</span>
                </p>
                <p style="color: #3e3e3e;font-weight: 400;font-size: large;"><span style="color:#2f2e2e;font-weight:bolder;font-size:24px;">Contact
                        No:</span> {{ $data['single']->contact}}</p>

            </div>
            <div class="dc_clear"></div>
            <br />
            <br />
            <br />
        </div>
    </div>
    </div>
</section>
@endsection