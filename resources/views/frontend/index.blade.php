@extends('frontend.layouts.master-index')
@section('title','TYRE SHOP')
@section('main-content')
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    Exellent 4.6 out of 5 Trustpilot Trustp
                </div>
                <div class="col-md-7 text-right">
                    <a href="#!">Today: 7:00-19:00</a>
                    <a href="{{route('order.track')}}">Track Order</a>
                    @auth
                    @if(Auth::user()->role=='admin')
                        <a href="{{route('admin')}}">Dashboard</a>
                    @else
                        <a href="{{route('user')}}">Dashboard</a>
                    @endif
                    <a href="{{route('user.logout')}}">Logout

                        @else
                            <a href="{{route('login.form')}}">Login</a> <a href="{{route('register.form')}}">Register</a>
                            @endauth
                    </a>
                </div>
            </div>
        </div>
    </div>
<header class="header">
    <div class="top-head">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="d-flex align-items-center d-lg-block">
                        <div class="site-logo">
                            <a href="{{'/'}}"><img src="{{('public/frontend/assets/images/logo.png')}}" alt="" width="200"></a>
                        </div>
                        <a href="javascript:{}" class="toggleBtnMenu d-lg-none ml-auto text-white"><i class="toggler-menu icon fa fa-bars fa-2x" aria-hidden="true"></i></a>
                        <div class="ml-3 d-block d-lg-none mr-2">
                            <a href="#!" class="basket-wrap">
                                <i class="fas fa-shopping-basket fa-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="mainMenu">
                        <div class="body-overlay"></div>
                        <nav class="maindiv d-lg-flex justify-content-end">
                            <div class="menuHeader d-flex justify-content-between d-lg-none">
                                <a href="#!" rel="home" class="home-icon">
                                    <i class="fa fa-home"></i>
                                </a>
                                <a href="javascript:{}" class="closeMenu"><i class="fa fa-times"></i></a>
                            </div>
                            <ul>
                                <li class="current_page_item"><a href="#!">TYRES</a></li>
                                <li><a href="#!">WHEELS</a></li>
                                <li><a href="#!">CUSTOMER GUIDE</a></li>
                                <li><a href="#!">YOUR VEHICLE</a></li>
                                <li><a href="#!">VIEWED PRODUCTS</a></li>
                                <li><a href="{{url('fitting-station')}}">TYRE FITTING</a></li>
                            </ul>
                            <div class="ml-3 d-none d-lg-block">
                                <a href="#!" class="basket-wrap">

                                    <div class="sinlge-bar shopping">
                                        <a href="{{route('cart')}}" class="single-icon"><i class="fas fa-shopping-basket fa-lg"></i> <span class="total-count">{{Helper::cartCount()}}</span></a>
                                        <!-- Shopping Item -->
                                        @auth
                                        <div class="shopping-item">
                                            {{--<div class="dropdown-cart-header">--}}
                                                {{--<span>{{count(Helper::getAllProductFromCart())}} Items</span>--}}
                                                {{--<a href="{{route('cart')}}">View Cart</a>--}}
                                            {{--</div>--}}
                                            {{--<ul class="shopping-list">--}}
                                                 {{--{{Helper::getAllProductFromCart()}}--}}
                                                {{--@foreach(Helper::getAllProductFromCart() as $data)--}}
                                                    {{--@php--}}
                                                        {{--$photo=explode(',',$data->product['photo']);--}}
                                                    {{--@endphp--}}
                                                    {{--<li>--}}
                                                        {{--<a href="{{route('cart-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>--}}
                                                        {{--<a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>--}}
                                                        {{--<h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">{{$data->product['title']}}</a></h4>--}}
                                                        {{--<p class="quantity">{{$data->quantity}} x - <span class="amount">${{number_format($data->price,2)}}</span></p>--}}
                                                    {{--</li>--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}
                                            {{--<div class="bottom">--}}
                                                {{--<div class="total">--}}
                                                    {{--<span>Total</span>--}}
                                                    {{--<span class="total-amount">${{number_format(Helper::totalCartPrice(),2)}}</span>--}}
                                                {{--</div>--}}
                                                {{--<a href="{{route('checkout')}}" class="btn animate">Checkout</a>--}}
                                            {{--</div>--}}
                                        </div>
                                    @endauth
                                    <!--/ End Shopping Item -->
                                    </div>
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-banner">
        <div class="container">
            <div class="inner-container">
                <h1 class="text-white"><strong class="d-block">A new Level of Comfort</strong> Tested for your Safety</h1>
                <ul>
                    <li>Free Ground Shipping & Handling</li>
                    <li>Price Match Guarantee</li>
                    <li>Hassle-Free Returns</li>
                </ul>
            </div>
        </div>
    </div>
</header>
    <main class="main">
        <div class="container">
            <div class="search-tabs-wrap">

                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Search By Tyre Measurements</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Search By Vehicle</a>
                    </li>
                </ul>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="measurement-form">
                            <div class="row align-items-center">
                                <div class="col-xl-6">
                                    <form action="{{route('product-search')}}" method="POST">
                                        @csrf
                                    <div class="row">
                                        <div class="col-md-4 col-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Width</label>
                                                <div class="col-sm-8">
                                                    <select name="section" id="section" class="form-control">
                                                        @foreach($width_data as $width)
                                                            <option value="{{$width->section}}">
                                                                {{$width->section}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Height</label>
                                                <div class="col-sm-8">
                                                    <select name="profile" id="profile" class="form-control">
                                                        @foreach($height_data as $height)
                                                            <option value="{{$height->profile}}">
                                                                {{$height->profile}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Wheel Diameter</label>
                                                <div class="col-sm-8">
                                                    <select name="rim" id="rim" class="form-control">
                                                        @foreach($diameter_data as $diameter)
                                                            <option value="{{$diameter->rim}}">
                                                                {{$diameter->rim}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Brand</label>
                                                <div class="col-sm-8">
                                                    <select name="brand" id="brand" class="form-control">
                                                        @foreach($brand_data as $brand)
                                                            <option value="{{$brand->brand}}">
                                                                {{$brand->brand}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Season</label>
                                                <div class="col-sm-8">
                                                    <select name="season" id="season" class="form-control">
                                                        @foreach($season_data as $season)
                                                            <option value="{{$season->id}}">
                                                                {{$season->season}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Vehicle Type</label>
                                                <div class="col-sm-8">
                                                    <select name="vehicle_type" id="vehicle_type" class="form-control">
                                                        @foreach($vehicle_type_data as $vehicle_type)
                                                            <option value="{{$vehicle_type->vehicle_type}}">
                                                                {{$vehicle_type->vehicle_type}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">48 Hours Delivery</label><div class="d-inline-block ml-2"><i class="far fa-question-circle"></i></div>
                                            </div>
                                            <button class="btn btn-dark btn-block">Search</button>
                                        </div>
                                    </div>
                                 </form>
                                    <!-- Search By Vehicle -->
                                    <h4 class="mt-4">Search By Vehicle</h4>
                                    <form action="{{route('product-search')}}" method="POST">
                                        @csrf
                                    <div class="row">
                                        <div class="col-md-4 col-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Car Brand</label>
                                                <div class="col-sm-8">
                                                    <select name="brand" id="brand" class="form-control">
                                                        @foreach($brand_data as $brand)
                                                            <option value="{{$brand->brand}}">
                                                                {{$brand->brand}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Model</label>
                                                <div class="col-sm-8">
                                                    <select name="pattern" id="pattern" class="form-control">
                                                        @foreach($pattern_data as $pattern)
                                                            <option value="{{$pattern->pattern}}">
                                                                {{$pattern->pattern}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <button class="btn btn-dark btn-block">Search</button>
                                        </div>
                                    </div>
                                    </form>
                                    <!-- Search By Registeration Number -->
                                    <h4 class="mt-4">Search By Registeration Number</h4>
                                    <div class="row form-row align-items-center">
                                        <div class="col-md-3 col-6">
                                            <!-- New chagne -->
                                            <div class="car-number-plate form-group">
                                                <img src="{{('public/frontend/assets/images/number-plate.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-6 form-group">
                                            <input type="text" class="form-control" placeholder="Registeration Number">
                                        </div>
                                        <div class="col-md-4 col-6 form-group">
                                            <button class="btn btn-dark btn-block">Search</button>
                                        </div>

                                    </div>
                                </div>
                                <!-- New chagne add new div -->
                                <div class="col-xl-6">
                                    <div class="text-right tab-img mt-3 mt-xl-0">
                                        <img src="{{('public/frontend/assets/images/tab-car.jpg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-cat-wrap">
                <form action="{{route('product-search')}}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="product-cat-item">
                            <img src="{{asset('public/frontend/assets/images/box-img-1.jpg')}}" alt="">
                            <div class="product-cat-item-info">
                                <h3><strong class="d-block">WINTER</strong>TIRES</h3>
                                <a href="{{url("tyres/season/winter")}}">Shop All <i class="fas fa-chevron-right"></i></a>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="product-cat-item">
                            <img src="{{asset('public/frontend/assets/images/box-img-1.jpg')}}" alt="">
                            <div class="product-cat-item-info">
                                <h3><strong class="d-block">SUMMER</strong>TIRES</h3>
                                <a href="{{url("tyres/season/summer")}}">Shop All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="product-cat-item">
                            <img src="{{asset('public/frontend/assets/images/box-img-1.jpg')}}" alt="">
                            <div class="product-cat-item-info">
                                <h3><strong class="d-block">CAR</strong>TIRES</h3>
                                <a href="{{url("tyres/type/Passenger Car")}}">Shop All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="product-cat-item">
                            <img src="{{asset('public/frontend/assets/images/box-img-1.jpg')}}" alt="">
                            <div class="product-cat-item-info">
                                <h3><strong class="d-block">VAN</strong>TIRES</h3>
                                <a href="{{url("tyres/type/Commercial Van")}}">Shop All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="product-cat-item">
                            <img src="{{asset('public/frontend/assets/images/box-img-1.jpg')}}" alt="">
                            <div class="product-cat-item-info">
                                <h3><strong class="d-block">4*4</strong>TIRES</h3>
                                <a href="{{url("tyres/type/Passenger 4x4")}}">Shop All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="product-cat-item">
                            <img src="{{asset('public/frontend/assets/images/box-img-1.jpg')}}" alt="">
                            <div class="product-cat-item-info">
                                <h3><strong class="d-block">PERFORMANCE</strong>TIRES</h3>
                                <a href="{{url("tyres/type/Passenger%20Car")}}">Shop All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="free-delivery-banner">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-6 col-xl-4">
                        <div class="free-delivery-info">
                            <h2><strong class="d-block">Free delivery</strong> from just one tyre</h2>
                            <p>Free delivery<br>to any address<br>within the territory of Republic of Ireland.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="popular-tabs-wrap">
            <div class="container">
                <nav>
                    <div class="nav nav-tabs align-items-center propular-nav-tab" role="tablist">
                        <h6><strong>POPULAR</strong> ITEMS</h6>
                        <a class="nav-link ml-auto active" id="new-rearival-tab" data-toggle="tab" href="#new-rearival" role="tab" aria-controls="new-rearival" aria-selected="true">NEW ARRIVALS</a>
                        <a class="nav-link" id="nav-featured-tab" data-toggle="tab" href="#nav-featured" role="tab" aria-controls="nav-featured" aria-selected="false">FEATURED</a>
                        <a class="nav-link" id="nav-popular-tab" data-toggle="tab" href="#nav-popular" role="tab" aria-controls="nav-popular" aria-selected="false">POPULAR</a>
                    </div>
                </nav>
                <div class="tab-content" id="popular-nav-tabContent">
                    <div class="tab-pane fade show active" id="new-rearival" role="tabpanel" aria-labelledby="new-rearival-tab">
                        <div class="row">
                            @foreach($new_arrival_tyres as $new_arrival)
                            <div class="col-md-6 col-lg-3">
                                <div class="product-box">
                                    <div class="product-img">
                                        <a href="{{url('/product-detail/'.$new_arrival->slug)}}">
                                        <img src="{{asset('public/frontend/assets/images/tyer-img-1.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <h6 class="product-title">{{$new_arrival->short_description}}</h6>
                                        <a title="Wishlist" href="{{route('add-to-wishlist',$new_arrival->slug)}}" ><i class=" ti-heart "></i><span>Add to Wishlist</span></a>

                                    <div class="product-title">
                                        <a href="{{route('add-to-cart',$new_arrival->slug)}}">Add to cart</a>
                                    </div>
                                    <a href="#!" class="btn btn-secondary rounded-pill"><i class="fas fa-euro-sign"></i> {{$new_arrival->price}}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-featured" role="tabpanel" aria-labelledby="nav-featured-tab">
                        <div class="row">
                            @foreach($featured_tyres as $featured_tyre)
                                <div class="col-md-6 col-lg-3">
                                    <div class="product-box">
                                        <a href="{{url('/product-detail/'.$new_arrival->slug)}}">
                                            <img src="{{asset('public/frontend/assets/images/tyer-img-1.jpg')}}" alt="">
                                        </a>
                                        <h6 class="product-title">{{$featured_tyre->short_description}}</h6>
                                        <a title="Wishlist" href="{{route('add-to-wishlist',$featured_tyre->slug)}}" ><i class=" ti-heart "></i><span>Add to Wishlist</span></a>

                                        <div class="product-title">
                                            <a href="{{route('add-to-cart',$featured_tyre->slug)}}">Add to cart</a>
                                        </div>
                                        <a href="#!" class="btn btn-secondary rounded-pill"><i class="fas fa-euro-sign"></i> {{$featured_tyre->price}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">
                        <div class="row">
                            @foreach($popular_tyres as $popular_tyre)
                                <div class="col-md-6 col-lg-3">
                                    <div class="product-box">
                                        <div class="product-img">
                                            <img src="{{asset('public/frontend/assets/images/tyer-img-1.jpg')}}" alt="">
                                        </div>
                                        <h6 class="product-title">{{$popular_tyre->short_description}}</h6>
                                        <a title="Wishlist" href="{{route('add-to-wishlist',$popular_tyre->slug)}}" ><i class=" ti-heart "></i><span>Add to Wishlist</span></a>

                                        <div class="product-title">
                                            <a href="{{route('add-to-cart',$popular_tyre->slug)}}">Add to cart</a>
                                        </div>
                                        <a href="#!" class="btn btn-secondary rounded-pill"><i class="fas fa-euro-sign"></i> {{$popular_tyre->price}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="about-sec">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-6">
                        <h2>About <strong>Chromium Tires</strong></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
                        <a href="#!" class="btn btn-light btn-lg">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="bottom-sec">
                We guarantee a wide selection of tyres, transaction safety and very good prices.<br>
                Your orders are delivered quickly and free of charge (mainland only).<br>
                Enjoy your shopping.
            </div>
        </div>
    </main>
@endsection

@push('styles')
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
        background: #000000;
        color:black;
        }

        #Gslider .carousel-inner{
        height: 550px;
        }
        #Gslider .carousel-inner img{
            width: 100% !important;
            opacity: .8;
        }

        #Gslider .carousel-inner .carousel-caption {
        bottom: 60%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 50px;
        font-weight: bold;
        line-height: 100%;
        color: #F7941D;
        }

        #Gslider .carousel-inner .carousel-caption p {
        font-size: 18px;
        color: black;
        margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
        bottom: 70px;
        }
    </style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- <script>
        $('.cart').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
            $.ajax({
                url:"{{route('add-to-cart')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							// document.location.href=document.location.href;
						});
					}
                    else{
                        window.location.href='user/login'
                    }
                }
            })
        });
    </script> --}}



    <script>

        /*==================================================================
        [ Isotope ]*/
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');

        // filter items on button click
        $filter.each(function () {
            $filter.on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({filter: filterValue});
            });

        });

        // init Isotope
        $(window).on('load', function () {
            var $grid = $topeContainer.each(function () {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine : 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });

        var isotopeButton = $('.filter-tope-group button');

        $(isotopeButton).each(function(){
            $(this).on('click', function(){
                for(var i=0; i<isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }

                $(this).addClass('how-active1');
            });
        });
    </script>
    <script>
         function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>



<script>
    $(document).ready(function(){

        $('.dynamic').change(function(){
            if($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('product-search.fetch') }}",
                    method:"POST",
                    data:{select:select, value:value, _token:_token, dependent:dependent},
                    success:function(result)
                    {
                        $('#'+dependent).html(result);
                    }

                })
            }
        });

        $('#section').change(function(){
            $('#profile').val('');
            $('#rim').val('');
        });

        $('#section').change(function(){
            $('#profile').val('');
        });


    });
</script>

@endpush
