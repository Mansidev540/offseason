<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>OFFSEASON</title>

    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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



<body class="login">

    <section class="d-flex align-items-center vh-100 px-3">

        <div class="container">





            <div class="login-div text-center">

           

                <h1 class="mb-5">Log In</h1>

                <form method="POST" action="{{ route('login') }}" id="login">

                        @csrf

                    <div class="form-group">

                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')

                            <span class="invalid-feedback" role="alert">

                            <strong>{{ $message }}</strong>

                            </span>

                        @enderror

                    </div>

                    <div class="form-group">



                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password" name="password" required autocomplete="current-password">

                        @error('password')

                            <span class="invalid-feedback" role="alert">

                            <strong>{{ $message }}</strong>

                            </span>

                        @enderror

                    </div>

                    <div class="d-flex justify-content-end pb-5"><a href="#" class="forget-password">Forgot Password?</a></div>

                    <div class="dont-acc">Don't have an Account? <a href="{{ route('register') }}"

                    >Sign Up</a></div>



                    <button type="submit" class="login-btn">Log in</button>

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

        $("#login").validate ({

            rules: {

                email:{

                    required: true

                },

                password:{

                    required: true

                }



            },

            messages: {

                email:{

                    required: "Enter your email id"

                },

                password:{

                    required: "Enter your password"

                }

            }

        });  

    });  

    </script>  

</body>



</html>