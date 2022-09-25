@extends('frontend.layouts.master')
@section('title','TYRE SHOP || Fitting Station')
@section('main-content')

    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <form class="form" method="post" action="{{route('fitting-station')}}">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="checkout-form">
                            <br>
                            <center><h2>Register Fitting Station</h2></center>
                            <br>
                            <!-- Form -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                   <div class="form-group">
                                    <label for="inputTitle" class="col-form-label">Name</label>
                                    <input id="name" type="text" name="name" placeholder=""  value="{{old('name')}}" class="form-control">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                   </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for ="inputTitle" class="col-form-label">Sur Name<span>*</span></label>
                                        <input id="sur_name" type="text" name="sur_name" placeholder="" value="{{old('sur_name')}}" class="form-control">
                                        @error('sur_name')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for ="inputTitle" class="col-form-label">Address<span>*</span></label>
                                        <input id="address" type="text" name="address" placeholder="" value="{{old('address')}}" class="form-control">
                                        @error('address')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for ="inputNumber" class="col-form-label">Post Code<span>*</span></label>
                                        <input id="post_code" type="number" name="post_code" placeholder="" value="{{old('post_code')}}" class="form-control">
                                        @error('post_code')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for ="inputTittle" class="col-form-label">City<span>*</span></label>
                                        <input id="city" type="text" name="city" placeholder="" value="{{old('city')}}" class="form-control">
                                        @error('city')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for ="inputTittle" class="col-form-label">Phone<span>*</span></label>
                                        <input id="phone" type="number" name="phone" placeholder="" value="{{old('phone')}}" class="form-control">
                                        @error('phone')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for ="inputTittle" class="col-form-label">Fax<span>*</span></label>
                                        <input id="fax" type="text" name="fax" placeholder="" value="{{old('fax')}}" class="form-control">
                                        @error('fax')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for ="inputTittle" class="col-form-label">Email<span>*</span></label>
                                        <input id="email" type="text" name="email" placeholder="" value="{{old('emails')}}" class="form-control">
                                        @error('email')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        {{--<label for ="inputTittle" class="col-form-label">Email<span>*</span></label>--}}
                                        <input type="hidden" id="user_id"  placeholder=""   value="{{old('user_id')}}" class="form-control">
                                        @error('user_id')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-12">
                                    <div class="form-group login-btn">
                                        <button class="btn btn-success" type="submit">Register</button>
                                        {{--<a href="{{route('login.form')}}" class="btn">Login</a>--}}
                                        {{--OR--}}
                                        {{--<a href="{{route('login.redirect','facebook')}}" class="btn btn-facebook"><i class="ti-facebook"></i></a>--}}
                                        {{--<a href="{{route('login.redirect','github')}}" class="btn btn-github"><i class="ti-github"></i></a>--}}
                                        {{--<a href="{{route('login.redirect','google')}}" class="btn btn-google"><i class="ti-google"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                            <!--/ End Form -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--/ End Checkout -->






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
<script src="{{asset('public/frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('public/frontend/js/select2/js/select2.min.js') }}"></script>
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