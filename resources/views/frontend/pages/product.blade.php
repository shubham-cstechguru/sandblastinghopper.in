@extends('frontend.layouts.default')
@section('title','Product - Sand Blasting Hopper for Sale | Sand Blasting Machine in India')
@section('description','Product - Sand Blasting Hopper for Sale, Sandblasting Machine in India - Supplying Sand Blasting Machine, Manufacturing & wholesaling Sandblaster in India. Get Sand Blasting Machine, sand blasting hopper, sand blasting cabinet, sand blasting room, paint booth at best price.')
@section('keyword','Sand Blasting Hopper for Sale, Sand blasting Machine in India, sand blaster, sandblasting machine, sand blasting cabinet')

@section('canonical',URL::current())
@section('contant')

<div class="row">
    <div class="col-lg-3 pt-4 pb-0 mt-1" id="sidebar_data">
        <div class="sticky">

            <p class="product-range my-0">Filter By Categories</p>
            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                <!-- Accordion card -->

                <div class="custom-card">

                    <!-- Card header -->

                    <div class="mx-2" role="tab" id="headingOne1">
                        @foreach( $category1 as $list )
                        <div class="form-check productfilter mt-2">
                            <div class="row">
                                <div class="col-2">
                                    <input type="checkbox" name="searchtext[]" class="form-check-input filter" id="{{ $list->id }}" value="{{ $list->id }}">
                                    <input type="hidden" name="name" class="form-check-input name" id="{{ @$name }}" value="{{ @$name->id }}">
                                    <input type="hidden" name="namec" class="form-check-input namec" id="{{ @$c }}" value="{{ @$c }}">
                                </div>
                                <div class="col-10">
                                    <label style="overflow: hidden; min-width: 5ch;  max-width: 25ch; text-overflow: ellipsis; white-space: nowrap;" for="{{ $list->id }}" class="form-check-label">{{ $list->category }}</label>
                                </div>
                            </div>
                        </div>
                      
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <span id="baseUrl" data-url="{{ route('productfilter') }}"></span>

    </div>

    <div class="col-lg-9 mt-1">
        <div class="page-top-info row">
            <div class="container">
                <div class="site-pagination">
                    <a href="{{ url('/') }}">Home</a> /
                    @if(isset($name)) {{ $name->name }} @else Product @endif
                </div>
            </div>
        </div>

        <!--</section>-->
        <section class="row product-filter-section py-5" id="prod_list">
            @include('frontend.templates.product', compact('product'))
        </section>
    </div>
</div>

@stop