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

<section class="login-page2 tenbox-app2">
    <div class="container">
        <form>
            <div class="newagent-profile-row1 agent-profile-row1 agent-profile-row11">
                <div class="tenbox11 tenbox12">
                    <ul>
                        <li><label>First Name:</label><span>{{ $userDetails['first_name'] }}</span></li>
                        <li><label>Last Name:</label><span>{{ $userDetails['last_name'] }}</span></li>
                    </ul>

                </div>
                <div class="tenbox11 imgtenbox12">
                    <img src="{{ $userDetails->profile_image }}" width="100px;" width="100px" alt="profile-img">
                </div>
            </div>
            <div class="newagent-profile-row1 agent-profile-row1 agent-profile-row11">

                <div class="editbtn tenboxeditbtn"><a href="{{ route('update-tenant-profile') }}" class="btn btn-secondary rounded-pill">Edit</a></div>
                <div class="tenbox11 tenbox13">

                    <ul>
                        <li><label>Email:</label><span>{{ $userDetails['email'] }}</span></li>
                        <li><label>Phone:</label><span>{{ $userDetails['phone'] }}</span></li>
                    </ul>
                    <a style="margin-left: 39px;" class="btn btn-danger pull-left" href="{{ route('logout') }}">Logout</a>
                </div>
                <div class="tenbox11 tenbox14">
                    <ul>
                        <li><label>Birthdate:</label><span>{{ $userDetails['dob'] }}</span></li>
                        <li><label>Financials:</label><span><img alt='financial-img' src="{{ $userDetails['financials'] }}" width="20px;"></span></li>
                        <li><label>SSN:</label><span>{{ $userDetails['ssn'] }}</span></li>
                        <li><label>Password:</label><span>Enter Here</span></li>
                        <li><label>Re-Enter Password:</label><span>Enter Here</span></li>
                    </ul>
                </div>
                
            </div>
        </form>
    </div>

</section>

@endsection