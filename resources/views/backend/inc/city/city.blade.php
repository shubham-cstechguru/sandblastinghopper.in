@extends('backend.layout.master')

@section('title','city')

@section('contant')
<div class="page-wrapper p-5">
    @if (\Session::has('success'))
    <div class="alert alert-success" style="color: green">
        {!! \Session::get('success') !!}</li>
    </div>
    @endif
    <h2 style="text-align: center; padding: 50px 0;"> City </h2>
    <div class="row">
        <div class="col-lg-5">
            <div class="card mb-4">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                        <li class="list-group-item text-danger">
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ isset($city) ? route('city.update', $city->id) : route('city.store') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        @if(isset($city))
                        @method('PUT')
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="countryName">City Name</label>
                                <input required type="text" name="record[name]" class="form-control" id="countryName" aria-describedby="countryNameHelp" placeholder="Enter City Name" value="{{ isset($city) ? $city->name : '' }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="countryShortname">City Shortand</label>
                                <input type="text" name="record[short_name]" class="form-control" id="countryShortname" aria-describedby="countryCodeHelp" placeholder="Enter City Shortand" value="{{ isset($city) ? $city->short_name : '' }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="countryCode">Country</label>
                                <select class="form-control" name="record[country_id]" id="countryCode">
                                <option value="">-- Select option --</option>
                                    @foreach($countries as $c)
                                    <option value="{{ $c->id }}" @if(isset($city)) @if($c->id == $city->country_id)
                                        selected
                                        @endif
                                        @endif
                                        >{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">{{ isset($city) ? 'Update' : 'Save' }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card mb-4">
                @if(isset($city))
                <div class="card-header text-right">
                    <a type="button" name="button" class="btn btn-success" href="{{ route('city.create') }}">
                        <i class="fas fa-plus mr-1"></i>
                        Add City
                    </a>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table border="1" style="width: 100%" class="table table-bordered" id="table_id">
                            <thead style="background: #1F262D; color: #fff;">
                                <tr>
                                    <th>Number</th>
                                    <th>City name</th>
                                    <th>City shortand</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($cities as $city)
                                <tr>
                                    <td>{{ $i++ }}.</td>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->short_name }}</td>
                                    <td>{{ @$city->country->name }}</td>
                                    <td>
                                        <a type="button" name="button" class="btn btn-info" href="{{ route('city.edit', $city->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a type="button" name="button" class="btn btn-danger" href="javascript:void(0)" onclick="handleDelete({{ $city->id }})">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form class="" action="" method="POST" id="deleteFormModal">
                                    {!! csrf_field() !!}
                                    @method('DELETE')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Delete City</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="" id="deletename" value="city" />
                                            Are you sure to want to Delete This City ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection