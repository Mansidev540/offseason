
@extends('layouts.app')

@section('content')
<style>
    .card2{
        margin: 0 0.5em;
        margin-bottom: 0px;
        border-radius: 10px;
        box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
        font-size: 0.9em;
        width: auto;
        margin-bottom: 1rem;
    }
</style>
<div class="right-panel p-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="border-0">
                <form id="rental" method="POST" action="{{ route('trainercalender.date') }}" enctype="multipart/form-data">
                @csrf
                        <div class="bg-dark">
                            <div class="mx-0 mb-0 row justify-content-sm-center justify-content-start px-1">
                                <input type="text" id="dp1" class="datepicker" placeholder="Pick Date"
                                    name="date" readonly value="{{$date}}"><span class="fa fa-calendar"></span>
                                    <?php  ?>
                            </div>
                            <button type="submit" class="btn btn-primary" data-dismiss="modal">Show</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php $calender = DB::table('club_calender')->where('date',$date)->get();?>
            @foreach($calender as $value)
            <div class="col-lg-3">
                <div class="card card2"><a href="{{route('trainercalender.detail',$value->id)}}">
                    <div class="d-flex justify-content-center mb-2 mt-3">
                    <?php $club = DB::table('club')->where('id',$value->club_id)->first(); ?>
                        <img src="{{asset("uploads/$club->image")}}" class="img-fluid rounded-circle" alt="" width="40%">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-center mb-2 fw-light text-uppercase">
                            
                            {{$club->club_name}}
                        </h5>
                        <h5 class="card-title d-flex justify-content-center mb-2">
                            PRIVATE BATTING TRAINING
                        </h5>
                        <p class="card-text d-flex justify-content-center mb-1">1 HOUR</p>
                        <?php $calender_trainer = DB::table('trainer_calender')->where('club_calender_id',$value->id)->where('user_id',Auth::user()->id)->first();
                            if(is_null($calender_trainer)){ ?>
                            
                            <?php }
                            else{?>
                                <p class="card-text d-flex justify-content-center mb-1">Scheduled</p>
                            <?php }
                            ?>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button class="scheduled_btn">{{$value->time}}</button>
                    </div>
                    </a>
                </div>
            </div>
            @endforeach
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
