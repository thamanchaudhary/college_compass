@extends('site.layouts.app')
@section('title')
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                                                <!-- Show Intrested Program -->
                                                <?php $featuredArray = json_decode($data['user']->program_id); ?>
                                                <!-- Show featuredArray data like Intrested Program  -->
                                                <p>Intrested Program :
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
                                                <!-- SHow intrested Location -->
                                                <p>Intrested City : @if(isset($data['user']->inrestedCity)) {{ $data['user']->inrestedCity->name}} @endif</p>
                                                <p>Intrested Address :
                                                    <?php $featureaddress = json_decode($data['user']->address_id); ?>
                                                    @if(isset($featureaddress))
                                                    @foreach($featureaddress as $row)
                                                    @if(isset($data['address']))
                                                    @foreach($data['address'] as $address)
                                                    @if($address->id == $row)
                                                    {{ $address->name }}
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
                        <div class="col-md-6">
                            <div class="row" style="display: block;background-color:aliceblue;padding:0px;">
                                <div class="col-md-12">
                                    <div class="content-box-header">
                                        <div class="panel-title">Information Edit</div>
                                        <hr>
                                    </div>
                                    <div class="content-box-large box-with-header">

                                        <div class="row" style="padding:0px;">
                                            <form action="{{ route('user.user_profile.updateProfile', ['id' => $data['user']->id]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf <div class="form-group col-md-6">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $data['user']->name }}" id="name" aria-describedby="name" placeholder="Enter Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="username">User Name</label>
                                                    <input type="text" class="form-control" name="username" value="{{ $data['user']->username }}" id="username" aria-describedby="username" placeholder="Enter User Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" value="{{ $data['user']->email }}" aria-describedby="email" placeholder="Enter email">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php $featuredArray = json_decode($data['user']->program_id); ?>
                                                    <label for="exampleInputEmail1">Intrested Program</label>
                                                    <select class="form-control js-example-basic-multiple" name="program_id[]" multiple="multiple">
                                                        <option value="">Select Program</option>
                                                        @if(isset($all_view['program']))
                                                        @foreach($all_view['program'] as $row)
                                                        @if(isset($featuredArray))
                                                        <option value="{{ $row->id }}" {{ $row->id }}" {{ in_array($row->id, $featuredArray) ? 'selected' : '' }}>{{ $row->name }}</option>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="exampleInputEmail1">Intrested City</label>
                                                    <select class="form-control js-example-basic-multiple" name="city_id" id="city_id">
                                                        <option value="">Select City</option>
                                                        @if(isset($data['city']))
                                                        @foreach($data['city'] as $row)
                                                        <option value="{{ $row->id }}" @if($data['user']->city_id == $row->id) selected @endif> {{ $row->name }}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php $featureaddress = json_decode($data['user']->address_id); ?>

                                                    <label for="exampleInputEmail1">Intrested Address</label>
                                                    <select class="form-control js-example-basic-multiple" name="address_id[]" id="address_id" multiple="multiple">
                                                        <option value="">Select Address</option>
                                                        @if(isset($data['address']))
                                                        @foreach($data['address'] as $row)
                                                        @if(isset($featureaddress))
                                                        <option value="{{ $row->id }}" {{ $row->id }}" {{ in_array($row->id, $featureaddress) ? 'selected' : '' }}>{{ $row->name }}</option>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> <br>

                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-6">
                            <div class="row" style="display: block;background-color:aliceblue;padding:0px;">
                                <div class="col-md-12">
                                    <div class="content-box-header">
                                        <div class="panel-title">Change Password</div>
                                        <hr>
                                    </div>
                                    <div class="content-box-large box-with-header">

                                        <div class="row" style="padding:0px;">
                                            <form action="{{ route('user.user_profile.passwordChange', ['id' => $data['user']->id]) }}" method="POST" enctype="multipart/form-data"> @csrf <div class="form-group col-md-6">
                                                    <div class="form-group col-md-12">
                                                        <label for="exampleInputEmail1">Current Password</label>
                                                        <input type="password" class="form-control" name="current_password" id="current_password" aria-describedby="emailHelp" placeholder="Current Password">
                                                        @if($errors->has('current_password'))
                                                        <p id="name-error" class="help-block" style="color: red;font-size:12px" for="current_password"><span>{{ $errors->first('current_password') }}</span></p>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="exampleInputEmail1">New Password</label>
                                                        <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp" placeholder="New Password">
                                                        @if($errors->has('password'))
                                                        <p id="name-error" class="help-block" style="color: red;font-size:12px" for="password"><span>{{ $errors->first('password') }}</span></p>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="exampleInputEmail1">Confirm New Password</label>
                                                        <input type="password" class="form-control" style="color: red;" name="password_confirmation" id="password_confirmation" aria-describedby="emailHelp" placeholder="Re-type New Password">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

    //Get  Location 
    $('#city_id').change(function() {
        var idCity = this.value;
        $("#address_id").html('');
        var url = "{{route('getAddress')}}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                city_id: idCity,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#address_id').append('<option value="">-- Choose Address --</option>');
                $.each(result.address, function(key, value) {
                    $("#address_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            }
        });
    });
</script>
@endsection