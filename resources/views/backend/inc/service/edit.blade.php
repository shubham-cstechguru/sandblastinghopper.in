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
<!--  -->
{{ Form::open(['method'=>'POST', 'files' => true, 'class' => 'user']) }}
<div class="row">
	<div class="col-lg-6">
		<div class="form-group">
			{{ Form::label('service_title', 'Page Title')}}
			{{ Form::text('service_title', '', ['class' => 'form-control', 'id'=>'name', 'placeholder'=>'Item name','required'=>'required'])}}
		</div>
		<div class="form-group">
			{{Form::label('service_slug', 'Page Slug')}}
			{{Form::text('service_slug','', ['class'=>'form-control', 'id'=>'slug', 'placeholder'=>'Enter slug'])}}
		</div>

		<div class="form-group">
			{{Form::label('service_short_description', 'Page short description')}}
			{{Form::textarea('service_short_description', '', ['class' => 'form-control', 'id' => 'excerpt', 'placeholder'=>'Enter short description','rows'=>'23', 'col'=>'6'])}}
		</div>
	</div>
	<div class="col-lg-6">
		<div class="row">
			<div class="col">
				<img src="{{url('imgs/service/'.$edit->image)}}"   width="100%">
				<div class="form-group">			
					{{Form::label('image', ' Choose image')}}
					{{ Form::file('image', ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col">
				<img src="{{url('imgs/service/'.$edit->image_hover)}}" width="100%" height="76%">
				<div class="form-group">			
					{{Form::label('image_hover', ' Choose Hover Image')}}
					{{ Form::file('image_hover', ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<img src="{{url('imgs/service/'.$edit->banner_image)}}"width="100%">	
		
		<div class="form-group">
			<br>
			{{Form::label('banner_image', ' Choose Banner Image')}}
			{{ Form::file('banner_image', ['class' => 'form-control']) }}
		</div>

	</div>
	<div class="col-md-12">
        <div class="form-group">
        	{{ Form::label('parent') }}
			{{ Form::select('parent', $parentArr, '', ['class' => 'form-control']) }}      
        </div>		   
		<div class="form-group">
			{{Form::label('service_description', 'Enter description')}}
			{{Form::textarea('service_description', '', ['class' => 'form-control editor','id'=>'description', 'placeholder'=>'Enter description'])}}
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



</div>
@stop






