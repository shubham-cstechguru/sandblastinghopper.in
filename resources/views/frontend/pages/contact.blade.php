@extends('frontend.layouts.default')
@section('title','Contact - Sand Blasting Hopper for Sale | Sand Blasting Machine in India')
@section('description','Contact - Sand Blasting Hopper for Sale, Sandblasting Machine in India - Supplying Sand Blasting Machine, Manufacturing & wholesaling Sandblaster in India. Get Sand Blasting Machine, sand blasting hopper, sand blasting cabinet, sand blasting room, paint booth at best price.')
@section('keyword','Sand Blasting Hopper for Sale, Sand blasting Machine in India, sand blaster, sandblasting machine, sand blasting cabinet')

@section('canonical',URL::current())
@section('contant')
<div class="page-top-info row">
	<div class="container">
		<h4>Contact</h4>
		<div class="site-pagination">
			<a href="#">Home</a> / Contact
		</div>
	</div>
</div>


<section class="contact-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12 contact-info">

				{{ Form::open(['id'=>'contact_form', 'data-url'=>route('contact-route') ,'class'=>'contact-form mb-5']) }}
				<div class="row">
					<div class="col-sm-6 col-lg-6">
						<div class="form-group">
							<input type="text" name="contact_name" id="contact_name" class="form-control name" required data-error="Please enter your name" placeholder="Name">
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-6">
						<div class="form-group">
							<input type="email" name="contact_email" id="contact_email" class="form-control" required data-error="Please enter your email" placeholder="Email">
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-6">
						<div class="form-group">
							<input type="tel" name="contact_mobile" id="contact_mobile" required data-error="Please enter your number" class="form-control mobile" placeholder="Phone">
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-6">
						<div class="form-group">
							<input type="text" name="contact_country" id="contact_country" class="form-control name" required data-error="Please enter your subject" placeholder="Subject">
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="col-md-12 col-lg-12">
						<div class="form-group">
							<textarea name="contact_message" class="form-control" id="contact_message" cols="30" rows="8" required data-error="Write your message" placeholder="Message"></textarea>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<p class="text-success" id="res_message"></p>
					<div class="col-md-12 col-lg-12">
						<button type="submit" class="btn" style="background:#565454;color:#fff;">
							Send Message
						</button>
						<div class="clearfix"></div>
					</div>
				</div>
				{{ Form::close() }}


			</div>

			<div class="col-lg-4 col-12">
				<h3 class="">Get in touch</h3>
				<p><span><i class="icon-location"></i></span>&nbsp;{{ $setting->address }}</p>
				</p>
				<p><span><i class="icon-whatsapp"></i></span>&nbsp;{{ $setting->mobile_no }}</p>
				<p><span><i class="icon-envelop"></i></span>&nbsp;<a href="" class="__cf_email__" data-cfemail="422a2d31362b2c2502212d2c362321366c212d2f">{{ $setting->email }}</a></p>
				<div class="contact-social">
					<a href="{{ $setting->instagram }}"><i class="icon-instagram"></i></a>
					<a href="{{ $setting->facebook }}"><i class="icon-facebook"></i></a>
					<a href="{{ $setting->youtube }}"><i class="icon-youtube"></i></a>
					<!-- <a href="#"><i class="icon-dribbble"></i></a>
					<a href="#"><i class="icon-behance"></i></a> -->
				</div>
			</div>
		</div>
		<div style="width: 100%"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=boranada,%20jodhpur,%20india+(blastrooms)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
	</div>
</section>




@stop