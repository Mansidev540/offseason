
@extends('layouts.app')

@section('content')
<div class="right-panel p-4">
    <div class="breadcrumb">
        <div><a href="{{route('clubcalender.index')}}" class="text-uppercase"><u>Calender</u></a></div>
        <div class="arrow mx-3"><i class="fa fa-angle-right"></i></div>
        <div class="text-uppercase"><u>Session</u></div>
    </div>
    <?php  $club = DB::table('club')->where('id',$calender->club_id)->first();?>
<form id="member" method="POST" action="{{ route('clubcalender.update') }}" enctype="multipart/form-data">
@csrf
    <div class="row">
        <div class="col-2"></div>
        <div class="col-4 ">
            <div class="pt-4">
                <input type="hidden" name="calender_id" value="{{$calender->id}}">
                <div class="d-flex flex-column">
                <div class="club-info d-flex mb-5">
                        <div class="club-img me-4">
                            <img src="{{asset("uploads/$club->image")}}" alt width="100">
                        </div>
                        <div class="club-dt">
                            <h2>{{$club->club_name}}</h2>
                            <div class="mb-2">Club</div>
                            <div class="mb-2">{{$club->phone_no}}</div>
                        </div>
                    </div>
                    <?php  $member_select = DB::table('member')->where('id',$calender->member_id)->first();?>
                    <div class="club-info d-flex mb-5">
                        <div class="club-img me-4">
                            <img src="{{ asset('asset/images/IMG_2763.png') }}" alt width="100">
                        </div>
                        <div class="club-dt">
                            <h2>{{$member_select->name}}</h2>
                            <div class="mb-2">trainee</div>
                            <div class="mb-2">{{$member_select->phone_no}}</div>
                        </div>
                    </div>
                    <?php  $tariner_select = DB::table('athlete')->where('id',$calender->roster_id)->first();?>
                    <div class="club-info d-flex mb-5">
                        <div class="club-img me-4">
                        <img src="{{asset("uploads/$tariner_select->image")}}" alt width="100">
                        </div>
                        <div class="club-dt">
                            <h2>{{$tariner_select->athlete_name}}</h2>
                            <div class="mb-2">Trainer</div>
                            <div class="mb-2">{{$tariner_select->phone_no}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="col-4 pt-4">
            <p class="detail"><span>Date :</span> {{$calender->date}}</p>
            <p class="detail"><span>Time :</span> {{$calender->time}}</p>
            <?php $rental = DB::table('rental')->where('id',$calender->rental_id)->first(); ?>
            <?php $service_select = DB::table('service')->where('id',$calender->service_id)->first();?>
            <p class="detail mb-0"><span>Service :</span>
            <?php $service = DB::table('service')->get();?>
                <select class="form-select service" aria-label="Default select example" name="service">
                    @foreach($service as $service)
                    <?php 
                        if($service->id == $calender->service_id){
                            $select = "selected";
                        }
                        else{
                            $select ="";
                        }
                    ?>
                    <option value="{{$service->id}}" {{$select}}>{{$service->name}}</option>
                    @endforeach
                </select>
            
                <a style="color: #00C4FF;text-decoration: underline;font-weight: 700;cursor: pointer;">Change</a>
            </p>
            <?php $opration = DB::table('opration')->where('club_id',$club->id)->first();?>
            <p class="detail"><span>Duration :</span> 1 Hour</p>
            <p class="detail"><span>Rental :</span> ${{$rental->price}} ({{$rental->name}})</p>
            <p class="detail"><span>Trainer:</span> ${{$calender->trainer_rate}}</p>
            <p class="detail"><span>Booking Fee:</span> ${{$calender->booking_rate}}(10%)</p>
            <p class="detail"><span>Total:</span> ${{$calender->total}}</p>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <?php if(is_null($calender->schedule)){ ?>
                    
                <a href="{{route('clubcalender.index')}}" class="scheduled_cancle">Cancel</a>
            <button class="check_out ms-3">Schedule</button>
            
                <?php }else{ ?>
                    <button class="check_out ms-3" disabled>Scheduled</button>
                    <a class="scheduled_cancle ms-3" href="javascript:void(0)" data-toggle="modal"
                data-target="#delete-msg">Cancel Session</a>
            
            <?php } ?>
        </div>






    </div>
</form>
</div>
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
                        <form id="cancle1" method="POST" action="{{ route('clubcalender.cancle') }}" enctype="multipart/form-data">
                        @csrf
                        <p class="text-center fw-bold">Cancel Session</p>
                        <p class="text-center">To Confirm,
                            Please type "Cancel" below.</p>

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
@section('script')

<!-- <script>
$(document).ready( function () {
    $('#responsive-data-table').DataTable();
} );
</script> -->
@endsection
