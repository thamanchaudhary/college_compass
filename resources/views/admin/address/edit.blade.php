@extends('layouts.admin')
@section('title', 'Add Company')
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
<form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <section class="card">
                <header class="card-header" style="font-weight: bold;">
                    {{$_panel }} Edit
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Name</label> <br>
                                <input class="form-control rounded" type="text" id="name" value="@if(isset($data['rows']->name)) {{ $data['rows']->name }} @else {{ old('name') }} @endif" name="name" placeholder="Name">
                                @if($errors->has('name'))
                                <p id="name-error" class="help-block" for="name"><span>{{ $errors->first('name') }}</span></p>
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