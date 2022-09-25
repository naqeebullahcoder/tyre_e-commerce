@extends('frontend.layouts.master')
@section('title','Product Details')
@section('main-content')

    <main class="main">
        <div class="container">
            <div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="content">
                            <h1>{{$product_detail->short_description}}</h1>
                            <span class="stock in-stock">In stock</span>
                            <div class="row single-pro-info">
                                <div class="col-sm-4">
                                    <div class="pro_slider">
                                        <img src="{{asset('public/frontend/assets/images/tyer-img-1.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row mt-3 mt-sm-0">
                                        <div class="col-6">
                                            <dl>
                                                <dt>Tyre size:</dt>
                                                <dd>{{$product_detail->size}}</dd>
                                                <dt>Speed index:</dt>
                                                <dd>{{$product_detail->load_speed}}</dd>

                                                <dt>Load index:</dt>
                                                <dd>{{$product_detail->load_index}}</dd>

                                                <dt>Season:</dt>
                                                <dd><i class="fas fa-sun"></i> {{$product_detail->season}}</dd>

                                                <dt>Vehicle type:</dt>
                                                <dd>{{$product_detail->vehicle_type}}</dd>

                                            </dl>
                                        </div>
                                        <div class="col-6">
                                            <div class="stats text-right mb-2">
                                                <span class="font-weight-bold">4.5</span>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <div class="product-type text-right">
                                                <span><i class="fas fa-gas-pump"></i> {{$product_detail->vehicle_type}}</span>
                                                <span><i class="fas fa-cloud-showers-heavy"></i> {{$product_detail->season}}</span>
                                                <span><i class="fas fa-volume-up"></i> {{$product_detail->volume}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    {{--<div class="product-quantity">--}}
                                        {{--<label>Quantity:</label>--}}
                                        {{--<input type="number" class="form-control" value="4" min="1" max="8" step="1">--}}
                                    {{--</div>--}}

                                    <h4 class="pro_price"><i class="fas fa-euro-sign"></i> {{$product_detail->price}}</h4>
                                    <a href="{{route('add-to-cart',$product_detail->slug)}}">   <button role="button" class="btn btn-dark"><i class="fas fa-shopping-cart"></i> ADD TO Cart</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="equipment_list">
                            <h5><strong>Tyer Types</strong></h5>
                            <ul>
                                <li><a href="#">Boom Lifts</a></li>
                                <li><a href="#">Electric Scissors</a></li>
                                <li><a href="#">Forklifts</a></li>
                                <li><a href="#">Rough Terrain Scissor</a></li>
                                <li><a href="#">Skid Steers</a></li>
                                <li><a href="#">Telehandlers</a></li>
                            </ul>
                        </div>
                        <div class="order_box">


                            <div class="order_box_content">
                                <h6><strong>My Orders</strong></h6>
                                <div class="shopping_icon">
                                    <a href="{{route('cart')}}"><i class="fa fa-shopping-cart fa-lg"></i> <span class="total-count">{{Helper::cartCount()}}</span></a>
                                </div>
                                <div class="order_item">
                                    <p> Items in your cart</p>
                                    <p><br></p>
                                    <h4>$ {{Helper::totalCartPrice()}}</h4>
                                </div>
                            </div>


                            <div class="order_btn">
                                <a href="{{route('cart')}}" class="btn btn-default btn-light btn-sm">View Cart</a>|<a href="{{route('checkout')}}" class="btn btn-default btn-light btn-sm">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="all_equipment mt-4">
                    <h5>You may also be interested in the following product(s)</h5>
                    <div class="row">
                        @foreach($more_products as $more_product)
                            <div class="col-sm-6 col-lg-3">
                                <div class="product-box text-center">
                                    <div class="product-img">
                                        <img src="{{asset('public/frontend/assets/images/tyer-img-1.jpg')}}" alt="">
                                    </div>
                                    <h6 class="product-title">{{$more_product->short_description}}</h6>
                                    {{--<a title="Wishlist" href="{{route('add-to-wishlist',$more_product->slug)}}" ><i class=" ti-heart "></i><span>Add to Wishlist</span></a>--}}
                                    <div class="product-title">
                                        <a href="{{route('add-to-cart',$more_product->slug)}}">Add to cart</a>
                                    </div>
                                    <a href="#!" class="btn btn-secondary rounded-pill"><i class="fas fa-euro-sign"></i> {{$more_product->price}}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                </div>
            </div>
        </div>
    </main>
@endsection