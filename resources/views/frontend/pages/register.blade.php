@extends('frontend.layouts.master')

@section('title','TYRE SHOP || Register Page')

@section('main-content')

    {{--<style>--}}
        {{--form {border: 3px solid #f1f1f1;}--}}

        {{--input[type=email], input[type=password],input[type=text],input[type=password_confirmation] {--}}
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
            <div class="content">
                <h1>Create an Account</h1>
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="weight-600">Personal Information</h5>
                        <p class="font-16">Creating an account is fast and easy! Please take a moment to fill out the information below</p>
                        <form class="form" method="post" action="{{route('register.submit')}}">
                            @csrf
                            <div class="form-group">
                                <label>Your Name<span>*</span></label>
                                <div>
                                    <input type="text" class="form-control" name="name" placeholder="" required="required" value="{{old('name')}}">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email<span>*</span></label>
                                <div>
                                    <input type="email" class="form-control" name="email" placeholder="" required="required" value="{{old('emails')}}">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password<span>*</span></label>
                                <div>
                                    <input type="password" class="form-control" name="password" placeholder="" required="required" value="{{old('password')}}">
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password<span>*</span></label>
                                <div>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="" required="required" value="{{old('password_confirmation')}}">
                                    @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark pull-right mb-3 px-4" value="Register">Register</button>
                            <a href="{{route('login.form')}}"  class="btn btn-dark pull-right mb-3 px-4">Login</a>
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
    </main>




    <!-- Shop Login -->
    {{--<section class="shop login section">--}}
        {{--<div class="container">--}}
    {{--<div class="row">--}}

            {{--<div class="login-form">--}}
                {{--<center> <h2>Register</h2>--}}
                    {{--<p>Please register in order to checkout more quickly</center>--}}
                {{--<!-- Form -->--}}
                {{--<form class="form" method="post" action="{{route('register.submit')}}">--}}
                    {{--@csrf--}}
                    {{--<div class="container">--}}
                        {{--<label>Your Name<span>*</span></label>--}}
                        {{--<input type="text" name="name" placeholder="" required="required" value="{{old('name')}}">--}}
                        {{--@error('name')--}}
                        {{--<span class="text-danger">{{$message}}</span>--}}
                        {{--@enderror--}}

                        {{--<label>Your Email<span>*</span></label>--}}
                        {{--<input type="email" name="email" placeholder="" required="required" value="{{old('email')}}">--}}
                        {{--@error('email')--}}
                        {{--<span class="text-danger">{{$message}}</span>--}}
                        {{--@enderror--}}

                        {{--<label>Your Password<span>*</span></label>--}}
                        {{--<input type="password" name="password" placeholder="" required="required" value="{{old('password')}}">--}}
                        {{--@error('password')--}}
                        {{--<span class="text-danger">{{$message}}</span>--}}
                        {{--@enderror--}}

                        {{--<label>Confirm Password<span>*</span></label>--}}
                        {{--<input type="password" name="password_confirmation" placeholder="" required="required" value="{{old('password_confirmation')}}">--}}
                        {{--@error('password_confirmation')--}}
                        {{--<span class="text-danger">{{$message}}</span>--}}
                        {{--@enderror--}}

                        {{--<button type="submit">Register</button>--}}
                        {{--<a href="{{route('register.form')}}" class="btn">Login</a>--}}
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

