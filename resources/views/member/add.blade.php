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
    border:0 !important;
}

</style>
            <div class="right-panel p-4">
                <div class="breadcrumb">
                    <div><a href="{{ route('member.index') }}" class="text-uppercase"><u>Member</u></a></div>
                    <div class="arrow mx-3"><i class="fa fa-angle-right"></i></div>
                    <div class="text-uppercase"><u>New Member</u></div>
                </div>
                <div class="pt-4">
                <div class="d-flex justify-content-between">
                        <div class="club-info d-flex">
                            <div class="club-img me-4">
                                <img src="" alt width="100">
                            </div>
                            <div class="club-dt">
                                <h2></h2>
                                <div class="mb-2"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Add the image upload tag below the existing image tag -->
                    <div>
                        <label class="uplaod mt-2">
                            ADD PICTURE<input type="file" class="uploadFile img border-0" value="Upload Photo">
                        </label>
                    </div>
                    <div class="tab-div pt-4">

                        <ul class="nav nav-tabs px-3">
                            <li><a data-toggle="tab" href="#info" class="active">Info</a></li>
                            <li><a data-toggle="tab" href="#schedule">Wallet</a></li>
                        </ul>

                        <div class="tab-content">

                            <div id="info" class="tab-pane active pt-4">
                            <form id="member" method="POST" action="{{ route('member.save') }}" enctype="multipart/form-data">
                                 @csrf
                                <div class="">
                                    <div class="row tab m-0">
                                        <div class="col-lg-6 p-0">
                                            <div class="col-12 p-0">
                                                <label>Name</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="text" n ame="name" class="form-control username"
                                                        id="yourUsername" placeholder="Avery Chatman" required>
                                                </div>
                                            </div>
                                            <div class="col-12 p-0">
                                                <label>PHONE NUMBER</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="text" name="phone_no" class="form-control username"
                                                        id="yourUsername" placeholder="(817) 507 - 8936" required>
                                                </div>
                                            </div>
                                            <div class="col-12 p-0">
                                                <label>ADDRESS</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="text" name="address" class="form-control username"
                                                        id="yourUsername" placeholder="4629 Lincolnshire dr" required>
                                                </div>
                                            </div>
                                            <div class="col-12 p-0">
                                                <label>City</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="text" name="city" class="form-control username"
                                                        id="yourUsername" placeholder="Grand Prairie" required>
                                                </div>
                                            </div>

                                            <div class="row m-0">
                                                <div class="col-6 p-0">
                                                    <label>STATE</label>
                                                    <div class="input-group has-validation">
                                                        <select class="form-select username"
                                                            aria-labesl="Default select example" name="state">
                                                            <option selected>State</option>
                                                            <option value="texas">texas</option>
                                                            <option value="texas">texas</option>
                                                            <option value="texas">texas</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label>ZIP CODE</label>
                                                    <div class="input-group has-validation">
                                                        <input type="number" name="zip_code"
                                                            class="form-control username" id="yourUsername"
                                                            placeholder="12345" required>
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
                            <form id="member-wallet" method="POST" action="{{ route('member.save_card_deatil') }}" enctype="multipart/form-data">
                                 @csrf
                                <div class="">
                                    <div class="row tab m-0">
                                        <div class="col-lg-6 p-0">
                                            <div class="col-12 p-0">
                                                <label>Name ON CARD</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="text" name="card_name" class="form-control username"
                                                        id="yourUsername" placeholder="Avery Chatman" required>
                                                </div>
                                            </div>
                                            <div class="col-12 p-0">
                                                <label>Card NUMBER</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="number" name="card_no" class="form-control username"
                                                        id="yourUsername" placeholder="1234 1234 1234 1234" required>
                                                </div>
                                            </div>
                                            <div class="col-12 p-0">
                                                <label>VALID THRU</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="date" name="valid_date" class="form-control username"
                                                        id="yourUsername" placeholder="MM/YY" required>
                                                </div>
                                            </div>
                                            <div class="col-12 p-0">
                                                <label>SEC CODE</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="number" name="sec_code" class="form-control username"
                                                        id="yourUsername" placeholder="123" required>
                                                </div>
                                            </div>
                                            <div class="col-12 p-0">
                                                <label>billing Zip Code</label>
                                                <div class="input-group has-validation mb-3">
                                                    <input type="number" name="billing_zip_code" class="form-control username"
                                                        id="yourUsername" placeholder="76063" required>
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