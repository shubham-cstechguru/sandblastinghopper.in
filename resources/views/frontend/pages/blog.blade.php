@extends('frontend.layouts.default')
@section('title','Blog - Sand Blasting Hopper for Sale | Sand Blasting Machine in India')
@section('description','Blog on Sand Blasting Hopper for Sale, Sandblasting Machine in India - Supplying Sand Blasting Machine, Manufacturing & wholesaling Sandblaster in India. Get Sand Blasting Machine, sand blasting hopper, sand blasting cabinet, sand blasting room, paint booth at best price.')
@section('keyword','Sand Blasting Hopper for Sale, Sand blasting Machine in India, sand blaster, sandblasting machine, sand blasting cabinet')

@section('canonical',URL::current()) 
@section('contant')

<div class="page-top-info row">
<div class="container">
<h4>Blog</h4>
<div class="site-pagination">
<a href="{{ url('/') }}">Home</a> / Blog
</div>
</div>
</div>

        <!--</section>-->
<section class="row product-filter-section py-5">
    <div class="container">
        <div class="section-title">
            <h2 class="text-center">BLOGS</h2>
            <p class="pt-2 text-center my-5">Our organization consists of highly skilled professionals who have great knowledge in this domain and are very well aware of the standards and norms of the industry.</p>
        </div>
        <div class="row">
            @foreach($blog as $list)
                <div class="col-lg-3 col-sm-6 mb-1">
                    <div class="product-item">
                        <div class="pi-pic">
                            <div class="card">
                                <a href="{{ url('blog/'. $list->slug)}}">
                                    @if($list->image!='')
    								<img src="{{url('imgs/blogs/'.$list->image)}}" alt="{{ $list->title }}" width="251">
    								@else
    								<img class="" src="{{url('imgs/unavailable-image-300x225.jpg')}}" alt="{{ $list->title }}">
    								@endif
                                </a>
                                <div class="pi-text my-3" style="min-height:50px;">
                                    <a href="{{ url('blog/'. $list->slug)}}" style="padding:0;">
                                        <p class="text-center font-weight-bold">{{$list->title}}</p>
                                    </a>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@stop
