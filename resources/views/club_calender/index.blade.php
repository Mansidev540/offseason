
@extends('layouts.app')

@section('content')
<style>
.overflow-auto {
    overflow-x: auto;
}

.overflow-auto table th {
    text-align: center;
}

.clen-box {
    padding: 25px 20px;
    margin: 10px;
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
<form id="rental" method="POST" action="{{route('clubcalender.date')}}" enctype="multipart/form-data">
    @csrf
    <?php
    
    if(isset($date)){
        $date1 = $date;
    }else{
        $date1 = '';
    }
    ?>
    <div class="mb-4">
        <div class="mx-0 mb-0 row justify-content-sm-center justify-content-start px-1">
            <input type="text" id="dp1" class="datepicker" placeholder="Pick Date" name="date" value="{{$date1}}" readonly><span class="fa fa-calendar"></span>
        </div>
        <center>
        <button type="submit" class="btn btn-primary" data-dismiss="modal" style="margin-right: 43px;">Show</button>
        </center>
    </div>
</form>
<?php if(isset($date)){?>
    <div class="overflow-auto">
        <table cellpadding="10" cellspacing="10" class="calendar-table">
            <tr>
                <th width="80"></th>
                <?php $rental = DB::table('rental')->get();?>
                @foreach($rental as $value)
                <th><strong>{{$value->name}}</strong></th>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>8:00 AM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"8:00AM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "8:00AM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>          
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>9:00 AM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"9:00AM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "9:00AM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();       
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);  
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>10:00 AM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"10:00AM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "10:00AM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>11:00 AM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"11:00AM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "11:00AM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);   
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>12:00 PM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"12:00PM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "12:00PM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){   
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }  
                    ?>   
                    
                <td width="400"> 
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3> 
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>1:00 PM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"1:00PM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "1:00PM", 'rental' => $value->id]);
                ?>
                <td width="400">   
                    <a href="{{$route}}">  
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>2:00 PM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"2:00PM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "2:00PM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>3:00 PM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"3:00PM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "3:00PM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>4:00 PM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"4:00PM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "4:00PM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);           
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }   
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>5:00 PM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"5:00PM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "5:00PM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>6:00 PM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"6:00PM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "6:00PM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>7:00 PM</td>      
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"7:00PM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "7:00PM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>            
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>8:00 PM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"8:00PM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "8:00PM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>9:00 PM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"9:00PM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "9:00PM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>

            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>10:00 PM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"10:00PM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "10:00PM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);     
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">  
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>11:00 PM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"11:00PM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "11:00PM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>12:00 AM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"12:00AM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "12:00AM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>1:00 AM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"1:00AM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "1:00AM", 'rental' => $value->id]);    
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>   

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first(); 
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);    
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);    
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>     
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>2:00 AM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"2:00AM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));    
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "2:00AM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>    
                            </tr>

                        </table>  

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";   
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">             
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td> 
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>      
                @endforeach


            </tr>      
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>3:00 AM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"3:00AM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "3:00AM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>   

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>4:00 AM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"4:00AM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "4:00AM", 'rental' => $value->id]);       
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>    

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);   
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>   
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach

            </tr>
            <tr>
                <td width="80">
                    <table width="80">     
                        <tr>
                            <td>5:00 AM</td> 
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"5:00AM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "5:00AM", 'rental' => $value->id]);   
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>6:00 AM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"6:00AM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "6:00AM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            <tr>
                <td width="80">
                    <table width="80">
                        <tr>
                            <td>7:00 AM</td>
                        </tr>
                    </table>
                </td>
                @foreach($rental as $value)
                <?php $club_calender = DB::table('club_calender')->where('date',$date1)->where('time',"7:00AM")->where('user_id',Auth::user()->id)->where('rental_id',$value->id)->first();
                if(is_null($club_calender)){
                    $newDate = date("m-d-Y", strtotime($date1));
                    $route = route('clubcalender.add',['date' => $newDate, 'time' => "7:00AM", 'rental' => $value->id]);
                ?>
                <td width="400">
                    <a href="{{$route}}">
                        <table width="400" class="clen-box dark-box d-flex no-event h-100 justify-content-center align-items-center">
                            <tr>
                                <td> <i class="fa fa-plus text-light"></i></td>    
                            </tr>

                        </table>

                    </a>
                </td>
                <?php } else{
                    $roster = DB::table('athlete')->where('id',$club_calender->roster_id)->first();
                    if(is_null($club_calender->schedule)){
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULE";
                    }else{
                        $route_calender = route('clubcalender.edit',$club_calender->id);
                        $name = "SCHEDULED";
                    }
                    ?>
                    
                <td width="400">
                    <a href="{{$route_calender}}">
                        <table width="400" class="clen-box dark-box d-block">
                            <tr>
                                <td width="74">
                                    <img src="{{asset("uploads/$roster->image")}}" alt="" width="74">
                                </td>
                                <td width="20"></td>
                                <td width="305">
                                    <p class="text-light mb-0">{{$roster->athlete_name}}</p>
                                    <h3 class="text-uppercase text-light mb-0">Private BATTING TRAinING</h3>
                                    <p class="text-uppercase clr-time mb-0">1 Hour</p>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button href="#" class="btn button btn3 w-100 mt-3">{{$name}}</button>
                                </td>
                            </tr>
                        </table>

                    </a>
                </td>
                <?php } ?>
                @endforeach


            </tr>
            
        </table>
    </div>
<?php }?>


</div>

@endsection
@section('script')

<!-- <script>
$(document).ready( function () {
    $('#responsive-data-table').DataTable();
} );
</script> -->

@endsection
