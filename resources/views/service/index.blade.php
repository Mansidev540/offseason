@extends('layouts.app')



@section('content')

<div class="right-panel p-4">

    <div class="d-flex pb-4">

        <div class="flex-grow-1 d-flex align-items-center">

            <h2 class="text-uppercase me-4 mb-0" style="margin-left: -5px;">Services</h2>

                <!-- <div class="form-group">

                    <input type="search" class="form-control mb-0 search-input" placeholder="Search" />

                </div> -->

           

        </div>

        <div class="flex-shrink-0">

            <a href="{{ route('service.add') }}" class="btn button btn3 add-btn">Add Service</a> 

        </div>

    </div>

    <div class="table-responsive pb-5 pt-4">

        <table class="table dt-responsive nowrap" id="responsive-data-table">

            <!-- <tr>

                <th width="75%" class="py-3">Name</th>

                <th width="15%" class="py-3">Price</th>

                <th width="10%" class="py-3"></th>

            </tr> -->

            <thead>

                        <tr>

                        <th width="75%" class="py-3">Name</th>

                        <th width="25%" class="py-3"></th>

                        </tr>

                    </thead>

            @foreach($service as $value)

            <tr>

                <td class="py-4">

                    <table cellpadding="0" cellspacing="0" width="100%" class="border-none">

                        <tr>

                            <!-- <td width="80">

                                <a href="#"><img src="{{asset("uploads/$value->image")}}" alt="" width="56"></a>

                            </td> -->

                            <td><a href="#" class="link">{{$value->name}}</a></td>

                        </tr>

                    </table>



                </td>

                <!-- <td class="py-4" valign="middle">${{$value->price}}</td> -->

                <td class="position-relative text-end py-4" valign="middle">

                    <a href="javascript:void(0);" class="drop-toggle link"> <i class="fa fa-ellipsis-h"></i></a>

                    <table class="drop-div border-none">

                        <tr>

                            <td class="p-3">

                                <ul class="mb-0">

                                    <li><a href="{{route('service.edit',$value->id)}}" class="link">Edit</a></li>

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

                        

                            <a href="" class="btn">No</a>
                            <a href="{{route('service.delete',$value->id)}}" class="btn btn-primary me-5">Yes</a>

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



