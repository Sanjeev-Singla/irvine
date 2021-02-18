@extends('layouts.auth')

@section('content')

@push('css')
    <style>
        .sign-btn {
            align-self: center;
            background-color: #61d836;
            padding: 20px 30px;
            color: #fff;
            text-decoration: none;
            border-radius: 100%;
            margin-top: 30px;
            box-shadow: 0px 7px 15px -10px rgb(0 0 0 / 34%);
        }
    </style>
@endpush
@include('flash-message')
<section class="login-page">
    <div class="container">
        <div class="agent-profile-row login-row ">
            <div class="agent-profile-left">
                <h2><b>Login</b></h2>
                @if (Session::has('success'))
                    <div class="alert alert-danger">
                        <i class="fa fa-times-circle"></i> {{ Session::get('success') }}
                    </div>
                @endif
                <br>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <ul class="tenant">
                        <li><label><b>Email:&nbsp;&nbsp;<b></label><input type="email" id="" name="email" placeholder=""></li>
                        <li><label><b>Pasword:&nbsp;&nbsp;</b></label><input type="password" id="" name="password" placeholder=""></li>
                        <center>
                            <li><input type="submit" id="" name="" value="Login"></li>
                        </center>
                    </ul>
                </form>
                <div class="row">
                    <div class="col-sm-6 mt-2">
                        <a href="{{ route('owner-register') }}">Register Now</a>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <a href="#">Forgot Pawword</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection