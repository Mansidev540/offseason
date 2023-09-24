@extends('layouts.app')

@section('content')
<form id="operation-form" method="POST" action="{{ route('club.save') }}">
@csrf
<div class="right-panel p-4">
    <div class="breadcrumb">
        <div><a href="{{ route('club.index') }}" class="text-uppercase"><u>Clubs</u></a></div>
        <div class="arrow mx-3"><i class="fa fa-angle-right"></i></div>
        <div class="text-uppercase"><u>{{$club->club_name}}</u></div>
    </div>
    <div class="pt-4">
    <?php
        $time_arr = [];
        if(Session::has('date') == 1){
            $date = Session::get('date');
            $schedule = DB::table('schedule')->where('date',$date)->where('club_id',$club->id)->where('user_id',Auth::user()->id)->first();
            if(is_null($schedule)){
                $time = '';
                $time_arr= [];
                $booking_rate ='';
            }else{
                $time = $schedule->time;
                $time_arr = explode(',', $time);
                $booking_rate = $schedule->booking_rate;
            }
            
            $close = "close";
        }else{
            // $time = $schedule_exits->time;
            // $date = $schedule_exits->date;
            // $time_arr = explode(',', $time);
            $time = '';
            $date = '';
            $time_arr= [];
            $close = "";
            $booking_rate ='';
            

        }?>
        <div class="d-flex justify-content-between">
            <div class="club-info d-flex">
                <div class="club-img me-4">
                    <img src="{{asset("uploads/$club->image")}}" alt="" width="100"> 
                </div>
                <div class="club-dt text-uppercase">
                    <h2>{{$club->club_name}}</h2>
                    <div><label for="">Club Fee:</label>&nbsp;<?php if($opration != null){ echo  $opration->club_fee ?> % <?php } ?></div>
                </div>
            </div>
            <div class="bookin-info">
                <form action="" class="operation-form">
                    <div class="form-group d-flex align-items-center pb-4">
                        <label class="me-3 text-end" style="color: #fff; font-weight: 600;">Available</label>
                        <label class="switch m5">
                            <input type="checkbox" selected="selected" name="available" value="on">
                            <small></small>
                        </label>
                    </div>
                    <div class="form-group d-flex align-items-center pb-4">
                        <label for="" style="color: #fff; font-weight: 600;" class="me-3 text-end ">Booking Rate ($)</label>
                        <input type="number" class="form-control mb-0" min="<?php if($opration != null){ echo $opration->rate ?><?php }?>" value="{{$booking_rate}}" size="5" name="booking_rate">
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-div pt-4">

            <ul class="nav nav-tabs px-3">
                <li><a data-toggle="tab" href="#info" class="active">Info</a></li>
                <li><a data-toggle="tab" href="#schedule">Schedule</a></li>

            </ul>

            <div class="tab-content">
                <div id="info" class="tab-pane active py-4 px-3">
                <?php $user = DB::table('users')->where('id',Auth::user()->id)->first(); ?>
                    <div class="pb-2"><label for="">Email:</label><span> {{$user->email}}</span></div>
                    <div class="pb-2"><label for="">Phone Number:</label><span> {{$club->phone_no}}</span></div>
                    <div class="pb-2"><label for="">Address:</label><span> {{$club->address}},{{$club->city}},{{$club->state}}</span></div>
                </div>
                <div id="schedule" class="tab-pane fade py-4 px-3">                            

                    <div class="border-0">
                    
                        
                            <form id="rental" method="POST" action="{{route('club.date')}}" enctype="multipart/form-data">
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
                            <div class="p-3 p-sm-5" >
                                <div class="row text-center mx-0">
                                <div class="row text-center mx-0" id="selected_div">
                                    <div class="col-md-2 col-4 my-1 px-2">
                                    <input type="hidden" id="club_id" class="" placeholder="" name="club_id" readonly value="{{$club->id}}">
                                    <input type="hidden" id="dp1" class="datepicker" placeholder="Pick Date" name="date1" readonly value="{{$date}}">
                                        <div class="cell py-1 <?php if (in_array("8:00AM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">8:00AM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("9:00AM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">9:00AM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("10:00AM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">10:00AM</div>
                                    </div>

                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("11:00AM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">11:00AM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("12:00PM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">12:00PM</div>
                                    </div> 

                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("1:00PM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">1:00PM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("2:00PM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">2:00PM</div>
                                    </div>

                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("3:00PM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">3:00PM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("4:00PM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">4:00PM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("5:00PM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">5:00PM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("6:00PM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">6:00PM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("7:00PM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">7:00PM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("8:00PM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">8:00PM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("9:00PM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">9:00PM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("10:00PM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">10:00PM</div>
                                    </div>

                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("11:00PM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">11:00PM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("12:00AM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">12:00AM</div>
                                    </div> 

                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("1:00AM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">1:00AM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("2:00AM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">2:00AM</div>
                                    </div>

                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("3:00AM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">3:00AM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("4:00AM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">4:00AM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("5:00AM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">5:00AM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("6:00AM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">6:00AM</div>
                                    </div>
                                    <div class="col-md-2 col-4 my-1 px-2">
                                        <div class="cell py-1 <?php if (in_array("7:00AM", $time_arr)){ echo 'select'; }else{ echo ''; }?>">7:00AM</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center" style="margin-top: 16px;">
                            <button id="save_button" type="submit" class="btn btn-primary center save_button">Save</button>  
                            </div>
                            <input type="hidden" id="time" class="time" placeholder="" name="time" readonly>
                        
                    </div>

                </div>
                

            </div>
            <a href="javascript:void(0)" data-toggle="modal" data-target="#id_model" class="link" style="float:right" >Deactivate Partnership</a>
                <div class="modal fade" id="id_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content ">
                            <h3 class="text-center">Cancle Partnership: {{$club->club_name}} </h3>
                            <div class="modal-body">
                                <p class="text-center">To confirm , please type "Cancle" below</p>
                                <input type="text" name="email"  class="form-control mb-0">
                                <div class="d-flex justify-content-center pt-4">
                                <a href="" class="btn btn-primary me-5">Enter</a>
                                    <a href="" class="btn btn-primary">Cancle</a>
                                </div>
                            </div>

                        </div>
                
                </div>
        </div>
        </div>
   

    </div>
</div>
</form>
@endsection
@section('script')
<script>
// $(document).ready(function() {
//     $(".datepicker").click(function(){
//         alert('klk');
        
//     }); 
// });
</script>
@endsection