@extends('layouts.admin')
@section('title', 'Add College')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
<form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data">
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
                                <input class="form-control rounded" type="text" id="name" value="@if(isset($data['rows']->name)) {{ $data['rows']->name   }} @endif" name="name" placeholder="Name">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="city_id">City</label> <br>
                                <select id="city_id" name="city_id" class="form-control">
                                    @if(isset($data['city']))
                                    <option value=>--Choose City--</option>
                                    @foreach($data['city'] as $row)
                                    <option value="{{ $row->id }}" @if($data['rows']->city_id == $row->id) selected @endif>{{ $row->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('city_id'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('city_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="address">Address</label> <br>
                                <select name="address_id" id="address_id" class="form-control">
                                    <option value=>Choose Address</option>
                                    @foreach($data['address'] as $row)
                                    <option value="{{ $row->id }}" @if($data['rows']->address_id == $row->id) selected @endif>{{ $row->name }}</option>
                                    @endforeach
                                </select> @if($errors->has('address'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('address') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="website">Website</label> <br>
                                <input class="form-control rounded" type="url" id="website" value="@if(isset($data['rows']->website)) {{ $data['rows']->website   }} @endif" name="website" placeholder="Website">
                                @if($errors->has('website'))
                                <p id="name-error" class="help-block" for="website"><span>{{ $errors->first('website') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="contact">Contact</label> <br>
                                <input class="form-control rounded" type="text" id="contact" value="@if(isset($data['rows']->contact)) {{ $data['rows']->contact   }} @endif" name="contact" placeholder="Contact">
                                @if($errors->has('contact'))
                                <p id="name-error" class="help-block" for="contact"><span>{{ $errors->first('contact') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">Email</label> <br>
                                <input class="form-control rounded" type="email" id="email" value="@if(isset($data['rows']->email)) {{ $data['rows']->email   }} @endif" name="email" placeholder="Email">
                                @if($errors->has('email'))
                                <p id="name-error" class="help-block" for="email"><span>{{ $errors->first('email') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="college_fee">College Fee</label> <br>
                                <input class="form-control rounded" type="text" id="college_fee" value="@if(isset($data['rows']->college_fee)) {{ $data['rows']->college_fee   }} @endif" name="college_fee" placeholder="College Fee">
                                @if($errors->has('college_fee'))
                                <p id="name-error" class="help-block" for="college_fee"><span>{{ $errors->first('college_fee') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="examp_required">Exam Required</label> <br>
                                <select name="examp_required" id="examp_required" class="form-control">
                                    <option value=>--Choose Exam--</option>
                                    <option value="IOST" @if($data['rows']->examp_required == 'IOST') selected @endif>IOST</option>
                                    <option value="CMAT" @if($data['rows']->examp_required == 'CMAT') selected @endif>CMAT</option>
                                    <option value="IOE" @if($data['rows']->examp_required == 'IOE') selected @endif>IOE</option>
                                </select>
                                @if($errors->has('exam_required'))
                                <p id="name-error" class="help-block" for="exam_required"><span>{{ $errors->first('exam_required') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">Reconization</label> <br>
                                <select name="university_id" id="university_id" class="form-control">
                                    @if(isset($data['university']))
                                    <option value=>--Choose University--</option>
                                    @foreach($data['university'] as $row)
                                    <option value="{{ $row->id }}" @if($data['rows']->university_id == $row->id) selected @endif>{{ $row->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('email'))
                                <p id="name-error" class="help-block" for="email"><span>{{ $errors->first('email') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">Program</label> <br>
                                <select name="program_id[]" id="program_id" class="form-control js-example-basic-multiple" multiple="multiple">
                                    @if(isset($data['program']))
                                    <option value=>--Choose Program--</option>
                                    @foreach($data['program'] as $row)
                                    <option value="{{ $row->id }}" @if($data['rows']->program_id == $row->id) selected @endif>{{ $row->name }}</option>
                                    @endforeach
                                    <option value="{{ $row->id }}" {{ $data['rows']->program_id == explode(', ', $row->id) ? 'selected' : '' }}>{{ $row->name }}
                                        @endif
                                </select>
                                @if($errors->has('email'))
                                <p id="name-error" class="help-block" for="email"><span>{{ $errors->first('email') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="course">Course</label> <br>
                                <input class="form-control rounded" type="course" id="contact" value="@if(isset($data['rows']->course)) {{ $data['rows']->course   }} @endif" name="course" placeholder="Course">
                                @if($errors->has('course'))
                                <p id="name-error" class="help-block" for="course"><span>{{ $errors->first('course') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="degree">Degree</label> <br>
                                <input class="form-control rounded" type="degree" id="degree" value="@if(isset($data['rows']->degree)) {{ $data['rows']->degree   }} @endif" name="degree" placeholder="Degree">
                                @if($errors->has('degree'))
                                <p id="name-error" class="help-block" for="degree"><span>{{ $errors->first('degree') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">About </label> <br>
                                <textarea class="form-control rounded" name="description" id="about" cols="10" rows="5">@if(isset($data['rows']->description)) {{ $data['rows']->description   }} @endif</textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="image_1">Image One</label> <br>
                                <input class="form-control rounded" type="file" id="image_1" name="image_1" accept="image/*">
                                @if($errors->has('image_1'))
                                <p id="name-error" class="help-block" for="image_1"><span>{{ $errors->first('image_1') }}</span></p>
                                @endif
                                @if(isset($data['rows']->image_1))
                                <img src="{{ asset($data['rows']->image_1) }}" alt="Image 1" style="width: 100px; height: 100px;">
                                @else
                                <p>Image Not Found's !</p>
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
                                @if(isset($data['rows']->image_2))
                                <img src="{{ asset($data['rows']->image_2) }}" alt="Image 1" style="width: 100px; height: 100px;">
                                @else
                                <p>Image Not Found's !</p>
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
                                @if(isset($data['rows']->image_3))
                                <img src="{{ asset($data['rows']->image_3) }}" alt="Image 1" style="width: 100px; height: 100px;">
                                @else
                                <p>Image Not Found's !</p>
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
                                @if(isset($data['rows']->image_4))
                                <img src="{{ asset($data['rows']->image_4) }}" alt="Image 1" style="width: 100px; height: 100px;">
                                @else
                                <p>Image Not Found's !</p>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
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
                    $('#address_id').append('<option value="">-- Choose Address --</option>');
                    $.each(result.address, function(key, value) {
                        $("#address_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });


    });
</script>

@endsection