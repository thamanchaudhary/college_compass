@extends('layouts.login')
@section('title', 'नयाँ प्रयोगकर्ता')
@section('content')
<div class="content">
    <div class="brand">
        <a class="link" href="{{route('login')}}" style="font-size: 25px;">@if(isset($all_view['setting']->site_name)) {{ $all_view['setting']->site_name }} @endif</a>
    </div>
    <form id="register-form" action="{{ route('register') }}" method="POST">
        @csrf
        <h2 class="login-title">नयाँ प्रयोगकर्ता</h2>
        <div class="form-group">
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="पुरा नाम">
            @if($errors->has('name'))
            <small id="name-error" class="help-block " style="color: red;" for="name"><span>{{ $errors->first('name') }}</span></small>
            @endif
        </div>
        <div class="form-group">
            <input class="form-control" type="email" value="{{ old('email') }}" name="email" placeholder="इमेल" autocomplete="off">
            @if($errors->has('email'))
            <small id="name-error" class="help-block " style="color: red;" for="email"><span>{{ $errors->first('email') }}</span></small>
            @endif
        </div>
        <div class="form-group">
            <input class="form-control" type="tel" name="mobile" value="{{ old('mobile') }}" placeholder="फोन" autocomplete="off">
            @if($errors->has('mobile'))
            <small id="name-error" class="help-block " style="color: red;" for="mobile"><span>{{ $errors->first('mobile') }}</span></small>
            @endif
        </div>
        <div class="form-group">
            <input class="form-control" id="password" type="password" name="password" placeholder="पासवर्ड">
            @if($errors->has('password'))
            <p id="name-error" class="help-block" style="color: red;" for="name"><span>{{ $errors->first('password') }}</span></p>
            @endif
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password_confirmation" placeholder="पासवर्ड पुन: लेख्नुहोस">
            @if($errors->has('password_confirmation'))
            <p id="name-error" class="help-block " for="name"><span>{{ $errors->first('password_confirmation') }}</span></p>
            @endif
        </div>
        <div class="form-group d-flex justify-content-between" style="font-size: 14px;">
            <label class="ui-checkbox ui-checkbox-info">
                <input type="checkbox" style="scale: 1.5;" name="remember" id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                <span class="input-span" for="customCheck"></span>&nbsp;पासवर्ड याद राख्नुहोस्</label>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="d-flex justify-content-end">पासवर्ड भुल्नु भयो ?</a>
            @endif
        </div>
        <div class="form-group">
            <button class="btn btn-danger btn-block" type="submit">दर्ता गर्नुहोस्</button>
        </div>
        @if (Route::has('login'))
        <div class="text-center">मसँग पहिल्यै सदस्यता छ ?
            <a class="color-blue" href="{{ route('login') }}">लग-ईन</a>
        </div>
        @endif
    </form>
</div>

@endsection