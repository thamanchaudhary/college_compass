@extends('site.layouts.app')
@section('title')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @if(isset($data['single']) && count($data['single']) > 0)
        @foreach($data['single'] as $row)
        <div class="card">
            <div class="row no-gutters"  style="margin-bottom: -150px;">
                <div class="col-md-4">
                    <img src="{{ asset( $row->image_1 )}}" class="card-img img img-responsive" alt="..." width="200px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $row->name }}</h5>
                        <p class="card-text">{{ $row->description}}</p>
                        <p class="card-text">
                        <a href="{{ route('site.post.show', ['id' => $row->id]) }}" class="btn btn-success btn-sm" style="width: 150px;"> View More</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title
                    ">College Not Found"s !</h3>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection