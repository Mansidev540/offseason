@extends('layouts.app')

@section('content')
<style>
    .uplaod {
    color: #00C4FF;
    font-weight: 700;
cursor: pointer;
}

.uploadFile {
    width: 0px;
    height: 0px;
    overflow: hidden;
    cursor: pointer;
}

</style>
            <div class="right-panel p-4">
                <div class="breadcrumb">
                    <div><a href="{{ route('member.index') }}" class="text-uppercase"><u>Member</u></a></div>
                    <div class="arrow mx-3"><i class="fa fa-angle-right"></i></div>
                    <div class="text-uppercase"><u>{{$member->name}}</u></div>
                </div>
                <form id="member" method="POST" action="{{ route('member.update')}}" enctype="multipart/form-data"> 
                            @csrf
                <div class="pt-4">
                <div class="d-flex justify-content-between">
                        <div class="club-info d-flex">
                            <div class="club-img me-4">
                                <img src="{{asset("uploads/$member->image")}}" alt width="100">
                            </div>
                            <div class="club-dt">
                                <h2 class="text-uppercase">{{$member->name}}</h2>
                                <div class="mb-2">Total Booking:0</div>
                            </div>
                        </div>
                    </div>

                    <!-- Add the image upload tag below the existing image tag -->
                    <div>
                        <label class="uplaod mt-2">
                            Edit PICTURE<input type="file" class="uploadFile img border-0" value="Upload Photo" name="image">
                        </label>
                    </div>
                    <div class="tab-div pt-4">

                        <ul class="nav nav-tabs px-3">
                            <li><a data-toggle="tab" href="#info" class="active">Info</a></li>
                            <li><a data-toggle="tab" href="#schedule">Wallet</a></li>
                        </ul>

                        <div class="tab-content">

                            <div id="info" class="tab-pane active pt-4">

                                <div class="">
                                    <div class="row tab m-0">
                                        <div class="col-lg-6 p-0">
                                            <div class="col-12 p-0">
                                                <label>Name</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="text" name="name" class="form-control username"
                                                        id="yourUsername" placeholder="Avery Chatman" required value="{{$member->name}}">
                                                        <input type="hidden" name="id" class="form-control username"
                                                        id="yourUsername" placeholder="Avery Chatman" value="{{$member->id}}">
                                                </div>
                                                
                                            </div>
                                            <div class="col-12 p-0">
                                                <label>PHONE NUMBER</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="text" name="phone_no" class="form-control username"
                                                        id="yourUsername" placeholder="(817) 507 - 8936" required value="{{$member->phone_no}}">
                                                </div>
                                            </div>
                                            <div class="col-12 p-0">
                                                <label>ADDRESS</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="text" name="address" class="form-control username"
                                                        id="yourUsername" placeholder="4629 Lincolnshire dr" required value="{{$member->address}}">
                                                </div>
                                            </div>
                                            <div class="col-12 p-0">
                                                <label>City</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="text" name="city" class="form-control username"
                                                        id="yourUsername" placeholder="Grand Prairie" required value="{{$member->city}}">
                                                </div>
                                            </div>

                                            <div class="row m-0">
                                                <div class="col-6 p-0">
                                                    <label>STATE</label>
                                                    <div class="input-group has-validation">
                                                        <!--  -->
                                                        <select class="form-select username"
                                                            aria-label="Default select example" name="state">
                                                        <option value="">State</option>

                                                        <option value="texas" <?php echo ($member->state == "texas") ? 'selected' : ''; ?>>texas</option>

                                                        <option value="Gujrat" <?php echo ($member->state == "Gujrat") ? 'selected' : ''; ?> ></option>Gujrat</option>

                                                        <option value="Delhi" <?php echo ($member->state == "Delhi") ? 'selected' : ''; ?>>Delhi</option>

                                                        <option value="Mumbai" <?php echo ($member->state == "Mumbai") ? 'selected' : ''; ?>>Mumbai</option>

                                                        <option value="Rajasthan" <?php echo ($member->state == "Rajasthan") ? 'selected' : ''; ?>>Rajasthan</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label>ZIP CODE</label>
                                                    <div class="input-group has-validation">
                                                        <input type="number" name="zip_code"
                                                            class="form-control username" id="yourUsername"
                                                            placeholder="12345" required value="{{$member->zip_code}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end">
                                                <button class="save1_button">Save</button>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-12">
                                                <div
                                                    class="d-flex justify-content-end">
                                                    <button class="save1_button">Save</button>
                                                </div>
                                            </div> -->
                                    </div>
                                </div>
                                </form>
                            </div>
                        

                            <div id="schedule" class="tab-pane fade pt-4">
                            <form id="member-wallet" method="POST" action="{{ route('member.update_card_deatil')}}" enctype="multipart/form-data"> 
                            @csrf
                                <div class="">
                                    <div class="row tab m-0">
                                        <div class="col-lg-6 p-0">
                                        <div class="col-12 p-0">
                                                <label>Name ON CARD</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="text" name="card_name" class="form-control username"
                                                        id="yourUsername" placeholder="Avery Chatman" required value="{{$member->card_name}}">
                                                        <input type="hidden" name="id" class="form-control username"
                                                        id="yourUsername" placeholder="Avery Chatman" value="{{$member->id}}">
                                                </div>
                                            </div>
                                            <div class="col-12 p-0">
                                                <label>Card NUMBER</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="number" name="card_no" class="form-control username"
                                                        id="yourUsername" placeholder="1234 1234 1234 1234" required value="{{$member->card_no}}">
                                                </div>
                                            </div>
                                            <div class="col-12 p-0">
                                                <label>VALID THRU</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="date" name="valid_date" class="form-control username"
                                                        id="yourUsername" placeholder="MM/YY" required value="{{$member->valid_date}}">
                                                </div>
                                                <?php ?>
                                            </div>
                                            <div class="col-12 p-0">
                                                <label>SEC CODE</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="number" name="sec_code" class="form-control username"
                                                        id="yourUsername" placeholder="123" required value="{{$member->sec_code}}">
                                                </div>
                                            </div>
                                            <div class="col-12 p-0">
                                                <label>billing Zip Code</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="number" name="billing_zip_code" class="form-control username"
                                                        id="yourUsername" placeholder="76063" required value="{{$member->billing_zip_code}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end">
                                                <button class="save1_button">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
  
@endsection
@section('script')
<script>
    $(document).ready (function () {  
        $("#rental").validate ({
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
                    required: "Enter your Rental name"
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