<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Hash;

class PasswordSecurityController extends Controller
{
    public function index()
    {
        $user = User::where('id',Auth::user()->id)->first();
        return view('setting.password_security',compact('user'));
    }
    public function account_name(Request $request)
    {
        $user_name = User::where('id',Auth::user()->id)->first();
        if(Hash::check($request->password, $user_name->password)) {
            $user_name->name = $request->name;
            $user_name->l_name = $request->l_name;
            $user_name->save();
        }else{
            Session::flash('message', 'Password is Incorrect'); 
        }
        return redirect()->back();
        
    }
    public function account_phoneno(Request $request)
    {
        $user_name = User::where('id',Auth::user()->id)->first();
        if(Hash::check($request->password, $user_name->password)) {
            $user_name->phone_no = $request->phone_no;
            $user_name->save();
        }else{
            Session::flash('message', 'Password is Incorrect');     
        }
        return redirect()->back();
        
    }
    
    public function account_email(Request $request)
    {
        $user_name = User::where('id',Auth::user()->id)->first();
        if(Hash::check($request->password, $user_name->password)) {
            $user_name->email = $request->email;
            $user_name->save();
        }else{
            Session::flash('message', 'Password is Incorrect'); 
        }
        return redirect()->back();
        
    }
    public function account_password(Request $request)
    {
        $user_name = User::where('id',Auth::user()->id)->first();
        if(Hash::check($request->password, $user_name->password)) {
            $user_name->password = Hash::make($request->new_password);
            $user_name->save();
        }else{
            Session::flash('message', 'Old Password is Incorrect'); 
        }
        return redirect()->back();
        
    }
    
}
