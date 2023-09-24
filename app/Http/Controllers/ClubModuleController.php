<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Schedule;
use App\Models\User;
use DB;
use Auth;

class ClubModuleController extends Controller
{
    public function index()
    {
        $club = Club::all();
        return view('club.index',compact('club'));
    }
    public function detail($id)
    { 
        $club = Club::where('id',$id)->first();
        $opration = DB::table('opration')->where('club_id',$club->id)->first();
        $schedule_exits = Schedule::where('club_id',$club->id)->where('user_id',Auth::user()->id)->first();
        return view('club.detail',compact('club','opration','schedule_exits')); 
    }
    public function save(Request $request){
        // dd($request->all());
        $schedule_exits = Schedule::where('date',$request->date1)->where('club_id',$request->club_id)->where('user_id',Auth::user()->id)->first();
        if(is_null($schedule_exits)){
            $user = User::where('id',Auth::user()->id)->first();
            $schedule = new Schedule();
            $schedule->club_id = $request->club_id;
            $schedule->user_id = $user->id;
            $schedule->date = $request->date1;
            $schedule->time = $request->time;
            $schedule->available = $request->available;
            $schedule->booking_rate = $request->booking_rate;
            $schedule->save();
        }else{
            $schedule_exits->date = $request->date1;
            $schedule_exits->time = $request->time;
            $schedule_exits->available = $request->available;
            $schedule_exits->booking_rate = $request->booking_rate;
            $schedule_exits->save();
        }
        return redirect()->back();
    }
    public function date(Request $request)
    {
        $date = $request->date;
         
        return redirect()->back()->with('date',$date);     
    }

}   
