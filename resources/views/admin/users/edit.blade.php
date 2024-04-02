@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#">New User</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header" style="font-weight: bold;">
                New User
            </header>
            <div class="card-body">
            <form action="{{ route($_base_route.'.update', $data['user']->id )}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Full Name</label> <br>
                                <input class="form-control rounded" type="text" id="name" value="@if(isset($data['user']->name)) {{ $data['user']->name }} @else {{ old('name') }} @endif" name="name" placeholder="Name">
                                @if($errors->has('name'))
                                <p id="name-error" class="help-block" for="name"><span>{{ $errors->first('name') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="username">Profile Name</label> <br>
                                <input class="form-control rounded" type="text" id="username" value="@if(isset($data['user']->username)) {{ $data['user']->username }} @else {{ old('username') }} @endif" name="username" placeholder="Profile Name">
                                @if($errors->has('username'))
                                <p id="name-error" class="help-block" for="username"><span>{{ $errors->first('username') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">Email</label> <br>
                                <input class="form-control rounded" type="text" id="email" value="@if(isset($data['user']->email)) {{ $data['user']->email }} @else {{ old('email') }} @endif" name="email" placeholder="Email">
                                @if($errors->has('email'))
                                <p id="name-error" class="help-block" for="email"><span>{{ $errors->first('email') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="mobile">Mobile</label> <br>
                                <input class="form-control rounded" type="text" id="mobile" value="@if(isset($data['user']->mobile)) {{ $data['user']->mobile }} @else {{ old('mobile') }} @endif" name="mobile" placeholder="Mobile">
                                @if($errors->has('mobile'))
                                <p id="name-error" class="help-block" for="mobile"><span>{{ $errors->first('mobile') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="avatar">Image</label> <br>
                                <input class="form-control rounded" type="file" id="avatar" value="" name="avatar" accept="">
                                @if($errors->has('avatar'))
                                <p id="name-error" class="help-block" for="avatar"><span>{{ $errors->first('avatar') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="text">Role</label> <br>
                                <input class="form-control rounded" type="text" id="role" value="" name="avatar" accept="">
                                @if($errors->has('text'))
                                <p id="name-error" class="help-block" for="text"><span>{{ $errors->first('text') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Begin Progress Bar Buttons-->
                    <div class="form-group pull-right">
                        <a href="{{ route($_base_route.'.index')}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> Back</a>
                        <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> Submit </button>
                    </div>
                    <!-- End Progress Bar Buttons-->
                </form>
            </div>
        </section>
    </div>
</div>
@endsection