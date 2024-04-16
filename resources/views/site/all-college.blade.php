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
                <img src="{{ asset('assets/site/images/content__images/pop_ind.jpg')}}" alt="image">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat utSuspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
                <p><a href="#" role="button" class="btn btn-primary">Learn more</a></p>

                <h3><span>Filters</span></h3>
                <div class="col-md-12" style="background-color: rgba(175, 177, 179, 0.1);box-shadow: rgba(57, 57, 57, 0.16) 2px 0px 20px;border:rgba(0, 0, 0, 0.1) 0.5px solid;">
                    <form action='{{ Route('site.search')}}' id='search-form' method='GET' target='_top'>
                        {{ csrf_field() }}
                        <h3 style="font-size: 20px;margin-top:20px;margin-bottom:15px;">Degree</h3>
                        <hr>
                        @if(isset($data['program']))
                        @foreach($data['program'] as $row)
                        <input type="checkbox" id="{{ $row->name }}<" name="program_id" value="{{ $row->id }}" style="scale: 1.5;">
                        <label for="vehicle1">{{ $row->name }}</label><br>
                        <br>
                        @endforeach
                        @endif
                        <h3 style="font-size: 20px;margin-top:20px;margin-bottom:15px;">City</h3>
                        <hr>
                        <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 30px; margin-bottom:15px;">City</span>
                        <select style="width: 65%;height: 30px;font-size: 19px;margin-left:12px;border-radius: 3px;" name="city">
                            <option value="all">All</option>
                            <option value="kathmandu">Kathmandu</option>
                            <option value="lalitpur">Lalitpur</option>
                            <option value="bhaktapur">Bhaktapur</option>
                            <option value="pokhara">Pokhara</option>
                            <option value="hetauda">Hetauda</option>
                        </select>
                        <hr>
                        <span style="font-size: 18px;font-weight: 900;color: rgba(34, 34, 34, 0.68);margin-top: 30px; margin-bottom:15px;">University</span>
                        <select style="width: 65%;height: 30px;font-size: 19px;margin-left:12px;border-radius: 3px;" name="university_id">
                            <option value="all">University</option>
                            @if(isset($data['university']))
                            @foreach($data['university'] as $row)
                            <option value="{{$row->id }}">{{ $row->name }}</option>
                            @endforeach
                            @endif
                        </select>

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
                    <div class="col-md-12" style="background-color: #222222;height: 56px;margin-top: 0.5px;border-radius: 3px;">
                        <form style="margin-top: -19px;">
                            <input type="hidden" name="college_id" value="{{ $row->id }}">
                            <button type="button" name="wish" class="btn btn-secondary btn-sm" onclick="addToWish(this)" data-college_id="{{ $row->id }}">
                                <i class="icon anm anm-heart-l me-2"></i> <span>Add to Wishlist</span>
                            </button> <a class="btn btn-default btn-md" style="margin-left: 5px;margin-right: 10px;" id="1" href="{{ route('site.post.show', ['id' => $row->id]) }}">View College</a>
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
@section('js')

@endsection