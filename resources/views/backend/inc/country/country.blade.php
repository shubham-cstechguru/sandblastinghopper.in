@extends('backend.layout.master')

@section('title','country')

@section('contant')
<div class="page-wrapper p-5">
    @if (\Session::has('success'))
    <div class="alert alert-success" style="color: green">
        {!! \Session::get('success') !!}</li>
    </div>
    @endif
    <h2 style="text-align: center; padding: 50px 0;"> Country </h2>
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
                    <form method="POST" action="{{ isset($country) ? route('country.update', $country->id) : route('country.store') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        @if(isset($country))
                        @method('PUT')
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="countryName">Country Name</label>
                                <input required type="text" name="record[name]" class="form-control" id="countryName" aria-describedby="countryNameHelp" placeholder="Enter Country Name" value="{{ isset($country) ? $country->name : '' }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="countryShortname">Country Shortand</label>
                                <input required type="text" name="record[short_name]" class="form-control" id="countryShortname" aria-describedby="countryCodeHelp" placeholder="Enter Country Code" value="{{ isset($country) ? $country->short_name : '' }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="countryCode">Country Code</label>
                                <input required type="tel" name="record[code]" class="form-control" id="countryCode" aria-describedby="countryCodeHelp" placeholder="Enter Country Code" value="{{ isset($country) ? $country->code : '' }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">{{ isset($country) ? 'Update' : 'Save' }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card mb-4">
                @if(isset($country))
                <div class="card-header text-right">
                    <a type="button" name="button" class="btn btn-success" href="{{ route('country.create') }}">
                        <i class="fas fa-plus mr-1"></i>
                        Add Country
                    </a>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table border="1" style="width: 100%" class="table table-bordered" id="table_id">
                            <thead style="background: #1F262D; color: #fff;">
                                <tr>
                                    <th>Number</th>
                                    <th>Country name</th>
                                    <th>Country shortand</th>
                                    <th>Country code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($countries as $country)
                                <tr>
                                    <td>{{ $i++ }}.</td>
                                    <td>{{ $country->name }}</td>
                                    <td>{{ $country->short_name }}</td>
                                    <td>{{ $country->code }}</td>
                                    <td>
                                        <a type="button" name="button" class="btn btn-info" href="{{ route('country.edit', $country->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a type="button" name="button" class="btn btn-danger" href="javascript:void(0)" onclick="handleDelete({{ $country->id }})">
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
                                            <h5 class="modal-title" id="deleteModalLabel">Delete Country</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="" id="deletename" value="country" />
                                            Are you sure to want to Delete This Country ?
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