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

</head>

<body>
    <section class="d-flex align-items-center vh-100 px-3">
    <div class="back"><a href="{{ route('welcome') }}"><i class="fa fa-angle-left"></i> offseason</div></a>
        <div class="container">


            <div class="sign-div text-center">
                <h1 class="mb-5 pb-5">Sign Up</h1>
                <div class="row">
                    <div class="col-12 col-sm-6 text-center mb-3">
                        <a href="{{ route('club_signup') }}" class="btn button">Club</a>
                    </div>
                    <div class="col-12 col-sm-6 text-center">
                        <a href="{{ route('athlete_signup') }}" class="btn button">TRAINER</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>  
</body>

</html>