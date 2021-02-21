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
<br><br>
@include('flash-message')
<section class="login-page tenbox-app">
    <div class="container">
        <div class="myheading">
            <h1 class="heading">Graham Cracker</h1>
        </div>
        <div class="agent-profile-row1 agent-profile-row11 row">
            <div class="col-md-12">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <h4 class="text-center">Add Units</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-left">
                                <label>Address</label>
                                <input class="form-control" value="{{ old('address') }}" name="address" type="text">
                            </div>
                            @error('address')
                                <p class="text-danger pull-left">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label>Unit Number</label>
                                <input class="form-control" value="{{ old('unit_number') }}" name="unit_number" type="text">
                            </div>
                            @error('unit_number')
                                <p class="text-danger pull-left">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label>Bedrooms in unit</label>
                                <input class="form-control" value="{{ old('bedroom') }}" name="bedroom" type="text">
                            </div>
                            @error('bedroom')
                                <p class="text-danger pull-left">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label>Bathrooms in unit</label>
                                <input class="form-control" value="{{ old('bathroom') }}" name="bathroom" type="text">
                            </div>
                            @error('bathroom')
                                <p class="text-danger pull-left">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label>Washer/Dryer</label>
                                <input class="form-control" value="{{ old('washer_dryer') }}" name="washer_dryer" type="text">
                            </div>
                            @error('washer_dryer')
                                <p class="text-danger pull-left">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label>AC</label>
                                <input class="form-control" value="{{ old('ac') }}" name="ac" type="text">
                            </div>
                            @error('ac')
                                <p class="text-danger pull-left">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label>Heating</label>
                                <input class="form-control" value="{{ old('heating') }}" name="heating" type="text">
                            </div>
                            @error('heating')
                                <p class="text-danger pull-left">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label>Appliances</label>
                                <input class="form-control" value="{{ old('appliances') }}" name="appliances" type="text">
                            </div>
                            @error('appliances')
                                <p class="text-danger pull-left">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label>Rent</label>
                                <input class="form-control" value="{{ old('rent') }}" name="rent" type="number">
                            </div>
                            @error('rent')
                                <p class="text-danger pull-left">{{ $message }}</p>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label>Square footage</label>
                                <input class="form-control" value="{{ old('square_footage') }}" name="square_footage" type="number">
                            </div>
                            @error('square_footage')
                                <p class="text-danger pull-left">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label>Year Built</label>
                                <input class="form-control" max="9999" value="{{ old('year_built') }}" name="year_built" type="number">
                            </div>
                            @error('year_built')
                                <p class="text-danger pull-left">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label>Year Remodeled</label>
                                <input class="form-control" max="9999" value="{{ old('year_remodeled') }}" name="year_remodeled" type="number">
                            </div>
                            @error('year_remodeled')
                                <p class="text-danger pull-left">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label>Unit Type</label>
                                <select name="unit_type" class="form-control">
                                    <option value="1">Commencial</option>
                                    <option value="2">Non Commencial</option>
                                </select>
                            </div>
                            @error('unit_type')
                                <p class="text-danger pull-left">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label>Upload Image</label>
                                <input class="form-control" name="upload_image" type="file">
                            </div>
                            @error('upload_image')
                                <p class="text-danger pull-left">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label>Parking Spot</label>
                                <input value="1" class="form-control" name="parking_spot" type="checkbox">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-left">
                                <label>Have you ever been served a late payment notice? If yes, please explain.</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-left">
                                <label>Have you ever been evicted? If yes, please explain.</label>
                            </div>
                        </div>
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