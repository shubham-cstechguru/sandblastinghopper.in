@extends('backend.layout.master')

@section('title','service')

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
	        

		    <h2 style="text-align: center; padding: 50px 0;"> Service</h2>

		    <div>
		    	
				    

			<div class="row">
		        <div class="col-lg-3">
		            {!! Form::open(['method' => 'GET']) !!}
		                <div class="input-group my-3">
		                    {!! Form::text('service_title','',['class' => 'form-control', 'placeholder' => 'Search By Title...'])!!}
		                    <div class="input-group-append">
		                        
		                    {{ Form::submit('search', ['class'=>'btn btn-primary']) }}
		                    </div>
		                </div>
		            {!! Form::close() !!}

		        </div>
		        
		    </div>
		    {{ Form::open( ['url' => url('admin-control/service/removeMultiple'), 'method'=>'post'] ) }}
		    <div class="card">
		        <div class="card-body">
		            @if( !$lists1->isEmpty() )
		            <div class="">
		                <div class="row mb-3 ">
		                    <div class="col float-left" style="font-size: 18px;">{{ $lists1->firstItem() }} - {{ $lists1->lastItem() }} out of {{ $lists1->total() }} record(s) showing.                
		                    </div>
		                
		                    <div class="col text-right">
		                    	<a href="{{ url('admin-control/service/add') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Add Service</a>
		                        <button type="button" class="btn btn-primary btn-remove" ><i class="icon-bin"></i></button>
		                    </div>
		                </div>
	        			<div class="table-responsive">
					        <table border="1" style="width: 100%" class="table table-bordered">
					            <thead style="background: #1F262D; color: #fff;">
					                <tr>
					                	<th></th>
					                    <th>S.No.</th>
					                    <th>Page Title</th>
					                    <th>Page Slug</th>
					                    <th>Page Short Description</th>
					                    <th>Page Image</th>
					                    <th>Page Hover Image</th>
					                    <th>Page Banner Image</th>
					                    <!-- <th>Page Description</th> -->
					                    <!-- <th>Page Title</th> -->
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
					                    <td>{{ $list->service_title }} </td>
					                    <td>{{ $list->service_slug }} </td>
					                    <td>{{ $list->service_short_description }} </td>
					                    <td><img src="{{url('imgs/service/'.$list->image)}}" height="50"> </td>
					                    <td style="background: #a6a6a6"><img src="{{url('imgs/service/'.$list->image_hover)}}" height="50" width="50"> </td>
					                    <td><img src="{{url('imgs/service/'.$list->banner_image)}}" height="50"> </td>
					                    <!-- <td>{{ $list->service_description }} </td> -->
					                    <!-- <td>{{ $list->servive_title }} </td> -->
					                    <td>
					                    	
						                    	<a href="{{ url('admin-control/service/edit/'.$list->id) }}">EDIT</a>&nbsp;|
		                    					<a href="{{ url('admin-control/service/remove/'.$list->id) }}"onclick="return confirm('Are you sure you want to delete this item?');">DELETE</a>
		                    				
	                    				</td>
					                    
					                </tr>
					                @endforeach
					            </tbody>
					        </table>
					    </div>
				        
				    </div>
				    {{  Form::close()  }}
				    {{ $lists1->links() }}
                    @endif

				   
		    </div>
		</div>

@stop