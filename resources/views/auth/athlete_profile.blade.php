<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>OFFSEASON</title>

    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset/css/custom.css') }}" />

    <style>

        .form-group {

            position: relative;

        }

        .error{

            color:red;

            

        }

        label.error{

            display: block !important;

            position: absolute;

            bottom: -22px;

            font-size: 14px;

        }

    </style>



</head>



<body class="signup">

<section class="d-flex align-items-center px-3">

        <div class="back"><a href="#"><i class="fa fa-angle-left"></i></a> Athlete</div>

        <div class="container">

            <div class="text-center">

                <h1 class="mb-5">Profile Information</h1>

                <form id="profile" method="POST" action="{{ route('athlete_save') }}">

                @csrf

                    <div class="form-group login-div">     

                        <input type="text" class="form-control" placeholder="ATHLETE NAME" name="athlete_name">      

                    </div>

                    <div class="profile-info text-center">

                        <div class="row">

                            <div class="col-12 col-sm-6">    



                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="SPORT" name="school_name">

                                </div>

                                <div class="form-group">

                                    <input type="tel" class="form-control" placeholder="PRIMARY PHONE NUMBER" name="phone_no">

                                </div>

                                <div class="form-group">    

                                    <input type="text" class="form-control" placeholder="GENDER" name="gender">         

                                </div>   



                                <div class="form-group">  

                                    <input type="date" class="form-control" placeholder="Date of BIRTH" name="dob">  

                                </div>

                            </div>

                            <div class="col-12 col-sm-6">



                                <div class="form-group position-relative">

                                    <select class="form-control" id="address" name="address">

                                            <option value="">Address</option>

                                            <option value="Gujatat">Gujatat</option>

                                            <option value="Delhi">Delhi</option>

                                            <option value-="Mumbai">Mumbai</option>

                                            <option value="Rajasthan">Rajasthan</option>

                                        </select>

                                    <i class="fa fa-angle-down select-arrow"></i>   

                                </div>

                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="City" name="city">

                                </div>

                                <div class="form-group position-relative">

                                    <select class="form-control" id="state" name="state">

                                            <option value="">STATE</option>

                                            <option value="Gujatat">Gujatat</option>

                                            <option value="Delhi">Delhi</option>

                                            <option value-="Mumbai">Mumbai</option>

                                            <option value="Rajasthan">Rajasthan</option>

                                        </select>

                                    <i class="fa fa-angle-down select-arrow"></i>

                                </div>

                                <div class="form-group position-relative">

                                <select class="form-control" id="zip_code" name="zip_code">

                                    <option value="">Zip coDE</option>

                                    <option value="11111">11111</option>

                                    <option value="2222">2222</option>

                                    <option value="3333">3333</option>

                                    <option value="4444">4444</option>   

                                </select>

                                    <i class="fa fa-angle-down select-arrow"></i>

                                </div>

                            </div>

                        </div>

                        <button type="submit" class="login-btn mt-5 pt-4">Next</button>

                    </div>

                </form>

            </div>



        </div>



    </section>

    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>

    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script> 

    <script>

    $(document).ready (function () {  

        $("#profile").validate ({

            rules: {

                athlete_name:{

                    required: true

                },

                school_name:{

                    required: true

                },

                city:{

                    required: true

                },

                phone_no:{

                    required: true

                },

                address:{

                    required: true

                },

                zip_code:{

                    required: true

                },

                gender:{

                    required: true

                },

                dob:{

                    required: true

                },

                state:{

                    required: true

                }





            },

            messages: {

                athlete_name:{

                    required: "Enter your Athlete name"

                },

                address:{

                    required: "Enter your School Name"

                },

                city:{

                    required: "Enter your city"

                },

                phone_no:{

                    required: "Enter your phone no"

                },

                address:{

                    required: "Enter your address name"

                },

                zip_code:{

                    required: "Enter your zipcode",

                },

                gender:{

                    required: "Enter your Gender",

                },

                dob:{

                    required: "Enter your Date of birth",

                },

                state:{

                    required: "Enter your State",

                }

            }

        });  

    });  

    </script>

</body>



</html>