@extends('layouts.app')



@section('content')
<?php
        $time_arr = [];
        $time_calender = [];
        if(Session::has('date_roster') == 1){
            $date = Session::get('date_roster');
            $club_id = DB::table('club')->where('user_id',Auth::user()->id)->first();
            $schedule = DB::table('schedule')->where('date',$date)->where('club_id',$club_id->id)->where('user_id',$club->user_id)->first();
            $club_calender = DB::table('club_calender')->where('date',$date)->where('roster_id',$club->id)->get();
            
            
            if(is_null($schedule)){
                $time = '';
                $time_arr= [];
                $booking_rate ='';
            }else{
                $time = $schedule->time;
                $time_arr = explode(',', $time);
                $booking_rate = $schedule->booking_rate;
                foreach($club_calender as $value){
                    $time_calender[] = $value->time;
                }
            }
            
            $close = "close";
        }else{
            // $time = $schedule_exits->time;
            // $date = $schedule_exits->date;
            // $time_arr = explode(',', $time);
            $time = '';
            $date = '';
            $time_arr= [];
            $time_calender= [];
            $close = "";
            $booking_rate ='';
            

        }?>
<style>
    .booked{
        color: gray !important;
    }
</style>
<div class="right-panel p-4">

    <div class="breadcrumb">

        <div><a href="{{ route('roster.index') }}" class="text-uppercase"><u>Roster</u></a></div>

        <div class="arrow mx-3"><i class="fa fa-angle-right"></i></div>

        <div class="text-uppercase"><u>{{$club->athlete_name}}</u></div>

    </div>

    <div class="pt-4">

        <div class="d-flex justify-content-between">

            <div class="club-info d-flex">

                <div class="club-img me-4">

                    <img src="{{asset("uploads/$club->image")}}" alt="" width="100">

                </div>

                <div class="club-dt text-uppercase">

                    <h2>{{$club->athlete_name}}</h2>
                    <div><label for="">Rate:</label>&nbsp;${{$booking_rate}}</div>

                    

                </div>

            </div>

           

        </div>

        <div class="tab-div pt-4">



            <ul class="nav nav-tabs px-3">                         

                <li><a data-toggle="tab" href="#info" class="active">Info</a></li>

                <li><a data-toggle="tab" href="#schedule">Schedule</a></li>



            </ul>



            <div class="tab-content">

                <div id="info" class="tab-pane active py-4 px-3">

                    <?php $user = DB::table('users')->where('id',Auth::user()->id)->first();

                     ?>

                    <div class="pb-2"><label for="">First Name:</label><span> {{$user->name}}</span></div>

                    <div class="pb-2"><label for="">Last Name:</label><span> {{$user->l_name}}</span></div>

                    <div class="pb-2"><label for="">Email:</label><span> {{$user->email}}</span></div>

                    <div class="pb-2"><label for="">Phone Number:</label><span> {{$club->phone_no}}</span></div>

                    <div class="pb-2"><label for="">Birthday:</label><span> {{$club->dob}}</span></div>

                    <div class="pb-2"><label for="">Gender:</label><span> {{$club->gender}}</span></div>

                    <div class="pb-2"><label for="">Address:</label><span> {{$club->address}},{{$club->city}},{{$club->state}}</span></div>

                </div>

                <div id="schedule" class="tab-pane fade py-4 px-2 px-sm-3">     



                    <div class="border-0">

                        <!-- <form autocomplete="off"> -->

                            <!-- <div class="bg-dark">

                                <div class="mx-0 mb-0 row justify-content-center px-1">

                                    <input type="text" id="dp1" class="datepicker" placeholder="Pick Date" name="date" readonly><span class="fa fa-calendar"></span>

                                </div>

                            </div> -->
                            <form id="rental" method="POST" action="{{route('roster.date')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="bg-dark">
                                <div class="mx-0 mb-0 row justify-content-sm-center justify-content-start px-1">
                                    <input type="text" id="dp1" class="datepicker" placeholder="Pick Date" name="date" readonly value="{{$date}}"><span class="fa fa-calendar"></span>
                                    
                                </div>
                                <center>
                                <button type="submit" class="btn btn-primary" data-dismiss="modal" style="margin-right: 43px;">Show</button>
                                </center>
                            </div>
                            </form>

                            <div class="p-0 p-sm-2 p-md-3 p-lg-5">      

                                <div class="row text-center mx-0">

                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div class="cell py-1 <?php if(in_array("8:00AM", $time_calender)){echo 'booked';} elseif(in_array("8:00AM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>" style="border: 0px solid #BDBDBD;">8:00AM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("9:00AM", $time_calender)){echo 'booked';} elseif(in_array("9:00AM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">9:00AM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("10:00AM", $time_calender)){echo 'booked';} elseif(in_array("10:00AM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">10:00AM</div>
                                    </div>

                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("11:00AM", $time_calender)){echo 'booked';} elseif(in_array("11:00AM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">11:00AM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("12:00PM", $time_calender)){echo 'booked';} elseif(in_array("12:00PM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">12:00PM</div>
                                    </div> 

                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("1:00PM", $time_calender)){echo 'booked';} elseif(in_array("1:00PM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">1:00PM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("2:00PM", $time_calender)){echo 'booked';} elseif(in_array("2:00PM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">2:00PM</div>
                                    </div>

                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">     
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("3:00PM", $time_calender)){echo 'booked';} elseif(in_array("3:00PM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">3:00PM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("4:00PM", $time_calender)){echo 'booked';} elseif(in_array("4:00PM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">4:00PM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("5:00PM", $time_calender)){echo 'booked';} elseif(in_array("5:00PM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">5:00PM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("6:00PM", $time_calender)){echo 'booked';} elseif(in_array("6:00PM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">6:00PM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("7:00PM", $time_calender)){echo 'booked';} elseif(in_array("7:00PM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">7:00PM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("8:00PM", $time_calender)){echo 'booked';} elseif(in_array("8:00PM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">8:00PM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("9:00PM", $time_calender)){echo 'booked';} elseif(in_array("9:00PM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">9:00PM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2"> 
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("10:00PM", $time_calender)){echo 'booked';} elseif(in_array("10:00PM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">10:00PM</div>
                                    </div>

                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("11:00PM", $time_calender)){echo 'booked';} elseif(in_array("11:00PM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">11:00PM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("12:00AM", $time_calender)){echo 'booked';} elseif(in_array("12:00AM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">12:00AM</div>
                                    </div> 

                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("1:00AM", $time_calender)){echo 'booked';} elseif(in_array("1:00AM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">1:00AM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("2:00AM", $time_calender)){echo 'booked';} elseif(in_array("2:00AM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">2:00AM</div>
                                    </div>

                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("3:00AM", $time_calender)){echo 'booked';} elseif(in_array("3:00AM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">3:00AM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("4:00AM", $time_calender)){echo 'booked';} elseif(in_array("4:00AM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">4:00AM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("5:00AM", $time_calender)){echo 'booked';} elseif(in_array("5:00AM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">5:00AM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("6:00AM", $time_calender)){echo 'booked';} elseif(in_array("6:00AM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">6:00AM</div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-lg-2 col-6 my-1 px-2">
                                        <div style="border: 0px solid #BDBDBD;" class="cell py-1 <?php if(in_array("7:00AM", $time_calender)){echo 'booked';} elseif(in_array("7:00AM", $time_arr)){ echo 'selected'; }else{ echo ''; }?>">7:00AM</div>
                                    </div>

                                </div>

                            </div>

                           

                            

                        <!-- </form> -->

                    </div>



                </div>

                <a href="javascript:void(0)" data-toggle="modal" data-target="#id_model" class="link" style="float:right" >Deactivate Partnership</a>

                <div class="modal fade" id="id_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <div class="modal-dialog" role="document">

                        <div class="modal-content ">

                            <h3 class="text-center">Cancle Partnership: {{$club->athlete_name}} </h3>

                            <div class="modal-body">

                                <p class="text-center">To confirm , please type "Cancle" below</p>

                                <input type="text" name="email" class="form-control mb-0">

                                <div class="d-flex justify-content-center pt-4">

                                <a href="" class="btn border me-5">Enter</a>

                                    <a href="" class="btn btn-primary">Cancle</a>

                                </div>

                            </div>



                        </div>

                

                </div>

        </div>

            </div>

        </div>





    </div>

</div>

@endsection

