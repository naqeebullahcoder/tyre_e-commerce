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
                    <a href="{{route('user')}}" >Dashboard</a>
                @endif
                 <a href="{{route('user.logout')}}">Logout

                @else
                    <a href="{{route('login.form')}}">Login</a> <a href="{{route('register.form')}}">Register</a>
                    @endauth
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
                            <a href="{{url('/')}}"><img src="{{('public/frontend/assets/images/logo.png')}}" alt="" width="200"></a>
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
</header>
