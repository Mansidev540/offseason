<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\opration;
use App\Models\User;
use Illuminate\Support\Str;
use DB;
use Auth;

class OprationController extends Controller
{
    public function index()
    { 
        $club = DB::table('club')->where('user_id',Auth::user()->id)->first();
        $opration = DB::table('opration')->where('club_id',$club->id)->first();
        
        return view('setting.opration',compact('club','opration'));
    }
    public function OprationSave(Request $request)
    {
        //dd($request->all());
        $club = DB::table('club')->where('user_id',Auth::user()->id)->first();
        $opration = new opration();
        $opration->club_id = $club->id;
        $opration->club_fee = $request->club_fee;
        $opration->rate = $request->rate;
        $opration->monday_status = $request->monday_status;
        $opration->monday_open_time = $request->monday_open_time;
        $opration->monday_close_time = $request->monday_close_time;
        $opration->tuesday_status = $request->tuesday_status;
        $opration->tuesday_open_time = $request->tuesday_open_time;
        $opration->tuesday_close_time = $request->tuesday_close_time;
        $opration->wednesday_status = $request->wednesday_status;
        $opration->wednesday_open_time = $request->wednesday_open_time;
        $opration->wednesday_close_time = $request->wednesday_close_time;
        $opration->thursday_status = $request->thursday_status;
        $opration->thursday_open_time = $request->thursday_open_time;
        $opration->thursday_close_time = $request->thursday_close_time;
        $opration->friday_status = $request->friday_status;
        $opration->friday_open_time = $request->friday_open_time;
        $opration->friday_close_time = $request->friday_close_time;
        $opration->saturday_status = $request->saturday_status;
        $opration->saturday_open_time = $request->saturday_open_time;
        $opration->saturday_close_time = $request->saturday_close_time;
        $opration->sunday_status = $request->sunday_status;
        $opration->save();
        return redirect()->back();
    }
}
