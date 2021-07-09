@extends('backend.layout.login-master')

@section('title','password reset')

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

        
        {{ Form::open( ['url' => url('admin-control/')] ) }}
        
        <div class="form-group">
            {{ Form::label('new_password', 'Password') }}
            {{ Form::password('new_password', ['class' => 'form-control', 'required' => 'required','placeholder' => 'New Password']) }}
        </div>
        <div class="form-group">
            {{ Form::label('confirm_password', 'Password') }}
            {{ Form::password('confirm_password', ['class' => 'form-control', 'required' => 'required','placeholder' => 'Confirm Password']) }}
        </div>
       
        <div class="form-group " style="text-align: center; margin-top: 50px;">
            {{ Form::submit('Submit', ['class' => 'login-btn']) }}
        </div>
        
        {{ Form::close() }}



    </div>
@stop