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
        $student = new User();
        $student->name              = trim($request->name);
        $student->last_name         = trim($request->last_name);
        $student->addmission_number = trim($request->addmission_number);
        $student->roll_number       = trim($request->roll_number);
        $student->class_id          = trim($request->class_id);
        $student->gender            = trim($request->gender);
        $student->date_of_birth     = trim($request->date_of_birth);
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
}
