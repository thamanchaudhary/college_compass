@extends('layouts.admin')
@section('title', 'User List')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
       
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                User list
                <span class="tools pull-right d-flex">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search.." aria-label="Search">
                        <button class="btn btn-sm btn-info my-2 my-sm-0" type="submit">Search</button>
                    </form>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Online/Offline</th>
                                <th class="hidden-phone">Disable/Enable</th>
                                <th> Last time</th>
                                <th class="hidden-phone">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ $key+1}}.</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->role}}</td>
                                <td>
                                    @if(Cache::has('user-is-online-' . $row->id))
                                    <span class="text-success">Online</span>
                                    @else
                                    <span class="text-secondary">Offline</span>
                                    @endif
                                </td>
                                <td> <input type="checkbox" class="toggle-class" data-toggle="toggle" data-id="{{ $row->id }}" data-size="xs" data-width="100" data-on="Activate" data-off="DeActivate" data-onstyle="success" data-offstyle="danger" {{ $row->status == 1 ? 'checked' : ''}}> </td>
                                <td>
                                    @if($row->last_seen != null)
                                    {{ Carbon\Carbon::parse($row->last_seen)->diffForHumans() }}
                                    @else
                                    No data
                                    @endif
                                </td>
                                <td>
                                    @include('admin.section.buttons.button-edit')
                                    @include('admin.section.buttons.button-delete')
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <p>Sorry! Data not found!</p>
                            @endif
                    </table>
                </div>
                <div class="row">
                    @include('admin.section.load-time')
                    {{ $data['rows']->links('vendor.pagination.custom') }}
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //toggle
        $(function() {
            $('#toggle-two').bootstrapToggle({
                on: 'Activate',
                off: 'DeActivate'
            });
        })
        $('.toggle-class').on('change', function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            var url = "{{route($_base_route.'.status')}}";
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: url,
                data: {
                    'status': status,
                    'id': id
                },
                success: function(data) {
                    // location.reload(true);
                },
                error: function(data) {
                    // alert("Ajax calling error !");
                }
            });

        });
    });
</script>
@endsection