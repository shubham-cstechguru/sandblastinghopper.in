@extends('frontend.layouts.default')
@section('title','Product - Sand Blasting Hopper for Sale | Sand Blasting Machine in India')
@section('description','Product - Sand Blasting Hopper for Sale, Sandblasting Machine in India - Supplying Sand Blasting Machine, Manufacturing & wholesaling Sandblaster in India. Get Sand Blasting Machine, sand blasting hopper, sand blasting cabinet, sand blasting room, paint booth at best price.')
@section('keyword','Sand Blasting Hopper for Sale, Sand blasting Machine in India, sand blaster, sandblasting machine, sand blasting cabinet')

@section('canonical',URL::current())
@section('contant')

<div class="page-top-info row">
    <div class="container">
        @if(isset($name))
        <h4>{{ $name }}</h4>
        @else
        <h4>Products</h4>
        @endif
        <div class="site-pagination">
            <a href="{{ url('/') }}">Home</a> /
            @if(isset($name)) {{ $name }} @else Product @endif
        </div>
    </div>
</div>

<!--</section>-->
<section class="row product-filter-section py-5">
    <div class="container">
        <div class="section-title">
            @if(isset($name))
            <h2 class="text-center" style="text-transform: uppercase;">{{ $name }}</h2>
            @else
            <h2 class="text-center" style="text-transform: uppercase;">PRODUCTS</h2>
            @endif
            <p class="pt-2 text-center my-5">Our organization is known to be one of the truthworthy Supplier, Manufacturers, and Exporters of the Shot Blasting Machines, Sandblasting machine, Thermal Spray Guns, and Abrasive Blasting Media.</p>
        </div>
        <div class="row">
            @foreach($product as $list)
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="product-item">
                    <div class="pi-pic">
                        <div class="card">
                            <a href="{{url('product/'.$list->slug) }}">
                                @if($list->image!='')
                                <img src="{{url('imgs/product/'.$list->image)}}" alt="{{ $list->title }}" width="251">
                                @else
                                <img class="" src="{{url('imgs/unavailable-image-300x225.jpg')}}" alt="{{ $list->title }}">
                                @endif
                            </a>
                            <div class="pi-text my-3" style="min-height:50px;">
                                <a href="{{ route('productindex', $list->slug) }}" style="padding:0;">
                                    <p class="text-center font-weight-bold">{{$list->title}}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $product->links() }}
    </div>
</section>

@stop