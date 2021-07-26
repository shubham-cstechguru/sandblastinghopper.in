<div class="container">
    <div class="section-title">
        @if(isset($name->name))
        <h2 class="text-center" style="text-transform: uppercase;">{{ $name->name }}</h2>
        @else
        <h2 class="text-center" style="text-transform: uppercase;">PRODUCTS</h2>
        @endif
        <p class="pt-2 text-center my-5">Our organization is known to be one of the truthworthy Supplier, Manufacturers, and Exporters of the Shot Blasting Machines, Sandblasting machine, Thermal Spray Guns, and Abrasive Blasting Media.</p>
    </div>
    <div class="row">

        @foreach($product as $list)
        <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
            <div class="product-item">
                <div class="pi-pic">
                    <div class="card">
                        <a href="{{url('product/'.$list->slug) }}">
                            @if($list->image!='')
                            <img class="lazy-load lazyimg" src="{{ url('imgs/loader_2.gif') }}" data-src="{{url('imgs/product/'.$list->image)}}" alt="{{ $list->title }}" width="251">
                            @else
                            <img class="lazy-load lazyimg" src="{{ url('imgs/loader_2.gif') }}" data-src="{{url('imgs/unavailable-image-300x225.jpg')}}" alt="{{ $list->title }}">
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
</div>