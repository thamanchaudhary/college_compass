@extends('layouts.admin')
@section('title', 'Program List')
@section('css')

@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Add New</a>&nbsp;
        </div>
    </div>
</div>
@include('admin.section.flash-message')

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header" style="font-weight: bold;">
                {{$_panel }} List
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Title</th>
                                <th class="hidden-phone">Sction</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($data['rows']) && $data['rows']->count() > 0)
                            @foreach($data['rows'] as $row)
                            <tr class="gradeX">
                                <td>{{$loop->iteration}}.</td>
                                <td>{{$row->name}}</td>
                                <td class="center hidden-phone">
                                    <a href="{{route( $_base_route.'.edit', $row->id )}}">Edit</a> |
                                    <a href="{{ route($_base_route.'.destroy', ['id' => $row->id]) }}" onclick="return confirm('Are you sure you want to delete this item?');">Detete</a> |
                                </td>
                            </tr>
                            @endforeach
                            @endif

                    </table>
                </div>
                <div class="row">
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('js')
@endsection