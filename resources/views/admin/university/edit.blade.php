@extends('layouts.admin')
@section('title', 'Edit Company')
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
                                <label for="title">Name</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="@if(isset($data['rows']->name)) {{ $data['rows']->name }} @else {{ old('name') }} @endif" name="name" placeholder="Name">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
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
        <a href="{{ route($_base_route.'.index')}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> Back</a>
        <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> Save </button>
    </div>
    <!-- End Progress Bar Buttons-->
</form>
@endsection
@section('js')

@endsection