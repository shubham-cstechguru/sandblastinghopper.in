@extends('backend.layout.master')

@section('title', 'setting')

@section('contant')
<div class="page-wrapper p-5">
<hr>
<div class="">
    @if (\Session::has('success'))
        <div class="alert alert-success" style="color: green">
            {!! \Session::get('success') !!}</li>
        </div>
    @endif

    @if (\Session::has('danger'))
        <div class="alert alert-danger" style="color: red;">
            {!! \Session::get('danger') !!}</li>
        </div>
    @endif

    @if( !$lists->isEmpty() )
    <div class="table-responsive" style="background: #fff;">
        

        <!-- {{ Form::open( ['url' => url('admin-control/survey/removeMultiple'), 'method'=>'post'] ) }} -->
        <table border="1" style="width: 100%" class="table table-bordered">
            <thead style="font-size: 16px; color: #000;">
                <tr>
                    
                    <th>S.No.</th>
                    <th>App Name</th>
                    <th>App Version</th>
                    <th>Mobile No</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Refer Prefix</th>
                    <th>Refer Point</th>
                    <th>Game Link</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $sn = $lists->firstItem();
                @endphp
                @foreach( $lists as $list )
                <tr>
                    <td>{{ $sn++ }}.</td>
                    <td>{{ $list->app_name }} </td>
                    <td>{{ $list->app_version }}</td>
                    <td>{{ $list->mobile_no }}</td>
                    <td>{{ $list->email }}</td>
                    <td>{{ $list->address }}</td>
                    <td>{{ $list->refer_prefix }}</td>
                    <td>{{ $list->refer_point }}</td>
                    <td>{{ $list->game_link }}</td>
                    <td><a href="{{ url('admin-control/setting/edit/'.$list->id) }}">EDIT</a>&nbsp;
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- <button type="submit" >Selected Delete</button> -->
    {{ Form::close() }}
    </div>

    {{ $lists->links() }}
    @endif
</div>
<hr>
</div>
@stop
