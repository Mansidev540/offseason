@extends('layouts.app')

@section('content')
<div class="right-panel p-4">
    <div class="breadcrumb">
        <div><a href="{{route('trainercalender.index')}}" class="text-uppercase"><u>Calender</u></a></div>
        <div class="arrow mx-3"><i class="fa fa-angle-right"></i></div>
        <div class="text-uppercase"><u>Session</u></div>
    </div>
    <form id="member" method="POST" action="{{ route('trainercalender.save') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
    
        <div class="col-2"></div>
    
        <div class="col-4 ">
            <div class="pt-4">
                <div class="d-flex flex-column">
                    <div class="club-info d-flex mb-5">
                        <div class="club-img me-4">
                        <?php $club = DB::table('club')->where('id',$calender->club_id)->first();
                                $service = DB::table('service')->where('id',$calender->service_id)->first();                  
                                $member = DB::table('member')->where('id',$calender->member_id)->first();
                                $athlete = DB::table('athlete')->where('id',$calender->roster_id)->first();
                                $rental = DB::table('rental')->where('id',$calender->rental_id)->first();          
                                ?>
                            <img src="{{asset("uploads/$club->image")}}" alt width="100">
                        </div>
                        <div class="club-dt">
                            <h2>{{$club->club_name}}</h2>
                            <div class="mb-2">Club</div>
                            <div class="mb-2">{{$club->phone_no}}</div>     
                        </div>
                    </div>

                    <div class="club-info d-flex mb-5">  
                        <div class="club-img me-4">        
                            <img src="{{ asset('asset/images/IMG_2763.png') }}" alt width="100">
                        </div>
                        <div class="club-dt">
                            <h2>{{$member->name}}</h2>     
                            <div class="mb-2">Trainee</div>
                            <div class="mb-2">{{$member->phone_no}}</div>
                        </div>
                    </div>

                    <div class="club-info d-flex mb-5">
                        <div class="club-img me-4">
                            <img src="{{asset("uploads/$athlete->image")}}" alt width="100">
                        </div>
                        <div class="club-dt">
                            <h2>{{$athlete->athlete_name}}</h2>
                            <div class="mb-2">TRAINER</div>
                            <div class="mb-2">{{$athlete->phone_no}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="col-4 pt-4">
            <p class="detail"><span>Date :</span> {{$calender->date}}</p>
            <p class="detail"><span>Time :</span> {{$calender->time}}</p>
            <p class="detail"><span>Service :</span> {{$service->name}}
                <!-- <select class="form-select service" style="border: 0 !important;"
                    aria-label="Default select example">
                    <option selected>Private Batting Training </option>
                    <option value="1">One</option>
                    <option value="2">Two</option>          
                    <option value="3">Three</option>
                </select> -->
            </p>
            <p class="detail"><span>Duration :</span> 1 Hour</p>         
            <p class="detail"><span>Rental :</span> {{$rental->name}}</p>        
            <?php $opration = DB::table('opration')->where('club_id',$club->id)->first();
            $rate = $calender->trainer_rate * $opration->club_fee / 100;
            $rate_total = $calender->trainer_rate - $rate;

            $booking_fee = $rate_total *10 /100;
           
            $net = $rate_total - $booking_fee;
            ?>
            <p class="detail"><span>Trainer:</span> ${{$calender->trainer_rate}}</p>
            <p class="detail"><span>Club Fee:</span> {{ $opration->club_fee }}%(${{$rate}})</p>
            <p class="detail"><span>Booking Fee:</span> 10%({{$booking_fee}})</p>    
            <p class="detail"><span>Net:</span> ${{$net}}</p>
            <input type="hidden" name="club_calender_id" value="{{$calender->id}}" >
            <input type="hidden" name="net" value="{{$net}}">      
        </div>
        <div class="col-12 d-flex justify-content-end">
            
           <?php $calender_trainer = DB::table('trainer_ca lender')->where('club_calender_id',$calender->id)->where('user_id',Auth::user()->id)->first(); 
           if(is_null($calender_trainer)){ ?>
           <button type="submit" class="scheduled">Schedule</button>
           <?php }
           else{?>
                       
            <button  class="scheduled" disabled>Scheduled</button>             
            <a class="scheduled_cancle ms-3" href="javascript:void(0)" data-toggle="modal"     
                data-target="#delete-msg">Cancel Session</a>
           <?php }
           ?>

        </div>
                
        
    </div>
</form>
<div class="modal fade" id="delete-msg" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 9% !important;">             
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <a href=""><button  class="close border-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>         
                    </button></a>

                    <div class="modal-body">
                        <div class="d-flex justify-content-center club-img mb-2">
                            <img src="images/Unknown.png" alt width="100">
                            <img class="ms-4" src="images/IMG_2763.png" alt width="100">
                            <img class="ms-4" src="images/MexicoSummer19-2.png  " alt width="100">
                        </div>
                        <p class="text-center fw-bold">Cancel Session</p>        
                        <p class="text-center">To Confirm,
                            Please type "Cancel" below.</p>    
                        <form id="cancle" method="POST" action="{{ route('trainercalender.cancle') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group has-validation">       
                        <input type="text" name="cancle" class="form-control username" id="yourtext"
                                required value="">
                            <input type="hidden" name="club_calender_id" class="form-control username" id="yourtext"
                                required value="{{$calender->id}}"> 
                        </div>
                        <div class="d-flex justify-content-end mt-3">   
                            <button type="submit" class="btn-enter">Enter</button>     
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>        
</div>
@endsection