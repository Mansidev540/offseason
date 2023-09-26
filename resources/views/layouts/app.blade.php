<!-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <script src="{{ asset('js/app.js') }}" defer></script>

 
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>



</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4"> -->
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

        .error{
            color:red !important;
            
        }

    </style>
</head>

<body>

    <header class="p-4 pb-3 fixed-top">
    <div class="d-flex justify-content-between align-items-center">
            <div class="logo text-uppercase">
                <?php
                $user = DB::table('users')->where('id',Auth::user()->id)->first();
                if($user->role == "club"){
                ?>
                
                <img src="{{ asset('asset/images/Offszn.png') }}" alt="OFFSEASON" width="100"> <strong>Club</strong>
                <?php } else{ ?>
                  <img src="{{ asset('asset/images/Offszn.png') }}" alt="OFFSEASON" width="100"> <strong>Athlete</strong>  
                <?php } ?>
            </div>
            <div class="right-side d-flex">                
                <div class="admin-name">
                    <?php
                    if($user->role == "club"){
                        $club = DB::table('club')->where('user_id',Auth::user()->id)->first();
                        ?>
                        <strong class="pe-3 text-uppercase">{{$club->club_name}}</strong> <img src="{{asset("uploads/$club->image")}}" alt="" width="40">
                        <?php } else{ 
                            $athele = DB::table('athlete')->where('user_id',Auth::user()->id)->first(); ?>
                            <strong class="pe-3 text-uppercase">{{$athele->athlete_name}}</strong> <img src="{{asset("uploads/$athele->image")}}" alt="" width="40">  
                        <?php } ?>
                    
                </div>
                <div class="px-3 d-md-none d-sm-block menu-icon mt-2">
                    <a href="#"><span class="bar"></span><span class="bar"></span><span class="bar"></span></a>
                </div>
            </div>
        </div>
    </header>
    <section class="content-area position-relative">    
      
            <div class="left-panel p-4">
                <nav>
                    <ul>
                        <!-- <li><a href="calendar.html">Calendar</a></li>
                        <li><a href="club.html">Clubs</a></li> -->
                        <?php if($user->role == "club"){ ?>
                        <li><a href="{{ route('clubcalender.index') }}">Calender</a></li>
                        <li><a href="{{ route('roster.index') }}">Roster</a></li>
                        <li><a href="{{ route('member.index') }}">Member</a></li>
                        <li><a href="{{ route('rental.index') }}">Rentals</a></li>
                        <li><a href="{{ route('service.index') }}">Services</a></li>   
                        <?php }else{?>
                            <li><a href="{{ route('trainercalender.index') }}">Calender</a></li>
                            <li><a href="{{ route('club.index') }}">Club</a></li>
                           <?php }?>
                        <li><a href="{{ route('club.balance') }}">Balance</a></li>
                        <li><a href="{{ route('setting.index') }}">Settings</a></li>
                        <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                </nav>
            </div>
            @yield('content')        
        
</section>








<script src="{{ asset('asset/js/jquery.min.js') }}"></script>
<script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src="{{ asset('asset/js/custom.js') }}"></script>
@yield('script')
</body>

</html>
