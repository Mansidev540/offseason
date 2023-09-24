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

    <section class="d-flex align-items-center vh-100 px-3">

        <div class="back"><a href="{{ route('register') }}"><i class="fa fa-angle-left"></i></a> Club</div>

        <div class="container">

            <div class="login-div text-center">

                <h1 class="mb-5">Sign Up</h1>

                <form method="POST" action="{{ route('register') }}" id="signup">

                        @csrf

                    <div class="form-group">

                        <input type="text" class="form-control" id="" aria-describedby="" placeholder="First Name" name="name">

                    </div>

                    <input type="hidden" class="form-control" name="role" value="club">

                    <div class="form-group">

                        <input type="text" class="form-control" id="" aria-describedby="" placeholder="Last Name" name="l_name">

                    </div>

                    <div class="form-group">

                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">

                        @error('email')

                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $message }}</strong>

                            </span>

                        @enderror

                    </div>

                    <div class="form-group">

                        <input type="text" class="form-control" placeholder="Phone Number" name="phone_no">

                    </div>

                    <div class="form-group">

                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">

                    </div>

                    <div class="form-group">

                        <input type="password" class="form-control" placeholder="Re - EnTER PASSWORD" name="password_confirmation">

                    </div>



                    <div class="dont-acc mt-5">Already have an account? <a href="{{ route('login') }}">LOG IN</a></div>



                    <button type="submit" class="login-btn mt-4">Sign Up</button>

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

        $("#signup").validate ({

            rules: {

                name:{

                    required: true

                },

                l_name:{

                    required: true

                },

                email:{

                    required: true

                },

                phone_no:{

                    required: true

                },

                password:{

                    required: true,

                    minlength: 8

                },

                password_confirmation:{

                    required: true,

                    equalTo: "#password"

                }



            },

            messages: {

                name:{

                    required: "Enter your First name"

                },

                l_name:{

                    required: "Enter your last name"

                },

                email:{

                    required: "Enter your email id"

                },

                phone_no:{

                    required: "Enter your phone no"

                },

                password:{

                    required: "Enter your password",

                    minlength: "Please Enter 8 Character"

                },

                password_confirmation:{

                    required: "Re - EnTER PASSWORD",

                    equalTo: "Please Enter same password"

                }

            }

        });  

    });  

    </script>  

</body>



</html>