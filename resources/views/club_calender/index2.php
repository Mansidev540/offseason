
@extends('layouts.app')

@section('content')
<style>
.clen-box {
    padding: 25px 20px
}

.clen-box button {
    border: 0 !important
}

.clen-box h3 {
    font-weight: bold;
}

.clr-time {
    color: #929598;
}

.no-event {
    border: 2px dashed #737679;
    background: transparent;
    min-height: 200px;
}

.no-event .fa {
    font-size: 28px;
}
</style>
<div class="right-panel p-4">
    <!-- <div class="mb-4">
        <div class="mx-0 mb-0 row justify-content-sm-center justify-content-start px-1">
            <input type="text" id="dp1" class="datepicker" placeholder="Pick Date" name="date" readonly><span class="fa fa-calendar"></span>
        </div>
    </div> -->
    <form id="rental" method="POST" action="{{route('clubcalender.date')}}" enctype="multipart/form-data">
    @csrf
    <?php
    
    if(isset($date)){
        $date1 = $date;
    }else{
        $date1 = '';
    }
    ?>
    <div class="bg-dark mb-4">
        <div class="mx-0 mb-0 row justify-content-sm-center justify-content-start px-1">
            <input type="text" id="dp1" class="datepicker" placeholder="Pick Date" name="date" value="{{$date1}}" readonly><span class="fa fa-calendar"></span>
        </div>
        <center>
        <button type="submit" class="btn btn-primary" data-dismiss="modal" style="margin-right: 43px;">Show</button>
        </center>
    </div>
</form>
<?php if(isset($date)){?>
    <div class="d-flex align-items-center flex-wrap">
        <div class="timing col-12 col-lg-1 col-md-2 col-sm-2 mb-3">
            <strong>8:00 AM</strong>
        </div>
        <div class="events col-12 col-lg-11 col-md-10 col-sm-10">
            <div class="row">

            <?php $schedule8 = DB::table('schedule')->where('date',$date1)->get();
            
            ?>
                @foreach($schedule8 as $value)
                
                    <?php 
                    $time = explode(',',$value->time);

                    if(in_array("8:00AM",$time)){
                            $roster = DB::table('athlete')->where('user_id',$value->user_id)->first();
                            
                            $club_calender = DB::table('club_calender')->where('date',$value->date)->where('time',"8:00AM")->where('club_id',$value->club_id)->where('user_id',Auth::user()->id)->first();
                            if(is_null($club_calender)){
                                $route = route('clubcalender.add');
                                $name = "SCHEDULE";
                            }else{
                                $route = route('clubcalender.edit',$club_calender->id);
                                $name = "SCHEDULED";
                            }

                        ?>
        
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="{{$route}}" class="clen-box dark-box d-block">
                                <div class="d-flex">
                                    <div class="me-4">
                                        <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                    </div>
                                    <div class="">
                                        <div class="text-light">{{$roster->athlete_name}}</div>
                                        <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                        <div class="text-uppercase clr-time">1 Hour</div>
                                    </div>

                                </div>
                                
                                <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                            </a>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="#" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">

                                <i class="fa fa-plus text-light"></i>

                            </a>
                        </div>
                    <?php }?>
                @endforeach



            </div>
        </div>
    </div>
    <div class="d-flex align-items-center flex-wrap">
        <div class="timing col-12 col-lg-1 col-md-2 col-sm-2 mb-3">
            <strong>9:00 AM</strong>
        </div>
        <div class="events col-12 col-lg-11 col-md-10 col-sm-10">
            <div class="row">

            <?php $schedule8 = DB::table('schedule')->where('date',$date1)->get();
            
            ?>
                @foreach($schedule8 as $value)
                
                    <?php 
                    $time = explode(',',$value->time);

                    if(in_array("9:00AM",$time)){
                            $roster = DB::table('athlete')->where('user_id',$value->user_id)->first();
                            
                            $club_calender = DB::table('club_calender')->where('date',$value->date)->where('time',"9:00AM")->where('club_id',$value->club_id)->where('user_id',Auth::user()->id)->first();
                            if(is_null($club_calender)){
                                $route = route('clubcalender.add');
                                $name = "SCHEDULE";
                            }else{
                                $route = route('clubcalender.edit',$club_calender->id);
                                $name = "SCHEDULED";
                            }

                        ?>
        
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="{{$route}}" class="clen-box dark-box d-block">
                                <div class="d-flex">
                                    <div class="me-4">
                                        <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                    </div>
                                    <div class="">
                                        <div class="text-light">{{$roster->athlete_name}}</div>
                                        <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                        <div class="text-uppercase clr-time">1 Hour</div>
                                    </div>

                                </div>
                                
                                <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                            </a>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="#" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">

                                <i class="fa fa-plus text-light"></i>

                            </a>
                        </div>
                    <?php }?>
                @endforeach



            </div>
        </div>
    </div>
    <div class="d-flex align-items-center flex-wrap">
        <div class="timing col-12 col-lg-1 col-md-2 col-sm-2 mb-3">
            <strong>10:00 AM</strong>
        </div>
        <div class="events col-12 col-lg-11 col-md-10 col-sm-10">
            <div class="row">

            <?php $schedule8 = DB::table('schedule')->where('date',$date1)->get();
            
            ?>
                @foreach($schedule8 as $value)
                
                    <?php 
                    $time = explode(',',$value->time);

                    if(in_array("10:00AM",$time)){
                            $roster = DB::table('athlete')->where('user_id',$value->user_id)->first();
                            
                            $club_calender = DB::table('club_calender')->where('date',$value->date)->where('time',"10:00AM")->where('club_id',$value->club_id)->where('user_id',Auth::user()->id)->first();
                            if(is_null($club_calender)){
                                $route = route('clubcalender.add',['date' => 1, 'time' => 10]);
                                $name = "SCHEDULE";
                            }else{
                                $route = route('clubcalender.edit',$club_calender->id);
                                $name = "SCHEDULED";
                            }

                        ?>
        
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="{{$route}}" class="clen-box dark-box d-block">
                                <div class="d-flex">
                                    <div class="me-4">
                                        <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                    </div>
                                    <div class="">
                                        <div class="text-light">{{$roster->athlete_name}}</div>
                                        <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                        <div class="text-uppercase clr-time">1 Hour</div>
                                    </div>

                                </div>
                                
                                <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                            </a>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="#" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">

                                <i class="fa fa-plus text-light"></i>

                            </a>
                        </div>
                    <?php }?>
                @endforeach



            </div>
        </div>
    </div>
    <div class="d-flex align-items-center flex-wrap">
        <div class="timing col-12 col-lg-1 col-md-2 col-sm-2 mb-3">
            <strong>11:00 AM</strong>
        </div>
        <div class="events col-12 col-lg-11 col-md-10 col-sm-10">
            <div class="row">

            <?php $schedule8 = DB::table('schedule')->where('date',$date1)->get();
            
            ?>
                @foreach($schedule8 as $value)
                
                    <?php 
                    $time = explode(',',$value->time);

                    if(in_array("11:00AM",$time)){
                            $roster = DB::table('athlete')->where('user_id',$value->user_id)->first();
                            
                            $club_calender = DB::table('club_calender')->where('date',$value->date)->where('time',"11:00AM")->where('club_id',$value->club_id)->where('user_id',Auth::user()->id)->first();
                            if(is_null($club_calender)){
                                $route = route('clubcalender.add');
                                $name = "SCHEDULE";
                            }else{
                                $route = route('clubcalender.edit',$club_calender->id);
                                $name = "SCHEDULED";
                            }

                        ?>
        
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="{{$route}}" class="clen-box dark-box d-block">
                                <div class="d-flex">
                                    <div class="me-4">
                                        <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                    </div>
                                    <div class="">
                                        <div class="text-light">{{$roster->athlete_name}}</div>
                                        <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                        <div class="text-uppercase clr-time">1 Hour</div>
                                    </div>

                                </div>
                                
                                <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                            </a>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="#" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">

                                <i class="fa fa-plus text-light"></i>

                            </a>
                        </div>
                    <?php }?>
                @endforeach



            </div>
        </div>
    </div>
    <div class="d-flex align-items-center flex-wrap">
        <div class="timing col-12 col-lg-1 col-md-2 col-sm-2 mb-3">
            <strong>12:00 PM</strong>
        </div>
        <div class="events col-12 col-lg-11 col-md-10 col-sm-10">
            <div class="row">

            <?php $schedule8 = DB::table('schedule')->where('date',$date1)->get();
            
            ?>
                @foreach($schedule8 as $value)
                
                    <?php 
                    $time = explode(',',$value->time);

                    if(in_array("12:00PM",$time)){
                            $roster = DB::table('athlete')->where('user_id',$value->user_id)->first();
                            
                            $club_calender = DB::table('club_calender')->where('date',$value->date)->where('time',"12:00PM")->where('club_id',$value->club_id)->where('user_id',Auth::user()->id)->first();
                            if(is_null($club_calender)){
                                $route = route('clubcalender.add');
                                $name = "SCHEDULE";
                            }else{
                                $route = route('clubcalender.edit',$club_calender->id);
                                $name = "SCHEDULED";
                            }

                        ?>
        
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="{{$route}}" class="clen-box dark-box d-block">
                                <div class="d-flex">
                                    <div class="me-4">
                                        <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                    </div>
                                    <div class="">
                                        <div class="text-light">{{$roster->athlete_name}}</div>
                                        <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                        <div class="text-uppercase clr-time">1 Hour</div>
                                    </div>

                                </div>
                                
                                <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                            </a>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="#" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">

                                <i class="fa fa-plus text-light"></i>

                            </a>
                        </div>
                    <?php }?>
                @endforeach



            </div>
        </div>
    </div>
    <div class="d-flex align-items-center flex-wrap">
        <div class="timing col-12 col-lg-1 col-md-2 col-sm-2 mb-3">
            <strong>1:00 PM</strong>
        </div>
        <div class="events col-12 col-lg-11 col-md-10 col-sm-10">
            <div class="row">

            <?php $schedule8 = DB::table('schedule')->where('date',$date1)->get();
            
            ?>
                @foreach($schedule8 as $value)
                
                    <?php 
                    $time = explode(',',$value->time);

                    if(in_array("1:00PM",$time)){
                            $roster = DB::table('athlete')->where('user_id',$value->user_id)->first();
                            
                            $club_calender = DB::table('club_calender')->where('date',$value->date)->where('time',"1:00PM")->where('club_id',$value->club_id)->where('user_id',Auth::user()->id)->first();
                            if(is_null($club_calender)){
                                $route = route('clubcalender.add');
                                $name = "SCHEDULE";
                            }else{
                                $route = route('clubcalender.edit',$club_calender->id);
                                $name = "SCHEDULED";
                            }

                        ?>
        
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="{{$route}}" class="clen-box dark-box d-block">
                                <div class="d-flex">
                                    <div class="me-4">
                                        <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                    </div>
                                    <div class="">
                                        <div class="text-light">{{$roster->athlete_name}}</div>
                                        <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                        <div class="text-uppercase clr-time">1 Hour</div>
                                    </div>

                                </div>
                                
                                <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                            </a>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="#" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">

                                <i class="fa fa-plus text-light"></i>

                            </a>
                        </div>
                    <?php }?>
                @endforeach



            </div>
        </div>
    </div>
    <div class="d-flex align-items-center flex-wrap">
        <div class="timing col-12 col-lg-1 col-md-2 col-sm-2 mb-3">
            <strong>2:00 PM</strong>
        </div>
        <div class="events col-12 col-lg-11 col-md-10 col-sm-10">
            <div class="row">

            <?php $schedule8 = DB::table('schedule')->where('date',$date1)->get();
            
            ?>
                @foreach($schedule8 as $value)
                
                    <?php 
                    $time = explode(',',$value->time);

                    if(in_array("2:00PM",$time)){
                            $roster = DB::table('athlete')->where('user_id',$value->user_id)->first();
                            
                            $club_calender = DB::table('club_calender')->where('date',$value->date)->where('time',"2:00PM")->where('club_id',$value->club_id)->where('user_id',Auth::user()->id)->first();
                            if(is_null($club_calender)){
                                $route = route('clubcalender.add');
                                $name = "SCHEDULE";
                            }else{
                                $route = route('clubcalender.edit',$club_calender->id);
                                $name = "SCHEDULED";
                            }

                        ?>
        
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="{{$route}}" class="clen-box dark-box d-block">
                                <div class="d-flex">
                                    <div class="me-4">
                                        <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                    </div>
                                    <div class="">
                                        <div class="text-light">{{$roster->athlete_name}}</div>
                                        <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                        <div class="text-uppercase clr-time">1 Hour</div>
                                    </div>

                                </div>
                                
                                <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                            </a>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="#" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">

                                <i class="fa fa-plus text-light"></i>

                            </a>
                        </div>
                    <?php }?>
                @endforeach



            </div>
        </div>
    </div>
    <div class="d-flex align-items-center flex-wrap">
        <div class="timing col-12 col-lg-1 col-md-2 col-sm-2 mb-3">
            <strong>3:00 PM</strong>
        </div>
        <div class="events col-12 col-lg-11 col-md-10 col-sm-10">
            <div class="row">

            <?php $schedule8 = DB::table('schedule')->where('date',$date1)->get();
            
            ?>
                @foreach($schedule8 as $value)
                
                    <?php 
                    $time = explode(',',$value->time);

                    if(in_array("2:00PM",$time)){
                            $roster = DB::table('athlete')->where('user_id',$value->user_id)->first();
                            
                            $club_calender = DB::table('club_calender')->where('date',$value->date)->where('time',"2:00PM")->where('club_id',$value->club_id)->where('user_id',Auth::user()->id)->first();
                            if(is_null($club_calender)){
                                $route = route('clubcalender.add');
                                $name = "SCHEDULE";
                            }else{
                                $route = route('clubcalender.edit',$club_calender->id);
                                $name = "SCHEDULED";
                            }

                        ?>
        
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="{{$route}}" class="clen-box dark-box d-block">
                                <div class="d-flex">
                                    <div class="me-4">
                                        <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                    </div>
                                    <div class="">
                                        <div class="text-light">{{$roster->athlete_name}}</div>
                                        <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                        <div class="text-uppercase clr-time">1 Hour</div>
                                    </div>

                                </div>
                                
                                <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                            </a>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="#" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">

                                <i class="fa fa-plus text-light"></i>

                            </a>
                        </div>
                    <?php }?>
                @endforeach



            </div>
        </div>
    </div>
    <div class="d-flex align-items-center flex-wrap">
        <div class="timing col-12 col-lg-1 col-md-2 col-sm-2 mb-3">
            <strong>4:00 PM</strong>
        </div>
        <div class="events col-12 col-lg-11 col-md-10 col-sm-10">
            <div class="row">

            <?php $schedule8 = DB::table('schedule')->where('date',$date1)->get();
            
            ?>
                @foreach($schedule8 as $value)
                
                    <?php 
                    $time = explode(',',$value->time);

                    if(in_array("4:00PM",$time)){
                            $roster = DB::table('athlete')->where('user_id',$value->user_id)->first();
                            
                            $club_calender = DB::table('club_calender')->where('date',$value->date)->where('time',"4:00PM")->where('club_id',$value->club_id)->where('user_id',Auth::user()->id)->first();
                            if(is_null($club_calender)){
                                $route = route('clubcalender.add');
                                $name = "SCHEDULE";
                            }else{
                                $route = route('clubcalender.edit',$club_calender->id);
                                $name = "SCHEDULED";
                            }

                        ?>
        
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="{{$route}}" class="clen-box dark-box d-block">
                                <div class="d-flex">
                                    <div class="me-4">
                                        <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                    </div>
                                    <div class="">
                                        <div class="text-light">{{$roster->athlete_name}}</div>
                                        <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                        <div class="text-uppercase clr-time">1 Hour</div>
                                    </div>

                                </div>
                                
                                <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                            </a>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="#" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">

                                <i class="fa fa-plus text-light"></i>

                            </a>
                        </div>
                    <?php }?>
                @endforeach



            </div>
        </div>
    </div>
    <div class="d-flex align-items-center flex-wrap">
        <div class="timing col-12 col-lg-1 col-md-2 col-sm-2 mb-3">
            <strong>5:00 PM</strong>
        </div>
        <div class="events col-12 col-lg-11 col-md-10 col-sm-10">
            <div class="row">

            <?php $schedule8 = DB::table('schedule')->where('date',$date1)->get();
            
            ?>
                @foreach($schedule8 as $value)
                
                    <?php 
                    $time = explode(',',$value->time);

                    if(in_array("5:00PM",$time)){
                            $roster = DB::table('athlete')->where('user_id',$value->user_id)->first();
                            
                            $club_calender = DB::table('club_calender')->where('date',$value->date)->where('time',"5:00PM")->where('club_id',$value->club_id)->where('user_id',Auth::user()->id)->first();
                            if(is_null($club_calender)){
                                $route = route('clubcalender.add');
                                $name = "SCHEDULE";
                            }else{
                                $route = route('clubcalender.edit',$club_calender->id);
                                $name = "SCHEDULED";
                            }

                        ?>
        
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="{{$route}}" class="clen-box dark-box d-block">
                                <div class="d-flex">
                                    <div class="me-4">
                                        <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                    </div>
                                    <div class="">
                                        <div class="text-light">{{$roster->athlete_name}}</div>
                                        <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                        <div class="text-uppercase clr-time">1 Hour</div>
                                    </div>

                                </div>
                                
                                <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                            </a>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="#" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">

                                <i class="fa fa-plus text-light"></i>

                            </a>
                        </div>
                    <?php }?>
                @endforeach



            </div>
        </div>
    </div>
    <div class="d-flex align-items-center flex-wrap">
        <div class="timing col-12 col-lg-1 col-md-2 col-sm-2 mb-3">
            <strong>6:00 PM</strong>
        </div>
        <div class="events col-12 col-lg-11 col-md-10 col-sm-10">
            <div class="row">

            <?php $schedule8 = DB::table('schedule')->where('date',$date1)->get();
            
            ?>
                @foreach($schedule8 as $value)
                
                    <?php 
                    $time = explode(',',$value->time);

                    if(in_array("6:00PM",$time)){
                            $roster = DB::table('athlete')->where('user_id',$value->user_id)->first();
                            
                            $club_calender = DB::table('club_calender')->where('date',$value->date)->where('time',"6:00PM")->where('club_id',$value->club_id)->where('user_id',Auth::user()->id)->first();
                            if(is_null($club_calender)){
                                $route = route('clubcalender.add');
                                $name = "SCHEDULE";
                            }else{
                                $route = route('clubcalender.edit',$club_calender->id);
                                $name = "SCHEDULED";
                            }

                        ?>
        
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="{{$route}}" class="clen-box dark-box d-block">
                                <div class="d-flex">
                                    <div class="me-4">
                                        <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                    </div>
                                    <div class="">
                                        <div class="text-light">{{$roster->athlete_name}}</div>
                                        <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                        <div class="text-uppercase clr-time">1 Hour</div>
                                    </div>

                                </div>
                                
                                <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                            </a>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="#" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">

                                <i class="fa fa-plus text-light"></i>

                            </a>
                        </div>
                    <?php }?>
                @endforeach



            </div>
        </div>
    </div>
    <div class="d-flex align-items-center flex-wrap">
        <div class="timing col-12 col-lg-1 col-md-2 col-sm-2 mb-3">
            <strong>7:00 PM</strong>
        </div>
        <div class="events col-12 col-lg-11 col-md-10 col-sm-10">
            <div class="row">

            <?php $schedule8 = DB::table('schedule')->where('date',$date1)->get();
            
            ?>
                @foreach($schedule8 as $value)
                
                    <?php 
                    $time = explode(',',$value->time);

                    if(in_array("7:00PM",$time)){
                            $roster = DB::table('athlete')->where('user_id',$value->user_id)->first();
                            
                            $club_calender = DB::table('club_calender')->where('date',$value->date)->where('time',"7:00PM")->where('club_id',$value->club_id)->where('user_id',Auth::user()->id)->first();
                            if(is_null($club_calender)){
                                $route = route('clubcalender.add');
                                $name = "SCHEDULE";
                            }else{
                                $route = route('clubcalender.edit',$club_calender->id);
                                $name = "SCHEDULED";
                            }

                        ?>
        
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="{{$route}}" class="clen-box dark-box d-block">
                                <div class="d-flex">
                                    <div class="me-4">
                                        <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                    </div>
                                    <div class="">
                                        <div class="text-light">{{$roster->athlete_name}}</div>
                                        <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                        <div class="text-uppercase clr-time">1 Hour</div>
                                    </div>

                                </div>
                                
                                <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                            </a>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="#" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">

                                <i class="fa fa-plus text-light"></i>

                            </a>
                        </div>
                    <?php }?>
                @endforeach



            </div>
        </div>
    </div>
    <div class="d-flex align-items-center flex-wrap">
        <div class="timing col-12 col-lg-1 col-md-2 col-sm-2 mb-3">
            <strong>8:00 PM</strong>
        </div>
        <div class="events col-12 col-lg-11 col-md-10 col-sm-10">
            <div class="row">

            <?php $schedule8 = DB::table('schedule')->where('date',$date1)->get();
            
            ?>
                @foreach($schedule8 as $value)
                
                    <?php 
                    $time = explode(',',$value->time);
                    if(in_array("8:00PM",$time)){
                            $roster = DB::table('athlete')->where('user_id',$value->user_id)->first();
                            
                            $club_calender = DB::table('club_calender')->where('date',$value->date)->where('time',"8:00PM")->where('club_id',$value->club_id)->where('user_id',Auth::user()->id)->first();
                            if(is_null($club_calender)){
                                $route = route('clubcalender.add');
                                $name = "SCHEDULE";
                            }else{
                                $route = route('clubcalender.edit',$club_calender->id);
                                $name = "SCHEDULED";
                            }

                        ?>
        
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="{{$route}}" class="clen-box dark-box d-block">
                                <div class="d-flex">
                                    <div class="me-4">
                                        <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                    </div>
                                    <div class="">
                                        <div class="text-light">{{$roster->athlete_name}}</div>
                                        <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                        <div class="text-uppercase clr-time">1 Hour</div>
                                    </div>

                                </div>
                                
                                <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                            </a>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                            <a href="#" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">

                                <i class="fa fa-plus text-light"></i>

                            </a>
                        </div>
                    <?php }?>
                @endforeach



            </div>
        </div>
    </div>
    <!-- <div class="d-flex align-items-center flex-wrap">
        <div class="timing col-12 col-lg-1 col-md-2 col-sm-2 mb-3">
            <strong>9:00 AM</strong>
        </div>
        <div class="events col-12 col-lg-11 col-md-10 col-sm-10">
            <div class="row">
                <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                    <a href="#" class="clen-box dark-box d-block">
                        <div class="d-flex">
                            <div class="me-4">
                                <img src="images/MexicoSummer19-2.png" alt="" width="74">
                            </div>
                            <div class="">
                                <div class="text-light">BRAXTON CHATMAN</div>
                                <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                <div class="text-uppercase clr-time">1 Hour</div>
                            </div>

                        </div>
                        <button href="#" class="btn button btn3 w-100 mt-3">SCHEDULED</button>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                    <a href="#" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">

                        <i class="fa fa-plus text-light"></i>

                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                    <a href="#" class="clen-box dark-box d-block">
                        <div class="d-flex">
                            <div class="me-4">
                                <img src="images/MexicoSummer19-2.png" alt="" width="74">
                            </div>
                            <div class="">
                                <div class="text-light">BRAXTON CHATMAN</div>
                                <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                <div class="text-uppercase clr-time">1 hOur</div>
                            </div>

                        </div>
                        <button href="#" class="btn button btn3 w-100 mt-3">SCHEDULED</button>
                    </a>
                </div>



            </div>
        </div>
    </div>
    <div class="d-flex align-items-center flex-wrap">
        <div class="timing col-12 col-lg-1 col-md-2 col-sm-2 mb-3">
            <strong>10:00 AM</strong>
        </div>
        <div class="events col-12 col-lg-11 col-md-10 col-sm-10">
            <div class="row">
                <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                    <a href="#" class="clen-box dark-box d-block">
                        <div class="d-flex">
                            <div class="me-4">
                                <img src="images/MexicoSummer19-2.png" alt="" width="74">
                            </div>
                            <div class="">
                                <div class="text-light">BRAXTON CHATMAN</div>
                                <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                <div class="text-uppercase clr-time">1 Hour</div>
                            </div>

                        </div>
                        <button href="#" class="btn button btn3 w-100 mt-3">SCHEDULED</button>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                    <a href="#" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">

                        <i class="fa fa-plus text-light"></i>

                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-12 col-sm-6 mb-4">
                    <a href="#" class="clen-box dark-box d-block">
                        <div class="d-flex">
                            <div class="me-4">
                                <img src="images/MexicoSummer19-2.png" alt="" width="74">
                            </div>
                            <div class="">
                                <div class="text-light">BRAXTON CHATMAN</div>
                                <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                <div class="text-uppercase clr-time">1 hOur</div>
                            </div>

                        </div>
                        <button href="#" class="btn button btn3 w-100 mt-3">SCHEDULED</button>
                    </a>
                </div>



            </div>
        </div>
    </div> -->
<?php } ?>
</div>

@endsection
@section('script')

<!-- <script>
$(document).ready( function () {
    $('#responsive-data-table').DataTable();
} );
</script> -->
@endsection
