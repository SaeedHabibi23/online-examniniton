<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        return view('dashboards.admins.index');
    }
    public function settings(){
        return view('dashboards.admins.settings');
    }
    public function changepassword(){
        return view('dashboards.admins.changepassword');
    }
    public function changepasscompleted(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8|string',
        ],[
            'old_password.required' => 'رمز قدیمی ضروری است',
            'old_password.required' => 'رمز جدید ضروری است',
            'old_password.confirmed' => 'رمز جدید ضروری است',
            'old_password.min' => 'رمز جدید باید بیشتر از هشت حرف باشد',
            'old_password.string' => 'رمز قدیمی ضروری است',
        ]);
        if(!Hash::check($request->old_password , auth()->user()->password)){
            return back()->with("error" , "رمز عبور اولیه شما غلط است");
        }

        // dd($request->all());

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password) 
        ]);
        return back()->with("status" , "password changes successfully");
    }
}
