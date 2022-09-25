@extends('backend.layouts.master')
@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Product Details</h6>
            {{--<a href="{{route('product.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Product</a>--}}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        EAN
                    </th>
                    <td> {{ $products->ean}}</td>
                </tr>

                <tr>
                    <th>
                        SHORT DESCRIPTION
                    </th>
                    <td> {{ $products->short_description}}</td>
                </tr>
                <tr>
                    <th>
                        LONG DESCRIPTION
                    </th>
                    <td> {{ $products->long_description}}</td>
                </tr>
                <tr>
                    <th>
                        BRAND
                    </th>
                    <td> {{ $products->brand}}</td>
                </tr>
                <tr>
                    <th>
                        PATTERN
                    </th>
                    <td> {{ $products->pattern}}</td>
                </tr>
                <tr>
                    <th>
                        LOAD SPEED
                    </th>
                    <td> {{ $products->load_speed}}</td>
                </tr>

                <tr>
                    <th>
                        SECTION
                    </th>
                    <td> {{ $products->section}}</td>
                </tr>
                <tr>
                    <th>
                        PROFILE
                    </th>
                    <td> {{ $products->profile}}</td>
                </tr>
                <tr>
                    <th>
                        RIM
                    </th>
                    <td> {{ $products->rim}}</td>
                </tr>
                <tr>
                    <th>
                        LOAD INDEX
                    </th>
                    <td> {{ $products->load_index}}</td>
                </tr>
                <tr>
                    <th>
                        SPEED
                    </th>
                    <td> {{ $products->speed}}</td>
                </tr>
                <tr>
                    <th>
                        XL
                    </th>
                    <td> {{ $products->xl}}</td>
                </tr>

                <tr>
                    <th>
                        RFT
                    </th>
                    <td> {{ $products->rft}}</td>
                </tr>
                <tr>
                    <th>
                        SELFSEAL
                    </th>
                    <td> {{ $products->selfseal}}</td>
                </tr>
                <tr>
                    <th>
                        BRAND CATEGORY
                    </th>
                    <td> {{ $products->brand_category}}</td>
                </tr>
                <tr>
                    <th>
                        SEASON
                    </th>
                    <td> {{ $products->season}}</td>
                </tr>
                <tr>
                    <th>
                        VEHICLE_SPECIFICATION
                    </th>
                    <td> {{ $products->vehicle_specification}}</td>
                </tr>
                <tr>
                    <th>
                        MOLD ID
                    </th>
                    <td> {{ $products->mold_id}}</td>
                </tr>
                <tr>
                    <th>
                        HOMOLGATION
                    </th>
                    <td> {{ $products->homolgation}}</td>
                </tr>
                <tr>
                    <th>
                        NOISE CANCEL
                    </th>
                    <td> {{ $products->noise_cancel}}</td>
                </tr>
                <tr>
                    <th>
                        RIM PROT
                    </th>
                    <td> {{ $products->rim_port}}</td>
                </tr>
                <tr>
                    <th>
                        WEIGHT
                    </th>
                    <td> {{ $products->weight}}</td>
                </tr>

                <tr>
                    <th>
                        TREAD DEPTH
                    </th>
                    <td> {{ $products->tread_depth}}</td>
                </tr>

                <tr>
                    <th>
                        VOLUME
                    </th>
                    <td> {{ $products->volume}}</td>
                </tr>

                <tr>
                    <th>
                        CLASS
                    </th>
                    <td> {{ $products->class}}</td>
                </tr>
                <tr>
                    <th>
                        FUEL
                    </th>
                    <td> {{ $products->fuel}}</td>
                </tr>
                <tr>
                    <th>
                        WET
                    </th>
                    <td> {{ $products->wet}}</td>
                </tr>
                <tr>
                    <th>
                        NOISE
                    </th>
                    <td> {{ $products->noise}}</td>
                </tr>
                <tr>
                    <th>
                        NOISE DB
                    </th>
                    <td> {{ $products->noise_db}}</td>
                </tr>
                <tr>
                    <th>
                        STOCKBAL
                    </th>
                    <td> {{ $products->stockbal}}</td>
                </tr>
                <tr>
                    <th>
                        PRICE
                    </th>
                    <td> {{ $products->price}}</td>
                </tr>
                <tr>
                    <th>
                        IMAGE
                    </th>
                    <td> {{ $products->image}}</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection