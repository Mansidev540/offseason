@extends('layouts.app')

@section('content')
    <div class="right-panel p-4">
    <div class="breadcrumb">
        <div><a href="{{ route('service.index') }}" class="text-uppercase"><u>Services</u></a></div>
        <div class="arrow mx-3"><i class="fa fa-angle-right"></i></div>
        <div class="text-uppercase"><u>Edit Service</u></div>
    </div>
    <form id="service" method="POST" action="{{ route('service.update') }}">
    @csrf
    <div class="pt-4">
        <!-- <div class="profile-icon profile-icon2 bd-color text-center">
            <img src="images/baseballnettingmain2_12.png" alt="" width="120" height="120">
            
            <div class="edit-prof text-uppercase mt-3 position-relative"><a href="javascript:void(0)">Add Prorile</a>
                <input class="form-control p-0 mb-0" type="file" id="formFile" name="image">
            </div>
            
        </div> -->
        <!-- <div>
            <table cellpadding="" cellspacing="" width="100%" class="edit-table">
                <tr>
                    <th width="200" class="text-center">Name</th>
                    <td>
                        <form action="">
                            <input type="text" value="Private Batting Training" class="mb-0 border-0" />
                        </form>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Price</th>
                    <td>
                        <input type="text" value="$50.00" class="mb-0 border-0" />
                    </td>
                </tr>
            </table>

            <div class="d-flex justify-content-end pt-4">
                <button type="submit" class="btn me-5">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div> -->
        <div class="edit-table">
            <div class="form-group d-flex">
            <input type="hidden" class="form-control mb-0" name="id" value="{{$service->id}}"/>
                <label for="">Name</label>
                <div class="edit-box"><input type="text" class="form-control mb-0" name="name" value="{{$service->name}}"/></div>
            </div>
            <div class="d-flex justify-content-end pt-5 mt-4">
            <a href="{{ route('service.index') }}" class="btn me-5 border">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        
    </div>
    </form>
</div>
@endsection
@section('script')
<script>
    $(document).ready (function () {  
        $("#service").validate ({
            rules: {
                name:{
                    required: true
                },
                price:{
                    required: true
                },
                image:{
                    required: true
                }

            },
            messages: {
                name:{
                    required: "Enter service name"
                },
                price:{
                    required: "Enter your Price"
                },
                image:{
                    required: "Please Upload image"
                }
            }
        });  
    });  
    </script>
@endsection