<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Models\ClassModel;
use Str;

class StudentController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getStudent();
        $data['header_title']='Student List';
        return view('admin.student.list', $data);
    }
    public function add(){ 
        $data['getAllClass'] = ClassModel::getAllClass();
        $data['header_title']='Add New Student';
        return view('admin.student.add', $data);
    } 
    public function insert(Request $request){
        request()->validate([
            'email'         => 'required|email|unique:users',
            'height'        => 'max:10',
            'weight'        => 'max:10',
            'mobile_number' => 'max:10',
        ]);
        $student = new User();
        $student->name              = trim($request->name);
        $student->last_name         = trim($request->last_name);
        $student->addmission_number = trim($request->addmission_number);
        $student->roll_number       = trim($request->roll_number);
        $student->class_id          = trim($request->class_id);
        $student->gender            = trim($request->gender);
        $student->date_of_birth     = trim($request->date_of_birth);
        $student->religion          = trim($request->religion);
        $student->blood_group       = trim($request->blood_group);
        $student->admission_date    = trim($request->admission_date);
        $student->mobile_number     = trim($request->mobile_number);
        $student->caste             = trim($request->caste);
        if(!empty($request->file('image'))){
            $ext        = $request->file('image')->getClientOriginalExtension();
            $file       = $request->file('image');
            $randomStr  = Str::random(20);
            $fileName   = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $fileName);
            $student->image         = $fileName;
        }
        
        $student->height            = trim($request->height);
        $student->weight            = trim($request->weight);
        $student->email             = trim($request->email);
        $student->password          = Hash::make($request->password);
        $student->status            = trim($request->status);
        $student->user_type         = 3;
        $student->save();

        return redirect('admin/student/list')->with('success', "Student successfully created.");
    }
    public function edit($id){
        $data['getRecord']      = User::getSingleAdmin($id);
        $data['getAllClass']    = ClassModel::getAllClass();
        if( !empty($data['getRecord']) ){
            $data['header_title']='Edit Student';
            return view('admin.student.edit', $data);
        }
        else{
            abort(404);
        }
    }
    public function update($id, Request $request){
        //dd($request->all());        
        request()->validate([
            'email'         => 'required|email|unique:users,email,'.$id,
            'height'        => 'max:10',
            'weight'        => 'max:10',
            'mobile_number' => 'max:10',
        ]);
        $student = User::getSingleAdmin($id);
        $student->name              = trim($request->name);
        $student->last_name         = trim($request->last_name);
        $student->addmission_number = trim($request->addmission_number);
        $student->roll_number       = trim($request->roll_number);
        $student->class_id          = trim($request->class_id);
        $student->gender            = trim($request->gender);
        $student->date_of_birth     = trim($request->date_of_birth);
        $student->religion          = trim($request->religion);
        $student->blood_group       = trim($request->blood_group);
        $student->admission_date    = trim($request->admission_date);
        $student->mobile_number     = trim($request->mobile_number);
        $student->caste             = trim($request->caste);
        if(!empty($request->file('image'))){
            if(!empty($student->getImage())){
                unlink('upload/profile/'.$student->image);
            }
            $ext        = $request->file('image')->getClientOriginalExtension();
            $file       = $request->file('image');
            $randomStr  = Str::random(20);
            $fileName   = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $fileName);
            $student->image         = $fileName;
        }
        
        $student->height            = trim($request->height);
        $student->weight            = trim($request->weight);
        $student->email             = trim($request->email);
        $student->password          = Hash::make($request->password);
        $student->status            = trim($request->status);
        $student->user_type         = 3;
        $student->save();

        return redirect('admin/student/list')->with('success', "Student updated successfully.");
    }
    public function delete($id){
        //dd($request->all());
        $student = User::getSingleAdmin($id);
        $student->is_deleted= 1 ;   
        $student->save();

        return redirect('admin/student/list')->with('success', "Student deleted successfully.");
    }
}
