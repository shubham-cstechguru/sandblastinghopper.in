@php
$setting = App\Model\Setting::findOrFail(1);
$blog = App\model\Blog::latest()->paginate(2);
$cities = App\model\City::get();
$countries = App\model\Country::get();
$date = date('Y');

$whatsapp = preg_replace('/[+\(\)\-\" "]+/', '', $setting->whatsapp);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ url('imgs/'.$setting->fav_icon) }}">
  <title>@yield('title')</title>
  <meta name="keywords" content="@yield('keywords')">
  <meta name="description" content="@yield('description')">
  <link rel="canonical" href="@yield('canonical')" />
  <meta name="author" content="Shrawan Choudhary">
  <!-- opengraph tag -->
  <meta property="og:site_name" content="Sandblasting hopper">
  <meta property="og:url" content="@yield('canonical')">
  <meta property="og:type" content="website">
  <meta property="og:title" content="@yield('title')" />
  <meta property="og:description" content="@yield('description')" />
  <meta property="og:image" content="" />
  <!-- Schema.org for Google -->
  <meta itemprop="name" content="Sandblasting hopper">
  <meta itemprop="description" content="@yield('description')">
  <meta itemprop="image" content="">
  <!-- Twitter -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="@yield('title')">
  <meta name="twitter:description" content="@yield('description')">
  <meta name="twitter:site" content="@Sandblasting hopper">
  <meta name="twitter:creator" content="@Suncity Group">
  <meta name="twitter:image:src" content="">
  <meta name="csrf-token" content="{{csrf_token()}}">

  {{Html::style('css/bootstrap.min.css')}}
  {{Html::style('css/style.css')}}
  {{Html::style('css/responsive.css')}}
  {{Html::style('icomoon/style.css')}}
  {{Html::style('css/fontawesome.css')}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="shortcut icon" href="#" type="image/x-icon" />
  <link rel="apple-touch-icon" href="#" />
  <style>
    .sticky-container {
      /*background-color: #333;*/
      padding: 0px;
      margin: 0px;
      position: fixed;
      right: -162px;
      top: 230px;
      width: 200px;

    }

    /* style p when hover li */
    .sticky-first li:hover p {
      float: right;
    }

    .sticky li {
      list-style-type: none;
      /* background-color: #333; */
      color: #efefef;
      height: 43px;
      padding: 0px 10px;
      margin: 0px 0px 1px 0px;
      -webkit-transition: all 0.25s ease-in-out;
      -moz-transition: all 0.25s ease-in-out;
      -o-transition: all 0.25s ease-in-out;
      transition: all 0.25s ease-in-out;
      cursor: pointer;


    }

    .sticky li i {
      font-size: 24px;
    }

    .sticky li:hover {
      margin-left: -115px;
      /*-webkit-transform: translateX(-115px);
		-moz-transform: translateX(-115px);
		-o-transform: translateX(-115px);
		-ms-transform: translateX(-115px);
		transform:translateX(-115px);*/
      /*background-color: #8e44ad;*/

    }

    .sticky li img {
      float: left;
      margin: 5px 5px;
      margin-right: 10px;

    }

    .sticky li p {
      padding: 0px;
      margin: 0px;
      text-transform: uppercase;
      line-height: 43px;

    }
  </style>
</head>

<body class="">
  <div class="container show_body">
    @section('header')

    <div class="row py-1" style="background:#606160;">
      <div class="pull-right ml-4" style="position:relative;">
        <span class="header-mobile f-13" onclick="open_pop()" style="color:#fff;margin-right:12px;"><i class="icon-envelop insta-bg" style="color:#fff;"></i> Send Email </span>
      </div>|
      <div class="text-left">
        <span class="header-mobile"><a href="tel:{{ $setting->mobile_no }}" style="position:relative;" class="f-13"><i class="icon-phone insta-bg" style="color:#fff;margin-left: 12px;"></i><span style="color:#fff;"> {{ $setting->mobile_no }}</span></a></span>
      </div>
      <div class="text-right float-right mr-4 top-social-i" style="margin-left:auto;">
        <a href=""><i class="icon-pinterest insta-bg"></i></a>
        <a href=""><i class="icon-facebook insta-bg"></i></a>
        <a href=""><i class="icon-instagram insta-bg"></i></a>
        <a href=""><i class="icon-twitter insta-bg"></i></a>

      </div>

    </div>
    <div class="row " style="background-color: #fff;-webkit-box-shadow: 0px 6px 10px -5px rgba(0,0,0,0.75);position: sticky;top: 0;z-index: 2;">
      <!-- <div class="col-lg-4 col-3">
        <a href="{{url('/')}}" class="navbar-brand" style="padding:0px;margin-left:15px;">
          <img src="{{ url('imgs/'.$setting->logo) }}" alt="{{ $setting->sitename }}">
        </a>
      </div> -->
      <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light">

          <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{ url('imgs/'.$setting->logo) }}" alt="$setting->sitename" alt="">
          </a>

          <button class="navbar-toggler" style="margin-left:auto;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse my-3" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item" style="text-align:right;">
                <a class="nav-link" href="{{ url('/') }}">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/about') }}">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/product') }}">Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/blog') }} ">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
              </li>
            </ul>

          </div>
        </nav>
      </div>
    </div>
    @show
    @yield('contant')
    @section('footer')
    <section class="row footer-section">
      <div class="container mb-4">
        <div class="section-title" style="color: #fff;">
          <p class="text-center other-heading">LOCATIONS</p>
        </div>
        <div class="city-links text-left">
          @foreach($cities as $c)
          <a href="{{ route('frontcity', $c->slug) }}" class=""><i class="icon-location mr-1"></i>{{ $c->name }}</a>
          @endforeach
        </div>

        <div class="city-links text-left">
          @foreach($countries as $c)
          <a href="{{ route('frontcountry', $c->slug) }}" class=""><i class="icon-location mr-1"></i>{{ $c->name }}</a>
          @endforeach
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-sm-6">
            <div class="footer-widget about-widget">

              <p class="footer-heading">About</p>
              <p>Abrasive blasting, more commonly known as sandblasting, is the operation of forcibly propelling a stream of abrasive material against a surface under high pressure to smooth a rough surface, roughen a smooth surface, shape a surface or remove surface contaminants.</p>

            </div>
          </div>
          <div class="col-lg-2 col-sm-6">
            <div class="footer-widget about-widget">
              <p class="footer-heading">Quick Link</p>
              <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About Us</a></li>
                <li><a href="{{ url('/blog') }}">Blog</a></li>
                <li><a href="{{ url('/product') }}">Product</a></li>
                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
              </ul>

            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="footer-widget about-widget">
              <p class="footer-heading">Top Blog</p>
              <div class="fw-latest-post-widget">
                @foreach( $blog as $list )
                <div class="lp-item">
                  <div class="lp-thumb set-bg">
                    <a href="{{ url('blog/'. $list->slug)}}">
                      @if($list->image!='')
                      <img class="lazy-load" src="{{ url('imgs/loader_2.gif') }}" data-src="{{url('imgs/blogs/'.$list->image)}}" alt="{{ $list->title }}">
                      @else
                      <img class="lazy-load" src="{{ url('imgs/loader_2.gif') }}" data-src="{{url('imgs/unavailable-image-300x225.jpg')}}" alt="{{ $list->title }}">
                      @endif
                    </a>
                  </div>
                  <div class="lp-content">
                    <p class="footer-blog mb-0">{{ $list->title }}</p>
                    {{--<span>{{ $list->updated_at }}</span>--}}
                    {{-- <a href="{{ url('blog/'. $list->slug)}}" class="readmore">Read More</a>--}}
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="footer-widget contact-widget">
              <p class="footer-heading">Get in Touch</p>
              <div class="con-info">
                <span><i class="icon-office"></i></span>
                <p> {{ $setting->sitename }} </p>
              </div>
              <div class="con-info">
                <span><i class="icon-location"></i></span>
                <p>{{ $setting->address }}</p>
              </div>
              <div class="con-info">
                <span><i class="icon-whatsapp"></i></span>
                <p><a href="https://wa.me/{{ $whatsapp }}" target="_blank" rel="noopener noreferrer" style="color: #fff;">{{ $setting->whatsapp }}</a></p>
              </div>
              <div class="con-info">
                <span><i class="icon-envelop"></i></span>
                <p><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="social-links-warp text-center">
        <div class="container">
          <div class="social-links text-center">
            <a href="{{ $setting->instagram }}" class="instagram"><i class="icon-instagram"></i><span>instagram</span></a>
            {{-- <a href="{{ $setting-> }}" class="google-plus"><i class="icon-google-plus"></i><span>g+plus</span></a>
            <a href="{{ $setting-> }}" class="pinterest"><i class="icon-pinterest"></i><span>pinterest</span></a>
            <a href="{{ $setting-> }}" class="tumblr"><i class="icon-tumblr-square"></i><span>tumblr</span></a>
            <a href="{{ $setting-> }}" class="twitter"><i class="icon-twitter"></i><span>twitter</span></a>--}}
            <a href="{{ $setting->facebook }}" class="facebook"><i class="icon-facebook"></i><span>facebook</span></a>
            <a href="{{ $setting->youtube }}" class="youtube"><i class="icon-youtube"></i><span>youtube</span></a>
          </div>

          <p class="text-white text-center mt-5">Copyright &copy; {{$date}} All rights reserved {{ $setting->sitename }}. Website Design and Developed by A2ZProviders</a></p>

        </div>
      </div>
    </section>
    @show
  </div>
  </div>
  </div>
  </div>
  <div class="sticky-container">
    <ul class="sticky">
      <li style="background-color: #333;">
        <p><a href="tel:{{ $setting->mobile_no }}"><i class="icon-phone"></i> Call Now</a></p>
      </li>
      <li style="background-color: #333;">
        <p><a href="mailto:{{ $setting->email }}"><i class="icon-envelop"></i> Mail Us</a></p>
      </li>
      <li style="background-color: #333;">
        <p><a href="https://wa.me/{{ $whatsapp }}"><i class="icon-whatsapp"></i> WhatsApp</a></p>
      </li>
    </ul>
  </div>

  <!-- ALL JS FILES -->
  {{ Html::script('js/jquery.min.js') }}
  {{ Html::script('js/popper.min.js') }}
  {{ Html::script('js/bootstrap.min.js') }}
  {{ Html::script('js/ajax.js') }}

  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <p class="modal-title">Send Enquiry</p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="ajax_message"></p>
          {{ Form::open(['id'=>'inquiry_form', 'data-url'=>route('ajax-route')]) }}
          <div class="modal-body mx-3">

            <div class="md-form form-group">
              <label data-error="wrong" data-success="right" for="user_name" style="float:left;">User name</label>
              {{ Form::text('user_name', '', ['class' => 'form-control validate name', 'id'=>'user_name', 'placeholder'=>'User name','required'=>'required'])}}
            </div>
            <div class="md-form form-group">
              <label data-error="wrong" data-success="right" for="user_email" style="float:left;">Enter user email</label>
              {{ Form::email('user_email', '', ['class' => 'form-control validate', 'id'=>'user_email', 'placeholder'=>'User email','required'=>'required'])}}
            </div>
            <div class="md-form form-group">
              <label data-error="wrong" data-success="right" for="user_mobile" style="float:left;">Your Mobile No.</label>
              {{ Form::tel('user_mobile', '', ['class' => 'form-control validate mobile', 'id'=>'user_mobile', 'placeholder'=>'User mobile number','required'=>'required'])}}
            </div>

            <div class="md-form form-group mb-4">
              <label data-error="wrong" data-success="right" for="user_message" style="float:left;">Message</label>
              {{ Form::textarea('user_message', '', ['class' => 'form-control validate', 'id'=>'user_message', 'placeholder'=>'Item name','required'=>'required', 'rows'=>3])}}
            </div>
          </div>
          <div class="ml-4 mb-4 d-flex">
            <button class="btn btn-warning" type="submit">Send Inquiry</button>
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
  {{ Html::script('//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js') }}
  <script>
    function open_pop() {
      $('.modal').modal('show');
    }
    $('.responsive').slick({

      infinite: true,
      speed: 3000,
      slidesToShow: 4,
      slidesToScroll: 4,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 5000,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: false,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  </script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180981805-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-180981805-1');
  </script>
  <script>
    $(window).on('load', function() {
      $('.lazy-load').each(function(event) {
        let self = $(this);
        self.attr('src', self.data('src')).removeAttr('data-src');

        self.on('load', function() {
          $(this).removeClass('lazy-load');
        });
      });
    });
  </script>

</body>

</html>