@extends('backend.layout.master')

@section('title', 'Setting')

@section('contant')
<div class="page-wrapper p-5">
    
    <h1 style="text-align: center;">Add Setting</h1>
    <div class="">
        @if( $errors->any() )
            <div class="alert alert-danger" style="color: red;">
                @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </div>
        @endif

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

        {{ Form::open(['files' => true])  }}
        <p class="">
            {{ Form::label('app_name') }}
            {{ Form::text('app_name', '', ['class' => 'form-control','placeholder' => 'App name']) }}
        </p>
        <p>
            {{ Form::label('app_version') }}
            {{ Form::text('app_version', '', ['class' => 'form-control','placeholder' => 'App version']) }}

        </p>                                
        <p class="">
            {{ Form::label('mobile_no') }}
            {{ Form::number('mobile_no', '', ['class' => 'form-control','placeholder' => 'Mobile no']) }}
        </p>
        <p class="">
            {{ Form::label('email') }}
            {{ Form::email('email', '', ['class' => 'form-control','placeholder' => 'Email']) }}
        </p>
        <p class="">
            {{ Form::label('address') }}
            {{ Form::text('address', '', ['class' => 'form-control','placeholder' => 'Address']) }}
        </p>
        <p class="">
            {{ Form::label('refer_prefix') }}
            {{ Form::text('refer_prefix', '', ['class' => 'form-control','placeholder' => 'Refer prefix']) }}
        </p>
        <p class="">
            {{ Form::label('refer_point') }}
            {{ Form::text('refer_point', '', ['class' => 'form-control','placeholder' => 'Refer point']) }}
        </p>
        <p class="">
            {{ Form::label('game_link') }}
            {{ Form::text('game_link', '', ['class' => 'form-control','placeholder' => 'Game link']) }}
        </p>
        <p class="">
            {{ Form::submit('Save', ['class' => 'login-btn btn btn-orange']) }}
        </p>
        {{ Form::close() }}
    </div>

    <hr>
</div>
@stop
