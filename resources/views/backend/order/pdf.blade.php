<!DOCTYPE html>
<html>
<head>
  <title>Order @if($order)- {{$order->order_number}} @endif</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

@if($order)
  <style type="text/css">
    /*.invoice-header-top  {*/
      /*border: 1px solid #2b41a6;*/
      /*margin-outside: 20px;*/
    /*}*/
    .invoice-header {
      background: #000000;
      padding: 10px 30px 10px 30px;
      border-bottom: 1px solid #000000;
    }
    .site-logo {
      margin-top: 20px;
      margin-left:-20px;
    }
    .invoice-right-top h4 {
      padding-right: 15px;
      margin-top: 20px;
      color: #000000;
    }
    /*.invoice-left-top {*/
      /*border-left: 4px solid #1e5c80;*/
      /*padding-left: 20px;*/
      /*padding-top: 20px;*/
    /*}*/
    .invoice-left-top p {
      margin: 0;
      /*line-height: 20px;*/
      font-size: 16px;
      margin-bottom: 3px;
    }
    thead {
      background: #000000;
      color: #FFF;
    }
    .authority h5 {
      margin-top: -10px;
      color: #000000;
    }
    .thanks h6 {
      color: #000000;
      font-size: 25px;
      margin-top: 20px;
    }
    .site-address p {

    }
    .table tfoot .empty {
      border: none;
    }
    .table-bordered {
      border: none;
    }
    .table-header {
      padding: .75rem 1.25rem;
      margin-bottom: 0;
      background-color: rgba(0, 0, 0, 0.03);
      border-bottom: 1px solid rgba(43, 65, 166, 0.12);
    }
    .table td, .table th {
      padding: .50rem;
      border:solid;
      border: black;
    }
  </style>


  <div class="invoice-header-top">
  <div class="invoice-header">
    <div class="float-left site-logo">
      <img src="{{asset('public/backend/img/logo-here.png')}}" alt="">
    </div>
    <div class="clearfix"></div>
    {{--<div class="float-right site-address">--}}
      {{--<h4>{{env('APP_NAME')}}</h4>--}}
      {{--<p>{{env('APP_ADDRESS')}}</p>--}}
      {{--<p>Phone: <a href="tel:{{env('APP_PHONE')}}">{{env('APP_PHONE')}}</a></p>--}}
      {{--<p>Email: <a href="mailto:{{env('APP_EMAIL')}}">{{env('APP_EMAIL')}}</a></p>--}}
    {{--</div>--}}
    <div class="clearfix"></div>
  </div>
    <br>
  <div class="invoice-description">
    <div class="invoice-left-top float-left">
      <h5>INVOICE TO </h5>
      <h4>{{$order->first_name}} {{$order->last_name}}</h4>
      <div class="address">
        <p>
          Country:
          {{$order->country}}
        </p>
        <p>
          Address:
          {{ $order->address1 }}
        </p>
        <p>Phone: {{ $order->phone }}</p>
        <p>Email: {{ $order->email }}</p>
      </div>
    </div>
    <div class="invoice-right-top float-right" class="text-right">
      <h5>INVOICE # {{$order->order_number}}</h5>
      <p>{{ $order->created_at->format('D d m Y') }}</p>
       {{--<img class="img-responsive" src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(150)->generate(route('admin.product.order.show', $order->id )))}}">--}}
    </div>
    <div class="clearfix"></div>
  </div>
  {{--<br>--}}
    {{--<div class="table-header">--}}
      {{--<h5>Order Details</h5>--}}
    {{--</div>--}}
    {{--<table class="table table-bordered table-stripe">--}}

    {{--<thead>--}}
    {{--<tr>--}}
      {{--<th>S.N.</th>--}}
      {{--<th>Order</th>--}}
      {{--<th>Product</th>--}}
      {{--<th>Quantity</th>--}}
      {{--<th>Total Amount</th>--}}

    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--@foreach($order_details as $order_detail)--}}
      {{--<tr>--}}
        {{--<td>{{1}}</td>--}}
        {{--<td>{{$order_detail->id ?? ''}}</td>--}}
        {{--<td>{{$order_detail->product_id-> ?? ''}}</td>--}}
        {{--<td>{{$order_detail->quantity ?? ''}}</td>--}}
        {{--<td>{{$order_detail->amount ?? ''}}</td>--}}

      {{--</tr>--}}
    {{--@endforeach--}}
    {{--</tbody>--}}
  {{--</table>--}}
  <section class="order_details pt-3">
    <div class="table-header">
      <h5>ORDER DETAILS</h5>
    </div>
    <table class="table table-bordered table-stripe table-border">
      <thead>
      <tr>
        <th scope="col" class="col-6">Product</th>
        <th scope="col" class="col-3">Quantity</th>
        <th scope="col" class="col-3">Total</th>
      </tr>
      </thead>
      <tbody>
      @foreach($order->cart_info as $cart)
        @php
          $product=DB::table('products')->select('slug')->where('id',$cart->product_id)->get();
        @endphp
        <tr>
          <td><span>
              @foreach($product as $pro)
                {{$pro->slug}}
              @endforeach
            </span></td>
          <td>x{{$cart->quantity}}</td>
          <td><span>${{number_format($cart->price,2)}}</span></td>
        </tr>
      @endforeach
      </tbody>

      <tfoot>
      <tr>
        <th scope="col" class="empty"></th>
        <th scope="col" class="text-right">Subtotal:</th>
        <th scope="col"> <span>${{number_format($order->sub_total,2)}}</span></th>
      </tr>

      <tr>
        <th scope="col" class="empty"></th>
      <th scope="col" class="text-right">VAT Percantage</th>
      <th scope="col"> <span> {{$settings->VAT_percentage}}%</span></th>
      </tr>

       @if(!empty($order->coupon))
        <tr>
          <th scope="col" class="empty"></th>
          <th scope="col" class="text-right">Discount:</th>
          <th scope="col"><span>-{{$order->coupon->discount(Helper::orderPrice($order->id, $order->user->id))}}{{Helper::base_currency()}}</span></th>
        </tr>
      @endif


      {{--<tr>--}}
        {{--<th scope="col" class="empty"></th>--}}
        {{--@php--}}
          {{--$shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');--}}
        {{--@endphp--}}
        {{--<th scope="col" class="text-right ">Shipping:</th>--}}
        {{--<th><span>${{number_format($shipping_charge[0],2)}}</span></th>--}}
      {{--</tr>--}}
      {{--<tr>--}}

        <th scope="col" class="empty"></th>
        <th scope="col" class="text-right">Total:</th>
        <th>
            <span>
                $ {{number_format($settings->VAT_percentage/100*$order->total_amount+$order->total_amount,2)}}
            </span>
        </th>

      </tfoot>
    </table>
  </section>
  <div class="thanks mt-3">
    <h4>Thank you for your business !!</h4>
  </div>
  <div class="authority float-right mt-5">
    <p>-----------------------------------</p>
    <h5>Authority Signature:</h5>
  </div>
  <div class="clearfix"></div>
  </div>
@else
  <h5 class="text-danger">Invalid</h5>
@endif

</body>
</html>