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

        <div class="back"><a href="#"><i class="fa fa-angle-left"></i></a> Club</div>

        <div class="container">

            <div class="login-div text-center">

                <h1 class="mb-5">Profile Information</h1>

                <form id="profile" method="POST" action="{{ route('club_save') }}">

                    @csrf

                    <div class="form-group">

                        <input type="text" class="form-control" placeholder="CLUB NAME" name="club_name">

                    </div>

                    <div class="form-group">

                        <input type="tel" class="form-control" placeholder="CLUB PHONE NUMBER" name="phone_no">

                    </div>

                    <div class="form-group">

                        <input type="text" class="form-control" placeholder="ADDRESS" name="address">

                    </div>



                    <div class="form-group">

                        <input type="text" class="form-control" placeholder="City" name="city">

                    </div>

                    <div class="form-group position-relative">

                        <select class="form-control" id="state" name="state">

                            <option value="">STATE</option>

                            <option value="Gujatat">Gujatat</option>

                            <option value="Delhi">Delhi</option>

                            <option value="Mumbai">Mumbai</option>

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





                    <button type="submit" class="login-btn mt-5 pt-4">Next</button>

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

                club_name:{

                    required: true

                },

                address:{

                    required: true

                },

                city:{

                    required: true

                },

                phone_no:{

                    required: true

                },

                state:{

                    required: true

                },

                zip_code:{

                    required: true

                }



            },

            messages: {

                club_name:{

                    required: "Enter your club name"

                },

                address:{

                    required: "Enter your address"

                },

                city:{

                    required: "Enter your city"

                },

                phone_no:{

                    required: "Enter your phone no"

                },

                state:{

                    required: "Enter your state name"

                },

                zip_code:{

                    required: "Enter your zipcode",

                }

            }

        });  

    });  

    </script>  

</body>



</html>