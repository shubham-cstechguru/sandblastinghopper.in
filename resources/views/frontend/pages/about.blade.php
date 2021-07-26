@extends('frontend.layouts.default')
@section('title','About - Sand Blasting Machine in India, Sand Blasting Hopper for Sale')
@section('description','Sandblasting Machine in India, Sand Blasting Hopper for Sale - Supplying Sand Blasting Machine, Manufacturing & wholesaling Sandblaster in India. Get Sand Blasting Machine, sand blasting hopper, sand blasting cabinet, sand blasting room, paint booth at best price.')
@section('keyword','Sand Blasting Hopper for Sale, Sand blasting Machine in India, sand blaster, sandblasting machine, sand blasting cabinet')

@section('canonical',URL::current()) 

@section('contant')

    <!-- section -->
         <div class="section about_section layout_padding padding_top_0">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 pb-5">
                     <div class="full">
                        <div class="heading_main text_align_center pt-5">
                           
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                     <div class="full text_align_center" style="padding:0px; text-align: center;">
                        <img class="img-responsive lazy-load" src="{{ url('imgs/loader_2.gif') }}" data-src="{{url('imgs/abouts/'.$about->image)}}" alt="Adhesive Tape Manufacturer in India"/>   
                      </div>
                  </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-5">
                    <div class="full">
                        <div class="heading_small pb-4">
                          <p class="other-heading">{{ $about->title }}</p>
                        </div>
                    </div>
                       <div class="description product-desc">{!! $about->description !!}</div>
                  </div>
                 
               </div>
            </div>
         </div>
         <!-- end section -->

@stop