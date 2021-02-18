<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>abhced</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900"
        rel="stylesheet" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="minstyle.css" />
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
        <div class="main-sec">
            <form>
                <div class="mainform-heading">
                    <h2>Tenant Application</h2>
                </div>
                <div class="mainform-area">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="form-group">
                                <select class="form-control unit" id="unit">
                                    <option value="">Unit</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row main-row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="fname">First Name :</label>
                                        <input type="text" class="form-control" id="fname" placeholder=""
                                            name="fname" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lname">Last Name :</label>
                                        <input type="email" class="form-control" id="lname" placeholder=""
                                            name="lname" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="birthdate">Date of Birth :</label>
                                        <input type="date" class="form-control" id="birthdate" placeholder=""
                                            name="birthdate" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Phone :</label>
                                        <input type="number" class="form-control" id="phone" placeholder=""
                                            name="phone" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="ssn">SSN :</label>
                                        <input type="number" class="form-control" id="ssn" placeholder="" name="ssn" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="valid">Valid ID :</label>
                                        <input type="file" class="form-control-file" id="valid" />
                                    </div>
                                </div>
                            </div>

                            <div class="add-data">
                                <i class="fas fa-minus"></i>
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                        <!-- <div class="col-sm-4" style="vertical-align: middle;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="avatar-wrapper">
                                            <img class="profile-pic" src="">
                                            <div class="upload-button">
                                                <i class="fas fa-file-upload" aria-hidden="true"></i>
                                            </div>
                                            <input class="file-upload" type="file" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                    </div>
                    <div class="row pets-section">
                        <div class="col-sm-3">
                            <div class="pets-sec">
                                <div class="pets-button">Pets</div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="breed">Breed :</label>
                                        <input type="text" class="form-control" id="breed" placeholder=""
                                            name="breed" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="weight">Weight :</label>
                                        <input type="number" class="form-control" id="weight" placeholder=""
                                            name="weight" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-center">
                            <i class="fas fa-minus"></i>
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                    <hr />
                    <div class="heading">
                        <h2>Renter History</h2>
                    </div>
                    <div class="row renter-section">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputAddress">Current Address :</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="Street" />
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="inputCity" placeholder="City" />
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="inputState" placeholder="State" />
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="inputZip" placeholder="Zip" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="manager">Property Manager :</label>
                                <input type="text" class="form-control" id="manager" placeholder="" name="manager" />
                            </div>
                            <div class="form-group">
                                <label for="managerphone">Manager Phone :</label>
                                <input type="number" class="form-control" id="managerphone" placeholder=""
                                    name="managerphone" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="residence-length">Length of current residence :</label>
                                <input type="number" class="form-control" id="residence-length" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label style="margin-top: 30px">Have you ever been served a late payment notice? If yes,
                                explain</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="latepayment" id="Radios1"
                                    value="option1" checked />
                                <label class="form-check-label" for="Radios1"> No </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="latepayment" id="Radios2"
                                    value="option2" />
                                <label class="form-check-label" for="Radios2"> Yes </label>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="latepaymentreason" rows="3"></textarea>
                            </div>
                            <label style="margin-top: 30px">Do you smoke ?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question" id="Radios1"
                                    value="option1" checked />
                                <label class="form-check-label" for="Radios1"> No </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question" id="Radios2"
                                    value="option2" />
                                <label class="form-check-label" for="Radios2"> Yes </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="movedate">When is your ideal move in date ?</label>
                                <input type="date" class="form-control" id="movedate" placeholder="" name="movedate" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lease">How long do you want your lease to be ?</label>
                                <input type="number" class="form-control" id="lease" placeholder="" name="lease" />
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <label for="movingreason">Why are you moving from your current residence ?</label>
                                <textarea class="form-control move-textarea" id="movingreason" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="heading">
                        <h2>Employment History</h2>
                    </div>
                    <div class="row employment-section">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="curremployer">Current Employer :</label>
                                <input type="email" class="form-control" id="curremployer" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label for="employstartdate">Date Started :</label>
                                <input type="date" class="form-control" id="employstartdate" placeholder=""
                                    name="employstartdate" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputAddress">Employer Address :</label>
                                <input type="text" class="form-control" id="employerinputAddress"
                                    placeholder="Street" />
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>City</label>
                                    <input type="text" class="form-control" id="employerinputCity" placeholder="" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>State</label>
                                    <input type="text" class="form-control" id="employerinputState" placeholder="" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Zip</label>
                                    <input type="text" class="form-control" id="employerinputZip" placeholder="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="supervisorname">Supervisor Name :</label>
                                <input type="email" class="form-control" id="supervisorname" placeholder="" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="supervisorphone">Supervisor Phone :</label>
                                <input type="number" class="form-control" id="supervisorphone" placeholder=""
                                    name="supervisorphone" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="supervisoremail">Supervisor Email :</label>
                                <input type="email" class="form-control" id="supervisoremail" placeholder=""
                                    name="supervisoremail" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="grossincome">Gross Monthly Income :</label>
                                <input type="number" class="form-control" id="grossincome" placeholder=""
                                    name="grossincome" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="additionalincome">Additional Income Sources & Amounts :</label>
                                <textarea class="form-control move-textarea" id="additionalincome" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="heading">
                        <h2>Refrences</h2>
                        <p>Please include at least three references below.</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="refname1">Reference 1 Name :</label>
                                <input type="text" class="form-control" id="refname1" placeholder="" name="refname1" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="refphone1">Reference 1 Phone :</label>
                                <input type="number" class="form-control" id="refphone1" placeholder=""
                                    name="refphone1" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="refname2">Reference 2 Name :</label>
                                <input type="text" class="form-control" id="refname2" placeholder="" name="refname2" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="refphone2">Reference 2 Phone :</label>
                                <input type="number" class="form-control" id="refphone2" placeholder=""
                                    name="refphone2" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="refname3">Reference 3 Name :</label>
                                <input type="text" class="form-control" id="refname3" placeholder="" name="refname3" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="refphone3">Reference 3 Phone :</label>
                                <input type="number" class="form-control" id="refphone3" placeholder=""
                                    name="refphone3" />
                            </div>
                        </div>
                    </div>
                    <div class="add-data">
                        <i class="fas fa-minus"></i>
                        <i class="fas fa-plus"></i>
                    </div>
                    <hr />
                    <div class="heading">
                        <h2>Emergency Contact</h2>
                        <p>
                            Please include an emergency contact that does not reside at the
                            same residence.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="emergencyname">Emergency Contact Name :</label>
                                <input type="text" class="form-control" id="emergencyname" placeholder=""
                                    name="emergencyname" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="emergencyphone">Emergency Contact Phone :</label>
                                <input type="number" class="form-control" id="emergencyphone" placeholder=""
                                    name="emergencyphone" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="contactrelation">Contact Relationship :</label>
                                <input type="text" class="form-control" id="contactrelation" placeholder=""
                                    name="contactrelation" />
                            </div>
                        </div>
                    </div>
                    <div class="add-data">
                        <i class="fas fa-minus"></i>
                        <i class="fas fa-plus"></i>
                    </div>
                    <hr />
                    <div class="heading">
                        <h2>Vehicle Information</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="carscount">How many cars require parking space ?</label>
                                <input type="number" class="form-control" id="carscount" placeholder=""
                                    name="carscount" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="color">Color :</label>
                                <input type="text" class="form-control" id="color" placeholder="" name="color" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="make">Make :</label>
                                <input type="number" class="form-control" id="make" placeholder="" name="make" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="year">Year :</label>
                                <input type="number" class="form-control" id="year" placeholder="" name="year" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="model">Model :</label>
                                <input type="number" class="form-control" id="model" placeholder="" name="model" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="drivingno">DLN :</label>
                                <input type="text" class="form-control" id="drivingno" placeholder=""
                                    name="drivingno" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="plateno">License Plate Number :</label>
                                <input type="text" class="form-control" id="plateno" placeholder="" name="plateno" />
                            </div>
                        </div>
                    </div>
                    <hr />
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
                        <input type="checkbox" id="agree" name="agree" value="agreed" />
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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                var readURL = function(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $(".profile-pic").attr("src", e.target.result);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                };

                $(".file-upload").on("change", function() {
                    readURL(this);
                });

                $(".upload-button").on("click", function() {
                    $(".file-upload").click();
                });
            });

        </script>
    </main>
</body>

</html>
