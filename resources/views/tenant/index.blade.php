@extends('layouts.auth')

@section('content')

@push('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <style>
        body {
            font-family: "Raleway", sans-serif;
        }

        .pay-amount label {
            width: 260px !important;
            font-weight: 600;
        }

        .pay-amount span {
            width: 200px;
        }

        .agent-profile-row1.agent-profile-row18 {
            border-radius: 40px !important;
            margin: 15px 0;
        }

        .tenbox13 h4,
        .tenbox14 h4 {
            font-size: 28px;
            padding: 5px 45px;
            line-height: 32px;
        }

        .custom-model-main {
            text-align: center;
            overflow: hidden;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            -webkit-overflow-scrolling: touch;
            outline: 0;
            opacity: 0;
            -webkit-transition: opacity 0.15s linear, z-index 0.15;
            -o-transition: opacity 0.15s linear, z-index 0.15;
            transition: opacity 0.15s linear, z-index 0.15;
            z-index: -1;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .model-open {
            z-index: 99999;
            opacity: 1;
            overflow: hidden;
        }

        .custom-model-inner {
            -webkit-transform: translate(0, -25%);
            -ms-transform: translate(0, -25%);
            transform: translate(0, -25%);
            -webkit-transition: -webkit-transform 0.3s ease-out;
            -o-transition: -o-transform 0.3s ease-out;
            transition: -webkit-transform 0.3s ease-out;
            -o-transition: transform 0.3s ease-out;
            transition: transform 0.3s ease-out;
            transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
            display: inline-block;
            vertical-align: middle;
            width: 600px;
            margin: 30px auto;
            max-width: 97%;
        }

        .custom-model-wrap::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .custom-model-wrap {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .custom-model-wrap {
            display: block;
            width: 100%;
            position: relative;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 6px;
            -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
            box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
            background-clip: padding-box;
            outline: 0;
            text-align: left;
            padding: 20px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            max-height: calc(100vh - 70px);
            overflow-y: scroll;
        }

        .model-open .custom-model-inner {
            -webkit-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            transform: translate(0, 0);
            position: relative;
            z-index: 999;
        }

        .model-open .bg-overlay {
            background: rgba(0, 0, 0, 0.6);
            z-index: 99;
        }

        .bg-overlay {
            background: rgba(0, 0, 0, 0);
            height: 100vh;
            width: 100%;
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 0;
            -webkit-transition: background 0.15s linear;
            -o-transition: background 0.15s linear;
            transition: background 0.15s linear;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
        }

        .close-btn {
            position: absolute;
            right: 15px;
            top: 20px;
            cursor: pointer;
            z-index: 99;
            color: #fff;
        }

        .submit {
            text-align: center;
        }

        .submit button {
            background: #44d43b;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            color: #fff;
            min-width: 120px;
            margin: 20px auto;
        }

        .close-btn i {
            color: tomato;
            background-color: ghostwhite;
            padding: 6px 9px;
            border-radius: 50px;
            font-size: 18px;
            box-shadow: 0px 0px 25px -5px rgba(0, 0, 0, 0.7);
        }

        .form-heading {
            text-align: center;
        }

        .form-heading p {
            max-width: 80%;
            margin: 0px auto 10px auto;
        }

        .form-wrap {
            color: #fff;
            padding: 25px 30px;
        }

        .form-heading h4 {
            margin: 15px auto;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 25px;
        }

        .multi-date {
            display: flex;
            align-items: center;
        }

        .multi-date i {
            color: #44d43b;
            background-color: ghostwhite;
            padding: 10px 11px;
            border-radius: 50px;
            font-size: 18px;
            box-shadow: 0px 0px 25px -5px rgba(0, 0, 0, 0.7);
            margin-left: 7px;
            cursor: pointer;
        }

        .form-wrap form label {
            font-weight: 600;
        }

        @media screen and (min-width: 800px) {
            .custom-model-main:before {
                content: "";
                display: inline-block;
                height: auto;
                vertical-align: middle;
                margin-right: -0px;
                height: 100%;
            }
        }

        @media screen and (max-width: 767px) {
            .custom-model-inner {
                margin-top: 45px;
            }

            .form-wrap {
                color: #fff;
                padding: 20px 10px;
            }

            .form-heading h4 {
                font-size: 20px;
            }
        }

    </style>
@endpush
<br>
    <section class="page10 login-page2 tenbox-app2">
        <div class="container">
            <div class="newagent-profile-row1 agent-profile-row1 agent-profile-row11">
                <div class="tenbox11 tenbox12">
                    <form>
                        <ul>
                            <li>
                                <h3>
                                    {{ $userDetails->applicationTenants->first_name.' '.$userDetails->applicationTenants->last_name }}                                    
                                </h3>
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="tenbox11 imgtenbox12">
                    <img height="100px" width="100px" src="{{ asset('public/uploads/images/default/default_image.png') }}" alt="profile-img">
                </div>
            </div>
            <div class="agent-profile-row agent-profile-row3 ntpsection">
                <div class="agent-profile-left">
                    <ul class="pay-amount">
                        <li>
                            <label>Payment Amount:</label>
                            <span>${{ $referTenant->units->rent }}</span>
                        </li>
                        <li>
                            <label>Due Date:</label>
                            <span>1/1/2020</span>
                        </li>
                    </ul>
                    <a href="" class="payrent-btn sign-btn">Pay Rent</a>
                    <ul class="threebtns">
                        <li>
                            <a href="#" id="myBtn">See Payment History</a>
                        </li>
                        <li>
                            <a href="#" id="">Manage Autopay</a>
                        </li>
                        <li>
                            <a href="#" id="myBtn3">Payment Methods</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="agent-profile-row1 agent-profile-row11 agent-profile-row18">
                <div class="tenbox11 tenbox13">
                    <ul class="pay-amount">
                        <li>
                            <label>Lease End:</label>
                            <span>1/1/2020</span>
                        </li>
                        <li>
                            <label>Unit sqft:</label>
                            <span>{{ $referTenant->units->square_footage }}</span>
                        </li>
                    </ul>
                </div>
                <div class="tenbox11 tenbox14">
                    <ul class="pay-amount">
                        <li>
                            <label>Lease Start:</label>
                            <span>{{ date_format(date_create($userDetails->updated_at),"d/m/Y") }}</span>
                        </li>
                        <li>
                            <label>Lease Doc:</label>
                            <span>
                                <a href="#">Click Here</a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="agent-profile-row1 agent-profile-row11 agent-profile-row18">
                @include('tenant.modals.maintenanceRequest')
                <div class="tenbox11 tenbox14">
                    <h4>Submit Maintenance Requests</h4>
                    <ul class="pay-amount">
                        @php
                            $i = 0;
                        @endphp
                        @forelse ($maintenanceRequests as $maintenanceRequest)
                            @php
                                $i++;
                            @endphp
                            @if ($i>2)
                                break;
                            @endif
                            <li>
                                
                                <label>Date:</label>
                                <span>{{ date_format(date_create($maintenanceRequest->created_at),"d/m/Y") }}</span>
                            </li>
                            <li>
                                <label>Status:</label>
                                <span>{{ $maintenanceRequest->status }}</span>
                            </li>
                        @empty
                            <li>
                                <td colspan="2">No Requests Available</td>
                            </li>
                        @endforelse
                    </ul>
                    <p>
                        <a href="#" id="myBtn2">See All</a>
                    </p>
                </div>
            </div>
    </section>
 
    <!-- The Modal -->
    @include('tenant.modals.Logs.maintenance')
    @include('tenant.modals.Logs.paymentMethod')
    @include('tenant.modals.Logs.payment')
    
@endsection
        
@push('scripts')
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
    <script>
        // Get the modal
        var modal1 = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal1.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal1.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal1) {
                modal1.style.display = "none";
            }
        }

    </script>
    <script>
        // Get the modal
        var modal2 = document.getElementById("myModal2");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn2");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close2")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal2.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal2.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }

    </script>
    <script>
        // Get the modal
        var modal3 = document.getElementById("myModal3");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn3");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close3")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal3.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal3.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal3) {
                modal3.style.display = "none";
            }
        }

    </script>
    <script>
        $(".modal-op").on('click', function() {
            $(".custom-model-main").addClass('model-open');
        });
        $(".close-btn, .bg-overlay").click(function() {
            $(".custom-model-main").removeClass('model-open');
        });

        $(document).ready(function(){
            $("#availableTimePlus").on("click",function(e){
                e.preventDefault();
                var numDiv = $('.availableTime').length;
                if (numDiv>=3) {
                    return;
                }
                $('div.availableTime:last').clone().insertAfter('div.availableTime:last');
                $('div.availableTime input[name="available_time[]"]:last').val('');
            });

            $('#availableTimeMinus').on('click',function(e){
                var numDiv = $('.availableTime').length;
                if (numDiv>1) {
                    $('div.availableTime:last').remove('div.availableTime:last');
                }
            });
        });

    </script>

@endpush
