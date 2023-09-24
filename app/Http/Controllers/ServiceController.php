<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Service;
use App\Models\User;
use DB;
use Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::latest()->get();
        return view('service.index',compact('service'));
    }
    public function add()
    {
        return view('service.add');
    }
    public function save(Request $request){
        $user = User::where('id',Auth::user()->id)->first();
        $club = DB::table('club')->where('user_id',Auth::user()->id)->first();
        $service = new Service();
        $service->name = $request->name; 
        $service->user_id = $user->id;
        $service->club_id = $club->id;
        $service->save();
        return redirect()->route('service.index');
    }
    public function edit($id)
    {
        $service = Service::where('id',$id)->first();
        return view('service.edit',compact('service'));
    }
    public function update(Request $request){
        
        $user = User::where('id',Auth::user()->id)->first();
        $club = DB::table('club')->where('user_id',Auth::user()->id)->first();
        $service = Service::where('id',$request->id)->first();
        $service->name = $request->name;
        $service->user_id = $user->id;
        $service->club_id = $club->id;
        $service->save();
        return redirect()->route('service.index');
    }
    public function delete($id)
    {
        $service = Service::where('id',$id)->first();
        $service->delete();
        return redirect()->route('service.index');
    }
}
