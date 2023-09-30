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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/custom.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <style>
        .login_button {
            color: #FFFFFF;
            background-color: transparent;
            font-weight: 700;
            border: none !important;           
            padding: 10px;
        }

        .signup_button {
            color: #FFFFFF;
            background-color: rgba(150, 150, 150, 19%) !important;
            font-weight: 700;
            border-radius: 5px;
            border: none !important;
            width: 120px;
            height: 40px;
            padding: 9px;
    text-align: center;
        }

        .div-content {
            margin-top: 11%;
        }

        .text {
            font-weight: 500;
            color: #FFFFFF;
            font-size: 36px;
        }
    </style>

</head>

<body>

    <div class="d-flex justify-content-end p-5">
    @if (Route::has('login'))
    @auth
        <a href="{{ url('/home') }}" class="signup_button ms-4">HOME</a>
    @else
        <a href="{{ route('login') }}" class="login_button">LOG IN</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="signup_button ms-4">SIGN UP</a>
        @endif
    @endauth
    @endif
    </div>

    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="div-content">
                <p class="text mb-1 ms-4">WELCOME TO</p>
                <img src="{{ asset('asset/images/logo.png')}}" class="img-fluid" alt="">
                <p class="text mt-3 text-center">TRAIN YOUR GAME</p>
            </div>
        </div>
    </div>
</body>

</html>    