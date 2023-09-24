<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Support\Str;
use DB;
use Auth;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::latest()->get();
        return view('rental.index',compact('rentals'));
    }
    public function add()
    {
        return view('rental.add');
    }
    public function save(Request $request){
        
        $user = User::where('id',Auth::user()->id)->first();
        $club = DB::table('club')->where('user_id',Auth::user()->id)->first();
        $rental = new Rental();
        $rental->name = $request->name;
        $rental->user_id = $user->id;
        $rental->club_id = $club->id;
        $rental->price = $request->price;
        if ($request->hasFile('image')) {
            $dir = 'uploads/';
            $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
            $fileName = str_random() . '.' . $extension; // rename image
            $request->file('image')->move($dir, $fileName);
            $rental->image = $fileName;
        }
        $rental->save();
        return redirect()->route('rental.index');
    }
    public function edit($id)
    {
        $rental = Rental::where('id',$id)->first();
        return view('rental.edit',compact('rental'));
    }
    public function update(Request $request){
        
        $user = User::where('id',Auth::user()->id)->first();
        $club = DB::table('club')->where('user_id',Auth::user()->id)->first();
        $rental = Rental::where('id',$request->id)->first();
        $rental->name = $request->name;
        $rental->user_id = $user->id;
        $rental->club_id = $club->id;
        $rental->price = $request->price;
        if ($request->hasFile('image')) {
            $dir = 'uploads/';
            $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
            $fileName = str_random() . '.' . $extension; // rename image
            $request->file('image')->move($dir, $fileName);
            $rental->image = $fileName;
        }
        $rental->save();
        return redirect()->route('rental.index');
    }
    public function delete($id)
    {
        $service = Rental::where('id',$id)->first();
        $service->delete();
        return redirect()->route('rental.index');
    }
}
