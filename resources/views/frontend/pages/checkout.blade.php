@extends('frontend.layouts.master')

@section('title','Checkout page')

@section('main-content')

	<main class="main">
		<div class="container">
			<div class="cehckout_page">
				<div class="row">
					<div class="col-md-12">
						<div class="content">
							<h1>Checkout</h1>
							<br>
							<form class="form" method="POST" action="{{route('cart.order')}}">
								@csrf
								<div class="shipping_info_wrap tabs-wrap">
									<ul class="nav nav-tabs" role="tablist">
										<li role="presentation" class="active"><a href="#orderForm" aria-controls="orderForm" role="tab" data-toggle="tab">Order Details</a></li>
										<li role="presentation"><a href="#shippingInfo" aria-controls="shippingInfo" role="tab" data-toggle="tab">Shipping Info</a></li>
										<li role="presentation"><a href="#fuelStation" aria-controls="fuelStation" role="tab" data-toggle="tab">Final Delivery</a></li>
									</ul>
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane active" id="orderForm">
											<h4 class="mt-3"></h4>
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label>Name <sup>*</sup></label>
														<input type="text"  name="name" placeholder="" value="{{old('name')}}" class="form-control">
														@error('name')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Sur Name<sup>*</sup></label>
														<input type="text"  name="sur_name" placeholder="" value="{{old('sur_name')}}" class="form-control" >
														@error('sur_name')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Email<sup>*</sup></label>
														<input type="text"  name="email" placeholder="" value="{{old('emails')}}" class="form-control">
														@error('email')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Vat Number <sup>*</sup></label>
														<input type="number" name="Vat_number" placeholder="" value="{{old('Vat_number')}}"  class="form-control">
														@error('Vat_number')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>House Number <sup>*</sup></label>
														<input type="text" name="house_number" placeholder="" value="{{old('house_number')}}"  class="form-control">
														@error('house_number')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Street Name <sup>*</sup></label>
														<input type="text" name="street_name" placeholder="" value="{{old('street_name')}}"  class="form-control">
														@error('street_name')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>City <sup>*</sup></label>
														<input type="text"  name="city" placeholder="" value="{{old('city')}}" class="form-control">
														@error('city')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Post Code <sup>*</sup></label>
														<input type="number"  name="post_code" placeholder="" value="{{old('post_code')}}" class="form-control">
														@error('post_code')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Phone Number<sup>*</sup></label>
														<input type="number"  name="phone_number" placeholder="" value="{{old('phone_number')}}" class="form-control">
														@error('phone_number')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Company Name <sup>*</sup></label>
														<input type="text"  name="company_name" placeholder="" value="{{old('company_name')}}" class="form-control">
														@error('company_name')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
											</div>
											<div class="btns-cart">
												<a href="{{('cart')}}" class="btn btn-primary">Cancel Order</a>

											</div>
										</div>
										<div role="tabpanel" class="tab-pane" id="shippingInfo">
											<h4 class="mt-3"></h4>
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
														<label>Name <sup>*</sup></label>
														<input type="text"  name="name" placeholder="" value="{{old('name')}}" class="form-control">
														@error('name')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Sur Name<sup>*</sup></label>
														<input type="text"  name="sur_name" placeholder="" value="{{old('sur_name')}}"class="form-control" >
														@error('sur_name')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Company Name <sup>*</sup></label>
														<input type="text"  name="company_name" placeholder="" value="{{old('company_name')}}" class="form-control">
														@error('company_name')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>House Number <sup>*</sup></label>
														<input type="text" name="house_number" placeholder="" value="{{old('house_number')}}"  class="form-control">
														@error('house_number')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Street Name <sup>*</sup></label>
														<input type="text" name="street_name" placeholder="" value="{{old('street_name')}}"  class="form-control">
														@error('street_name')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>City <sup>*</sup></label>
														<input type="text"  name="city" placeholder="" value="{{old('city')}}" class="form-control">
														@error('city')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>Post Code <sup>*</sup></label>
														<input type="number"  name="post_code" placeholder="" value="{{old('post_code')}}" class="form-control">
														@error('post_code')
														<span class='text-danger'>{{$message}}</span>
														@enderror
													</div>
												</div>

											</div>
											<div class="btns-cart">
												<a href="{{('cart')}}" class="btn btn-primary">Cancel Order</a>
											</div>
										</div>
										<div role="tabpanel" class="tab-pane" id="fuelStation">
											<div class="row">
												<div class="col-lg-4 col-12">
													<div class="order-details">
														<!-- Order Widget -->
														<div class="order_box">
															<div class="order_box_content">
																<h6><strong>My Items</strong></h6>
																<div class="content">
																	<div class="order_subtotal" data-price="{{Helper::totalCartPrice()}}"><h4>Subtotal: <span>${{number_format(Helper::totalCartPrice(),2)}}</span></h4></div>
																	{{--<div class="shipping">--}}
																		{{--Shipping Cost--}}
																		{{--@if(count(Helper::shipping())>0 && Helper::cartCount()>0)--}}
																			{{--<select name="shipping" class="nice-select">--}}
																				{{--<option value="">Select your address</option>--}}
																				{{--@foreach(Helper::shipping() as $shipping)--}}
																					{{--<option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}">{{$shipping->type}}: ${{$shipping->price}}</option>--}}
																				{{--@endforeach--}}
																			{{--</select>--}}
																		{{--@else--}}
																			{{--<span>Free</span>--}}
																		{{--@endif--}}
																	{{--</div>--}}

																	@if(session('coupon'))
																		<div class="coupon_price" data-price="{{session('coupon')['value']}}">You Save<span>${{number_format(session('coupon')['value'],2)}}</span></div>
																	@endif
																	@php
																		$total_amount=Helper::totalCartPrice();
                                                                        if(session('coupon')){
                                                                            $total_amount=$total_amount-session('coupon')['value'];
                                                                        }
																	@endphp
																	@if(session('coupon'))
																		<div  class="last"  id="order_total_price"><h4>Total :<span>${{number_format($total_amount,2)}}</span></h4></div>
																	@else
																		<div class="last" id="order_total_price"><h4>Total : <span>${{number_format($total_amount,2)}}</span></h4></div>
																	@endif
																</div>
															</div>
															<input name="payment_method"  type="radio" value="cod"><label>  &nbsp; Cash on Delivery</label> |  <input name="payment_method"  type="radio" value="cod"><label>  &nbsp; Valitor</label>
															<div class="order_btn">
																<button type="submit" class="btn btn-light btn-sm">Proceed to Checkout</button>
															</div>
															<!-- Payment Method Widget -->
															<div class="single-widget payement">
																<div class="content">
																	<img src="{{('public/backend/img/payment-method.png')}}" alt="#">
																</div>
															</div>
															<!--/ End Payment Method Widget -->
														</div>
													</div>
												</div>
											</div>
											<div class="btns-cart" style="margin-top: 20px;">
												<a href="{{('cart')}}" class="btn btn-primary">Cancel Order</a>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	{{--<main class="main">--}}
		{{--<div class="container">--}}
			{{--<div class="cehckout_page">--}}
				{{--<div class="row">--}}
					{{--<div class="col-md-9">--}}
						{{--<div class="content">--}}
							{{--<h3>Check Out</h3>--}}
							{{--<div class="shipping_info_wrap tabs-wrap">--}}
								{{--<div class="tab-content">--}}
									{{--<h4 class="mt-3">Personal Info</h4>--}}
									{{--<form class="form" method="POST" action="{{route('cart.order')}}">--}}
										{{--@csrf--}}
										{{--<div class="row">--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>Name <sup>*</sup></label>--}}
													{{--<input type="text"  name="name" placeholder="" value="{{old('name')}}" class="form-control">--}}
													{{--@error('name')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>Sur Name<sup>*</sup></label>--}}
													{{--<input type="text"  name="sur_name" placeholder="" value="{{old('sur_name')}}"class="form-control" >--}}
													{{--@error('sur_name')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>Company Name <sup>*</sup></label>--}}
													{{--<input type="text"  name="company_name" placeholder="" value="{{old('company_name')}}" class="form-control">--}}
													{{--@error('company_name')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>Vat Number <sup>*</sup></label>--}}
													{{--<input type="number" name="Vat_number" placeholder="" value="{{old('Vat_number')}}"  class="form-control">--}}
													{{--@error('Vat_number')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>House Number <sup>*</sup></label>--}}
													{{--<input type="te" name="house_number" placeholder="" value="{{old('house_number')}}"  class="form-control">--}}
													{{--@error('house_number')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>Street Name <sup>*</sup></label>--}}
													{{--<input type="text" name="street_name" placeholder="" value="{{old('street_name')}}"  class="form-control">--}}
													{{--@error('street_name')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>City <sup>*</sup></label>--}}
													{{--<input type="text"  name="city" placeholder="" value="{{old('city')}}" class="form-control">--}}
													{{--@error('city')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>Post Code <sup>*</sup></label>--}}
													{{--<input type="number"  name="post_code" placeholder="" value="{{old('post_code')}}" class="form-control">--}}
													{{--@error('post_code')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}

											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>Phone Number<sup>*</sup></label>--}}
													{{--<input type="number"  name="phone" placeholder="" value="{{old('phone')}}" class="form-control">--}}
													{{--@error('phone')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>Email<sup>*</sup></label>--}}
													{{--<input type="text"  name=emailsl" placeholder="" value="{{old(emailsl')}}" class="form-control">--}}
													{{--@error(emailsl')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>Comments<sup>*</sup></label>--}}
													{{--<input type="text"  name="comments" placeholder="" value="{{old('comments')}}" class="form-control">--}}
													{{--@error('comments')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}

											{{--<div class="col-sm-12">--}}
												{{--<h4>Shipping Info Details</h4>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>Name <sup>*</sup></label>--}}
													{{--<input type="text"  name="name" placeholder="" value="{{old('name')}}" class="form-control">--}}
													{{--@error('name')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>Sur Name<sup>*</sup></label>--}}
													{{--<input type="text"  name="sur_name" placeholder="" value="{{old('sur_name')}}"class="form-control" >--}}
													{{--@error('sur_name')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>Company Name <sup>*</sup></label>--}}
													{{--<input type="text"  name="company_name" placeholder="" value="{{old('company_name')}}" class="form-control">--}}
													{{--@error('company_name')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>House Number <sup>*</sup></label>--}}
													{{--<input type="text" name="house_number" placeholder="" value="{{old('house_number')}}"  class="form-control">--}}
													{{--@error('house_number')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>Street Name <sup>*</sup></label>--}}
													{{--<input type="text" name="street_name" placeholder="" value="{{old('street_name')}}"  class="form-control">--}}
													{{--@error('street_name')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>City <sup>*</sup></label>--}}
													{{--<input type="text"  name="city" placeholder="" value="{{old('city')}}" class="form-control">--}}
													{{--@error('city')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}
													{{--<label>Post Code <sup>*</sup></label>--}}
													{{--<input type="number"  name="post_code" placeholder="" value="{{old('post_code')}}" class="form-control">--}}
													{{--@error('post_code')--}}
													{{--<span class='text-danger'>{{$message}}</span>--}}
													{{--@enderror--}}
												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}

												{{--</div>--}}
											{{--</div>--}}
											{{--<div class="col-sm-4">--}}
												{{--<div class="form-group">--}}

												{{--</div>--}}
											{{--</div>--}}

											{{--<div class="col-lg-4 col-12">--}}
												{{--<div class="order-details">--}}
													{{--<!-- Order Widget -->--}}
													{{--<div class="order_box">--}}
														{{--<div class="order_box_content">--}}
															{{--<h6><strong>My Check Out</strong></h6>--}}
															{{--<div class="content">--}}
																{{--<div class="order_subtotal" data-price="{{Helper::totalCartPrice()}}"><h4>Subtotal: <span>${{number_format(Helper::totalCartPrice(),2)}}</span></h4></div>--}}
																{{--<div class="shipping">--}}
																		{{--Shipping Cost--}}
																		{{--@if(count(Helper::shipping())>0 && Helper::cartCount()>0)--}}
																			{{--<select name="shipping" class="nice-select">--}}
																				{{--<option value="">Select your address</option>--}}
																				{{--@foreach(Helper::shipping() as $shipping)--}}
																					{{--<option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}">{{$shipping->type}}: ${{$shipping->price}}</option>--}}
																				{{--@endforeach--}}
																			{{--</select>--}}
																		{{--@else--}}
																			{{--<span>Free</span>--}}
																		{{--@endif--}}
																	{{--</div>--}}

																	{{--@if(session('coupon'))--}}
																		{{--<div class="coupon_price" data-price="{{session('coupon')['value']}}">You Save<span>${{number_format(session('coupon')['value'],2)}}</span></div>--}}
																	{{--@endif--}}
																	{{--@php--}}
																		{{--$total_amount=Helper::totalCartPrice();--}}
                                                                        {{--if(session('coupon')){--}}
                                                                            {{--$total_amount=$total_amount-session('coupon')['value'];--}}
                                                                        {{--}--}}
																	{{--@endphp--}}
																	{{--@if(session('coupon'))--}}
																	{{--<div  class="last"  id="order_total_price"><h4>Total :<span>${{number_format($total_amount,2)}}</span></h4></div>--}}
																	{{--@else--}}
																	{{--<div class="last" id="order_total_price"><h4>Total : <span>${{number_format($total_amount,2)}}</span></h4></div>--}}
																	{{--@endif--}}
															{{--</div>--}}
														{{--</div>--}}
															{{--<input name="payment_method"  type="radio" value="cod"><label>  &nbsp; Cash on Delivery</label> |  <input name="payment_method"  type="radio" value="cod"><label>  &nbsp; Valitor</label>--}}
														{{--<div class="order_btn">--}}
																{{--<button type="submit" class="btn btn-light btn-sm">Proceed to Checkout</button>--}}
														{{--</div>--}}
														{{--<!-- Payment Method Widget -->--}}
														{{--<div class="single-widget payement">--}}
															{{--<div class="content">--}}
																{{--<img src="{{('public/backend/img/payment-method.png')}}" alt="#">--}}
															{{--</div>--}}
														{{--</div>--}}
														{{--<!--/ End Payment Method Widget -->--}}
													{{--</div>--}}
												{{--</div>--}}
											{{--</div>--}}
										{{--</div>--}}
									{{--</form>--}}
								{{--</div>--}}

							{{--</div>--}}

						{{--</div>--}}
					{{--</div>--}}
					{{--</div>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</main>--}}

@endsection
@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		function showMe(box){
			var checkbox=document.getElementById('shipping').style.display;
			// alert(checkbox);
			var vis= 'none';
			if(checkbox=="none"){
				vis='block';
			}
			if(checkbox=="block"){
				vis="none";
			}
			document.getElementById(box).style.display=vis;
		}
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') ); 
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0; 
				// alert(coupon);
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>

@endpush