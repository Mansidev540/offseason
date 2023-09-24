<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use DB;

class ClubController extends Controller
{
    public function index()
    {
        return view('auth.club_profile');
    }
    public function save(Request $request){
        $user = DB::table('users')->latest()->first();
        $club = new Club();
        $club->club_name = $request->club_name;
        $club->user_id = $user->id;
        $club->phone_no = $request->phone_no;
        $club->address = $request->address;
        $club->city = $request->city;
        $club->state = $request->state;
        $club->zip_code = $request->zip_code;
        $club->save();
        return redirect()->route('setting.index');
    }
}
