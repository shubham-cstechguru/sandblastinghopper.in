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
	        

		    <h2 style="text-align: center; padding: 50px 0;"> Category</h2>

		    <div>
		    	
				    

			<div class="row">
		        <div class="col-lg-3">
		            {!! Form::open(['method' => 'GET']) !!}
		                <div class="input-group my-3">
		                    {!! Form::text('name','',['class' => 'form-control', 'placeholder' => 'Search...'])!!}
		                    <div class="input-group-append">
		                        
		                    {{ Form::submit('search', ['class'=>'btn btn-primary']) }}
		                    </div>
		                </div>
		            {!! Form::close() !!}

		        </div>
		        
		    </div>
		    {{ Form::open( ['url' => url('admin-control/category/removeMultiple'), 'method'=>'post'] ) }}
		    <div class="card">
		        <div class="card-body">
		            @if( !$lists1->isEmpty() )
		            <div class="">
		                <div class="row mb-3 ">
		                    <div class="col float-left" style="font-size: 18px;">{{ $lists1->firstItem() }} - {{ $lists1->lastItem() }} out of {{ $lists1->total() }} record(s) showing.                
		                    </div>
		                
		                    <div class="col text-right">
		                    	<a href="{{ url('admin-control/category/add') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Add Category</a>
		                        <button type="button" class="btn btn-primary btn-remove" ><i class="icon-bin"></i></button>
		                    </div>
		                </div>
	        			<div class="table-responsive">
					        <table border="1" style="width: 100%" class="table table-bordered" id="table_id">
					            <thead style="background: #1F262D; color: #fff;">
					                <tr>
					                	<th></th>
					                    <th>S.No.</th>
					                    <th>Category</th>
					                    <th>Parent Category</th>
					                    <th>Image</th>
					                    <th>action</th>
					                   
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
					                    <td>{{ $list->category }} </td>
					                    <td>{{ $list->parent }} </td>
					                    <td>@if($list->image!='')
					                        <img src="{{url('imgs/category/'.$list->image)}}" width="100">
					                        @else
					                        <img src="{{url('imgs/unavailable-image-300x225.jpg')}}" width="100">
					                        @endif
					                    </td>
					                    <td>
					                    	<!-- @if(!$list->category_count) -->
						                    	<a href="{{ url('admin-control/category/edit/'.$list->id) }}">EDIT</a>&nbsp;|
		                    					<a href="{{ url('admin-control/category/remove/'.$list->id) }}"onclick="return confirm('Are you sure you want to delete this item?');">DELETE</a>
		                    				<!-- @else
		                    					{{ $list->category_count }} offers / survey found.
	                     					@endif -->
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