<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\ClassSubjectModel;
use Str; 

class ClassSubjectController extends Controller
{
    public function list(){
        $data['getRecord'] = ClassSubjectModel::getAssignSubject();
        $data['header_title']='Assign Subject List';
        return view('admin.assign_subject.list', $data);
    }
    public function add(){ 
        $data['getAllClass'] = ClassModel::getAllClass();
        $data['getAllSubject'] = SubjectModel::getAllSubject();
        $data['header_title']='Assign Subject';
        return view('admin.assign_subject.add', $data);
    }
    public function insert(Request $request){
        if(!empty($request->subject_id)){
            foreach ($request->subject_id as $subject_id) {
                $countAlreadyFirst = ClassSubjectModel::countAlreadyFirst($request->class_id, $subject_id);
                if(!empty($countAlreadyFirst)){
                    $countAlreadyFirst->status = $request->status;
                    $countAlreadyFirst->save();
                }
                else {
                    $assign_class = new ClassSubjectModel;
                    $assign_class->class_id     = $request->class_id;
                    $assign_class->subject_id   = $subject_id;
                    $assign_class->status       = $request->status;
                    $assign_class->created_by   = Auth::user()->id;
                    $assign_class->save(); 
                }
                  
            }
            return redirect('admin/assign_subject/list')->with('success', "Subject Assign Successfully.");
        }
        else {
            return redirect()->back()->withErrors('error', "Due to some error please try again.");
        }
    }
    public function edit($id){ 
        $getRecord = ClassSubjectModel::getSingle($id);   
        if( !empty($getRecord) ){
            $data['getRecord'] = $getRecord;
            $data['getAssignedSubjectId'] =  ClassSubjectModel::getAssignedSubjectId($getRecord->class_id); 
            $data['getAllClass'] = ClassModel::getAllClass();
            $data['getAllSubject'] = SubjectModel::getAllSubject();
            $data['header_title']='Edit Assigned Subject';
            return view('admin.assign_subject.edit', $data);
        }
        else{
            abort(404);
        }
        
    }
    public function update(Request $request){
        ClassSubjectModel::deleteSubject($request->class_id);
        if(!empty($request->subject_id)){
            foreach ($request->subject_id as $subject_id) {
                $countAlreadyFirst = ClassSubjectModel::countAlreadyFirst($request->class_id, $subject_id);
                if(!empty($countAlreadyFirst)){
                    $countAlreadyFirst->status = $request->status;
                    $countAlreadyFirst->save();
                }
                else {
                    $assign_class = new ClassSubjectModel;
                    $assign_class->class_id     = $request->class_id;
                    $assign_class->subject_id   = $subject_id;
                    $assign_class->status       = $request->status;
                    $assign_class->created_by   = Auth::user()->id;
                    $assign_class->save(); 
                }
                  
            }
            
        }
        return redirect('admin/assign_subject/list')->with('success', "Subject Assign Successfully.");

    }
    public function delete($id){
        //dd($request->all());
        $class_subject = ClassSubjectModel::getSingle($id);
        $class_subject->is_deleted= 1 ;   
        $class_subject->save();

        return redirect('admin/assign_subject/list')->with('success', "Subject Assign deleted successfully.");
    }
}
