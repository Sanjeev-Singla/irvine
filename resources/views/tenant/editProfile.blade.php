@extends('layouts.auth')

@section('content')

@push('css')
    <style>
        @media(max-width: 640px) {
            .box-icon {
                position: absolute;
                right: 0;
                left: 80% !important;
                top: 4px !important;
                font-size: 48px;
                margin: auto;
                text-align: center;
            }

            #header .logo img {
                padding: 0;
                margin: 0;
                width: 100%;
                margin-left: -30px !important;
            }
        }
    </style>
@endpush
<br>
@include('flash-message')
<section class="login-page tenbox-app">
    <div class="container">
        <div class="myheading">
            <h1 class="heading">Tenant Application</h1>
        </div>
        <div class="agent-profile-row1 agent-profile-row11">
            <form method="POST" action="" enctype="multipart/form-data">
            
                <div class="tenbox11 tenbox12">
                    @csrf
                    <ul>
                        <li>
                            <label>First Name:</label>
                            <input type="text" value="{{ $user->first_name }}" name="first_name" placeholder="John">
                        </li>
                        @error('first_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <li>
                            <label>Last Name:</label>
                            <input type="text" value="{{ $user->first_name }}" name="first_name" placeholder="Doe">
                        </li>
                        @error('last_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </ul>
                </div>

                <div class="tenbox11 imgtenbox12">
                    <img id="blah" src="{{ $user->profile_image }}" width="100px;" width="100px" alt="your image" />
                    <input type='file' name='profile_image' onchange="readURL(this);" />
                    @error('profile_image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="tenbox11 tenbox13">
                    <ul>
                        <li><label>Phone:</label><input type="tel" value="{{ $user->phone }}" name="phone" placeholder="Phone"></li>
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </ul>
                </div>

                <div class="tenbox11 tenbox14">
                    <ul>
                        <li>
                            <label>Birthdate:</label>
                            <input type="date" name="dob" placeholder="DD-MM-YYYY" value="{{ $user->dob }}" min="1970-01-01">
                        </li>
                        @error('dob')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <li>
                            <img src="{{ $user->valid_id }}" alt="">
                            <label>Valid ID:</label>
                            <input type="file" id="validid-file" name="valid_id">
                        </li>
                        @error('valid_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <li>
                            <label>Financials:</label>
                            <input type="file" id="financials-file" value="{{ $user->financials }}" name="financials">
                        </li>
                        <li>
                            {{-- <label>SSN:</label> --}}
                            <input type="text" name="ssn" value="{{ $user->ssn }}" placeholder="SSN:">
                        </li>

                        <li>
                            {{-- <label>Current Password:</label> --}}
                            <input type="password" name="current_password" placeholder="Password">
                        </li>
                        @error('current_password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <li>
                            {{-- <label>New Password:</label> --}}
                            <input type="password" name="password" placeholder="Password">
                        </li>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <li>
                            {{-- <label>Re-Enter Password:</label> --}}
                            <input type="password" name="confirm_password" placeholder="Re-Enter Password">
                        </li>
                        @error('confirm_password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </ul>
                </div>

                <div class="tenbox11 tenbox15">
                    <button id="button_signmeup" type="submit">Submit Profile</button>
                </div>

            </form>
        </div>
    </div>

    </div>
</section>

@endsection        