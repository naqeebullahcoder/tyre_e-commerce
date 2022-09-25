@extends('frontend.layouts.master')

@section('title','TYRE SHOP || Login Page')

@section('main-content')


{{--<style>--}}
    {{--form {border: 3px solid #f1f1f1;}--}}

    {{--input[type=email], input[type=password] {--}}
        {{--width:100%;--}}
        {{--padding: 8px 20px;--}}
        {{--margin: 8px 0;--}}
        {{--display: inline-block;--}}
        {{--border: 1px solid #ccc;--}}
        {{--box-sizing: border-box;--}}
    {{--}--}}

    {{--button {--}}
        {{--background-color: lightslategrey;--}}
        {{--color: white;--}}
        {{--padding: 14px 20px;--}}
        {{--margin: 8px 0;--}}
        {{--border: none;--}}
        {{--cursor: pointer;--}}
        {{--width: 10%;--}}
    {{--}--}}

    {{--button:hover {--}}
        {{--opacity: 0.8;--}}
    {{--}--}}

    {{--.cancelbtn {--}}
        {{--width: auto;--}}
        {{--padding: 10px 18px;--}}
        {{--background-color: #f44336;--}}
    {{--}--}}

    {{--.imgcontainer {--}}
        {{--text-align: center;--}}
        {{--margin: 24px 0 12px 0;--}}
    {{--}--}}


    {{--/*.container {*/--}}
        {{--/*padding: 16px;*/--}}
    {{--/*}*/--}}

    {{--span.email {--}}
        {{--float: right;--}}
        {{--padding-top: 16px;--}}
    {{--}--}}

    {{--/* Change styles for span and cancel button on extra small screens */--}}
    {{--@media screen and (max-width: 300px) {--}}
        {{--span.email {--}}
            {{--display: block;--}}
            {{--float: none;--}}
        {{--}--}}
        {{--.cancelbtn {--}}
            {{--width: 100%;--}}
        {{--}--}}
    {{--}--}}
{{--</style>--}}


<main class="main">
    <div class="container">
        <div class="login_page">
            <div class="content">
                <h1>Login</h1>
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="weight-600">Registered Customers</h5>
                        <p class="font-16">If you have an account with us, please log in.</p>
                        <form class="form" method="post" action="{{route('login.submit')}}">
                            @csrf

                            <div class="form-group">
                                <label>Your Email<span>*</span></label>
                                <div>
                                    <input  type="email" class="form-control" name="email" placeholder="" required="required" value="{{old('email')}}">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div>
                                    <input type="password" class="form-control"  name="password" placeholder="" required="required" value="{{old('password')}}">
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-dark pull-right mb-3 px-4" value="Login">Login</button>
                            <a href="{{route('register.form')}}"  class="btn btn-dark pull-right mb-3 px-4">Register</a>
                            <div class="checkbox">
                                <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">  Remember me</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="lost-pass" href="{{ route('password.reset') }}">
                                    Lost your password?
                                </a>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>






{{--<section class="shop login section">--}}
    {{--<div class="container" style="margin-right:30px ">--}}
        {{--<div class="row">--}}
            {{--<div class="login-form">--}}
                {{--<center> <h2 style="margin-top: 40px"> Login</h2>--}}
                    {{--<p>Please Login in order to checkout more quickly</center>--}}
                {{--<!-- Form -->--}}
                {{--<form class="form" method="post" action="{{route('login.submit')}}">--}}
                    {{--@csrf--}}
    {{--<div class="container">--}}
        {{--<label>Your Email<span>*</span></label>--}}
        {{--<input  type="email" name="email" placeholder="" required="required" value="{{old('email')}}">--}}
        {{--@error('email')--}}
        {{--<span class="text-danger">{{$message}}</span>--}}
        {{--@enderror--}}

        {{--<label>Your Password<span>*</span></label>--}}
        {{--<input type="password" name="password" placeholder="" required="required" value="{{old('password')}}">--}}
        {{--@error('password')--}}
        {{--<span class="text-danger">{{$message}}</span>--}}
        {{--@enderror--}}

        {{--<button type="submit">Login</button>--}}
        {{--<a href="{{route('register.form')}}" class="btn">Register</a>--}}
        {{--<div class="checkbox">--}}
            {{--<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Remember me</label>--}}
        {{--</div>--}}
        {{--@if (Route::has('password.request'))--}}
            {{--<a class="lost-pass" href="{{ route('password.reset') }}">--}}
                {{--Lost your password?--}}
            {{--</a>--}}
        {{--@endif--}}
    {{--</div>--}}

                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}



@endsection
@push('styles')
<style>
    .shop.login .form .btn{
        margin-right:0;
    }
    .btn-facebook{
        background:#39579A;
    }
    .btn-facebook:hover{
        background:#073088 !important;
    }
    .btn-github{
        background:#444444;
        color:white;
    }
    .btn-github:hover{
        background:black !important;
    }
    .btn-google{
        background:#ea4335;
        color:white;
    }
    .btn-google:hover{
        background:rgb(243, 26, 26) !important;
    }
</style>
@endpush