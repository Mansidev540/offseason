
@extends('layouts.app')

@section('content')
<div class="right-panel p-4">
    <div class="breadcrumb">
        <div><a href="{{route('clubcalender.index')}}" class="text-uppercase"><u>Calender</u></a></div>
        <div class="arrow mx-3"><i class="fa fa-angle-right"></i></div>
        <div class="text-uppercase"><u>Session</u></div>
    </div>
<?php  $club = DB::table('club')->where('user_id',Auth::user()->id)->first();?>
<form id="member" method="POST" action="{{ route('clubcalender.save') }}" enctype="multipart/form-data">
@csrf
    <div class="row">

        <div class="col-2"></div>
        <div class="col-4 ">
            <div class="pt-4">
                <div class="d-flex flex-column">
                    <div class="club-info d-flex mb-5">
                        <div class="club-img me-4">
                            <img class="rounded-circle" src="{{asset("uploads/$club->image")}}" alt width="100">
                        </div>
                        <div class="club-dt">
                            <h2>{{$club->club_name}}</h2>
                            <div class="mb-2">Club</div>
                            <div class="mb-2">{{$club->phone_no}}</div>
                        </div>
                    </div>

                    <div class="club-info d-flex mb-5 member_div">
                        <div class="club-img me-4">
                            <img src="{{ asset('asset/images/Ellipse 108.png')}}" alt width="100">
                        </div>
                        <div class="club-dt d-flex align-items-center">
                            <a class="Trainer_btn" href="javascript:void(0)" data-toggle="modal"
                                data-target="#delete-msg">Choose Trainee</a>
                        </div>
                    </div>

                    <div class="club-info d-flex mb-5 tariner_div">
                        <div class="club-img me-4">
                            <img src="{{ asset('asset/images/Ellipse 108.png')}}" alt width="100">
                        </div>
                        <div class="club-dt d-flex align-items-center">
                            <a class="Trainer_btn" href="javascript:void(0)" data-toggle="modal"
                                data-target="#choose_trainee">Choose Trainer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="col-4 pt-4">
            <p class="detail"><span>Date :</span> {{$newDate}}</p>
            <input type="hidden" name="date" value="{{$newDate}}">
            <p class="detail"><span>Time :</span> {{$time_select}}</p>
            <input type="hidden" name="time" value="{{$time_select}}">
            <p class="detail mb-0"><span>Service :</span>
            <?php $service = DB::table('service')->get();?>
                <select class="form-select service" aria-label="Default select example" name="service">
                    <option selected>Choose Service</option>
                    @foreach($service as $service)
                    <option value="{{$service->id}}">{{$service->name}}</option>
                    @endforeach
                </select>
            </p>
            <p class="detail"><span>Duration :</span> 1 Hour</p>
            <p class="detail"><span>Rental :</span> ${{$rental_select->price}} ({{$rental_select->name}})</p>
            <input type="hidden" name="rental" value="{{$rental_select->id}}">
            <input type="hidden" name="rental_price" id="rental_price" value="{{$rental_select->price}}">
            <p class="detail tariner_rate"><span>Trainer :</span> -</p>
            <p class="detail div_booking_fee"><span>Booking Fee :</span> -</p>
            <p class="detail div_total"><span>Total :</span> -</p>
        </div>
        <div class="modal fade" id="delete-msg" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="margin-left: -6rem;margin-top: 6%;">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 50rem;height: auto;">
                    <button type="button" class="close border-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="modal-body">
                        <div class="d-flex pb-4">
                            <div class="flex-grow-1 d-flex align-items-center">
                                <h2 class="text-uppercase me-4 mb-0">Members</h2>
                                <form action="">
                                    <!-- <div class="form-group mb-0">
                                        <input type="search" class="form-control mb-0 search-input"
                                            placeholder="Avery">
                                    </div> -->
                                </form>
                            </div>
                            <div class="flex-shrink-0 mt-2">
                                <span class="fw-bold">{{$newDate}} {{$time_select}} </span>
                            </div>
                        </div>

                        <div class="table-responsive pt-4 mb-5">
                            <table class="table">
                                <tr>
                                    <th width="10%" class="py-3"></th>
                                    <th width="30%" class="py-3">Name</th>
                                    <th width="30%" class="py-3">Number</th>
                                </tr>
                                <?php $member = DB::table('member')->get();?>
                                @foreach($member as $member_value)
                                <tr>
                                    <td>
                                    <input class="p-0 m-0" type="radio" name="member_select"
                                            id="member_{{$member_value->id}}" value="{{$member_value->id}}">
                                    </td>
                                    <td>
                                        <img class="rounded-circle" src="{{asset("uploads/$member_value->image")}}"
                                                alt="" width="50px">&nbsp;&nbsp;&nbsp;{{$member_value->name}}
                                    </td>
                                    <td class="py-4" valign="middle">{{$member_value->phone_no}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                        <!-- <div class="col-md-12 d-flex justify-content-center mt-5">
                            <a href=""><button class="modal_cancle">Cancel</button></a>
                            <a href=""><button class="modal_enter ms-2">Enter</button></a>
                        </div> -->
                        <div class="d-flex justify-content-center pt-4">
                        <a href="javascript:void(0)" class="btn btn-primary me-5 member" data-dismiss="modal">Enter</a>
                            <!-- <a href="" class="btn btn-primary" data-dismiss="modal">No</a> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="choose_trainee" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="margin-left: -6rem;margin-top: 6%;">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 50rem;height: auto;">
                    <button type="button" class="close border-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="modal-body">
                        <div class="d-flex pb-4">
                            <div class="flex-grow-1 d-flex align-items-center">
                                <h2 class="text-uppercase me-4 mb-0">Roster</h2>
                                <form action="">
                                    <!-- <div class="form-group mb-0">
                                        <input type="search" class="form-control mb-0 search-input"
                                            placeholder="search">
                                    </div> -->
                                </form>
                            </div>
                            <div class="flex-shrink-0 mt-2">
                                <span class="fw-bold">{{$newDate}} {{$time_select}}</span>
                            </div>
                        </div>

                        <div class="table-responsive pt-4 mb-5">
                            <table class="table">
                                <tr>
                                    <th width="10%" class="py-3"></th>
                                    <th width="35%" class="py-3">Name</th>
                                    <th width="40%" class="py-3">Sport</th>
                                    <th width="40%" class="py-3">Rate</th>
                                    <th width="15%" class="py-3">Status</th>
                                </tr>
                                <?php $athlete = DB::table('athlete')->get();?>
                                @foreach($athlete as $athlete)
                                <?php $schedule8 = DB::table('schedule')->where('user_id',$athlete->user_id)->where('date',$newDate)->whereRaw('FIND_IN_SET(?, time)', [$time_select])->first();?>
                                <tr>
                                    <td>
                                        <input class="p-0 m-0" type="radio" name="athlete_select"
                                            id="athlete_select_{{$athlete->id}}" value="{{$athlete->id}}" data="<?php if(is_null($schedule8)){ echo 0; }else { echo $schedule8->booking_rate; } ?>">
                                    </td>
                                    <td>
                                        <a href="#"><img class="rounded-circle" src="{{asset("uploads/$athlete->image")}}"
                                                alt="" width="50px"></a>&nbsp;&nbsp;&nbsp;<a href="#"
                                            class="link">{{$athlete->athlete_name}}</a>
                                    </td>
                                    <td class="py-4" valign="middle">{{$athlete->school_name}}</td>
                                    
                                    <?php if(is_null($schedule8)){?>
                                    <td class="py-4" valign="middle" >-</td>
                                    <td class="py-4" valign="middle" style="color: #00C4FF;">Not Available</td>
                                    <?php }else{ ?>
                                        <td class="py-4" valign="middle" >{{$schedule8->booking_rate}}</td>
                                        <td class="py-4" valign="middle" style="color: #00C4FF;">Available</td>
                                        <?php } ?>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="d-flex justify-content-center pt-4">
                        <a href="javascript:void(0)" class="btn btn-primary me-5 tariner" data-dismiss="modal">Enter</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <a href="{{route('clubcalender.index')}}" class="scheduled_cancle">Cancel</a>
            <button type="submit" class="check_out ms-3" style="">Check Out</button>
        </div>

    </div>
</form>
</div>
@endsection
@section('script')
<script>
$('.member').on("click",function(){
    var member_id = $('input[name="member_select"]:checked').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "{{ route('clubcalender.member_calender') }}",
        data : {'id' : member_id},
        type : 'GET',
        dataType : 'json',
        success:function(res){               

            if(res){

                $.each(res.member,function(key,value){

                
                    console.log(value.name);
                    var name = value.name;
                    var phone_no = value.phone_no;
                    var image = value.image

                    var div_data = '<div class="club-info d-flex mb-5"><div class="club-img me-4"><img class="rounded-circle" src="<?php echo asset("uploads/'+image+'")?>" alt width="100"></div><div class="club-dt"><h2 class="text-uppercase">'+name+'</h2><div class="mb-2">trainee</div><div class="mb-2">'+phone_no+'</div></div></div>';
                    $('.member_div').html(div_data);
                });

            }else{

                

            }
        }
    });

});
$('.tariner').on("click",function(){
    var member_id = $('input[name="athlete_select"]:checked').val();
    var rate = $('input[name="athlete_select"]:checked').attr('data');
    var div_rate = '<p class="detail"><span>Trainer:</span> $'+rate+'</p>';
    $('.tariner_rate').html(div_rate);
    var rental_price = $("#rental_price").val();
    var booking_rate = parseFloat(rate) + parseFloat(rental_price);
    var booking_fee = parseFloat(booking_rate) * 10/100;
    var div_booking_fee = '<p class="detail"><span>Booking Fee:</span> $'+booking_fee+'(10%)</p>';
    $('.div_booking_fee').html(div_booking_fee);
    var total = parseFloat(booking_rate) + parseFloat(booking_fee);
    var div_total = '<p class="detail"><span>Total:</span> $'+total+'</p>';
    $('.div_total').html(div_total);
    

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "{{ route('clubcalender.tariner_calender') }}",
        data : {'id' : member_id},
        type : 'GET',
        dataType : 'json',
        success:function(res){               

            if(res){

                $.each(res.member,function(key,value){

                
                    console.log(value.athlete_name);
                    var name = value.athlete_name;
                    var phone_no = value.phone_no;
                    var image = value.image

                    var div_data = '<div class="club-info d-flex mb-5"><div class="club-img me-4"><img class="rounded-circle" src="<?php echo asset("uploads/'+image+'")?>" alt width="100"></div><div class="club-dt"><h2 class="text-uppercase">'+name+'</h2><div class="mb-2">trainee</div><div class="mb-2">'+phone_no+'</div></div></div>';
                    $('.tariner_div').html(div_data);
                });

            }else{

                

            }
        }
    });

});
</script>

@endsection
