@extends('layouts.app')

@section('content')
<div class="right-panel p-4">
    <div class="breadcrumb">
        <div><a href="{{ route('setting.index') }}" class="text-uppercase"><u>Settings</u></a></div>
        <div class="arrow mx-3"><i class="fa fa-angle-right"></i></div>
        <div class="text-uppercase"><u>PASSWORD & Security</u></div>
    </div>
    <div class="edit-info pt-4">
    @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
        <!-- <form action=""> -->
            <div class="pb-5">
            @if(Auth::user()->role == "athelet" )
                <label for="">Athlete</label>
            @else
            <label for="">Club Ownar</label>
            @endif
                <div class="row pt-2">
                    <div class="col-12 col-md-6">
                        {{ Auth::user()->name }} {{Auth::user()->l_name }}
                    </div>
                    <div class="col-12 col-md-6">
                    @if(Auth::user()->role == "athelet" )
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#change-athlete">Change Athlete</a>
                    @else
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#change-athlete">Change Club Ownar</a>
                    @endif
                        
                    </div>
                </div>
                <div class="modal fade" id="change-athlete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content ">
                            <div class="px-3 text-center">
                            @if(Auth::user()->role == "athelet" )
                            <h5 class="modal-title" id="exampleModalLabel">Change Athlete</h5>
                            @else
                            <h5 class="modal-title" id="exampleModalLabel">Change Club Ownar</h5>
                            @endif
                                
                                <button type="button" class="close border-0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form id="profile" method="POST" action="{{ route('setting.account_name') }}">
                            @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="pb-2">New Name</label>
                                            <div class="col-12 col-sm-6">
                                                <input type="text" class="form-control" placeholder="First" name="name" value="{{ $user->name }} ">
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <input type="text" class="form-control" placeholder="Last" name="l_name" value="{{ $user->l_name }} ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="pb-2">Password</label>
                                        <input type="password" class="form-control" placeholder="" name="password">
                                    </div>
                                    <div class="d-flex justify-content-end pt-4">
                                        <button type="submit" class="btn btn-primary" >Save</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5">
                <label for="">Phone Number</label>
                <div class="row pt-2">
                    <div class="col-12 col-md-6">
                    {{Auth::user()->phone_no }}
                    </div>
                    <div class="col-12 col-md-6">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#change-phone-number">Change Phone Number</a>
                    </div>
                </div>
                <div class="modal fade" id="change-phone-number" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content ">
                            <div class="px-3 text-center">
                                <h5 class="modal-title" id="exampleModalLabel">Change Phone Number</h5>
                                <button type="button" class="close border-0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form id="profile" method="POST" action="{{ route('setting.account_phoneno') }}">
                            @csrf
                                    <div class="form-group">
                                        <label for="" class="pb-2">New Number</label>
                                        <input type="tel" class="form-control" value="{{$user->phone_no}}" name="phone_no">
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="pb-2">Password</label>
                                        <input type="password" class="form-control" placeholder="" name="password">
                                    </div>
                                    <div class="d-flex justify-content-end pt-4">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5">
                <label for="">Email</label>
                <div class="row pt-2">
                    <div class="col-12 col-md-6">
                    {{Auth::user()->email }}
                    </div>
                    <div class="col-12 col-md-6">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#change-email">Change Email</a>
                    </div>
                </div>
                <div class="modal fade" id="change-email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content ">
                            <div class="px-3 text-center">
                                <h5 class="modal-title" id="exampleModalLabel">Change Email</h5>
                                <button type="button" class="close border-0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form id="profile" method="POST" action="{{ route('setting.account_email') }}">
                            @csrf
                                    <div class="form-group">
                                        <label for="" class="pb-2">New Email</label>
                                        <input type="email" class="form-control" value="{{$user->email}}" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="pb-2">Password</label>
                                        <input type="password" class="form-control" placeholder="" name="password">
                                    </div>
                                    <div class="d-flex justify-content-end pt-4">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5">
                <label for="">Password</label>
                <div class="row pt-2">
                    <div class="col-12 col-md-6">
                        *************
                    </div>
                    <div class="col-12 col-md-6">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#change-password">Change Password</a>
                    </div>
                </div>
                <div class="modal fade" id="change-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content ">
                            <div class="px-3 text-center">
                                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                <button type="button" class="close border-0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form id="profile" method="POST" action="{{ route('setting.account_password') }}">
                            @csrf
                                    <div class="form-group">
                                        <label for="" class="pb-2">Type Current Password</label>
                                        <input type="password" class="form-control" placeholder="CAB123456789" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="pb-2">New Password</label>
                                        <input type="password" class="form-control" placeholder="" name="new_password">
                                    </div>
                                    <div class="d-flex justify-content-end pt-4">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <!-- </form> -->

    </div>
</div>
@endsection