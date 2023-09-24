<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\TrainerCalender;
use Auth;

class TrainerClubController extends Controller
{
    public function index()      
    {
        $date = '';
        return view('trainer_calender.index',compact('date'));
    }
    public function detail($id)
    {
        $calender = DB::table('club_calender')->where('id',$id)->first();
        return view('trainer_calender.detail',compact('calender'));
    }
    public function date(Request $request)
    {
        $date = $request->date;
        return view('trainer_calender.index',compact('date'));
    }
    public function save(Request $request)
    {
        $trainer = new TrainerCalender();
        $trainer->user_id = Auth::user()->id;
        $trainer->club_calender_id = $request->club_calender_id;
        $trainer->net = $request->net;
        $trainer->save();
        return redirect()->route('trainercalender.index');     
    }
    public function cancle(Request $request)
    {
        $calender_trainer = DB::table('trainer_calender')->where('club_calender_id',$request->club_calender_id)->delete();
        // dd($calender_trainer);
        // $calender_trainer->delete();
        return redirect()->route('trainercalender.index');
    }
    
}   
