@extends('site.layouts.app')
@section('title')
@endsection
@section('content')
<section class="main__middle__container">
    <div class="container">
        <div class="row nothing">
            <aside class="col-md-4" style="width: 27.2222222222222%;">
                <h3><span>Popular Colleges</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.</p>
                <img src="images/content__images/pop_ind.jpg" alt="image">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat utSuspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
                <p><a href="#" role="button" class="btn btn-primary">Learn more</a></p>

                <h3><span>Filters</span></h3>
                <div class="col-md-12" style="background-color: rgba(175, 177, 179, 0.1);box-shadow: rgba(57, 57, 57, 0.16) 2px 0px 20px;border:rgba(0, 0, 0, 0.1) 0.5px solid;">
                    <form action="allcolleges.php" method="post" name="filter_v">
                        <h3 style="font-size: 20px;margin-top:20px;margin-bottom:15px;">Degree</h3>
                        <hr>
                        <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 30px;">Engineering</span>
                        <input type="checkbox" value="engineering" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;" name="degree">
                        <br>
                        <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">CSIT</span>
                        <input type="checkbox" value="csit" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;" name="degree">
                        <br>
                        <h3 style="font-size: 20px;margin-top:20px;margin-bottom:15px;">Location</h3>
                        <hr>
                        <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 30px; margin-bottom:15px;">Location</span>
                        <select style="width: 65%;height: 30px;font-size: 19px;margin-left:12px;border-radius: 3px;" name="city_option">
                            <option value="all">All</option>
                            <option value="kathmandu">Kathmandu</option>
                            <option value="lalitpur">Lalitpur</option>
                            <option value="bhaktapur">Bhaktapur</option>
                            <option value="pokhara">Pokhara</option>
                            <option value="hetauda">Hetauda</option>

                        </select>

                        <h3 style="font-size: 20px;margin-top:30px;margin-bottom:15px;">Exams Accepted</h3>
                        <hr>
                        <p style="font-size: 18px;font-weight: bold;color: rgba(0, 0, 0, 0.88);margin-top: 0px;margin-bottom: 9px;"><u>For Engineering:</u></p>
                        <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">IOE</span>
                        <input type="checkbox" value="IOE" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;" name="exam"><br>
                        <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">KUCAT</span>
                        <input type="checkbox" value="KUCAT" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;" name="exam"><br>
                        <p style="font-size: 18px;font-weight: bold;color: rgba(0, 0, 0, 0.88);margin-top: 0px;margin-bottom: 9px;"><u>For CSIT:</u></p>
                        <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">IOST</span>
                        <input type="checkbox" value="IOST" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;" name="exam"><br>
                        <br>
                        <h3 style="font-size: 20px;margin-top:30px;margin-bottom:15px;">Degree Preferance</h3>
                        <hr>
                        <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">TU Approved</span>
                        <input type="checkbox" value="TU" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;" name="recog"><br>
                        <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">KU Approved</span>
                        <input type="checkbox" value="KU" style="width: 25px;position:absolute;height: 18px;padding-left: 10px;right:110px;" name="recog"><br>
                        <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">PU Recognized</span>
                        <input type="checkbox" value="PU" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;" name="recog"><br>
                        <h3 style="font-size: 20px;margin-top:20px;margin-bottom:15px;">Mode</h3>
                        <hr>
                        <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">Day Time</span>
                        <input type="checkbox" value="csit" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;"><br>
                        <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 0px;">Morning Time</span>
                        <input type="checkbox" value="csit" style="width: 25px;position: absolute;height: 18px;padding-left: 10px;right:110px;"><br>

                        <p><input type="submit" class="btn btn-default btn-md" style="width: 100%;" name="filter_value" value="Apply Filters"></p>

                    </form>
                </div>
            </aside>

            <!-- Side Pane  Filters -->

            <section class="col-md-8 main-content" id="college-list" style="width:72.7777777777777%;">
                <h2>Explore Colleges In Nepal</h2>
                <p style="font-size: larger;"><strong>Explore the colleges in Nepal based on the filters provided on the left pane by clicking the required options to get the deired colleges below. </strong></p>
                @if(isset($data['rows']))
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
                        <p style="margin-top: 10px;"><b style="color: #397adc;font-size: 18px;">University</b> : @if(isset($row->University)) {{ $row->University->name  }} @endif</p>
                        <p style="margin-top: 5px;"><b style="color: #397adc;font-size: 18px;">Exams Required</b> {{ $row->examp_required}}</p>
                        <p style="margin-top: 5px;"><b style="color: #397adc;font-size: 18px;">City</b> :{{$row->city }}</p>
                    </div>
                    <div class="col-md-12" '="" style="background-color: #222222;height: 56px;margin-top: 0.5px;border-radius: 3px;">
                    <form style="margin-top: -19px;">
                    <a name="add-wishlist" class="btn btn-default btn-md" style="margin-top: 5px;margin-left: 255px;margin-right: 10px;" id="1" onclick="function2(this.id)">Add to WishList</a>
                    <a class="btn btn-default btn-md" style="margin-top: 5px;margin-left: 5px;margin-right: 10px;" id="1" >View College</a>
                </form>
                <p>

                </p>
                </div>
                </div>
                @endforeach
                @else
                <p>Data Not Found' s !</p>
                        @endif





            </section>
        </div>
    </div>
    </div>

</section>
@endsection