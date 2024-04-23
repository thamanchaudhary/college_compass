@extends('layouts.admin')
@section('title', 'College Show')
@section('content')
<section class="card">
    <header class="card-header">
        College Show
    </header>
    <div class="card-body">
        <!-- College Detail -->
        <div class="bio-row">
            <p><span class="bold">College Name </span>: {{ $data['rows']->name }}</p>
            <p><span class="bold">City </span>: @if(isset($data['rows']->CollegeCity)) {{ $data['rows']->CollegeCity->name}} @endif</p>
            <p><span class="bold">Address </span>:@if(isset($data['rows']->CollegeAddress)) {{ $data['rows']->CollegeAddress->name}} @endif</p>

            <p><span class="bold">Website </span>: {{ $data['rows']->website }}</p>
            <p><span class="bold">Contact </span>: {{ $data['rows']->contact }}</p>
            <p><span class="bold">Email </span>: {{ $data['rows']->email }}</p>
            <p><span class="bold">College Fee </span>: {{ $data['rows']->college_fee }}</p>
            <p><span class="bold">Examp Required </span>: {{ $data['rows']->examp_required }}</p>
            <p><span class="bold">Reconization </span>:@if(isset($data['rows']->University)) {{ $data['rows']->University->name  }} @endif</p>
            <p><span class="bold">Program </span>:@if(isset($data['rows']->Program)) {{ $data['rows']->Program->name  }} @endif</p>


            <p><span class="bold">Course </span>: {{ $data['rows']->course }}</p>
            <p><span class="bold">Degree </span>: {{ $data['rows']->degree }}</p>
            <p><span class="bold">Description </span>: {{ $data['rows']->description }}</p>
            <!-- Images -->
            <p><span class="bold">Image 1 </span>: @if(isset($data['rows']->image_1)) <img src="{{ asset($data['rows']->image_1) }}" alt="Image 1" style="width: 100px; height: 100px;">@else Image Not Found's ! @endif</p>
            <p><span class="bold">Image 1 </span>: @if(isset($data['rows']->image_2)) <img src="{{ asset($data['rows']->image_2) }}" alt="Image 1" style="width: 100px; height: 100px;">@else Image Not Found's ! @endif</p>
            <p><span class="bold">Image 1 </span>: @if(isset($data['rows']->image_3)) <img src="{{ asset($data['rows']->image_3) }}" alt="Image 1" style="width: 100px; height: 100px;">@else Image Not Found's ! @endif</p>
            <p><span class="bold">Image 1 </span>: @if(isset($data['rows']->image_4)) <img src="{{ asset($data['rows']->image_4) }}" alt="Image 1" style="width: 100px; height: 100px;">@else Image Not Found's ! @endif</p>
            

        </div>
    </div>
</section>
@endsection