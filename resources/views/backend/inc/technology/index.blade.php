@extends('backend.layout.master')

@section('title','Product')

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


	<h2 style="text-align: center; padding: 50px 0;"> Product</h2>

	<div>



		<div class="row">
			<div class="col-lg-3">
				{!! Form::open(['method' => 'GET']) !!}
				<div class="input-group my-3">
					{!! Form::text('title','',['class' => 'form-control', 'placeholder' => 'Search By Title...'])!!}
					<div class="input-group-append">

						{{ Form::submit('search', ['class'=>'btn btn-primary']) }}
					</div>
				</div>
				{!! Form::close() !!}

			</div>

		</div>
		{{ Form::open( ['url' => url('admin-control/product/removeMultiple'), 'method'=>'post'] ) }}
		<div class="card">
			<div class="card-body">
				@if( !$lists1->isEmpty() )
				<div class="">
					<div class="row mb-3 ">
						<div class="col float-left" style="font-size: 18px;">{{ $lists1->firstItem() }} - {{ $lists1->lastItem() }} out of {{ $lists1->total() }} record(s) showing.
						</div>

						<div class="col text-right">
							<a href="{{ url('admin-control/product/add') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Add Product</a>
							<button type="button" class="btn btn-primary btn-remove"><i class="icon-bin"></i></button>
						</div>
					</div>
					<div class="table-responsive">
						<table border="1" style="width: 100%" class="table table-bordered">
							<thead style="background: #1F262D; color: #fff;">
								<tr>
									<th></th>
									<th>S.No.</th>
									<th> Title</th>
									<th> Slug</th>
									<th> Excerpt</th>
									<th> Image</th>
									<th> Location</th>
									<th>Action</th>

								</tr>
							</thead>
							<tbody>
								@php
								$sn = $lists1->firstItem();
								@endphp
								@foreach( $lists1 as $list )
								<tr>
									<td>{{ Form::checkbox('check[]',$list->id, '',['class'=>'check']) }}</td>
									<td>{{ $sn++ }}.</td>
									<td>{{ $list->title }} </td>
									<td>{{ $list->slug }} </td>
									<td>{{ $list->excerpt }} </td>
									<td>
										@if($list->image!='')
										<img src="{{url('imgs/product/'.$list->image)}}" height="50">
										@else
										<img src="{{url('imgs/unavailable-image-300x225.jpg')}}" height="50">
										@endif
									</td>
									<td>
										@if(!empty($list->prod_city) || !empty($list->prod_country))
										<div>{{ @$list->city->name }}</div>

										<div>{{ @$list->country->name }}</div>
										@else
										<a href="javascript:void(0)" onclick="addcity({{ $list->id }})">City</a>&nbsp;|
										<a href="javascript:void(0)" onclick="addcountry({{ $list->id }})">Country</a>
										@endif
									</td>
									<td>
										<a href="{{ url('admin-control/product/edit/'.$list->id) }}">EDIT</a>&nbsp;|
										<a href="{{ url('admin-control/product/remove/'.$list->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">DELETE</a>
									</td>

								</tr>
								@endforeach
							</tbody>
						</table>
					</div>


				</div>
				{{ Form::close()  }}
				{{ $lists1->links() }}
				@endif


			</div>
		</div>

		<div class="modal fade" id="cityModal" tabindex="-1" aria-labelledby="cityModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<form class="" action="" method="POST" id="cityFormModal">
					{!! csrf_field() !!}
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="cityModalLabel">Select Cities</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							@if(!$cities->isEmpty())
							@foreach($cities as $city)
							<div class="form-check form-check-inline">
								<input class="form-check-input" name="city[]" type="checkbox" id="{{ $city->id }}" value="{{ $city->id }}">
								<label class="form-check-label" for="{{ $city->id }}">{{ $city->name }}</label>
							</div>
							@endforeach
							@else
							No Record Found
							@endif
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger">Confirm Select</button>
						</div>
					</div>
				</form>
			</div>
		</div>


		<div class="modal fade" id="countryModal" tabindex="-1" aria-labelledby="countryModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<form class="" action="" method="POST" id="countryFormModal">
					{!! csrf_field() !!}
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="countryyModalLabel">Select Countries</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							@if(!$countries->isEmpty())
							@foreach($countries as $country)
							<div class="form-check form-check-inline">
								<input class="form-check-input" name="country[]" type="checkbox" id="{{ $country->id }}" value="{{ $country->id }}">
								<label class="form-check-label" for="{{ $country->id }}">{{ $country->name }}</label>
							</div>
							@endforeach
							@else
							No Record Found
							@endif
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger">Confirm Select</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		@stop