<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tenant Application</title>
    
    <!-- Favicons -->
    <link href="{{ asset('public/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('public/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900"
        rel="stylesheet" />
    <link href="{{ asset('public/assets/css/minstyle.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        <div id="header-sticky-wrapper" class="sticky-wrapper is-sticky" style="height: 88px">
            <header id="header" class="">
                <div class="container">
                    <div class="logo">
                        <img src="http://blount.us/irvine/public/assets/img/logo.png" />
                    </div>
                    <div class="box-icon"></div>
                </div>
            </header>
        </div>

        @include('flash-message')

        <div class="main-sec">
            <form action="{{ route('tenant-application',$referenceDetails->tenant_email) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mainform-heading">
                    <h2>Tenant Application</h2>
                </div>
                <div class="mainform-area">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <select class="form-control unit" id="unit" disabled>
                                    <option>{{ $unitDetails->unit_number }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Tenant Details --}}
                    <div class="row main-row">
                        <div class="col-sm-12">
                            <div class="tenantDetails">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="fname">First Name :</label>
                                            <input type="text" class="form-control" id="fname" onkeypress="return /[a-z]/i.test(event.key)" 
                                                name="first_name[]" value="{{ old('first_name[]') }}" maxlength="100" minlength="3" required/>
                                        </div>
                                        @error('first_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lname">Last Name :</label>
                                            <input type="text" class="form-control" id="lname"  onkeypress="return /[a-z]/i.test(event.key)"
                                                name="last_name[]" value="{{ old('last_name[]') }}" maxlength="100" required/>
                                        </div>
                                        @error('lart_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="birthdate">Date of Birth :</label>
                                            <input type="date" value="{{ old('dob[]') }}" class="form-control" id="birthdate" name="dob[]" required/>
                                        </div>
                                        @error('dob')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Phone :</label>
                                            <input type="number" value="{{ old('phone[]') }}" class="form-control" name="phone[]" required/>
                                        </div>
                                        @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ssn">SSN :</label>
                                            <input type="text" value="{{ old('ssn[]') }}" class="form-control" id="ssn" placeholder="" name="ssn[]" required/>
                                        </div>
                                        @error('ssn')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="valid">Valid ID :</label>
                                            <input type="file" name="valid_id[]" class="form-control-file" id="valid" required/>
                                        </div>
                                        @error('file')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="add-data tenantDetailsPlus">
                                <i class="fas fa-minus" id="tenantDetailsMinus"></i>
                                <i class="fas fa-plus" id="tenantDetailsPlus"></i>
                            </div>
                        </div>
                    </div>
                    {{-- End Tenant Details --}}

                    {{-- Pets --}}
                    <div class="row pets-section">
                        <div class="col-sm-3">
                            <div class="pets-sec">
                                <div class="pets-button">Pets</div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="row petDetails">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="breed">Breed :</label>
                                        <input type="text" onkeypress="return /[a-z]/i.test(event.key)" value="{{ old('breed[]') }}" class="form-control" maxlength="100" id="breed" name="breed[]" required/>
                                    </div>
                                    @error('breed')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="weight">Weight :</label>
                                        <input type="number" value="{{ old('weight[]') }}" class="form-control" value="weight" id="weight" name="weight[]" required/>
                                    </div>
                                    @error('weight')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <i class="fas fa-minus" id="petDetailsMinus"></i>
                            <i class="fas fa-plus" id="petDetailsPlus"></i>
                        </div>
                    </div>
                    <hr />
                    {{-- End Pet Section --}}

                    {{-- Renter Histroy Section --}}
                    <div class="heading">
                        <h2>Renter History</h2>
                    </div>
                    <div class="row renter-section">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputAddress">Current Address :</label>
                                <input type="text" class="form-control" value="{{ old('current_address') }}" maxlength="255" name="current_address" id="inputAddress" placeholder="Street" required/>
                            </div>
                            @error('current_address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" value="{{ old('current_city') }}" name="current_city" maxlength="255" id="inputCity" placeholder="City" required/>
                                </div>
                                @error('current_city')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" value="{{ old('current_state') }}" name="current_state" maxlength="255" id="inputState" placeholder="State" required/>
                                </div>
                                @error('current_state')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" value="{{ old('current_zip') }}" name="current_zip" maxlength="20" id="inputZip" placeholder="Zip" required/>
                                </div>
                                @error('current_zip')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="manager">Property Manager :</label>
                                <input type="text" name="property_manager" value="{{ old('property_manager') }}" maxlength="100" class="form-control" id="manager" placeholder="" required/>
                            </div>
                            @error('property_manager')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <label for="managerphone">Manager Phone :</label>
                                <input type="number" name="manager_phone" value="{{ old('manager_phone') }}" class="form-control" id="managerphone" placeholder="" required/>
                            </div>
                            @error('manager_phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="residence-length">Length of current residence :</label>
                                <input type="number" value="{{ old('current_residence_length') }}" name="current_residence_length" class="form-control" id="residence-length" required/>
                            </div>
                            @error('current_residence_length')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <label style="margin-top: 30px">Have you ever been served a late payment notice? If yes, explain</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="late_payment_notice_status" id="Radios1"
                                    value="0" checked />
                                <label class="form-check-label" for="Radios1"> No </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="late_payment_notice_status" id="Radios2"
                                    value="1" />
                                <label class="form-check-label" for="Radios2"> Yes </label>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="late_payment_notice_description" id="latepaymentreason" rows="3"></textarea>
                            </div>
                            <label style="margin-top: 30px">Do you somking_statuse ?</label>
                            <div class="form-check">
                                <input class="form-check-input" name="smoking_status" type="radio" id="Radios1"
                                    value="0" checked />
                                <label class="form-check-label" for="Radios1"> No </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="smoking_status" id="Radios2"
                                    value="1" />
                                <label class="form-check-label" for="Radios2"> Yes </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="movedate">When is your ideal move in date ?</label>
                                <input type="date" class="form-control" value="{{ old('move_in_date') }}" id="movedate" name="move_in_date" />
                            </div>
                            @error('move_in_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lease">How long do you want your lease to be ?</label>
                                <input type="number" value="{{ old('lease_length') }}" class="form-control" id="lease" name="lease_length" required/>
                            </div>
                            @error('lease_length')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <label for="movingreason">Why are you moving from your current residence ?</label>
                                <textarea class="form-control move-textarea" name="reason_to_move" id="movingreason" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr />
                    {{-- End Renter Histroy --}}

                    {{-- Employement History --}}
                    <div class="heading">
                        <h2>Employment History</h2>
                    </div>
                    <div class="row employment-section">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="curremployer">Current Employer :</label>
                                <input type="text" value="{{ old('current_employer') }}" name="current_employer" maxlength="255" class="form-control" required/>
                            </div>
                            @error('current_employer')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <label for="employstartdate">Date Started :</label>
                                <input type="date" value="{{ old('started_date') }}" name="started_date" class="form-control" placeholder=""
                                    name="employstartdate" required/>
                            </div>
                            @error('started_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputAddress">Employer Address :</label>
                                <input type="text" value="{{ old('employer_address') }}" class="form-control" name="employer_address" maxlength="255" placeholder="Street" required/>
                            </div>
                            @error('employer_address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>City</label>
                                    <input type="text" value="{{ old('employer_city') }}" class="form-control" name="employer_city" maxlength="100" placeholder="" required/>
                                </div>
                                @error('employer_city')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group col-md-4">
                                    <label>State</label>
                                    <input type="text" value="{{ old('employer_state') }}" class="form-control" name="employer_state" maxlength="100" placeholder="" required/>
                                </div>
                                @error('employer_state')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group col-md-4">
                                    <label>Zip</label>
                                    <input type="text" value="{{ old('employer_zip') }}" class="form-control" name="employer_zip" maxlength="20" placeholder="" required/>
                                </div>
                                @error('employer_zip')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="supervisorname">Supervisor Name :</label>
                                <input type="text" onkeypress="return /[a-z]/i.test(event.key)" value="{{ old('supervisor_name') }}" name="supervisor_name" class="form-control" placeholder="" />
                            </div>
                            @error('supervisor_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="supervisorphone">Supervisor Phone :</label>
                                <input type="number" value="{{ old('supervisor_phone') }}" class="form-control" id="supervisorphone" placeholder=""
                                    name="supervisor_phone" />
                            </div>
                            @error('supervisor_phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="supervisoremail">Supervisor Email :</label>
                                <input type="email" value="{{ old('supervisor_email') }}" class="form-control" name="supervisor_email" />
                            </div>
                            @error('supervisor_email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="grossincome">Gross Monthly Income :</label>
                                <input type="number" value="{{ old('gross_income') }}" class="form-control" placeholder="" name="gross_income" />
                            </div>
                            @error('gross_income')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="additionalincome">Additional Income Sources & Amounts :</label>
                                <textarea class="form-control move-textarea" name="extra_income" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr />
                    {{-- End Employement History --}}

                    {{-- References --}}
                    <div class="heading">
                        <h2>Refrences</h2>
                        <p>Please include at least three references below.</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="refname1">Reference Name :</label>
                                <input onkeypress="return /[a-z]/i.test(event.key)" type="text" class="form-control" value="{{ old('reference_name[]') }}" name="reference_name[]" maxlength="100" required/>
                                @error('reference_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="refphone1">Reference Phone :</label>
                                <input type="number" class="form-control" name="reference_phone[]" value="{{ old('reference_phone[]') }}" maxlength="100" required/>
                            </div>
                            @error('reference_phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="refname2">Reference Name :</label>
                                <input onkeypress="return /[a-z]/i.test(event.key)" type="text" class="form-control" name="reference_name[]" maxlength="100" required/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="refphone2">Reference Phone :</label>
                                <input type="number" class="form-control" name="reference_phone[]" maxlength="100" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row referenceDetails">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="refname3">Reference Name :</label>
                                <input onkeypress="return /[a-z]/i.test(event.key)" type="text" class="form-control" name="reference_name[]" maxlength="100" required/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="refphone3">Reference Phone :</label>
                                <input type="number" class="form-control" name="reference_phone[]" maxlength="100" required/>
                            </div>
                        </div>
                    </div>
                    <div class="add-data">
                        <i class="fas fa-minus" id="referenceMinus"></i>
                        <i class="fas fa-plus" id="referencePlus"></i>
                    </div>
                    <hr />
                    {{-- References --}}

                    {{-- Emergency Section --}}
                    <div class="heading">
                        <h2>Emergency Contact</h2>
                        <p>
                            Please include an emergency contact that does not reside at the
                            same residence.
                        </p>
                    </div>
                    <div class="row ememergencyDetails">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="emergencyname">Emergency Contact Name :</label>
                                <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" value="{{ old('emergency_name[]') }}" maxlength="100" placeholder=""
                                    name="emergency_name[]" required/>
                            </div>
                            @error('emergency_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="emergencyphone">Emergency Contact Phone :</label>
                                <input type="number" class="form-control" value="{{ old('emergency_phone[]') }}" maxlength="100" name="emergency_phone[]" required/>
                            </div>
                            @error('emergency_phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="contactrelation">Contact Relationship :</label>
                                <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" id="contactrelation" value="{{ old('relationship[]') }}"
                                    name="relationship[]" maxlength="30" required/>
                                @error('relationship')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="add-data">
                        <i class="fas fa-minus" id="ememergencyDetailsMinus"></i>
                        <i class="fas fa-plus" id="ememergencyDetailsPlus"></i>
                    </div>
                    <hr />
                    {{-- End Emergency Section --}}

                    {{-- Vehicle Information --}}
                    <div class="heading">
                        <h2>Vehicle Information</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="carscount">How many cars require parking space ?</label>
                                <input type="number" class="form-control" id="carscount" value="{{ old('car_no_parking_required') }}"
                                    name="car_no_parking_required" required/>
                            </div>
                            @error('car_no_parking_required')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="color">Color :</label>
                                <input type="text" class="form-control" onkeypress="return /[a-z]/i.test(event.key)" maxlength="50" value="{{ old('color') }}" name="color" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="make">Make :</label>
                                <input type="text" class="form-control" name="make" value="{{ old('make') }}" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="year">Year :</label>
                                <input type="number" class="form-control" id="year" value="{{ old('year') }}" placeholder="" name="year" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="model">Model :</label>
                                <input type="text" class="form-control" id="model" value="{{ old('model') }}" placeholder="" name="model" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="drivingno">DLN :</label>
                                <input type="text" class="form-control" maxlength="50" value="{{ old('dln') }}" name="dln" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="plateno">License Plate Number :</label>
                                <input type="text" class="form-control" value="{{ old('licence_plate_number') }}" name="licence_plate_number" maxlength="50"/>
                            </div>
                        </div>
                    </div>
                    <hr />
                    {{-- End Vehicle Information --}}

                    <div class="heading">
                        <h2>Disclosure and Authorization Signature</h2>
                        <h6>
                            I have completed this form and the information is both true and
                            correct. I authorize the property owner or manager to run a
                            credit check and/or background check. I authorize property owner
                            or manager to reach out to any and all references listed on the
                            rental application. I understand that any false statements made
                            on this rental application could result in rejection. I
                            understand that this rental application is solely an application
                            and is not a lease or commitment to rent in any way. I
                            understand and agree that the rental application fee is
                            non-refundable.
                        </h6>
                        <input type="checkbox" id="agree" name="auth_signature" value="1" required/>
                        <label for="agree" class="ml-2 mt-2"> I agree</label>
                    </div>
                    <div class="final-submission">
                        <button class="background-button">Take Background Check</button>
                        <button class="submit-button" type="submit">
                            Submit Profile
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="{{ asset('public/assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/main.js') }}"></script>
        @include('tenant.applicationJS')
    </main>
</body>

</html>
