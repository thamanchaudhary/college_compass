@extends('layouts.admin')
@section('title', 'View Company')
@section('css')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <aside class="profile-nav col-lg-3">
        <section class="card">
            <div class="user-heading round">
                <a href="#">
                    <img src="{{ asset($data['rows']->image) }}" alt="">
                </a>
                <h1>@if(isset($data['rows']->name)) {{ $data['rows']->name }} @endif</h1>
                <p>@if(isset($data['rows']->email)) {{ $data['rows']->email }} @endif</p>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="active nav-item"><a class="nav-link" href="profile.html"> <i class="fa fa-user"></i> Profile</a></li>
            </ul>
        </section>
    </aside>
    <aside class="profile-info col-lg-9">
        <section class="card">
            <div class="card-body bio-graph-info">
                <h1>Employee Detail</h1>
                <div class="row">
                    <div class="bio-row">
                        <p><span>Name </span>: @if(isset($data['rows']->name)) {{ $data['rows']->name }} @endif</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Position</span>: @if(isset($data['rows']->position)) {{ $data['rows']->position }} @endif</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Phone </span>: @if(isset($data['rows']->phone)) {{ $data['rows']->phone }} @endif</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Address</span>: @if(isset($data['rows']->address)) {{ $data['rows']->address }} @endif</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Email </span>: @if(isset($data['rows']->email)) {{ $data['rows']->email }} @endif</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Create Date </span>: @if($data['rows']->created_at)
                            {{ $data['rows']->created_at->format('M d, Y')}}
                            @else
                            No Time
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Document Title</label> <br>
                                        <input class="form-control rounded" type="text" id="name" value="{{ old('name') }}" name="name" placeholder="Document Title">
                                        @if($errors->has('name'))
                                        <p id="name-error" class="help-block" for="name"><span>{{ $errors->first('name') }}</span></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="name">Start Date</label> <br>
                                        <input class="form-control rounded" type="text" id="nepaliDate1" readonly value="{{ old('name') }}" name="name" placeholder="Start Date">
                                        @if($errors->has('name'))
                                        <p id="name-error" class="help-block" for="name"><span>{{ $errors->first('name') }}</span></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="name">End Date</label> <br>
                                        <input class="form-control rounded" type="text" id="nepaliDate2" readonly value="{{ old('name') }}" name="name" placeholder="End Date">
                                        @if($errors->has('name'))
                                        <p id="name-error" class="help-block" for="name"><span>{{ $errors->first('name') }}</span></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="name">Document</label> <br>
                                        <input type="file" id="nepaliDate2">
                                        @if($errors->has('name'))
                                        <p id="name-error" class="help-block" for="name"><span>{{ $errors->first('name') }}</span></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-info js-pr2-row-add">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <h6>Document Detail</h6>
                                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Document Title</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Document</th>
                                                <th>Created AT</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </aside>
</div>
@endsection
@section('js')
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#nepaliDate1').nepaliDatePicker();
        $('#nepaliDate2').nepaliDatePicker();
    });
</script>
@endsection