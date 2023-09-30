<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberWallet;
use App\Models\User;
use Illuminate\Support\Str;
use DB;
use Auth;

class MemberController extends Controller
{
    public function index()
    {
        $member = Member::all();
        return view('member.index',compact('member'));
    }
    public function add()
    { 
        return view('member.add');
    }
    public function save(Request $request){
        $user = User::where('id',Auth::user()->id)->first();
        $member = new Member();        
        $member->name = $request->name;                                                                
        $member->user_id = $user->id;
        $member->phone_no = $request->phone_no;
        $member->address = $request->address;
        $member->city = $request->city;                                                                               
        $member->state = $request->state;     
        $member->zip_code = $request->zip_code;
        if ($request->hasFile('image')) {
            $dir = 'uploads/';
            $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
            $fileName = str_random() . '.' . $extension; // rename image
            $request->file('image')->move($dir, $fileName);
            $member->image = $fileName;
        }
        $member->save();
        return redirect()->route('member.index');  
    }
    public function save_card_deatil(Request $request){
        
        $user = User::where('id',Auth::user()->id)->first();
        $member = new Member();
        $member->card_name = $request->card_name;
        $member->card_no = $request->card_no;
        $member->user_id = $user->id;                                    
        $member->valid_date = $request->valid_date;
        $member->sec_code = $request->sec_code;
        $member->billing_zip_code = $request->billing_zip_code;
        $member->save();
        return redirect()->route('member.index');
    }
    public function edit($id)
    { 
        $member = Member::where('id',$id)->first();
        return view('member.edit',compact('member'));
    }
    public function update(Request $request){
        
        $user = User::where('id',Auth::user()->id)->first(); 
        $member = Member::where('id',$request->id)->first();    
        $member->name = $request->name;        
        $member->user_id = $user->id;
        $member->phone_no = $request->phone_no;
        $member->address = $request->address;
        $member->city = $request->city;
        $member->state = $request->state;    
        $member->zip_code = $request->zip_code;
        if ($request->hasFile('image')) {
            $dir = 'uploads/';
            $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
            $fileName = str_random() . '.' . $extension; // rename image
            $request->file('image')->move($dir, $fileName);
            $member->image = $fileName;
        }
        $member->save();
        return redirect()->route('member.index');
    }
    public function update_card_deatil(Request $request){
        
        $user = User::where('id',Auth::user()->id)->first();
        $member = Member::where('id',$request->id)->first();
        $member->card_name = $request->card_name; 
        $member->card_no = $request->card_no;
        $member->user_id = $user->id;
        $member->valid_date = $request->valid_date;
        $member->sec_code = $request->sec_code;
        $member->billing_zip_code = $request->billing_zip_code;
        $member->save();
        return redirect()->route('member.index');
    }
    public function delete($id)
    {
        $service = Member::where('id',$id)->first();
        $service->delete();
        return redirect()->route('member.index');
    }
}
