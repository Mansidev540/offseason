@extends('layouts.app')



@section('content')

<div class="right-panel p-4">

    <div class="d-flex pb-4">

        <div class="flex-grow-1 d-flex align-items-center">

            <h2 class="text-uppercase me-4 mb-0">Rentals</h2>

                <!-- <div class="form-group">

                    <input type="search" class="form-control mb-0 search-input" placeholder="Search" />

                </div> -->

           

        </div>

        <div class="flex-shrink-0">

            <a href="{{ route('rental.add') }}" class="btn button btn3 add-btn">Add Rental</a>

        </div>

    </div>

    <!-- <div class="listing-data px-3">

        <div class="row border-bottom py-3 list-head">

            <div class="col-sm-8 col-lg-10">Name</div>

            <div class="col-sm-2 col-lg-1">Price</div>

            <div class="col-sm-2 col-lg-1"></div>

        </div>

        @foreach($rentals as $value)

        <div class="row border-bottom py-4 align-items-center" id="table">

            <div class="col-sm-8 col-lg-10">

                <a href="#">

                    <div class="d-flex align-items-center">

                        <div class="flex-shrink-0 me-3">

                            <img src="{{asset("uploads/$value->image")}}" alt="" width="">

                        </div>

                        <div class="flex-grow-1 link">

                            {{$value->name}}

                        </div>

                    </div>

                </a>

            </div>

            <div class="col-sm-2 col-lg-1 fnt-bold">${{$value->price}}</div>

            <div class="col-sm-2 col-lg-1 position-relative text-end">

                <a href="javascript:void(0);" class="drop-toggle link"> <i class="fa fa-ellipsis-h"></i></a>

                <div class="drop-div">

                    <ul class="mb-0">

                        <li><a href="{{route('rental.edit',$value->id)}}" class="link">Edit</a></li>

                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#id_{{$value->id}}" class="link">Delete</a></li>

                    </ul>

                </div>

            </div>

        </div>

        <div class="modal fade" id="id_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">

                <div class="modal-content ">

                    <div class="modal-body">

                        <p class="text-center">Are you sure you want to delete?</p>

                        <div class="d-flex justify-content-center pt-4">

                        <a href="{{route('rental.delete',$value->id)}}" class="btn btn-primary me-5">Yes</a>

                            <a href="" class="btn btn-primary">No</a>

                        </div>

                    </div>



                </div>

            </div>

        </div>

        @endforeach 



    </div>-->

    <div class="table-responsive pb-5 pt-4">

        <table class="table dt-responsive nowrap" id="responsive-data-table">

            <!-- <tr>

                <th width="75%" class="py-3">Name</th>

                <th width="15%" class="py-3">Price</th>

                <th width="10%" class="py-3"></th>

            </tr> -->

            <thead>

                        <tr>

                        <th class="py-3">Name</th>

                        <th class="py-3">Price</th>

                        <th class="py-3"></th>

                        </tr>

                    </thead>

            @foreach($rentals as $value)

            <tr>

                <td class="py-4">

                    <table cellpadding="0" cellspacing="0" width="100%" class="border-none">

                        <tr>

                            <td width="80">

                                <a href="#"><img src="{{asset("uploads/$value->image")}}" alt="" width="56"></a>

                            </td>

                            <td><a href="#" class="link">{{$value->name}}</a></td>

                        </tr>

                    </table>



                </td>

                <td class="py-4" valign="middle">${{$value->price}}</td>

                <td class="position-relative text-end py-4" valign="middle">

                    <a href="javascript:void(0);" class="drop-toggle link"> <i class="fa fa-ellipsis-h"></i></a>

                    <table class="drop-div border-none">

                        <tr>

                            <td class="p-3">

                                <ul class="mb-0">

                                    <li><a href="{{route('rental.edit',$value->id)}}" class="link">Edit</a></li>

                                    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#id_{{$value->id}}" class="link">Delete</a></li>

                                </ul>

                            </td>

                        </tr>



                    </table>



                </td>

            </tr>

            <div class="modal fade" id="id_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">

                <div class="modal-content ">

                    <div class="modal-body">

                        <p class="text-center">Are you sure you want to delete?</p>

                        <div class="d-flex justify-content-center pt-4">

                        <a href="{{route('rental.delete',$value->id)}}" class="btn btn-primary me-5">Yes</a>

                            <a href="" class="btn btn-primary">No</a>

                        </div>

                    </div>



                </div>

            </div>

        </div>

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

</script>

@endsection



