@extends('layouts.admin')
@section('title', 'College List')
@section('css')
<!--dynamic table-->
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
                                <th>College Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Website</th>
                                <th class="hidden-phone">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['rows'] as $row)
                            <tr class="gradeX">
                                <td>{{$loop->iteration}}.</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->address}}</td>
                                <td>
                                    @if(isset($row->collegeLocation)) {{ $row->collegeLocation->name  }} @endif
                                </td>
                                <td>{{$row->website}}</td>
                                <td class="center hidden-phone">
                                    <a href="{{route( $_base_route.'.edit', $row->id )}}">Edit</a> |
                                    <a href="{{ route($_base_route.'.destroy', ['id' => $row->id]) }}" onclick="return confirm('Are you sure you want to delete this item?');">Detete</a> |
                                    <a href="{{route( $_base_route.'.show', $row->id )}}">View</a>
                                </td>
                            </tr>
                            @endforeach

                    </table>
                </div>
                <div class="row">
                    <!-- pagination -->
                    <div class="col-md-12">
                        <div class="text-center">
                            {{ $data['rows']->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
        </section>
    </div>

</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $("#deleteBtn").on("click", function() {
            if (confirm("Are you sure you want to delete this item?")) {
                // Perform delete operation
                alert("Item deleted!");
            }
        });
    });
</script>
@endsection