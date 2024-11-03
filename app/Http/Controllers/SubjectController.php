<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\SubjectModel;
use Str; 

class SubjectController extends Controller
{
    public function list(){
        $data['getRecord'] = SubjectModel::getSubject();
        $data['header_title']='Class List';
        return view('admin.subject.list', $data);
    }
    public function add(){
        $data['header_title']='Add New Subject';
        return view('admin.subject.add', $data);
    }
    public function insert(Request $request){
        //dd($request->all());
        $subject = new SubjectModel;
        $subject->name     = trim($request->name);
        $subject->type= $request->type;
        $subject->status= $request->status;
        $subject->created_by= Auth::user()->id;
        $subject->save();

        return redirect('admin/subject/list')->with('success', "Subject added successfully.");
    }
    public function edit($id){ 
        $data['getRecord'] = SubjectModel::getSingle($id);
        if( !empty($data['getRecord']) ){
            $data['header_title']='Edit Subject';
            return view('admin.subject.edit', $data);
        }
        else{
            abort(404);
        }
        
    }
    public function update($id, Request $request){
        //dd($request->all());
        $subject = SubjectModel::getSingle($id);
        $subject->name     = trim($request->name);
        $subject->type= $request->type;
        $subject->status= $request->status;
        $subject->created_by= Auth::user()->id;
        $subject->save();

        return redirect('admin/subject/list')->with('success', "Subject updated successfully.");
    }
    public function delete($id){
        //dd($request->all());
        $subject = SubjectModel::getSingle($id);
        $subject->is_deleted= 1 ;   
        $subject->save();

        return redirect('admin/subject/list')->with('success', "Subject deleted successfully.");
    }
}
