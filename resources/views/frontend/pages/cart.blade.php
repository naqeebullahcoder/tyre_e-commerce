@extends('frontend.layouts.master')
@section('title','Cart Page')
@section('main-content')

	<main class="main">
		<div class="container">
			<div>
				<h1>Your Cart</h1>
				<form action="{{route('cart.update')}}" method="POST">
				<table class="table cart_table">
					<thead>
					<tr>
						<td>Product ID</td>
						<td>Image</td>
						<td>Product Info</td>
						<td class="text-center">Quantity</td>
						<td class="text-center">Unit Price</td>
						<td class="text-center">Total</td>
					</tr>
					</thead>
					<tbody>
					<form action="{{route('cart.update')}}" method="POST">
					@csrf
					@if(Helper::getAllProductFromCart())
						@foreach(Helper::getAllProductFromCart() as $key=>$cart)
					<tr>
						<td data-title="Code">{{$cart->product['bond_code']}}</td>
						<td data-title="Image"><img src="{{('public/frontend/assets/images/tyer-img-1.jpg')}}" width="80" alt=""></td>
						<td data-title="Equipment"><strong>Tristar: {{$cart->product['short_description']}} </strong><br>Tyre size: {{$cart->product['size']}}<br>Speed index: {{$cart->product['load_speed']}}<br>Load index : {{$cart->product['load_index']}}<br>Vehicle Type: {{$cart->product['vehicle_type']}}</td>
						<td class="text-center" data-title="Quantity"><input type="text" name="quant[{{$key}}]" class="form-control" value="{{$cart->quantity}}"></td>
						<input type="hidden" name="qty_id[]" value="{{$cart->id}}">
						<td class="text-center" data-title=" Price">${{number_format($cart['price'],2)}}</td>
						<td class="text-center" data-title="Cart-Delete">${{$cart['amount']}} <a href="{{route('cart-delete',$cart->id)}}"><span  class="fa fa-times-circle fa-lg"></span></a></td>

					</tr>
						@endforeach
					</tbody>
					<tfoot>
					<tr>
						<td colspan="5" class="text-right"><strong>Sub Total</strong></td>
						<td data-title="Sub Total" class="text-center"><strong>$ {{Helper::totalCartPrice()}}</strong></td>
					</tr>
					@endif
					</tfoot>
				</table>
					<div class="btns-cart">
						<a href="#" class="btn btn-secondary">Click to Send Inquiry</a>
						<button class="btn btn-dark" type="submit">UPDATE QUENTITY</button>
						<a href="{{route('product-search')}}"  class="btn btn-dark">Continue Shopping </a>
						<a href="{{route('checkout')}}" class="btn btn-dark">Checkout</a>
					</div>
				</form>
			</div>
		</div>
	</main>

@endsection
