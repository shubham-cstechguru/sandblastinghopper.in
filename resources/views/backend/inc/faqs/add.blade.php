@extends('backend.layout.master')

@section('title','category')

@section('contant')


		<div class="page-wrapper p-5">

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
	        <h2 style="text-align: center;">Add Faq</h2>
	        {{ Form::open()  }}
        <div class="row"> 

	        <div class="col-md-8">
		        <div class="form-group">
		        	{{ Form::label('question', 'Question') }}
		            {{ Form::text('question', '', ['class' => 'form-control','placeholder' => 'enter category name']) }}      
		        </div>
		    </div> 
		     <div class="col-md-4">
		        <div class="form-group">
		        	{{ Form::label('parent') }}
        			{{ Form::select('parent', $parentArr, '', ['class' => 'form-control']) }}      
		        </div>
		    </div>
		    
			<div class="col-md-12">
				<div class="form-group">
					{{Form::label('answer', 'Enter answer')}}
					{{Form::textarea('answer', '', ['class' => 'form-control editor','id'=>'description', 'placeholder'=>'Enter answer'])}}
				</div>
			</div>
			<h6 class="col-12"><p class="bg-primary text-white p-4 font-weight-bold">Meta Info</p></h6>
			<div class="col-lg-6">
				<div class="form-group">
					{{Form::label('seo_title', 'Seo Title')}}
					{{Form::text('seo_title', '', ['class' => 'form-control', 'id'=>'seo_title','placeholder'=>'Enter title'])}}
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					{{Form::label('seo_keywords', 'Keywords')}}
					{{Form::text('seo_keywords','', ['class'=>'form-control','id'=>'keywords', 'placeholder'=>'write...'])}}
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					{{Form::label('seo_description', 'Seo Description')}}
					{{Form::textarea('seo_description', '', ['class' => 'form-control', 'id'=>'seo_description', 'placeholder'=>'write...','rows'=>'4', 'col'=>'3'])}}
				</div>
					<div class="text-right mt-4">
						{{ Form::submit('Save', ['class' => 'login-btn btn btn-orange']) }}
					</div>
			</div>
		    {{ Form::close() }}
        </div>
   
		   

		    </div>
@stop
		    	
				    

			
		
	
