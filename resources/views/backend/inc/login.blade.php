@extends('backend.layout.login-master')

@section('title','login')

@section('contant')
    <div style="width: 500px; margin: auto;border-radius: 10px; background: #ccc;padding: 60px 20px; margin: 0;position: absolute;top: 50%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%);">


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
            <div class="alert alert-danger">
                {!! \Session::get('danger') !!}</li>
            </div>
        @endif

        
        {{ Form::open( ['url' => url('admin-control/login-auth')] ) }}
        <div class="form-group">
            {{ Form::label('user_login', 'Username / Mobile No') }}
            {{ Form::text('user_login', '', ['class' => 'form-control','login-input', 'required' => 'required','placeholder' => 'Mobile no']) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', ['class' => 'form-control', 'required' => 'required','placeholder' => 'Password']) }}
        </div>
        
        <div class="form-group " style="text-align: center; margin-top: 50px;">
            {{ Form::submit('Login', ['class' => 'login-btn']) }}
        </div>
       
        {{ Form::close() }}



    </div>
@stop