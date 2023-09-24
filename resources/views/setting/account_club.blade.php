@extends('layouts.app')



@section('content')

<div class="right-panel p-4">

    <div class="breadcrumb">

        <div><a href="{{ route('setting.index') }}" class="text-uppercase"><u>Settings</u></a></div>

        <div class="arrow mx-3"><i class="fa fa-angle-right"></i></div>

        <div class="text-uppercase"><u>Account</u></div>

    </div>

    
    <form id="profile" method="POST" action="{{ route('setting.club_update') }}" enctype="multipart/form-data">

        @csrf
        <div class="row">
        <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">

            <div class="profile-icon bd-color">

                <img src="{{asset("uploads/$club->image")}}" alt="" width="250" height="250">

                

                    <div class="edit-prof text-uppercase mt-3 position-relative"><a href="javascript:void(0)">Edit Profile</a>

                        <input class="form-control p-0 mb-0" type="file" id="formFile" name="image">

                    </div>

                

            </div>

        </div>
        <div class="col-12 col-md-6 pe-lg-5 pe-md-2 pt-sm-5 pt-5 mt-sm-4 mt-md-0 pt-md-0 mt-4">

            <?php ?>





                <div class="form-group">

                    <input type="text" class="form-control" placeholder="Club Name" name="club_name" value="{{$club->club_name}}">

                </div>

                <div class="form-group">

                    <input type="tel" class="form-control" placeholder="Phone Number" name="phone_no" value="{{$club->phone_no}}">

                </div>

                <div class="form-group">

                    <input type="text" class="form-control" placeholder="Address" name="address" value="{{$club->address}}">

                </div>

                <div class="form-group">

                    <input type="text" class="form-control" placeholder="City" name="city" value="{{$club->city}}">

                </div>

                <div class="form-group position-relative">

                <select class="form-control" id="state" name="state">

                    

                        <option value="">State</option>

                        <option value="Gujrat" <?php echo ($club->state == "Gujrat") ? 'selected' : ''; ?> ></option>Gujrat</option>

                        <option value="Delhi" <?php echo ($club->state == "Delhi") ? 'selected' : ''; ?>>Delhi</option>

                        <option value="Mumbai" <?php echo ($club->state == "Mumbai") ? 'selected' : ''; ?>>Mumbai</option>

                        <option value="Rajasthan" <?php echo ($club->state == "Rajasthan") ? 'selected' : ''; ?>>Rajasthan</option>

                    </select>

                    <i class="fa fa-angle-down select-arrow"></i>

                </div>

                <div class="form-group">

                    <input type="text" class="form-control" placeholder="Zip Code" name="zip_code" value="{{$club->zip_code}}">

                </div>



                <div class="btm-btn d-flex justify-content-between">

                <a href="{{ route('setting.index') }}" class="btn me-5 mt-3 border">Cancel</a>

                    <button class="btn btn-primary bg-color-blue mt-3" type="submit">save</button>



                </div>




          

        </div>
    </div>
    </form>
    

</div>

@endsection

@section('script')

<script>

    $(document).ready (function () {  

        $("#profile").validate ({

            rules: {

                club_name:{

                    required: true

                },

                address:{

                    required: true

                },

                city:{

                    required: true

                },

                phone_no:{

                    required: true

                },

                state:{

                    required: true

                },

                zip_code:{

                    required: true

                }



            },

            messages: {

                club_name:{

                    required: "Enter your club name"

                },

                address:{

                    required: "Enter your address"

                },

                city:{

                    required: "Enter your city"

                },

                phone_no:{

                    required: "Enter your phone no"

                },

                state:{

                    required: "Enter your state name"

                },

                zip_code:{

                    required: "Enter your zipcode",

                }

            }

        });  

    });  

    </script>

    @endsection

