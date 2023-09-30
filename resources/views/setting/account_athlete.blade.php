@extends('layouts.app')



@section('content')

<div class="right-panel p-4">

    <div class="breadcrumb">

        <div><a href="{{ route('setting.index') }}" class="text-uppercase"><u>Settings</u></a></div>

        <div class="arrow mx-3"><i class="fa fa-angle-right"></i></div>

        <div class="text-uppercase"><u>Account</u></div>

    </div>
    <form id="profile" method="POST" action="{{ route('setting.athlete_update') }}" enctype="multipart/form-data">

    @csrf
    <div class="row">

        <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">

            <div class="profile-icon bd-color">

                <img class="rounded-circle" src="{{asset("uploads/$athlete->image")}}" alt="" width="250" height="250">

                

                    <div class="edit-prof text-uppercase mt-3 position-relative"><a href="javascript:void(0)">Edit Profile</a>

                        <input class="form-control p-0 mb-0" type="file" id="formFile" name="image">

                    </div>

                

            </div>

        </div>

        <?php ?>

        <div class="col-12 col-md-6 pe-lg-5 pe-md-2 pt-sm-5 pt-5 mt-sm-4 mt-md-0 pt-md-0 mt-4">

            <?php ?>

         

            <?php ?>



                <div class="form-group">

                    <input type="text" class="form-control" placeholder="Athlete Name" name="athlete_name" value="{{$athlete->athlete_name}}">

                </div>

                <div class="form-group">

                    <input type="text" class="form-control" placeholder="" name="school_name" value="{{$athlete->school_name}}">

                </div>

                <div class="form-group">

                    <input type="tel" class="form-control" placeholder="Primary Phone Number" name="phone_no" value="{{$athlete->phone_no}}">

                </div>

                <div class="form-group">

                    <input type="text" class="form-control" placeholder="Address" name="address" value="{{$athlete->address}}">

                </div>

                <div class="form-group">

                    <input type="text" class="form-control" placeholder="City" name="city" value="{{$athlete->city}}">

                </div>

                <div class="form-group position-relative">

                    <select class="form-control" id="state" name="state">

                        <option value="">State</option>

                        <option value="Delhi" <?php echo ($athlete->state == "Gujrat") ? 'selected' : ''; ?>>Gujrat</option>

                        <option value="Delhi" <?php echo ($athlete->state == "Delhi") ? 'selected' : ''; ?>>Delhi</option>

                        <option value="Mumbai" <?php echo ($athlete->state == "Mumbai") ? 'selected' : ''; ?>>Mumbai</option>

                        <option value="Rajasthan" <?php echo ($athlete->state == "Rajasthan") ? 'selected' : ''; ?>>Rajasthan</option>

                    </select>

                    <i class="fa fa-angle-down select-arrow"></i>

                </div>

                <div class="form-group">   

                    <input type="text" class="form-control" placeholder="Zip Code" name="zip_code" value="{{$athlete->zip_code}}">

                </div>



                <div class="form-group">

                    <input type="date" class="form-control" placeholder="Date of  Birth" name="dob" value="{{$athlete->dob}}">

                </div>



                <div class="form-group">

                    <input type="text" class="form-control" placeholder="Gender" name="gender" value="{{$athlete->gender}}">

                </div>

                <div class="btm-btn d-flex justify-content-between">

                <a href="{{ route('setting.index') }}" class="btn me-5 mt-3 border">Cancel</a>

                    <button class="btn btn-pr imary bg-color-blue mt-3"  type="submit">save</button>



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

                athlete_name:{

                    required: true

                },

                school_name:{

                    required: true

                },

                city:{

                    required: true

                },

                phone_no:{

                    required: true

                },

                address:{

                    required: true

                },

                zip_code:{

                    required: true

                },

                gender:{

                    required: true

                },

                dob:{

                    required: true

                },

                state:{

                    required: true

                }





            },

            messages: {

                athlete_name:{

                    required: "Enter your Athlete name"

                },

                address:{

                    required: "Enter your School Name"

                },

                city:{

                    required: "Enter your city"

                },

                phone_no:{

                    required: "Enter your phone no"

                },

                address:{

                    required: "Enter your address name"

                },

                zip_code:{

                    required: "Enter your zipcode",

                },

                gender:{

                    required: "Enter your Gender",

                },

                dob:{

                    required: "Enter your Date of birth",

                },

                state:{

                    required: "Enter your State",

                }

            }

        });  

    });  

    </script>

    @endsection