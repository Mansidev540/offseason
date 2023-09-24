@extends('layouts.app')

@section('content')
<div class="right-panel p-4">
    <div class="breadcrumb">
        <div><a href="{{ route('setting.index') }}" class="text-uppercase"><u>Settings</u></a></div>
        <div class="arrow mx-3"><i class="fa fa-angle-right"></i></div>
        <div class="text-uppercase"><u>Opration</u></div>
    </div>
    <div class="pt-4">
        <form method="post" action="{{ route('setting.opration_save') }}" class="operation-form">
            @csrf
            <div class="form-group d-flex align-items-center pb-4">
                <label for="" class="me-5">Club fee (%)</label>
                <?php
                if(is_null($opration)){
                    $club_fee = '';
                    $rate = '';
                    $monday_status ='';
                    $tuesday_status ='';
                    $wednesday_status ='';
                    $thursday_status ='';
                    $friday_status ='';
                    $saturday_status ='';
                    $sunday_status ='';
                }else{
                    $club_fee = $opration->club_fee;
                    $rate = $opration->rate;
                    $monday_status = $opration->monday_status;
                    $tuesday_status =$opration->tuesday_status;
                    $wednesday_status =$opration->wednesday_status;
                    $thursday_status =$opration->thursday_status;                 
                    $friday_status =$opration->friday_status;
                    $saturday_status =$opration->saturday_status;
                    $sunday_status =$opration->sunday_status; 
                }                               
                ?>
                <input type="text" class="form-control mb-0" size="1" name="club_fee" value="{{$club_fee}}" />
            </div>
            <div class="form-group d-flex align-items-center pb-4">
                <label for="" class="me-5">minimum rate ($)</label>
                <input type="text" class="form-control mb-0" size="8" name="rate" value="{{$rate}}" />
            </div>
            <div class="form-group d-flex align-items-center pb-4">
                <label for="" class="me-5">Monday:</label>
                <div class="form-group position-relative me-4 select-div">
                    <select class="mb-0" name="monday_status" id="monday_status">
                        <?php 
                                
                                $monday_close = "";
                                $monday_open = "";
                                $monday_display = "";
                            if($monday_status == "open"){      
                                $monday_open = "selected";
                            }elseif($monday_status == "closed"){
                                $monday_close = "selected";
                                $monday_display = "display: none;";
                            }else{
                                $monday_close = "";
                                $monday_open = "";
                            }
                        ?>
                        <option value="open" {{$monday_open}}>Open</option>  
                        <option value="closed" {{$monday_close}}>Closed</option>
                        
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
                
                <div class="form-group position-relative me-4 select-div monday" id="monday" style="{{$monday_display}}">
                    <select class="form-control mb-0" id="monday_open_time" name="monday_open_time">
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>    
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="11:00 PM">11:00 PM</option>    
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 AM">1:00 AM</option>
                        <option value="2:00 AM">2:00 AM</option>
                        <option value="3:00 AM">3:00 AM</option>
                        <option value="4:00 AM">4:00 AM</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
                <div class="mid-line me-4 monday" id="monday" style="{{$monday_display}}"></div>
                <div class="form-group position-relative me-4 select-div monday" id="monday" style="{{$monday_display}}">
                <select class="form-control mb-0" id="monday_close_time" name="monday_close_time">
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>    
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="11:00 PM">11:00 PM</option>    
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 AM">1:00 AM</option>
                        <option value="2:00 AM">2:00 AM</option>
                        <option value="3:00 AM">3:00 AM</option>
                        <option value="4:00 AM">4:00 AM</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
                
            </div>
            <div class="form-group d-flex align-items-center pb-4">
                <label for="" class="me-5">Tuesday:</label>
                <div class="form-group position-relative me-4 select-div">
                    <select class="mb-0" name="tuesday_status" id="tuesday_status">
                        <option value="open">Open</option>
                        <option value="closed">Closed</option>
                        
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
                <div class="form-group position-relative me-4 select-div tuesday">
                    <select class="form-control mb-0" id="tuesday_open_time" name="tuesday_open_time">
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>    
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="11:00 PM">11:00 PM</option>    
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 AM">1:00 AM</option>
                        <option value="2:00 AM">2:00 AM</option>
                        <option value="3:00 AM">3:00 AM</option>
                        <option value="4:00 AM">4:00 AM</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
                <div class="mid-line me-4 tuesday"></div>
                <div class="form-group position-relative me-4 select-div tuesday">
                <select class="form-control mb-0" id="tuesday_close_time" name="tuesday_close_time"> 
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>    
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="11:00 PM">11:00 PM</option>    
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 AM">1:00 AM</option>
                        <option value="2:00 AM">2:00 AM</option>
                        <option value="3:00 AM">3:00 AM</option>
                        <option value="4:00 AM">4:00 AM</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
            </div>
            <div class="form-group d-flex align-items-center pb-4">
                <label for="" class="me-5">wednesday:</label>
                <div class="form-group position-relative me-4 select-div">
                    <select class="mb-0" name="wednesday_status" id="wednesday_status">
                        <option value="open">Open</option>
                        <option value="closed">Closed</option>
                        
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
                <div class="form-group position-relative me-4 select-div wednesday">
                    <select class="form-control mb-0" id="wednesday_open_time" name="wednesday_open_time">
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>    
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="11:00 PM">11:00 PM</option>    
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 AM">1:00 AM</option>
                        <option value="2:00 AM">2:00 AM</option>
                        <option value="3:00 AM">3:00 AM</option>
                        <option value="4:00 AM">4:00 AM</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
                <div class="mid-line me-4 wednesday"></div>
                <div class="form-group position-relative me-4 select-div wednesday">
                <select class="form-control mb-0" id="wednesday_close_time" name="wednesday_close_time">
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>    
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="11:00 PM">11:00 PM</option>    
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 AM">1:00 AM</option>
                        <option value="2:00 AM">2:00 AM</option>
                        <option value="3:00 AM">3:00 AM</option>
                        <option value="4:00 AM">4:00 AM</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
            </div>
            <div class="form-group d-flex align-items-center pb-4">
                <label for="" class="me-5">thursday:</label>
                <div class="form-group position-relative me-4 select-div">
                    <select class="mb-0" name="thursday_status" id="thursday_status">
                        <option value="open">Open</option>
                        <option value="closed">Closed</option>
                        
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
                <div class="form-group position-relative me-4 select-div thursday">
                    <select class="form-control mb-0" id="thursday_open_time" name="thursday_open_time">
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>    
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="11:00 PM">11:00 PM</option>    
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 AM">1:00 AM</option>
                        <option value="2:00 AM">2:00 AM</option>
                        <option value="3:00 AM">3:00 AM</option>
                        <option value="4:00 AM">4:00 AM</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
                <div class="mid-line me-4 thursday"></div>
                <div class="form-group position-relative me-4 select-div thursday">
                <select class="form-control mb-0" id="thursday_close_time" name="thursday_close_time">
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>    
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="11:00 PM">11:00 PM</option>    
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 AM">1:00 AM</option>
                        <option value="2:00 AM">2:00 AM</option>
                        <option value="3:00 AM">3:00 AM</option>
                        <option value="4:00 AM">4:00 AM</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
            </div>
            <div class="form-group d-flex align-items-center pb-4">
                <label for="" class="me-5">friday:</label>
                <div class="form-group position-relative me-4 select-div">
                    <select class="mb-0" name="friday_status" id="friday_status">
                        <option value="open">Open</option>
                        <option value="closed">Closed</option>
                        
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
                <div class="form-group position-relative me-4 select-div friday">
                    <select class="form-control mb-0" id="friday_open_time" name="friday_open_time">
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>    
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="11:00 PM">11:00 PM</option>    
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 AM">1:00 AM</option>
                        <option value="2:00 AM">2:00 AM</option>
                        <option value="3:00 AM">3:00 AM</option>
                        <option value="4:00 AM">4:00 AM</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
                <div class="mid-line me-4 friday"></div>
                <div class="form-group position-relative me-4 select-div friday">
                <select class="form-control mb-0" id="friday_close_time" name="friday_close_time">
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>    
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="11:00 PM">11:00 PM</option>    
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 AM">1:00 AM</option>
                        <option value="2:00 AM">2:00 AM</option>
                        <option value="3:00 AM">3:00 AM</option>
                        <option value="4:00 AM">4:00 AM</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
            </div>
            <div class="form-group d-flex align-items-center pb-4">
                <label for="" class="me-5">saturday:</label>
                <div class="form-group position-relative me-4 select-div">
                    <select class="mb-0" name="saturday_status" id="saturday_status">
                        <option value="open">Open</option>
                        <option value="closed">Closed</option>
                        
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
                <div class="form-group position-relative me-4 select-div saturday">
                    <select class="form-control mb-0" id="saturday_open_time" name="saturday_open_time">
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>    
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="11:00 PM">11:00 PM</option>    
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 AM">1:00 AM</option>
                        <option value="2:00 AM">2:00 AM</option>
                        <option value="3:00 AM">3:00 AM</option>
                        <option value="4:00 AM">4:00 AM</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                    </select>
                    <i class="fa fa-angle-down select-arrow saturday"></i>
                </div>
                <div class="mid-line me-4 saturday"></div>
                <div class="form-group position-relative me-4 select-div saturday">
                <select class="form-control mb-0" id="saturday_close_time" name="saturday_close_time">
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>    
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="11:00 PM">11:00 PM</option>    
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 AM">1:00 AM</option>
                        <option value="2:00 AM">2:00 AM</option>
                        <option value="3:00 AM">3:00 AM</option>
                        <option value="4:00 AM">4:00 AM</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
            </div>
            <div class="form-group d-flex align-items-center pb-4">
                <label for="" class="me-5">sunday:</label>
                <div class="form-group position-relative me-4 select-div">
                    <select class="form-control mb- 0" id="sunday_status" name="sunday_status">
                    <option value="open">Open</option>
                        <option value="closed">Closed</option>
                        
                        
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
                <div class="form-group position-relative me-4 select-div sunday">
                    <select class="form-control mb-0" id="sunday_open_time" name="sunday_open_time">
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>    
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="11:00 PM">11:00 PM</option>    
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 AM">1:00 AM</option>
                        <option value="2:00 AM">2:00 AM</option>
                        <option value="3:00 AM">3:00 AM</option>
                        <option value="4:00 AM">4:00 AM</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                    </select>
                    <i class="fa fa-angle-down select-arrow sunday"></i>
                </div>
                <div class="mid-line me-4 sunday"></div>
                <div class="form-group position-relative me-4 select-div sunday">
                <select class="form-control mb-0" id="sunday_close_time" name="sunday_close_time">
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>    
                        <option value="12:00 AM">12:00 AM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                        <option value="7:00 PM">7:00 PM</option>
                        <option value="8:00 PM">8:00 PM</option>
                        <option value="9:00 PM">9:00 PM</option>
                        <option value="10:00 PM">10:00 PM</option>
                        <option value="11:00 PM">11:00 PM</option>    
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 AM">1:00 AM</option>
                        <option value="2:00 AM">2:00 AM</option>
                        <option value="3:00 AM">3:00 AM</option>
                        <option value="4:00 AM">4:00 AM</option>
                        <option value="5:00 AM">5:00 AM</option>
                        <option value="6:00 AM">6:00 AM</option>
                        <option value="7:00 AM">7:00 AM</option>
                    </select>
                    <i class="fa fa-angle-down select-arrow"></i>
                </div>
            </div>
            <div class="d-flex justify-content-end pt-4">
            <a href="{{ route('setting.index') }}" class="btn me-5 border">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>    
            </div>

        </form>

    </div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function(){
    $('#monday_status').on('change', function() {
      if ( this.value == 'open')
      //.....................^.......
      {
        $(".monday").show();
      }
      else
      {
        $(".monday").hide();
      }
    });
    $('#tuesday_status').on('change', function() {
      if ( this.value == 'open')
      //.....................^.......
      {
        $(".tuesday").show();
      }
      else
      {
        $(".tuesday").hide();
      }
    });
    $('#wednesday_status').on('change', function() {
      if ( this.value == 'open')
      //.....................^.......
      {
        $(".wednesday").show();
      }
      else
      {
        $(".wednesday").hide();
      }
    });
    $('#thursday_status').on('change', function() {
      if ( this.value == 'open')
      //.....................^.......
      {
        $(".thursday").show();
      }
      else
      {
        $(".thursday").hide();
      }
    });
    $('#friday_status').on('change', function() {
      if ( this.value == 'open')
      //.....................^.......
      {
        $(".friday").show();
      }
      else
      {
        $(".friday").hide();
      }
    });
    $('#saturday_status').on('change', function() {
      if ( this.value == 'open')
      //.....................^.......
      {
        $(".saturday").show();
      }
      else
      {
        $(".saturday").hide();
      }
    });
    $('#sunday_status').on('change', function() {
      if ( this.value == 'open')
      //.....................^.......
      {
        $(".sunday").show();
      }
      else
      {
        $(".sunday").hide();
      }
    });
});
</script>
@endsection