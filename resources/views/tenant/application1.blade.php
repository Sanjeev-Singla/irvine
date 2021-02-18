@extends('layouts.auth')

@section('content')

    @include('flash-message')
    <br><br>
    <section class="login-page tenbox-app">
        <div class="container">
            <div class="myheading">
                <h1 class="heading">Graham Cracker</h1>
            </div>

            <div class="agent-profile-row1 agent-profile-row11 row">
                <div class="col-md-12">
                    <form action="{{ route('tenant-application') }}" method="POST">
                        @csrf
                        <h4 class="text-center">Applications</h4>
                        <h5 class="text-left mb-3">Personal Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Full Name</label>
                                    <input class="form-control" value="{{ old('full_name') }}" name='full_name' type="text" required>
                                </div>
                                @error('full_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Date of Birth</label>
                                    <input class="form-control" value="{{ old('dob') }}" name='dob' type="date" required>
                                </div>
                                @error('dob')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Social Security Number</label>
                                    <input name="social_security_number" value="{{ old('social_security_number') }}" class="form-control" type="text" required>
                                </div>
                                @error('social_security_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Cell Phone Number</label>
                                    <input name="phone" value="{{ old('phone') }}" class="form-control" type="number" required>
                                </div>
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label>Email Address</label>
                                    <input name="email" value="{{ old('email') }}" class="form-control" type="text" required>
                                </div>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <h5 class="text-left mb-3">Additional Occupant Info (18+)</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Full Name</label>
                                    <input name="occupant_full_name" value="{{ old('occupant_full_name') }}" class="form-control" type="text" required>
                                </div>
                                @error('occupant_full_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Date of Birth</label>
                                    <input name="occupant_dob" value="{{ old('occupant_dob') }}" class="form-control" type="date" required>
                                </div>
                                @error('occupant_dob')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Social Security Number</label>
                                    <input name="occupant_social_security_number" value="{{ old('occupant_social_security_number') }}" class="form-control" type="text" required>
                                </div>
                                @error('occupant_social_security_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Cell Phone Number</label>
                                    <input name="occupant_phone" value="{{ old('occupant_phone') }}" class="form-control" type="number" required>
                                </div>
                                @error('occupant_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label>Email Address</label>
                                    <input name="occupant_email" value="{{ old('occupant_email') }}" class="form-control" type="email" required>
                                </div>
                                @error('occupant_email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <h5 class="text-left mb-3"> Additional Occupant Info (Under 18)</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Full Name</label>
                                    <input name="full_name_1" value="{{ old('full_name_1') }}" class="form-control" type="text" required>
                                </div>
                                @error('full_name_1')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label> Relationship to Resident</label>
                                    <input name="relationship_1" value="{{ old('relationship_1') }}" class="form-control" type="text" required>
                                </div>
                                @error('relationship_1')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Full Name</label>
                                    <input name="full_name_2" value="{{ old('full_name_2') }}" class="form-control" type="text" required>
                                </div>
                                @error('full_name_2')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label> Relationship to Resident</label>
                                    <input name="relationship_2" value="{{ old('relationship_2') }}" class="form-control" type="text" required>
                                </div>
                                @error('relationship_2')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Full Name</label>
                                    <input name="full_name_3" value="{{ old('full_name_3') }}" class="form-control" type="text" required>
                                </div>
                                @error('full_name_3')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label> Relationship to Resident</label>
                                    <input name="relationship_3" value="{{ old('relationship_3') }}" class="form-control" type="text" required>
                                </div>
                                @error('relationship_3')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <h5 class="text-left mb-3">Pets</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Type</label>
                                    <input name="type" value="{{ old('type') }}" class="form-control" type="text" required>
                                </div>
                                @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Breed</label>
                                    <input name="breed" value="{{ old('breed') }}" class="form-control" type="text" required>
                                </div>
                                @error('breed')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Size</label>
                                    <input name="size" value="{{ old('size') }}" class="form-control" type="number" required>
                                </div>
                                @error('size')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Weight</label>
                                    <input name="weight" value="{{ old('weight') }}" class="form-control" type="number" required>
                                </div>
                                @error('weight')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <h5 class="text-left mb-3">Renter History</h5>



                        <h6>Current Address</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Street Address</label>
                                    <input value="{{ old('street_address') }}" name="street_address" class="form-control" type="text" required>
                                </div>
                                @error('street_address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>City</label>
                                    <input name="city" value="{{ old('city') }}" class="form-control" type="text" required>
                                </div>
                                @error('city')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>State</label>
                                    <input name="state" value="{{ old('state') }}" class="form-control" type="text" required>
                                </div>
                                @error('state')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Zip Code</label>
                                    <input name="zip_code" value="{{ old('zip_code') }}" class="form-control" type="text" required>
                                </div>
                                @error('zip_code')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Owner/Property Manager Name</label>
                                    <input name="property_owner_name" value="{{ old('property_owner_name') }}" class="form-control" type="text" required>
                                </div>
                                @error('property_owner_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Owner/Property Manager Phone Number</label>
                                    <input name="property_owner_phone" value="{{ old('property_owner_phone') }}" class="form-control" type="number" required>
                                </div>
                                @error('property_owner_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label>Length of current residence</label>
                                    <input name="current_residence_length" class="form-control" type="number" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label>Have you ever been served a late payment notice? If yes, please explain.</label>
                                    <textarea name="late_payment_notice_description" class="form-control" type="textarea">{{ old('late_payment_notice_description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label>Have you ever been evicted? If yes, please explain.</label>
                                    <textarea name="evicated_description" class="form-control" type="textarea">{{ old('evicated_description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label>Have you ever been convicted of a felony? If yes, please explain.</label>
                                    <textarea name="felony_convicted_description" class="form-control" type="textarea">{{ old('felony_convicted_description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <h5 class="text-left mb-3">Background Check</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label>Do you smoke?</label>
                                    <select name="smoke_status" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label>When are you looking to move in?</label>
                                    <input value="{{ old('looking_to_move_date') }}" name="looking_to_move_date" class="form-control" type="date" required>
                                </div>
                                @error('looking_to_move_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label>What length of a lease are you looking for?</label>
                                    <input name="lease_length_looking_for" value="{{ old('lease_length_looking_for') }}" class="form-control" type="number" required>
                                </div>
                                @error('lease_length_looking_for')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label>Why are you moving from your current place of residence?</label>
                                    <input name="reason_to_move" value="{{ old('reason_to_move') }}" class="form-control" type="text" required>
                                </div>
                                @error('reason_to_move')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <h5 class="text-left mb-3">Employment History</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label>Current Place of Employment & Address</label>
                                    <input name="employer_address" value="{{ old('employer_address') }}" class="form-control" type="text" required>
                                </div>
                                @error('employer_address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label>Length of Employment </label>
                                    <input name="employement_length" value="{{ old('employement_length') }}" class="form-control" type="number" required>
                                </div>
                                @error('employement_length')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Supervisor Name </label>
                                    <input name="supervisor_name" value="{{ old('supervisor_name') }}" class="form-control" type="text" required>
                                </div>
                                @error('supervisor_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Supervisor Phone Number</label>
                                    <input name="supervisor_phone" value="{{ old('supervisor_phone') }}" class="form-control" type="number" required>
                                </div>
                                @error('supervisor_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Supervisor Email Address</label>
                                    <input name="supervisor_email" value="{{ old('supervisor_email') }}" class="form-control" type="email" required>
                                </div>
                                @error('supervisor_email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Gross Monthly Income</label>
                                    <input name="gross_income" value="{{ old('gross_income') }}" class="form-control" type="number" required>
                                </div>
                                @error('gross_income')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label>Additional Income Sources & Amount</label>
                                    <input name="additional_income_source" value="{{ old('additional_income_source') }}" class="form-control" type="number" required>
                                </div>
                                @error('additional_income_source')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <h5 class="text-left mb-3">Credit History (Background Check)</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label>Have you ever filed for bankruptcy? If yes, please explain.</label>
                                    <textarea name="bankruptcy_description" class="form-control" type="textarea">{{ old('bankruptcy_description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label>If you are unable to pay rent, is someone able to loan you the money?</label>
                                    <select name="is_someone_pay_loan" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <h5 class="text-left mb-3">Please include person’s name, phone number and email address if
                            applicable.</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Person’s Name</label>
                                    <input value="{{ old('person_name') }}" name="person_name" class="form-control" type="text" required>
                                </div>
                                @error('person_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Phone Number</label>
                                    <input name="person_phone" value="{{ old('person_phone') }}" class="form-control" type="number" required>
                                </div>
                                @error('person_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Email Address</label>
                                    <input name="person_email" value="{{ old('person_email') }}" class="form-control" type="email" required>
                                </div>
                                @error('person_email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <h5 class="text-left mb-3">Current Loans & Amount Owed (list all that apply)</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Current Loans</label>
                                    <select name="current_loan" class="form-control">
                                        <option name="1">Loan1</option>
                                        <option name="2">Loan2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Amount Owed</label>
                                    <input type="number" value="{{ old('loan_amount') }}" name="loan_amount" class="form-control" required>
                                </div>
                                @error('loan_amount')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <h5 class="text-left mb-3">Reference and Emergency Contact Information. Please include at least
                            three references below and one emergency contact. Emergency contact must not live at the same
                            residence.</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Name</label>
                                    <input name="name_1" value="{{ old('name_1') }}" class="form-control" type="text" required>
                                </div>
                                @error('name_1')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Phone Number</label>
                                    <input name="phone_1" value="{{ old('phone_1') }}" class="form-control" type="number" required>
                                </div>
                                @error('phone_1')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Name</label>
                                    <input name="name_2" value="{{ old('name_2') }}" class="form-control" type="text" required>
                                </div>
                                @error('name_2')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Phone Number</label>
                                    <input name="phone_2" value="{{ old('phone_2') }}" class="form-control" type="number" required>
                                </div>
                                @error('phone_2')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Name</label>
                                    <input name="name_3" value="{{ old('name_3') }}" class="form-control" type="text" required>
                                </div>
                                @error('name_3')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Phone Number</label>
                                    <input name="phone_3" value="{{ old('phone_3') }}" class="form-control" type="number" required>
                                </div>
                                @error('phone_3')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Emergency Contact Name</label>
                                    <input name="emergency_person_name" value="{{ old('emergency_person_name') }}" class="form-control" type="text" required>
                                </div>
                                @error('emergency_person_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Emergency Phone Number</label>
                                    <input name="emergency_phone" value="{{ old('emergency_phone') }}" class="form-control" type="number" required>
                                </div>
                                @error('emergency_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <h5 class="text-left mb-3">Vehicle Information</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label> How many cars require parking space if application is accepted?</label>
                                    <select name="car_no_parking_required" class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Make</label>
                                    <select name="make" class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Model</label>
                                    <select name="model" class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Color</label>
                                    <select name="color" class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Year</label>
                                    <select name="year" class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>Driver’s License Number</label>
                                    <input name="licence_number" value="{{ old('licence_number') }}" class="form-control" type="text" required>
                                </div>
                                @error('licence_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label>License Plate Number</label>
                                    <input name="licence_plate_number" value="{{ old('licence_plate_number') }}" class="form-control" type="text" required>
                                </div>
                                @error('licence_plate_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <h5 class="text-left">Disclosure and Authorization Signature:</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <input name="auth_signature" value="1" type="checkbox">I have completed this form and the information is both true and
                                    correct. I authorize the property owner or manager to run a credit check and/or
                                    background check. I authorize property owner or manager to reach out to any and all
                                    references listed on the rental application. I understand that any false statements made
                                    on this rental application could result in rejection. I understand that this rental
                                    application is solely an application and is not a lease or commitment to rent in any
                                    way. I understand and agree that the rental application fee is non-refundable.
                                </div>
                                <input name="auth_signature_date" class="form-control" type="hidden" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="tenbox11 tenbox15">
                            <button id="button_signmeup" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
