@extends('layouts.login')
@section('title', 'New User')
@section('content')
<div class="content">
    <div class="brand">
        <a class="link" href="{{route('login')}}" style="font-size: 25px;">@if(isset($all_view['setting']->site_name)) {{ $all_view['setting']->site_name }} @endif</a>
    </div>
    <form method="POST" action="{{ route('signup-process') }}">
        @csrf
        <h2 class="login-title">New Register</h2>
        <div class="form-group">
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Full Name">
            @if($errors->has('name'))
            <small id="name-error" class="help-block " style="color: red;" for="name"><span>{{ $errors->first('name') }}</span></small>
            @endif
        </div>
        <div class="form-group">
            <input class="form-control" type="email" value="{{ old('email') }}" name="email" placeholder="Email" autocomplete="off">
            @if($errors->has('email'))
            <small id="name-error" class="help-block " style="color: red;" for="email"><span>{{ $errors->first('email') }}</span></small>
            @endif
        </div>
        <!-- Program Select Option -->
        <div class="form-group">
            <select class="form-control" name="program_id">
                <option value="">Select Program</option>
                @if(isset($all_view['program']))
                @foreach($all_view['program'] as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
                @endif
            </select>
            @if($errors->has('program_id'))
            <small id="name-error" class="help-block " style="color: red;" for="program_id"><span>{{ $errors->first('program_id') }}</span></small>
            @endif
        </div>
        <!-- Location Select Option -->
        <div class="form-group">
            <select class="form-control" name="city_id" id="city_id">
                <option value="">Select City</option>
                @if(isset($data['city']))
                @foreach($data['city'] as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
                @endif
            </select> @if($errors->has('city'))
            <small id="name-error" class="help-block " style="color: red;" for="city"><span>{{ $errors->first('city') }}</span></small>
            @endif
        </div>
        <div class="form-group">
            <select name="address_id" id="address_id" class="form-control">
                <option value=>Choose Address</option>
            </select>
            @if($errors->has('address_id'))
            <p id="name-error" class="help-block " for="address_id"><span>{{ $errors->first('address_id') }}</span></p>
            @endif
        </div>

        <div class="form-group">
            <input class="form-control" id="password" type="password" name="password" placeholder="Password">
            @if($errors->has('password'))
            <p id="name-error" class="help-block" style="color: red;" for="name"><span>{{ $errors->first('password') }}</span></p>
            @endif
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password_confirmation" placeholder="Password Confirm">
            @if($errors->has('password_confirmation'))
            <p id="name-error" class="help-block " for="name"><span>{{ $errors->first('password_confirmation') }}</span></p>
            @endif
        </div>

        <div class="form-group">
            <button class="btn btn-info btn-block" type="submit">Register</button>
        </div>

    </form>
</div>

@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
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
                    $('#address_id').append('<option value="">-- Choose Sub Category --</option>');
                    $.each(result.address, function(key, value) {
                        $("#address_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });


    });
</script>
@endsection