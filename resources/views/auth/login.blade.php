@extends('layouts.login')
@section('title', 'User Log In')
@section('content')
<div class="content">
    <div class="brand">
        <a class="link" href="{{route('login')}}" style="font-size: 25px;color:#008b8b">COLLEGE COMPASS</a> <hr>
    </div>
    @if (Session::has('success'))
    <div class="alert alert-info">{{ Session::get('success') }}Logged out successfully.
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
    @endif
    <form id="login-form" action="{{ route('login') }}" method="POST">
        @csrf
        <h2 class="login-title" style="color: #008b8b;">Login</h2>
        <div class="form-group">
            <div class="input-group-icon right">
                <input class="form-control" type="email" value="{{ old('email') }}" name="email" placeholder="Email" autocomplete="off">
                @if($errors->has('email'))
                <small id="name-error" class="help-block " style="color: red;" for="name"><span>{{ $errors->first('email') }}</span></small>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-icon right">
                <input class="form-control" type="password" name="password" placeholder="Password">
                @if($errors->has('password'))
                <small id="name-error" class="help-block " style="color: red;" for="password"><span>{{ $errors->first('password') }}</small></p>
                @endif
            </div>
        </div>
        <div class="form-group d-flex justify-content-between">
            <label class="ui-checkbox ui-checkbox-info">
                <input type="checkbox" style="scale: 1.5;" name="remember" id="customCheck" {{ old('remember') ? 'checked' : '' }}>
        </div>
        <div class="form-group">
            <button class="btn  btn-block" type="submit" style="background-color: #008b8b;color:#fff">Log In</button>
        </div>

    </form>
</div>

@endsection
@section('js')

@endsection