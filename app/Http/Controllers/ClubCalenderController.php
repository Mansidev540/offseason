<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\ClubCalender;
use DB;
use Auth;

class ClubCalenderController extends Controller
{
    public function index()
    {
        return view('club_calender.index');
    }
    public function add($date,$time,$rental)
    {
        
        
        $old_date = explode('-', $date); 
        $newDate = $old_date[0].'/'.$old_date[1].'/'.$old_date[2];
        $time_select = $time;
        $rental_select = DB::table('rental')->where('id',$rental)->first();
        return view('club_calender.add',compact('newDate','time_select','rental_select'));
    }
    public function save(Request $request)
    {
        $calender = new ClubCalender();
        $club = DB::table('club')->where('user_id',Auth::user()->id)->first();

        $duration = 1;

        $booking_rate = 9;

        $athlete = DB::table('athlete')->where('id',$request->athlete_select)->first();
        $schedule8 = DB::table('schedule')->where('user_id',$athlete->user_id)->where('date',$request->date)->whereRaw('FIND_IN_SET(?, time)', [$request->time])->first();

        $trainer_rate = $schedule8->booking_rate;

        $rental = DB::table('rental')->where('id',$request->rental)->first();

        $total = $trainer_rate + $rental->price + $booking_rate;

        $calender->club_id = $club->id;
        $calender->user_id = $club->user_id; 
        $calender->date = $request->date;
        $calender->time = $request->time;
        $calender->member_id = $request->member_select;   
        $calender->roster_id = $request->athlete_select;
        $calender->service_id = $request->service;
        $calender->rental_id = $request->rental;
        $calender->duration = $duration;
        $calender->trainer_rate = $trainer_rate;
        $calender->booking_rate = $booking_rate;
        $calender->total = $total;
        $calender->save();
        return redirect()->route('clubcalender.index');
    }
    public function edit($id) 
     {
        $calender = DB::table('club_calender')->where('id',$id)->first();
        return view('club_calender.edit',compact('calender'));
    }
    public function update(Request $request)
    {
        $calender = ClubCalender::where('id',$request->calender_id)->first();
        $calender->schedule = 1;    
        $calender->save();
        return redirect()->route('clubcalender.index');
    }
    public function date(Request $request)
    {
        $date = $request->date;
        return view('club_calender.index',compact('date'));
    }
    public function cancle(Request $request)
    {
        $calender_trainer = DB::table('club_calender')->where('id',$request->club_calender_id)->delete();
        $trainer = DB::table('trainer_calender')->where('club_calender_id',$request->club_calender_id)->delete();
        // dd($calender_trainer);
        // $calender_trainer->delete();
        return redirect()->route('clubcalender.index');         
    }   



}
