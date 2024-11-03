<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use Str;

class UserController extends Controller
{
    public function change_password(){
        $data['header_title']='Change Password';
        return view('profile.change_password', $data);
    }
    public function update_change_password(Request $request){
        $user = User::getSingleAdmin(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password)){
            if($request->new_password == $request->confirm_password){
                $user->password = Hash::make($request->new_password);
                $user->save();
                return redirect()->back()->with('success',"Password updated successfully.");
            }
            else{
                return redirect()->back()->with('error',"New Password doesn't match.");
            }
        }
        else{
            return redirect()->back()->with('error',"Old password incorect.");
        }
    }
}
