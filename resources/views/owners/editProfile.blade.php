@extends('layouts.auth')

@section('content')

@push('css')
<style>
    #login-box .right #validid-file {
        display: block;
        box-sizing: border-box;
        margin-bottom: 4px !important;
        padding: 4px;
        width: 220px;
        height: 32px;
        border: none;
        border-bottom: 1px solid #AAA;
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
        font-size: 15px;
        transition: 0.2s ease;
    }
</style>
@endpush
@include('flash-message')
<section class="login-page">
    <div class="container">
        <div id="login-box">
            <h1><b>Registration Form</b></h1>
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="left">
                    <input type="text" value="{{ $user->first_name }}" name="first_name" placeholder="First Name" />
                    @error('first_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" value="{{ $user->ssn }}" id="" name="ssn" placeholder="SSN:">
                    @error('ssn')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="password" name="current_password" placeholder="Current Password" />
                    @error('current_password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="password" name="password" placeholder="New Password" />
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>
                <div class="right">
                    <input type="text" value="{{ $user->last_name }}" name="last_name" placeholder="Last Name" />
                    @error('last_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" value="{{ $user->phone }}" name="phone" placeholder="Phone" />
                    @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <img src="{{ url('public/uploads/images/bank_statement').'/'.$user->bank_statement }}" width="100px;" width="100px" alt="bank-statement">
                    <input type="file" id="validid-file" name="bank_statement"><span>(Eg:- Bank Statement)</span>
                    @error('bank_statement')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="password" name="confirm_password" placeholder="Retype password" />
                    @error('confirm_password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" value="{{ $user->income }}" name="income" placeholder="Yearly Income" />
                    @error('income')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" id="button_signmeup" value="Sign me up"/>
            </form>
        </div>
    </div>
</section>

@endsection