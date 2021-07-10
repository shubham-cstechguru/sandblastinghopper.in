@extends('frontend.layouts.default')
@section('title','Sand Blasting Hopper for Sale | Sand Blasting Machine in India')
@section('description','Sand Blasting Hopper for Sale, Sandblasting Machine in India - Supplying Sand Blasting Machine, Manufacturing & wholesaling Sandblaster in India. Get Sand Blasting Machine, sand blasting hopper, sand blasting cabinet, sand blasting room, paint booth at best price.')
@section('keyword','Sand Blasting Hopper for Sale, Sand blasting Machine in India, sand blaster, sandblasting machine, sand blasting cabinet')
@section('canonical',URL::current())
@section('contant')
<div class="responsive my-4" style="margin:10px 0;">
  @foreach($product as $list)
  <div class="col-lg-3 col-sm-6 mb-1">
    <div class="product-item">
      <div class="pi-pic">
        <div class="card">
          <a href="{{ url('product/'. $list->slug)}}">
            @if($list->image!='')
            <img src="{{url('imgs/product/'.$list->image)}}" alt="{{ $list->title }}">
            @else
            <img class="" src="{{url('imgs/unavailable-image-300x225.jpg')}}" alt="{{ $list->title }}">
            @endif
          </a>
          <div class="pi-text" style="min-height:50px;">
            <a href="{{ url('product/'. $list->slug)}}" style="padding:0;">
              <p class="text-center font-weight-bold my-3 font-color mx-2" style="overflow: hidden; min-width: 5ch;  max-width: 45ch; text-overflow: ellipsis; white-space: nowrap;">{{$list->title}}</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endforeach

</div>

<div class="mt-0" style="margin-bottom: 100px;">
  <div class="row self-adhesive-head">
    <a href="" style="width: 20px;"><img src="{{ url('imgs/zero.gif')}}" alt="Self-Adhesive Specialty Tapes &amp; Labels"></a>
    <strong>
      <span class="cpo">
        <a href="selfadhesive-tapes-labels.html">Sand Blasting Machine & Blast Rooms Labels</a>
      </span>
    </strong>
  </div>
  <div class="adhesive-list mt-4">
    <ul>
      @foreach($category as $list)
      <li><a href="{{url('category/'.$list->slug_category)}}"> {{ $list-> category }}</a></li>
      @endforeach
    </ul>
  </div>
  <!-- <a href="" class="btn btn-link float-right home-view" style="text-decoration:none;">View All</a> -->
</div>
<div>
  <div>
    <div>
      <h1 class="my-4 text-center" style="display:inline-block;font-size:1.2rem;"> <span style="font-size:1.2rem">Welcome to </span style="font-size:1.5rem">Sand Blasting Hopper Manufacturer's in India
      </h1>

      <div class="cosmos-list">
        <ul class="row">
          <li class="col-6 col-md-4 m-0">
            <span></span>Nature of Business<br>
            <span class="btm">Manufacturer</span>
          </li>
          <li class="col-6 col-md-4 m-0">
            <span></span>Total Number of Employees<br>
            <span class="btm">26 to 50 People</span>
          </li>
          <li class="col-6 col-md-4 m-0">
            <span></span>Year of Establishment<br>
            <span class="btm">2000</span>
          </li>
          <li class="col-6 col-md-4 m-0">
            <span></span>Legal Status of Firm<br>
            <span class="btm">Limited Company (Ltd./Pvt.Ltd.)</span>
          </li>
          <li class="col-6 col-md-4 m-0">
            <span></span>Annual Turnover<br>
            <span class="btm">Rs. 2 - 5 Crore</span>
          </li>
          <li class="col-6 col-md-4 m-0">
            <span class="blow etaSpt gstn"></span>GST No.<br>
            <span class="btm">09AACCC5777D1ZK</span>
          </li>
        </ul>
      </div>
      <!-- Start Section -->
      <div class="row" id="data_align">
        <div class="col-lg-7">
          <p>Our company is manufacturing a good range of <b><a href="https://www.airoshotblast.net/main-product/41-Sand-Blasting-Machine" target="_blank">Sand Blasting Machine</a>, <a href="https://www.shotblastingmachines.in/airless-shot-blasting/" target="_blank">Shot Blasting Machine</a>, <a href="https://www.sandblastingmachine.in/sand-blasting-cabinet/" target="_blank">Sand Blasting Cabinet</a>,<a href="http://www.blaster.co.in/shot-blasting-room/" target="_blank">Blast Room</a>, Dust Collector Unit, Industrial Blowers, etc</b>, and supplier of pneumatically operated & wheel operated shot blasting machines which are at par fulfilling international quality standards. Except for standardized models, it manufactures custom-built machines as per consumer requirements. The products are thoroughly tested by the quality department & rigorous development is achieved by a professional design team in bringing new concepts. The company offers Cost-Effective, Genuine, and Unmatched Spares for all kind of Sand/Shot Blasting Machines. We also supply superior quality safety wears and we are the leading suppliers and exporters of premium quality Abrasives.</p>

        </div>
        <div class="col-lg-5">
          <div class="side-contant sticky">
            <div class="m8 sw1">
              <img src="imgs/hopper.jpg" ALT="" class="side-img-brdr">
            </div>
            <div style="clear:both"></div>
          </div>
        </div>
      </div>
      <div class="row" id="data_align">

        <div class="pl-3 pr-3">
          <h2 class="other-heading">Sand blasting manufacturer's Strengths</h2>
          <p>Backed by huge industry experience and business policies, we have acquired a preeminent position in the market. Our clients have appreciated our efforts and showed their support by placing repetitive order of products. Following factors helped us make a mark in the industry:</p>

          <h2 class="other-heading">Sand blasting machines operating instruction:</h2>
          <p>When you use the sand blasting machine/sandblasting hopper/sand blaster/ sand blasting cabinet, then first of all turn the air ON at the compressor, and then open the abrasive metering valve. The operative should protect him/herself with suitable clothing, helmet, and air breathing supply; adjust the air breathing
            supply using the valve on the belt. Place the deadman's handle in the open position, close the pet cock on the RCV-1 valve. Adjust the drain cock on the water separator to allow a constant bleed of air/water vapour. Hold the blast hose and holder securely. ALWAYS THE NOZZLE AT THE WORK PIECE, NEVER ANYWHERE ELSE AND NEVER NEAR TO PEOPLE.
            Pressurise the machine by closing deadman's handle, the pop-up value will close the sealing ring, air will then pass through the nozzle. Purge the machine by permitting the air to discharge through the nozzle thus expelling any moisture which may have accumulated when the machine has been not use.
            Depressurise the machine by either releasing the deadman's handle or opening the pet cock on the RCV-1 valve. Close the abrasive metering valve.
          </p>
          <h2 class="other-heading">How to operate Sand blasting machine/cabinet/hopper:</h2>
          <p>
            First of all open the mini ball valve of RCV; check that the abrasive sieve is in position. Load the chosen abrasive into the machine through the sieve, allowing if to flow through the filler hole in the centre of the conave head. close the pet cock and direct the nozzle towards the work piece and close the deadman's handle.
          </p>
          <p>The machine will pressurise and air will pass through nozzle. The pot render will open the abrasive metering valve slowly, allowing the introduction of the abrasive media into the air stream. Adjust the valve to maintain the minimun amount of abrasive into the air stream</p>
          <p>To close the sand blasting machine/sand blasting hopper/sand blasting cabinet down pressurise it by either by releasing the deadman's handle or opening the pet cock on the RCV-1 valve. Empty sand blasting machine/hopper/cabinet of abrasive, otherwise it will become damp and obstruct the flow on restarting.</p>
          <ul>
            <li>Ethical Business Practices</li>
            <li>Quality Products</li>
            <li>Precision Work</li>
            <li>Competitive Prices</li>
            <li>Timely Delivery</li>
          </ul>
        </div>
      </div>
      <!-- End Section -->
      <!--</section>-->
      <section class="row product-filter-section py-5 my-4" style="background: #f1f1f1;">
        <div class="container">
          <div class="section-title">
            <p class="text-center other-heading mb-4">BLOGS</p>
            <p class="py-4 text-center">Our organization consists of highly skilled professionals who have great knowledge in this domain and are very well aware of the standards and norms of the industry.</p>
          </div>
          <div class="row">
            @foreach($blog as $list)
            <div class="col-lg-3 col-6 col-sm-6 mb-1">
              <div class="product-item">
                <div class="pi-pic">
                  <div class="card">
                    <a href="{{ url('blog/'. $list->slug)}}">
                      @if($list->image!='')
                      <img src="{{url('imgs/blogs/'.$list->image)}}" alt="{{ $list->title }}">
                      @else
                      <img class="" src="{{url('imgs/unavailable-image-300x225.jpg')}}" alt="{{ $list->title }}">
                      @endif
                    </a>
                    <div class="pi-text my-3" style="min-height:50px;">
                      <a href="{{ url('blog/'. $list->slug)}}" style="padding:0;">
                        <p class="text-center font-weight-bold  blog-title font-color mx-1" style="overflow: hidden; min-width: 5ch;  max-width: 45ch; text-overflow: ellipsis; white-space: nowrap;">{{$list->title}}</p>
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

      <!-- Start Section -->
      <div class="tell-us-contant mt-5">
        <p class="tell-us-head">Tell Us What Are You Looking For ?</p>
        <form class="mx-3">

          <textarea class="form-control form-group" rows="4" cols="100" placeholder="Describe Your requirement in details :"></textarea>
          <input type="number" name="number" class="form-control form-group" placeholder="Enter Your Number">
          <input type="text" name="name" class="form-control form-group" placeholder="Enter Your Name">
          <button class="btn search-btn mb-3" style="margin: auto;">Send it Now</button>
        </form>
      </div>


      @stop