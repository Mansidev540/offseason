<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Athlete;
use DB;
use Auth;

class AccountController extends Controller
{
    public function club_index()
    {
        $club = db::table('club')->where('user_id',Auth::user()->id)->first();
        return view('setting.account_club',compact('club'));
    }
    public function athlete_index()
    {
        $athlete = db::table('athlete')->where('user_id',Auth::user()->id)->first();
        return view('setting.account_athlete',compact('athlete'));
    }
    public function AthleteUpdate(Request $request)
    {
        $athlete = Athlete::where('user_id',Auth::user()->id)->first();
        $athlete->athlete_name = $request->athlete_name;
        $athlete->school_name = $request->school_name;
        $athlete->phone_no = $request->phone_no;
        $athlete->address = $request->address;
        $athlete->city = $request->city;
        $athlete->state = $request->state;
        $athlete->gender = $request->gender;
        $athlete->dob = $request->dob;
        $athlete->zip_code = $request->zip_code;
        if ($request->hasFile('image')) {
            $dir = 'uploads/';
            $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
            $fileName = str_random() . '.' . $extension; // rename image
            $request->file('image')->move($dir, $fileName);
            $athlete->image = $fileName;
        }
        $athlete->save();
        return redirect()->route('setting.index');
        
    }
    public function ClubUpdate(Request $request)
    {
        $club = Club::where('user_id',Auth::user()->id)->first();
        $club->club_name = $request->club_name; 
        $club->phone_no = $request->phone_no;
        $club->address = $request->address;
        $club->city = $request->city; 
        $club->state = $request->state;
        $club->zip_code = $request->zip_code;
        if ($request->hasFile('image')) {
            $dir = 'uploads/';
            $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
            $fileName = str_random() . '.' . $extension; // rename image
            $request->file('image')->move($dir, $fileName); 
            $club->image = $fileName;
        }
        $club->save();
        return redirect()->route('setting.index');
    }

} 
