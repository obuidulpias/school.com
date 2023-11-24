<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use Str;

class AdminController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getAdmin();
        $data['header_title']='Admin List';
        return view('admin.admin.list', $data);
    }
    public function add(){ 
        $data['header_title']='Add New Admin';
        return view('admin.admin.add', $data);
    }
    public function insert(Request $request){
        //dd($request->all());
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);

        $user = new User;
        $user->name     = trim($request->name);
        $user->email    = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type= 1;
        $user->save();

        return redirect('admin/admin/list')->with('success', "User added successfully.");
    }
    public function edit($id){ 
        $data['getRecord'] = User::getSingleAdmin($id);
        if( !empty($data['getRecord']) ){
            $data['header_title']='Edit Admin';
            return view('admin.admin.edit', $data);
        }
        else{
            abort(404);
        }
        
    }
    public function update($id, Request $request){
        //dd($request->all());
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $user = User::getSingleAdmin($id);
        $user->name     = trim($request->name);
        $user->email    = trim($request->email);
        if( !empty($user->password) ){
            $user->password = Hash::make($request->password);
        }       
        $user->save();

        return redirect('admin/admin/list')->with('success', "User updated successfully.");
    }
    public function delete($id){
        //dd($request->all());
        $user = User::getSingleAdmin($id);
        $user->is_deleted= 1 ;   
        $user->save();

        return redirect('admin/admin/list')->with('success', "User deleted successfully.");
    }

}
