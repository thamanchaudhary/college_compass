@extends('layouts.admin')
@section('title', 'Add College')
@section('css')
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-weight: bold;">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#">{{$_panel }}</a></li>
            </ol>
        </nav>
    </div>
</div>
<form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header" style="font-weight: bold;">
                    {{$_panel }} Add
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">Name</label> <br>
                                <input class="form-control rounded" type="text" id="name" value="{{ old('name') }}" name="name" placeholder="Name">
                                @if($errors->has('name'))
                                <p id="name-error" class="help-block" for="name"><span>{{ $errors->first('name') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="address">Address</label> <br>
                                <input class="form-control rounded" type="text" id="address" value="{{ old('address') }}" name="address" placeholder="Address">
                                @if($errors->has('address'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('address') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="city">City</label> <br>
                                <input class="form-control rounded" type="text" id="city" value="{{ old('city') }}" name="city" placeholder="City">
                                @if($errors->has('city'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('city') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="website">Website</label> <br>
                                <input class="form-control rounded" type="url" id="website" value="{{ old('website') }}" name="website" placeholder="Website">
                                @if($errors->has('website'))
                                <p id="name-error" class="help-block" for="website"><span>{{ $errors->first('website') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="contact">Contact</label> <br>
                                <input class="form-control rounded" type="text" id="contact" value="{{ old('contact') }}" name="contact" placeholder="Contact">
                                @if($errors->has('contact'))
                                <p id="name-error" class="help-block" for="contact"><span>{{ $errors->first('contact') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">Email</label> <br>
                                <input class="form-control rounded" type="email" id="email" value="{{ old('email') }}" name="email" placeholder="Email">
                                @if($errors->has('email'))
                                <p id="name-error" class="help-block" for="email"><span>{{ $errors->first('email') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="examp_required">Exam Required</label> <br>
                                <select name="examp_required" id="examp_required" class="form-control">
                                    <option value=>--Choose Exam--</option>
                                    <option value="IOST">IOST</option>
                                    <option value="CMAT">CMAT</option>
                                    <option value="IOE">IOE</option>
                                </select>
                                @if($errors->has('exam_required'))
                                <p id="name-error" class="help-block" for="exam_required"><span>{{ $errors->first('exam_required') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">Reconization</label> <br>
                                <select name="reconization" id="reconization" class="form-control">
                                    <option value=>--Choose University--</option>
                                    <option value="TU">TU</option>
                                    <option value="PU">PU</option>
                                    <option value="KU">KU</option>
                                </select>
                                @if($errors->has('email'))
                                <p id="name-error" class="help-block" for="email"><span>{{ $errors->first('email') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="course">Course</label> <br>
                                <input class="form-control rounded" type="course" id="contact" value="{{ old('course') }}" name="course" placeholder="Course">
                                @if($errors->has('course'))
                                <p id="name-error" class="help-block" for="course"><span>{{ $errors->first('course') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="degree">Degree</label> <br>
                                <input class="form-control rounded" type="degree" id="degree" value="{{ old('degree') }}" name="degree" placeholder="Degree">
                                @if($errors->has('degree'))
                                <p id="name-error" class="help-block" for="degree"><span>{{ $errors->first('degree') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">About </label> <br>
                                <textarea class="form-control rounded" name="description" id="about" cols="10" rows="5">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="image_1">Image One</label> <br>
                                <input class="form-control rounded" type="file" id="image_1" name="image_1" accept="image/*">
                                @if($errors->has('image_1'))
                                <p id="name-error" class="help-block" for="image_1"><span>{{ $errors->first('image_1') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="image_2">Image Two</label> <br>
                                <input class="form-control rounded" type="file" id="image_2" name="image_2" accept="image/*">
                                @if($errors->has('image_2'))
                                <p id="name-error" class="help-block" for="image_2"><span>{{ $errors->first('image_2') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="image_3">Image three</label> <br>
                                <input class="form-control rounded" type="file" id="image_3" name="image_3" accept="image/*">
                                @if($errors->has('image_3'))
                                <p id="name-error" class="help-block" for="image_3"><span>{{ $errors->first('image_3') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="image_4">Image Four</label> <br>
                                <input class="form-control rounded" type="file" id="image_4" name="image_4" accept="image/*">
                                @if($errors->has('image_4'))
                                <p id="name-error" class="help-block" for="image_4"><span>{{ $errors->first('image_4') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- Begin Progress Bar Buttons-->
    <div class="form-group pull-right">
        <a href="{{ route($_base_route.'.index')}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> Cancel</a>
        <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> Submit </button>
    </div>
    <!-- End Progress Bar Buttons-->
</form>
@endsection
@section('js')


@endsection