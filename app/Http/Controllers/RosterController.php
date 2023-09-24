<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Athlete;
use DB;
use Illuminate\Support\Facades\Mail;

class RosterController extends Controller
{
    public function index()
    {
        $roster = Athlete::all(); 
        return view('roster.index',compact('roster'));
    }
    public function detail($id)
    { 
        $club = Athlete::where('id',$id)->first();
        return view('roster.detail',compact('club'));
    }
    public function date(Request $request)
    {
        $date = $request->date;
         
        return redirect()->back()->with('date_roster',$date);
    }
    public function mail(Request $request)
    {
        $data = array('mail' => $request->mail);
        Mail::send('roster.invite', ['data' => $data], function ($message) use ($data) {
        $message->subject('Invitation Mail');
        $message->from('mansi.dev540@gmail.com', 'Mansi Govani');
        $message->to($data['mail'],'name');
        });
    }
}
