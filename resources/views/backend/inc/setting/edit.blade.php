@extends('backend.layout.master')

@section('title', 'Setting')

@section('contant')
<div class="page-wrapper p-5">
    
    <h1 style="text-align: center;padding: 20px 0 30px 0;">General Setting</h1>
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
            <div class="row">
                <p class="col-lg-6 form-group">
                    {{ Form::label('sitename') }}
                    {{ Form::text('sitename', '', ['class' => 'form-control']) }}
                </p>
                <p class="col-lg-6">
                    <img src="{{url('imgs/'.$edit->logo)}}" width="100px">
                    {{Form::label('logo', ' Choose image')}}
                    {{ Form::file('logo', ['class' => 'form-control']) }}
                </p>
                <p class="col-lg-6">
                    <img src="{{url('imgs/'.$edit->fav_icon)}}" width="100px">
                    {{Form::label('fav_icon', ' Choose fav_icon')}}
                    {{ Form::file('fav_icon', ['class' => 'form-control']) }}

                </p>
                <p class="col-lg-6">
                    {{ Form::label('tag_line') }}
                    {{ Form::text('tag_line', '', ['class' => 'form-control']) }}

                </p>                                
                <p class="col-lg-6">
                    {{ Form::label('mobile_no') }}
                    {{ Form::tel('mobile_no', '', ['class' => 'form-control']) }}
                </p>
                <p class="col-lg-6">
                    {{ Form::label('whatsapp') }}
                    {{ Form::number('whatsapp', '', ['class' => 'form-control']) }}
                </p>
                <p class="col-lg-6">
                    {{ Form::label('address') }}
                    {{ Form::textarea('address', '', ['class' => 'form-control','rows'=>'1', 'col'=>'6']) }}
                </p>
                <p class="col-lg-6">
                    {{ Form::label('email') }}
                    {{ Form::email('email', '', ['class' => 'form-control']) }}
                </p>
                

                <h3 class="col-lg-12 my-5">Social Icons</h3>

                <p class="col-lg-4">
                    {{ Form::label('facebook') }}
                    {{ Form::text('facebook', '', ['class' => 'form-control']) }}
                </p>
                <p class="col-lg-4">
                    {{ Form::label('instagram') }}
                    {{ Form::text('instagram', '', ['class' => 'form-control']) }}
                </p>
                <p class="col-lg-4">
                    {{ Form::label('youtube') }}
                    {{ Form::text('youtube', '', ['class' => 'form-control']) }}
                </p>
                <p class="col-lg-12">
                    {{ Form::submit('Update', ['class' => 'login-btn btn btn-orange']) }}
                </p>
                {{ Form::close() }}
    </div>

    <hr>
</div>
@stop
