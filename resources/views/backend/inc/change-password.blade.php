@extends('backend.layout.master')

@section('title', 'change password')

@section('contant')
    <div class="page-wrapper p-5">
        <h1 style="text-align: center;">Change Password</h1>
        <div class="">
            @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="content files-list clearfix">
                
                    <div class="col-xs-5">
                        
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p style='padding:15px;' class='bg-danger'>{{ $error }}</p>
                            @endforeach
                        @endif
                        @if(Request::get('errorMessage') !== null)
                            <p style='padding:15px;' class='bg-danger'>{{ Request::get('errorMessage') }}</p>
                        @endif

                        {{ Form::open( ['url' => url('admin-control/change-password')]) }}
                            <p class="">
                                
                                {{ Form::label('current_password') }}
                                {{ Form::password('current_password', ['class' => 'form-control','placeholder' => 'Current Password']) }}
                            </p>
                            <p>
                                {{ Form::label('new_password') }}
                                {{ Form::password('new_password', ['class' => 'form-control','placeholder' => 'New Password']) }}

                            </p>                                
                            <p class="">
                                {{ Form::label('confirm_password') }}
                                {{ Form::password( 'confirm_password', ['class' => 'form-control','placeholder' => 'Confirm Password']) }}
                            </p>
                            
                            <p class="">
                                {{ Form::submit('Save', ['class' => 'login-btn btn btn-orange']) }}
                            </p>
                            {{ Form::close() }}

                            
                               
                           
                    </div>
            </aside>
            <!-- /.right-side -->
        </div>
        
    </div>
    <!-- ./wrapper -->
    <!-- <script src="js/hub/demo.js" type="text/javascript"></script> -->

@stop