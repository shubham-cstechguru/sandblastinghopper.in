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
		{{ Form::open(['method'=>'POST', 'files' => 'true', 'class' => 'user']) }}
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					{{ Form::label('title', 'Page Title')}}
					{{ Form::text('title', '', ['class' => 'form-control', 'id'=>'name', 'placeholder'=>'Item name','required'=>'required'])}}
				</div>
				<div class="form-group">
					{{Form::label('slug', 'Page Slug')}}
					{{Form::text('slug','', ['class'=>'form-control', 'id'=>'slug', 'placeholder'=>'Enter slug'])}}
				</div>

				<div class="form-group">
					{{Form::label('excerpt', 'Short description')}}
					{{Form::textarea('excerpt', '', ['class' => 'form-control', 'id' => 'excerpt', 'placeholder'=>'Enter short description','rows'=>'6', 'col'=>'6'])}}
				</div>
			</div>
			<div class="col-lg-6">

				<div class="form-group">
					<img src="{{url('imgs/product/'.$edit->image)}}" width="50"><br>
					{{Form::label('image', ' Choose image')}}
					<div class="">
						{{ Form::file('image', ['class' => 'form-control']) }}
					</div>
				</div>

				<div class="d-flex">
					@foreach($edit->prod_img as $img)
					<img class="mx-1" src="{{url('imgs/product/'.$img->image)}}" width="50"><br>
					<a href="{{ url('admin-control/product/'. $edit->id .'/removeimage/'. $img->id) }}" class="bg-danger text-white" style="border-radius: 50%; padding: 0px 6px; height: 23px;">×</a>
					@endforeach
				</div>

				<div class="form-group">
					<label for="images">Add Image Gallery</label>
					<a type="button" name="button" class="text-success mx-2" id="add" href="javascript:void(0);">
						<i class="fas fa-plus mr-1"></i>
						Add
					</a>
					<div id="dynamicRow">
						<div class="d-flex">
							{{ Form::file('images[]', ['class' => 'form-control input-row', 'id' => 'images',  'accept' => 'image/x-png,image/jpeg,image/jpg']) }}
						</div>
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('parent') }}
					{{ Form::select('parent', $parentArr, '', ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					{{Form::label('table', 'Enter Product Detail')}}
					{{Form::textarea('table', '', ['class' => 'form-control editor','id'=>'description', 'table'=>'Enter Product Detail'])}}
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					{{Form::label('description', 'Enter description')}}
					{{Form::textarea('description', '', ['class' => 'form-control editor','id'=>'description', 'placeholder'=>'Enter description'])}}
				</div>
			</div>
			<h6 class="col-12">
				<p class="bg-primary text-white p-4 font-weight-bold">Meta Info</p>
			</h6>
			<div class="col-lg-6">
				<div class="form-group">
					{{Form::label('seo_title', 'Seo Title')}}
					{{Form::text('seo_title', '', ['class' => 'form-control', 'id'=>'seo_title','placeholder'=>'Enter title'])}}
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					{{Form::label('keywords', 'Keywords')}}
					{{Form::text('keywords','', ['class'=>'form-control','id'=>'keywords', 'placeholder'=>'write...'])}}
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					{{Form::label('seo_description', 'Seo Description')}}
					{{Form::textarea('seo_description', '', ['class' => 'form-control', 'id'=>'seo_description', 'placeholder'=>'write...','rows'=>'4', 'col'=>'3'])}}
				</div>
				<div class="text-right mt-4">
					{{ Form::submit('Update', ['class' => 'login-btn btn btn-orange']) }}
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>



	</div>
	@stop