@extends('frontend.layouts.master')
@section('title','Product Details')
@section('main-content')
    <main class="main">
        <div class="search-filter bg-secondary">
            <div class="container">
                <form action="{{route('product-search')}}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <h4>Size</h4>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Width</label>
                                        <select name="section" id="section" class="form-control">
                                            @foreach($width_data as $width)
                                                <option value="{{$width->section}}" {{ old('section', $section) == $width->section ? 'selected' : '' }}>
                                                    {{$width->section}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Height</label>
                                    <select name="profile" id="profile" class="form-control">
                                        @foreach($height_data as $height)
                                            <option value="{{$height->profile}}" {{ old('profile', $profile) == $height->profile ? 'selected' : '' }}>
                                                {{$height->profile}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Diameter</label>
                                    <select name="rim" id="rim" class="form-control">
                                        @foreach($diameter_data as $diameter)
                                            <option value="{{$diameter->rim}}" {{ old('rim', $rim) == $diameter->rim ? 'selected' : '' }}>
                                                {{$diameter->rim}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h4>Size</h4>
                        <div class="row">
                            <div class="col-sm-4 col-lg">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select name="brand" id="brand" class="form-control">
                                        @foreach($brand_data as $brand)
                                            <option value="{{$brand->brand}}" {{ old('brand', $brand) == $brand->brand ? 'selected' : '' }}>
                                                {{$brand->brand}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg">
                                <div class="form-group">
                                    <label>Vehicle type</label>
                                    <select name="vehicle_type" id="vehicle_type" class="form-control">
                                        @foreach($vehicle_type_data as $vehicle_type)
                                            <option value="{{$vehicle_type->vehicle_type}}" {{ old('vehicle_type', $vehicle_type) == $vehicle_type->vehicle_type ? 'selected' : '' }}>
                                                {{$vehicle_type->vehicle_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg">
                                <div class="form-group">
                                    <label>Season</label>
                                    <select name="season" id="season" class="form-control">
                                        @foreach($season_data as $season)
                                            <option value="{{$season->season}}" {{ old('season', $season) == $season->season ? 'selected' : '' }}>
                                                {{$season->season}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg">
                                <div class="form-group">
                                    <label>Speed index</label>

                                    <select name="load_speed" id="load_speed" class="form-control">
                                        @foreach($load_speed_data as $load_speed)
                                            <option value="{{$load_speed->load_speed}}" {{ old('load_speed', $load_speed) == $load_speed->load_speed ? 'selected' : '' }}>
                                                {{$load_speed->load_speed}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg">
                                <div class="form-group">
                                    <label>Load index</label>
                                    <select name="load_index" id="load_index" class="form-control">
                                        @foreach($load_index_data as $load_index)
                                            <option value="{{$load_index->load_index}}" {{ old('load_index', $load_index) == $load_index->load_index ? 'selected' : '' }}>
                                                {{$load_index->load_index}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div style="margin-top: 35px;" class="col-md-2 col-12 form-group">
                                <button class="btn btn-dark btn-block">Search</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <h6>Price range</h6>
                                <div class="range-slider px-2 form-group">
                                    <div id="year-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;"></span></div>
                                    <div class="float-left">&#163;<span id="year-start">36</span></div>
                                    <div class="float-right">&#163;<span id="year-end">120</span></div>
                                    <input type="hidden" id="year-min">
                                    <input type="hidden" id="year-max">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <span class="d-none d-sm-block mb-4"></span>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">48-hour delivery</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                    <label class="form-check-label" for="exampleCheck2">Reinforced</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                    <label class="form-check-label" for="exampleCheck3">Run Flat</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <div class="container">

            <h1>Search Result <small class="d-block">378 Items total</small></h1>
            <div class="row">
                <div class="col-lg-3">
                    <div class="filters-wrap">
                        <div class="filters">
                            <div class="filter-box">
                                <h6>Size</h6>
                                <ul>
                                    <li><a href="#">235/65R16 ({{$size_r_16}})</a></li>
                                    <li><a href="#">235/50R17 ({{$size_r_17}})</a></li>
                                    <li><a href="#">225/35R18 ({{$size_r_18}})</a> </li>
                                    <li><a href="#">225/55R19 ({{$size_r_19}})</a></li>
                                    <li><a href="#">285/45R22 ({{$size_r_22}})</a></li>
                                </ul>
                            </div>
                            <div class="filter-box">
                                <h6>Brand</h6>
                                <ul>
                                    <li><a href="#">Compass ({{$brand_compass}})</a> </li>
                                    <li><a href="#">Hifly ({{$brand_hifly}})</a></li>
                                    <li><a href="#">Nankang ({{$brand_nankang}})</a></li>
                                    <li><a href="#">Powertrac ({{$brand_powertrac}})</a></li>
                                    <li><a href="#">Avon ({{$brand_avon}})</a></li>
                                    <li><a href="#">Grenlander ({{$brand_grenlander}})</a></li>
                                </ul>
                            </div>

                            <div class="filter-box">
                                <h6>Vehicle type</h6>
                                <ul>
                                    <li><a href="#">Commercial Truck ({{$commercail_truck}}) </a></li>
                                    <li><a href="#">Commercial Van ({{$commercail_van}})</a></li>
                                    <li><a href="#">Passenger 4x4 ({{$passenger_4x4}})</a></li>
                                    <li><a href="#">Passenger Car ({{$passenger_car}})</a></li>
                                </ul>
                            </div>
                            <div class="filter-box">
                                <h6>Season</h6>
                                <ul>
                                    <li><a href="#">Summer ({{$commercail_truck}})</a></li>
                                    <li><a href="#">Winter ({{$commercail_truck}})</a></li>
                                    <li><a href="#">All Season ({{$commercail_truck}})</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="serach-result-wrap">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-sm-6 col-lg-4">
                                <div class="product-box text-center">
                                    <div class="product-img">
                                       <a href="{{url('/product-detail/'.$product->slug)}}">
                                           <img src="{{asset('public/frontend/assets/images/tyer-img-1.jpg')}}" alt=""></a>
                                    </div>
                                    <h6 class="product-title">{{$product->short_description}}</h6>
                                    <div class="product-attributes">
                                        <span class="size">{{$product->size}}</span>
                                        <span class="loadIndex">{{$product->load_index}}</span>
                                        <span class="speedIndex">{{$product->speed_index}}</span>
                                        <span class="other">{{$product->xl}}</span>
                                    </div>
                                    <div class="product-type">
                                        <span><i class="fas fa-gas-pump"></i> {{$product->fuel}}</span>
                                        <span><i class="fas fa-cloud-showers-heavy"></i> {{$product->season}}</span>
                                        <span><i class="fas fa-volume-up"></i> {{$product->volume}}</span>
                                    </div>
                                    <div class="product-price"><i class="fas fa-euro-sign"></i>{{$product->price}}</div>
                                    <a href="{{route('add-to-cart',$product->slug)}}" class="btn btn-secondary rounded-pill"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <span style="float:right">{{$products->links()}}</span>
        </div>
    </main>

   @endsection