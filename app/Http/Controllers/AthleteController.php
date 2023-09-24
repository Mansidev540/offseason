<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Athlete;
use DB;

class AthleteController extends Controller
{
    public function index()
    {
        return view('auth.athlete_profile');
    }
    public function save(Request $request){
        $user = DB::table('users')->latest()->first();
        $athlete = new Athlete();
        $athlete->athlete_name = $request->athlete_name;
        $athlete->school_name = $request->school_name;
        $athlete->user_id = $user->id;
        $athlete->phone_no = $request->phone_no;
        $athlete->address = $request->address;
        $athlete->city = $request->city;
        $athlete->state = $request->state;
        $athlete->gender = $request->gender;
        $athlete->dob = $request->dob;
        $athlete->zip_code = $request->zip_code;
        $athlete->save();
        return redirect()->route('setting.index');
    }
}
