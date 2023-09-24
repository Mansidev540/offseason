

@extends('layouts.app')



@section('content')

<div class="right-panel p-4">

    <div class="d-flex pb-4">

        <div class="flex-grow-1 d-flex align-items-center">

            <h2 class="text-uppercase me-4 mb-0">Roster</h2>

                <!-- <div class="form-group">

                    <input type="search" class="form-control mb-0 search-input" placeholder="Search" />

                </div> -->

           

        </div>

        <div class="flex-shrink-0">

            <a href="javascript:void(0)" data-toggle="modal" data-target="#id_model" class="btn button btn3 add-btn">Add Roster</a>

        </div>



    </div>

    <!-- <div class="listing-data px-3">

        <div class="row border-bottom py-3 list-head">

            <div class="col-sm-8 col-lg-10">Name</div>

            <div class="col-sm-2 col-lg-1">Price</div>

            <div class="col-sm-2 col-lg-1"></div>

        </div>

       

      



    </div>-->

    <div class="modal fade" id="id_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">

                <div class="modal-content ">

                    <h2 class="text-center">New Roster</h2>

                    <div class="modal-body">

                        <p class="text-center">Send an email invite to add a new roster.</p>

                        <input type="text" name="mail" id="mail" class="form-control mb-0">     
 
                        <div class="d-flex justify-content-center pt-4">

                        <a href="javascript:void(0)" class="btn btn-primary me-5 send">Send</a>

                            <a href="" class="btn btn-primary" data-dismiss="modal">Cancle</a>

                        </div>

                    </div>



                </div>

            </div>

        </div>

    <div class="table-responsive pb-5 pt-4">

        <table class="table dt-responsive nowrap" id="responsive-data-table">

            <!-- <tr>

                <th width="75%" class="py-3">Name</th>

                <th width="15%" class="py-3">Price</th>

                <th width="10%" class="py-3"></th>

            </tr> -->

            <!-- <thead>

                <tr>

                    <th width="25%" class="py-3">Name</th>

                    <th width="30%" class="py-3">Location</th>

                    <th width="30%" class="py-3">Number</th>

                    <th width="30%" class="py-3">Status</th>

                </tr>

            </thead> -->

            <thead>

                        <tr>
                    
                        <th class="py-3">Name</th>

                        <th class="py-3">Location</th>

                        <th class="py-3">Number</th>

                        <th class="py-3">Status</th>

                        </tr>

                    </thead>

            @foreach($roster as $value)

            <tr>

            <td class="py-4">
                    <table cellpadding="0" cellspacing="0" width="100%" class="border-none">
                        <tr>
                            <td width="80">
                                <a href="{{route('roster.detail',$value->id)}}"><img src="{{asset("uploads/$value->image")}}" alt="" width="56"></a>
                            </td>
                            <td><a href="{{route('roster.detail',$value->id)}}" class="link">{{$value->athlete_name}}</a></td>
                        </tr>
                    </table>

                </td>

                <td class="py-4" valign="middle">{{$value->city}},{{$value->state}}</td>

                <td class="py-4" valign="middle">{{$value->phone_no}}</td>

                

                <td class="py-4" valign="middle" style="color:green">Available</td>



            </tr>

            @endforeach





        </table>

       

    </div>



</div>

@endsection

@section('script')



<script>

$(document).ready( function () {

    $('#responsive-data-table').DataTable();

} );

$(document).on('click', '.send', function(e){

var mail = $('#mail').val();
 
$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});

$.ajax({

    type: "get",

    url: "{{ route('roster.mail') }}",

    data: {"mail": mail }, // serializes the form's elements.

    success: function (data)

    {

         location.reload();

    }

});



});



</script> 

@endsection

