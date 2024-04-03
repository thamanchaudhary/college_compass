@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <!--state overview start-->
    <div class="row state-overview">
        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol blue">
                    <i class="fa fa-user"></i>
                </div>
                <div class="value">
                    <h1 class="count">{{ ($data['count_admin']) }}</h1>
                    <h6>Total Admin </h6>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol terques">
                    <i class="fa fa-users"></i>
                </div>
                <div class="value">
                    <h1 class="count">{{ ($data['count_user']) }}</h1>
                    <h6>Total User </h6>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol red">
                    <i class="fa fa-tasks"></i>
                </div>
                <div class="value">
                    <h1 class=" count2">{{ ($data['count_college']) }}</h1>
                    <h6>Total College</h6>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol yellow">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="value">
                    <h1 class=" count3">{{ ($data['count_university']) }}</h1>
                    <h6>University List</h6>
                </div>
            </section>
        </div>
    </div><br>
  
    @endsection
    @section('js')
    
    @endsection